<?php

namespace VanguardLTE\Games\BookofTutRespin\PragmaticLib;

use VanguardLTE\Services\Api\Api;

class Spin
{
    public static function spinResult($user, $game, $bet, $lines, $log, $gameSettings, $index, $counter, $callbackUrl, $pur, $bank, $shop, $jpgs){
        var_dump('0');
        $newSpinCnt = 0;
        $gameSettings = $gameSettings->all;
        $currentLog = $log->getLog();
        var_dump('0_1');
		// print_R($currentLog );
        // $lines = $doubleChance == 0 ? $lines : $lines * 1.25;
        if ($currentLog &&
            (array_key_exists('state', $currentLog) && $currentLog['state'] != 'spin' && $currentLog['state'] != 'lastRespin' ||
                array_key_exists('FreeState', $currentLog) && $currentLog['FreeState'] != 'LastFreeSpin')){
            $changeBalance = 0;
		// } else if ($currentLog && array_key_exists('rs_c', $currentLog) && $currentLog['rs_c'] == 1){
			// $changeBalance = 0;
		}else{
            $changeBalance = ($bet * $lines * -1);
            if ($pur === '0') $changeBalance *= 100;
        }
        var_dump('changeBalance:'.$changeBalance);
        var_dump('0_2');
         if ($user->balance < -1 * $changeBalance) return false;
         
         
        NewSpin:
		var_dump('newSpinCnt' . $newSpinCnt);
        //build a playing field
        $reelSet = 0;
        $pur1 = $pur;
        if($currentLog && $pur1 == '0')    $reelSet = 14;
        if ($currentLog && array_key_exists('fs', $currentLog)) $reelSet = 17; // if free spins - then the set of reels is 4th
        $slotArea = SlotArea::getSlotArea($gameSettings,$reelSet,$currentLog);
        var_dump('1');

        if ($pur1 === '0') 
            $slotArea['ScatterCount'] = BuyFreeSpins::getFreeSpin($slotArea['SlotArea'], $gameSettings, 3, 3); // buy freespins
        else {
            if($currentLog && array_key_exists('fs', $currentLog) && $currentLog['fs'] == $currentLog['fsmax'])
                $slotArea['ScatterCount'] = BuyFreeSpins::getFreeSpin($slotArea['SlotArea'], $gameSettings, 1, 1);
            else if($currentLog && array_key_exists('fs', $currentLog))
                $slotArea['ScatterCount'] = BuyFreeSpins::getFreeSpin($slotArea['SlotArea'], $gameSettings, 0, 2);
            else 
                $slotArea['ScatterCount'] = BuyFreeSpins::getFreeSpin($slotArea['SlotArea'], $gameSettings, 0, 5);
        }
        var_dump('2');

        // if scatter count is greater than settings_needfs make pur = 0
        if($slotArea['ScatterCount'] >= $gameSettings['settings_needfs']){
            if(!$currentLog || $currentLog && !array_key_exists('fs', $currentLog))
                $pur1 = '0';
            else {
                var_dump('2_1_scatterCount='.$slotArea['ScatterCount'].'_settings-needfs='.$gameSettings['settings_needfs']);
                $pur1 = '1';
            }
        }
        else 
            SlotArea::setStf($slotArea, $gameSettings, $currentLog);
        if(array_key_exists('rs_c', $slotArea) && $slotArea['rs_c'] == 2 || array_key_exists('rs_c', $slotArea) && $currentLog && array_key_exists('fs', $currentLog) && $currentLog['fs'] >= $currentLog['fsmax'] - 1){
            $newSpinCnt ++;
            if($newSpinCnt<21){ \Illuminate\Support\Facades\Log::info('newSpinCnt:' . $newSpinCnt);goto NewSpin;}
        }
		// check user rtp
		/*
		$user_rtp_get = \VanguardLTE\StatGame::where('user_id', \Auth::id())->orderByDesc('date_time');
		$user_rtp = ($user_rtp_get->sum('win') / $user_rtp_get->sum('bet')) * 100;
		$user_force_max_win = $bet * rand(6,21);*/
		//v2
		@$user_rtp_new = @\DB::select("select sum(bet),sum(win), ( sum(win) / sum(bet) * 100) as rtp from (select w_stat_game.bet,w_stat_game.win from w_stat_game WHERE user_id = ".$user->id." order by w_stat_game.date_time desc limit 250) as subt");
		$user_rtp = 69;
		$user_force_max_win = $bet * rand(6,26);
		// print_r($user_rtp_new);
		// print_r($user_rtp_new[0]);
		// print_r($user_rtp_new[0]->rtp);
		if(isset($user_rtp_new[0]) && isset($user_rtp_new[0]->rtp)){
			
			$user_rtp = $user_rtp_new[0]->rtp;
		}
		
        //check win (return array with win amount and symbol positions
        $winChecker = new WinChecker($gameSettings);
        $win = $winChecker->getWin($pur1, $currentLog, $bet, $slotArea);
		/*
		\Illuminate\Support\Facades\Log::info("NEWuser_rtp: $user_rtp - bet: $bet - TotalWin: " . $win['TotalWin'] . " user_force_max_win: $user_force_max_win");
		if ($user_rtp>80 && isset($win['TotalWin']) && $win['TotalWin'] > $user_force_max_win){
			\Illuminate\Support\Facades\Log::info("FORCENEWSPIN user_rtp: $user_rtp - TotalWin: " . $win['TotalWin'] . " user_force_max_win: $user_force_max_win");
			if($newSpinCnt<50){ \Illuminate\Support\Facades\Log::info('NEW newSpinCnt:' . $newSpinCnt);goto NewSpin;}
		}*/
		//v2
		\Illuminate\Support\Facades\Log::info("NEWuser_rtp: $user_rtp - bet: $bet - TotalWin: " . $win['TotalWin'] . " user_force_max_win: $user_force_max_win");
		if ($user_rtp>70 && isset($win['TotalWin']) && $win['TotalWin'] > $user_force_max_win){
			\Illuminate\Support\Facades\Log::info("FORCENEWSPIN user_rtp: $user_rtp - TotalWin: " . $win['TotalWin'] . " user_force_max_win: $user_force_max_win");
			if($newSpinCnt<50){ \Illuminate\Support\Facades\Log::info('NEW newSpinCnt:' . $newSpinCnt);goto NewSpin;}
		}
        var_dump('3');

        //put everything in a convenient array
        $logAndServer = LogAndServer::getResult($slotArea, $index, $counter, $bet, $lines, $reelSet,
            $win, $pur1, $currentLog, $user, $changeBalance, $gameSettings, $game, $bank);
        var_dump('6');
        // check if you can win
        
        $fswin = array_key_exists('fswin', $win) ? $win['fswin'] : 0;
        if($pur1 === '0')
            $win['TotalWin'] += SlotArea::getPsym($gameSettings, $slotArea['SlotArea'], $bet, $lines)['psymwin'];
        if ($win['TotalWin'] + $fswin + $win['rswin'] > 0)
        {
            if(array_key_exists('rs_t', $logAndServer['Log']))
                $win_permission = WinPermission::winCheck($bet, $fswin,$pur1,$bank,$logAndServer['Log'],$win['TotalWin'] + $win['rswin'], $currentLog, $changeBalance, $shop, 0);
            else 
            $win_permission = WinPermission::winCheck($bet, $fswin,$pur1,$bank,$logAndServer['Log'],$win['TotalWin'], $currentLog, $changeBalance, $shop, $win['rswin']);
        }
        else $win_permission = true;
        var_dump('7');
        if (!$win_permission) {
            $newSpinCnt ++;
            if($newSpinCnt<21){ \Illuminate\Support\Facades\Log::info('newSpinCnt:' . $newSpinCnt);goto NewSpin;}
        }
        // check rtp when you spin
        $checkRtpSlots = new CheckRtp($gameSettings['rtp_slots'], $game);
        if($pur1 != '0' && $currentLog && !array_key_exists('fs', $currentLog) && !$checkRtpSlots->checkRtp($bet * $lines, $win['TotalWin']) && $newSpinCnt < 4 && $bank->slots > $bet * $lines){
            $newSpinCnt ++;
            if($newSpinCnt<21){ \Illuminate\Support\Facades\Log::info('newSpinCnt:' . $newSpinCnt);goto NewSpin;}
        }
        // check rtp when you're on free spin
        $checkRtpBonus = new CheckRtp($gameSettings['rtp_bonus'], $game);
        if($currentLog 
        && array_key_exists('fs', $currentLog) 
        && !$checkRtpBonus->checkRtp($bet * $lines * 100 / $currentLog['fsmax'], $win['TotalWin'] + $fswin)
        && $bank->bonus + $bank->slots > $bet * $lines * 100 / $currentLog['fsmax']
        && $newSpinCnt < 4){
            $newSpinCnt ++;
            if($newSpinCnt<21){ \Illuminate\Support\Facades\Log::info('newSpinCnt:' . $newSpinCnt);goto NewSpin;}
        }
        // allocate money to the bank and write it down in statistics
        // $freeSpins = 0;
        if(array_key_exists('rs_t', $logAndServer['Log']))
            $win['TotalWin'] += $win['rswin'];
        SwitchMoney::set($pur1, $changeBalance, $shop, $bank, $jpgs, $user, $game, $callbackUrl, $win['TotalWin'], $slotArea, $fswin, $logAndServer['Log'], $win_permission);
        var_dump('8');
        //write a log
        Log::setLog($logAndServer['Log'], $game->id, $user->id, $user->shop_id);
        var_dump('9');

        //give to the server
        $response = '&'.(implode('&', $logAndServer['Server']));
        var_dump('10');
        return $response;
    }

}
