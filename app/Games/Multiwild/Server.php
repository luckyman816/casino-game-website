<?php

namespace VanguardLTE\Games\Merkur\Multiwild;



use VanguardLTE\Games\MerkurLib\Log;
use VanguardLTE\Games\MerkurLib\Statistic;
use VanguardLTE\Games\MerkurLib\SwitchMoney;

class Server
{
    public function get($request, $game, $command)
    {
        try {
            $userId = \Auth::id();
            if ($userId == null) {
                $response = '{"responseEvent":"error","responseType":"","serverResponse":"invalid login"}';
                var_dump($request->callbackUrl);
                var_dump($request->userId);
                exit($response);
            }
            $user = \VanguardLTE\User::lockForUpdate()->find($userId);
            $shop = \VanguardLTE\Shop::find($user->shop_id);
            $game = \VanguardLTE\Game::where([
                'name' => $game,
                'shop_id' => $user->shop_id
            ])->lockForUpdate()->first();
            $bank = \VanguardLTE\GameBank::where(['shop_id' => $user->shop_id])->first();
            $jpgs = \VanguardLTE\JPG::where(['shop_id' => $user->shop_id, 'view' => 1])->lockForUpdate()->get();
            $settings = new Settings();
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            if ($command == 'start') {
                $response = [
                    'de.edict.eoc.gaming.comm.JoinSessionResponseDTO' => [
                        "gameMode" => "MONEY",
                        "gameSessionUuid" => "2ce341d5-75e1-42c7-b914-3fe31fe74658",
                        "depot" => [
                            "balance" => (int)round($user->balance * 100),
                            "limitBalance" => (int)round($user->balance * 100),
                            "playerMoney" => 0
                        ],
                        "gameSpecs" => [
                            "minimalStake" => 1000,
                            "maximalStake" => 200000
                        ],
                        "playerSettings" => []
                    ],
                ];
                return response()->json($response);
            }

            if ($command == 'commands') {
                $gameData = $request->input(["de.edict.eoc.gaming.comm.GameSessionRequestDTO"])['gameData'];
                $log = Log::getLog($game->id, $user->id);

                if (is_array($gameData) && array_key_exists('gameActionId', $gameData) && $gameData['gameActionId'] == 'INIT') {
                    if (!$log) $log = ["Reels" => $settings->randomSlotArea, 'Winnings' => [], 'TotalWin' => 0, 'Bet' => 10, 'Lines' => 80];
                    return response()->json(Init::get((int)round($user->balance * 100), $log));
                }

                $com = json_decode($gameData);// декодируем данные пришедшие в запрос
                $command = $com->gameActionId; // присваиваем команду
                if (!$com->gameParams && $command == 'PLAY') $command = 'RISK_LADDER_PLAY'; // при риске команда такая же PLAY, надо изменить чтобы отличалась
                switch ($command) {
                    case 'PLAY':
                        $bet = json_decode($com->gameParams->CLIENT_SETTINGS)->coin;
                        $lines = 80;
                        // если не хватает денег
                        if ((double)($bet / 100) > $user->balance) {
                            if (!$log) $log = ["SlotArea" => $settings->randomSlotArea, 'Winnings' => [], 'Bet' => 0, 'TotalWin' => 0];
                            return response()->json(Init::get((int)round($user->balance * 100), $log, true));
                        }

                        list($winnings, $readyReels, $slotArea, $totalWin) = Spin::get($bet, $lines, $settings, $bank, $shop->percent, $game->stat_in, $game->stat_out);

                        // прибавить в банки и джекпоты, отнять если выигрыш, записать в статистику результат
                        SwitchMoney::set((double)($bet / 100), $user, $jpgs, $shop, $bank, $game, $slotArea, (double)($totalWin / 100));

                        $toLog = ['Winnings' => $winnings, 'Reels' => $readyReels, 'SlotArea' => $slotArea, 'TotalWin' => $totalWin, 'Bet' => $bet, 'Lines' => $lines];

                        // вернуть ответ с сервера
                        $response = Play::get((int)round($user->balance * 100), $winnings, $readyReels, $bet, $totalWin);

                        // записать в лог результат спина
                        Log::setLog($toLog, $game->id, $user->id, $user->shop_id);
                        return response()->json($response);
                    case 'FINISH_GAME':
                        // прочитать из лога результат спина и передать в финиш
                        $user->balance += (double)($log['TotalWin'] / 100);
                        $user->save();
                        $response = Play::get((int)round($user->balance * 100), $log['Winnings'], $log['Reels'], $log['Bet'], $log['TotalWin'], true);
                        $log['Winnings'] = [];
                        //$log['Bet'] = 0;
                        $log['TotalWin'] = 0;
                        Log::setLog($log, $game->id, $user->id, $user->shop_id);
                        return response()->json($response);
                    case 'RISK_LADDER_CHOICE': // открыть риск игру
                        // передать лог и вернуть ответ от сервера, и определить начальный уровень лестницы
                        list($minLevel, $maxLevel, $currentLevel, $response) = RiskLadder::get((int)round($user->balance * 100), $log);
                        $toLog = ['MinLevel' => $minLevel, 'MaxLevel' => $maxLevel, 'CurrentLevel' => $currentLevel];
                        $log = array_merge($log, $toLog);
                        Log::setLog($log, $game->id, $user->id, $user->shop_id);
                        return response()->json($response);
                    case 'RISK_LADDER_PLAY': // совершить риск игру
                        list($toLog, $returnSumm, $response) = RiskLadderPlay::get((int)round($user->balance * 100), $log, $bank, $game);
                        Statistic::setRiskStat($user, ($log['TotalWin'] / 100), (($toLog['TotalWin'] - $log['TotalWin']) / 100), $game, $bank, 'RL', ($returnSumm / 100));
                        $log['MinLevel'] = $toLog['MinLevel'];
                        $log['MaxLevel'] = $toLog['MaxLevel'];
                        $log['TotalWin'] = $toLog['TotalWin'];
                        Log::setLog($log, $game->id, $user->id, $user->shop_id);
                        return response()->json($response);
                    case 'RISK_DIVIDE': // забрать часть из риск игры
                        if (isset($log['MinLevel'])) { // забрать половину из игры лестницы и сбросить уровень на один
                            list($toLog, $returnSumm, $response) = RiskLadderPlay::get((int)round($user->balance * 100), $log, $bank, $game, true);
                            $log['MinLevel'] = $toLog['MinLevel'];
                            $log['MaxLevel'] = $toLog['MaxLevel'];
                            $log['TotalWin'] = $toLog['TotalWin'];
                            Log::setLog($log, $game->id, $user->id, $user->shop_id);
                            $user->balance += (double)($returnSumm / 100);
                            $user->save();
                        } else { // забрать половину из карточной риск игры
                            $returnSumm = $log['TotalWin'] / 2;
                            $user->balance += (double)($returnSumm / 100);
                            $user->save();
                            $cards = RiskBlackRed::cards($user->id, $game->id, $user->shop_id);
                            $log['TotalWin'] /= 2;
                            $response = RiskBlackRed::get((int)round($user->balance * 100), $log, $cards);
                            Log::setLog($log, $game->id, $user->id, $user->shop_id);
                        }
                        return response()->json($response);
                    case 'RISK_BLACKRED_CHOICE':
                        $cards = RiskBlackRed::cards($user->id, $game->id, $user->shop_id);
                        $response = RiskBlackRed::get((int)round($user->balance * 100), $log, $cards);
                        return response()->json($response);
                    case 'RISK_BLACKRED_BLACK':
                    case 'RISK_BLACKRED_RED':
                        $cards = RiskBlackRed::cards($user->id, $game->id, $user->shop_id);
                        list($win, $totalWin, $newCards, $dropped_cards, $response) = RiskBlackRedPlay::get($log, $command, $cards, (int)round($user->balance * 100), $bank);
                        // записать новые карты в базу
                        $cards->cards = json_encode($newCards);
                        $cards->dropped_cards = json_encode($dropped_cards);
                        $cards->save();
                        // отнять или прибавить в банк
                        if ($win) {
                            $bank->decrement('slots', (($totalWin - $log['TotalWin']) / 100));
                            $game->increment('stat_out', (($totalWin - $log['TotalWin']) / 100));
                        } else {
                            $bank->increment('slots', ($log['TotalWin'] / 100));
                            $game->decrement('stat_out', ($log['TotalWin'] / 100));
                        }
                        $bank->save();
                        $game->save();

                        Statistic::setRiskStat($user, $log['TotalWin'] / 100, $totalWin / 100, $game, $bank, 'CR');

                        $log['TotalWin'] = $totalWin;
                        Log::setLog($log, $game->id, $user->id, $user->shop_id);

                        return response()->json($response);
                }
            }
        } catch (\Exception $e) {
            \Log::error($e);
            //exit( $e->getMessage() );
            exit($e);
        }

    }
}