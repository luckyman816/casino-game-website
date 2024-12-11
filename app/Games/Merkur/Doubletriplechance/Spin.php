<?php

namespace VanguardLTE\Games\Merkur\Doubletriplechance;

class Spin
{
    public static function get($bet, $settings, $bank, $rtp, $statIn, $statOut)
    {
        newSpin:
        // рандомно получить позиции остановки. В каждой катушке дополнительно выделить несколько доп символов
        $readyReels = [];
        $reelSymbols = 4; // по умолчанию 4 символа
        foreach ($settings->reels as $reel) {
            $reelSymbols += 2; // добавляем для следующей катушки 2 доп символа (для поочередной остановки катушек) 6/8/10
            $position = rand(0, (strlen($reel) - 1)); // определяем позицию
            // из сдвоенной строки выбираем подстроку и преобразовав в массив кладем в slotArea
            $readyReels[] = str_split(substr($reel . $reel, $position, $reelSymbols));
        }
        // заполнить линии, чтобы проверить их на выигрыш
        $slotArea = [];
        foreach ($readyReels as $readyReel) { // забираем последние 3 символа из каждой катушки
            $slotArea[] = array_slice($readyReel, 1, 3);
        }

        // проверить выиграли ли линии
        $winLines = [];
        $totalWin = 0;
        foreach ($settings->lines as $lineKey => $line) {
            // проверить если все 3 символа используемых в линии равны - то линия выигрышная
            if ($slotArea[0][$line[0]] == $slotArea[1][$line[1]] && $slotArea[0][$line[0]] == $slotArea[2][$line[2]]) {
                // если из первой катушки первый символ линии равен второму символу из линии во второй катушке и так же с третьей - линия выигрышная
                $symbol = $slotArea[0][$line[0]];
                $win = $settings->paytable[$symbol] * $bet;
                $totalWin += $win;
                $winLines[] = [
                    'Line' => $lineKey,
                    'Symbol' => $symbol,
                    'Points' => [
                        ["point" => ["x" => 0, "y" => $line[0]], "symbol" => $symbol],
                        ["point" => ["x" => 1, "y" => $line[1]], "symbol" => $symbol],
                        ["point" => ["x" => 2, "y" => $line[2]], "symbol" => $symbol],
                    ],
                    'Win' => $win
                ];
            }
        }
        // если можно выигрывать - идем дальше, если нет то сначала. Если RTP высокий то сначала.
        /*if ($totalWin) {
            $currentRTP = $statIn == 0 ? 0 : (($statOut + ($totalWin / 100)) / $statIn) * 100;
            if ($currentRTP > $rtp || ($totalWin / 100) > $bank->slots) goto newSpin;
        }*/
        if ($totalWin) {
            if (($totalWin / 100) > $bank->slots) goto newSpin;
        }
        $winnings = [];

        foreach ($winLines as $winLine) {
            $winnings[] = [
                "wagerPositionId" => $winLine['Line'], "winFactor" => 40, "winSum" => $winLine['Win'], "wagerId" => $winLine['Line'], "winExtensions" => [],
                    "items" => $winLine['Points'],
                    "highlight" => ["payGroupMemberId" => $winLine['Symbol'], "occurrence" => 3], "lid" => $winLine['Line'], "eid" => 1
            ];
        }

        if ($slotArea[0] === $slotArea[1] && $slotArea[0] === $slotArea[2]) {
            // максимум 6 раундов
            list($rounds, $stopPos) = self::getRounds($totalWin, $bank, $statOut, $statIn, $rtp);
            $winnings[] = [
                "wagerPositionId" => 100,"winFactor" => 400,
                "winSum" => $totalWin * $rounds,"wagerId" => 1,
                "winExtensions" => [],"roundsWon" => $rounds,"stopPositions" => $stopPos];
            $totalWin += $totalWin*$rounds;
        }


        return array($winnings, $readyReels, $slotArea, $totalWin);
    }

    private static function getRounds($totalWin, $bank, $statOut, $statIn, $rtp){
        newRounds:
        // рандомно генерируем количество раундов и проверяем можно ли выиграть и не будет ли завышен ртп
        $rounds = rand(0,6);
        $stopPos = range(0, $rounds);
        $rounds = $rounds == 0 ? 1 : $rounds; // если раундов 0 - то сделать 1 чтобы умножать и правильно писать количество раундов

        $currentRTP = $statIn == 0 ? 0 : (($statOut + (($totalWin * $rounds) / 100)) / $statIn) * 100;
        if ($currentRTP > $rtp+20 || (($totalWin * $rounds) / 100) > $bank->slots) goto newRounds;

        $stopPos = array_slice($stopPos, 0, $rounds);

        shuffle($stopPos);
        $stopPos[] = $stopPos[array_key_last($stopPos)];
        return array($rounds, $stopPos);
    }

}
