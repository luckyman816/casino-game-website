<<<<<<< HEAD
<?php
=======
<?php 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
namespace VanguardLTE\Games\MermaidsPearl
{
    class SlotSettings
    {
        public $playerId = null;
        public $splitScreen = null;
        public $reelStrip1 = null;
        public $reelStrip2 = null;
        public $reelStrip3 = null;
        public $reelStrip4 = null;
        public $reelStrip5 = null;
        public $reelStrip6 = null;
        public $lastEvent = null;
        public $reelStripBonus1 = null;
        public $reelStripBonus2 = null;
        public $reelStripBonus3 = null;
        public $reelStripBonus4 = null;
        public $reelStripBonus5 = null;
        public $reelStripBonus6 = null;
        public $slotId = '';
        public $slotDBId = '';
        public $Line = null;
        public $scaleMode = null;
        public $numFloat = null;
        public $gameLine = null;
        public $Bet = null;
        public $isBonusStart = null;
        public $Balance = null;
        public $SymbolGame = null;
        public $GambleType = null;
        public $Jackpots = [];
        public $keyController = null;
        public $slotViewState = null;
        public $hideButtons = null;
        public $slotReelsConfig = null;
        public $slotFreeCount = null;
        public $slotFreeMpl = null;
        public $slotWildMpl = null;
        public $slotExitUrl = null;
        public $slotBonus = null;
        public $slotBonusType = null;
        public $slotScatterType = null;
        public $slotGamble = null;
        public $Paytable = [];
        public $slotSounds = [];
        private $jpgs = null;
        private $Bank = null;
        private $Percent = null;
        private $WinLine = null;
        private $WinGamble = null;
        private $Bonus = null;
        private $shop_id = null;
        public $currency = null;
        public $user = null;
        public $game = null;
        public $shop = null;
        public $jpgPercentZero = false;
        public $count_balance = null;
        public function __construct($sid, $playerId)
        {
            $this->slotId = $sid;
            $this->playerId = $playerId;
            $user = \VanguardLTE\User::lockForUpdate()->find($this->playerId);
            $this->user = $user;
            $this->shop_id = $user->shop_id;
            $gamebank = \VanguardLTE\GameBank::where(['shop_id' => $this->shop_id])->lockForUpdate()->get();
            $game = \VanguardLTE\Game::where([
<<<<<<< HEAD
                'name' => $this->slotId,
=======
                'name' => $this->slotId, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                'shop_id' => $this->shop_id
            ])->lockForUpdate()->first();
            $this->shop = \VanguardLTE\Shop::find($this->shop_id);
            $this->game = $game;
            $this->MaxWin = $this->shop->max_win;
            $this->increaseRTP = 1;
            $this->CurrentDenom = $this->game->denomination;
            $this->scaleMode = 0;
            $this->numFloat = 0;
            $this->Paytable['P_1'] = [
<<<<<<< HEAD
                0,
                0,
                10,
                250,
                2500,
                9000
            ];
            $this->Paytable['P_2'] = [
                0,
                0,
                2,
                25,
                125,
                750
            ];
            $this->Paytable['P_3'] = [
                0,
                0,
                2,
                25,
                125,
                750
            ];
            $this->Paytable['P_4'] = [
                0,
                0,
                0,
                15,
                75,
                250
            ];
            $this->Paytable['P_5'] = [
                0,
                0,
                0,
                15,
                75,
                250
            ];
            $this->Paytable['P_6'] = [
                0,
                0,
                0,
                20,
                100,
                400
            ];
            $this->Paytable['A'] = [
                0,
                0,
                0,
                10,
                50,
                125
            ];
            $this->Paytable['K'] = [
                0,
                0,
                0,
                10,
                50,
                125
            ];
            $this->Paytable['Q'] = [
                0,
                0,
                0,
                5,
                25,
                100
            ];
            $this->Paytable['J'] = [
                0,
                0,
                0,
                5,
                25,
                100
            ];
            $this->Paytable[10] = [
                0,
                0,
                0,
                5,
                25,
                100
            ];
            $this->Paytable[9] = [
                0,
                0,
                2,
                5,
                25,
                100
            ];
            $this->Paytable['SCAT'] = [
                0,
                0,
                2,
                5,
                20,
=======
                0, 
                0, 
                10, 
                250, 
                2500, 
                9000
            ];
            $this->Paytable['P_2'] = [
                0, 
                0, 
                2, 
                25, 
                125, 
                750
            ];
            $this->Paytable['P_3'] = [
                0, 
                0, 
                2, 
                25, 
                125, 
                750
            ];
            $this->Paytable['P_4'] = [
                0, 
                0, 
                0, 
                15, 
                75, 
                250
            ];
            $this->Paytable['P_5'] = [
                0, 
                0, 
                0, 
                15, 
                75, 
                250
            ];
            $this->Paytable['P_6'] = [
                0, 
                0, 
                0, 
                20, 
                100, 
                400
            ];
            $this->Paytable['A'] = [
                0, 
                0, 
                0, 
                10, 
                50, 
                125
            ];
            $this->Paytable['K'] = [
                0, 
                0, 
                0, 
                10, 
                50, 
                125
            ];
            $this->Paytable['Q'] = [
                0, 
                0, 
                0, 
                5, 
                25, 
                100
            ];
            $this->Paytable['J'] = [
                0, 
                0, 
                0, 
                5, 
                25, 
                100
            ];
            $this->Paytable[10] = [
                0, 
                0, 
                0, 
                5, 
                25, 
                100
            ];
            $this->Paytable[9] = [
                0, 
                0, 
                2, 
                5, 
                25, 
                100
            ];
            $this->Paytable['SCAT'] = [
                0, 
                0, 
                2, 
                5, 
                20, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                500
            ];
            $reel = new GameReel();
            foreach( [
<<<<<<< HEAD
                'reelStrip1',
                'reelStrip2',
                'reelStrip3',
                'reelStrip4',
                'reelStrip5',
                'reelStrip6'
            ] as $reelStrip )
            {
                if( count($reel->reelsStrip[$reelStrip]) )
=======
                'reelStrip1', 
                'reelStrip2', 
                'reelStrip3', 
                'reelStrip4', 
                'reelStrip5', 
                'reelStrip6'
            ] as $reelStrip ) 
            {
                if( count($reel->reelsStrip[$reelStrip]) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $this->$reelStrip = $reel->reelsStrip[$reelStrip];
                }
            }
            $this->keyController = [
<<<<<<< HEAD
                '13' => 'uiButtonSpin',
                '49' => 'uiButtonInfo',
                '50' => 'uiButtonCollect',
                '51' => 'uiButtonExit',
                '52' => 'uiButtonLine1',
                '53' => 'uiButtonLine3',
                '54' => 'uiButtonLine5',
                '55' => 'uiButtonLine7',
                '56' => 'uiButtonLine9',
                '57' => 'uiButtonBet',
                '48' => 'uiButtonBetMax',
                '189' => 'uiButtonAuto',
=======
                '13' => 'uiButtonSpin', 
                '49' => 'uiButtonInfo', 
                '50' => 'uiButtonCollect', 
                '51' => 'uiButtonExit', 
                '52' => 'uiButtonLine1', 
                '53' => 'uiButtonLine3', 
                '54' => 'uiButtonLine5', 
                '55' => 'uiButtonLine7', 
                '56' => 'uiButtonLine9', 
                '57' => 'uiButtonBet', 
                '48' => 'uiButtonBetMax', 
                '189' => 'uiButtonAuto', 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                '187' => 'uiButtonSpin'
            ];
            $this->slotReelsConfig = [
                [
<<<<<<< HEAD
                    97,
                    113,
                    3
                ],
                [
                    211,
                    113,
                    3
                ],
                [
                    325,
                    113,
                    3
                ],
                [
                    439,
                    113,
                    3
                ],
                [
                    553,
                    113,
=======
                    97, 
                    113, 
                    3
                ], 
                [
                    211, 
                    113, 
                    3
                ], 
                [
                    325, 
                    113, 
                    3
                ], 
                [
                    439, 
                    113, 
                    3
                ], 
                [
                    553, 
                    113, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    3
                ]
            ];
            $this->slotBonusType = 0;
            $this->slotScatterType = 0;
            $this->splitScreen = false;
            $this->slotBonus = true;
            $this->slotGamble = true;
            $this->slotFastStop = 1;
            $this->slotExitUrl = '/';
            $this->slotWildMpl = 2;
            $this->GambleType = 1;
            $this->slotFreeCount = 15;
            $this->slotFreeMpl = 3;
            $this->slotViewState = ($game->slotViewState == '' ? 'Normal' : $game->slotViewState);
            $this->hideButtons = [];
            $this->slotSounds = scandir($_SERVER['DOCUMENT_ROOT'] . '/games/' . $this->slotId . '/source/SOUND');
            array_shift($this->slotSounds);
            array_shift($this->slotSounds);
            $this->jpgs = \VanguardLTE\JPG::where('shop_id', $this->shop_id)->lockForUpdate()->get();
            $this->Jackpots = [
<<<<<<< HEAD
                'jack1' => $this->jpgs[0]['balance'],
                'jack2' => $this->jpgs[1]['balance'],
                'jack3' => $this->jpgs[2]['balance']
            ];
            $this->Line = [
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9'
            ];
            $this->gameLine = [
                '1',
                '3',
                '5',
                '7',
=======
                'jack1' => $this->jpgs[0]['balance'], 
                'jack2' => $this->jpgs[1]['balance'], 
                'jack3' => $this->jpgs[2]['balance']
            ];
            $this->Line = [
                '1', 
                '2', 
                '3', 
                '4', 
                '5', 
                '6', 
                '7', 
                '8', 
                '9'
            ];
            $this->gameLine = [
                '1', 
                '3', 
                '5', 
                '7', 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                '9'
            ];
            $this->Bet = explode(',', $game->bet);
            $this->Balance = $user->balance;
            $this->SymbolGame = [
<<<<<<< HEAD
                'SCAT',
                'P_1',
                'P_2',
                'P_3',
                'P_4',
                'P_5',
                'P_6',
                'A',
                'K',
                'Q',
                'J',
                '10',
=======
                'SCAT', 
                'P_1', 
                'P_2', 
                'P_3', 
                'P_4', 
                'P_5', 
                'P_6', 
                'A', 
                'K', 
                'Q', 
                'J', 
                '10', 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                '9'
            ];
            $this->Bank = $game->get_gamebank();
            $this->Percent = $this->shop->percent;
            $this->WinGamble = $game->rezerv;
            $this->slotDBId = $game->id;
<<<<<<< HEAD
            $this->slotCurrency = $user->currency;
            $this->count_balance = $user->count_balance;
            if( $user->address > 0 && $user->count_balance == 0 )
=======
            $this->slotCurrency = $user->shop->currency;
            $this->count_balance = $user->count_balance;
            if( $user->address > 0 && $user->count_balance == 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->Percent = 0;
                $this->jpgPercentZero = true;
            }
<<<<<<< HEAD
            else if( $user->count_balance == 0 )
            {
                $this->Percent = 100;
            }
            if( !isset($this->user->session) || strlen($this->user->session) <= 0 )
=======
            else if( $user->count_balance == 0 ) 
            {
                $this->Percent = 100;
            }
            if( !isset($this->user->session) || strlen($this->user->session) <= 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->user->session = serialize([]);
            }
            $this->gameData = unserialize($this->user->session);
<<<<<<< HEAD
            if( count($this->gameData) > 0 )
            {
                foreach( $this->gameData as $key => $vl )
                {
                    if( $vl['timelife'] <= time() )
=======
            if( count($this->gameData) > 0 ) 
            {
                foreach( $this->gameData as $key => $vl ) 
                {
                    if( $vl['timelife'] <= time() ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        unset($this->gameData[$key]);
                    }
                }
            }
<<<<<<< HEAD
            if( !isset($this->game->advanced) || strlen($this->game->advanced) <= 0 )
=======
            if( !isset($this->game->advanced) || strlen($this->game->advanced) <= 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->game->advanced = serialize([]);
            }
            $this->gameDataStatic = unserialize($this->game->advanced);
<<<<<<< HEAD
            if( count($this->gameDataStatic) > 0 )
            {
                foreach( $this->gameDataStatic as $key => $vl )
                {
                    if( $vl['timelife'] <= time() )
=======
            if( count($this->gameDataStatic) > 0 ) 
            {
                foreach( $this->gameDataStatic as $key => $vl ) 
                {
                    if( $vl['timelife'] <= time() ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        unset($this->gameDataStatic[$key]);
                    }
                }
            }
        }
        public function SetGameData($key, $value)
        {
            $timeLife = 86400;
            $this->gameData[$key] = [
<<<<<<< HEAD
                'timelife' => time() + $timeLife,
=======
                'timelife' => time() + $timeLife, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                'payload' => $value
            ];
        }
        public function GetGameData($key)
        {
<<<<<<< HEAD
            if( isset($this->gameData[$key]) )
=======
            if( isset($this->gameData[$key]) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                return $this->gameData[$key]['payload'];
            }
            else
            {
                return 0;
            }
        }
        public function FormatFloat($num)
        {
            $str0 = explode('.', $num);
<<<<<<< HEAD
            if( isset($str0[1]) )
            {
                if( strlen($str0[1]) > 4 )
                {
                    return round($num * 100) / 100;
                }
                else if( strlen($str0[1]) > 2 )
=======
            if( isset($str0[1]) ) 
            {
                if( strlen($str0[1]) > 4 ) 
                {
                    return round($num * 100) / 100;
                }
                else if( strlen($str0[1]) > 2 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    return floor($num * 100) / 100;
                }
                else
                {
                    return $num;
                }
            }
            else
            {
                return $num;
            }
        }
        public function SaveGameData()
        {
            $this->user->session = serialize($this->gameData);
            $this->user->save();
        }
        public function CheckBonusWin()
        {
            $allRateCnt = 0;
            $allRate = 0;
<<<<<<< HEAD
            foreach( $this->Paytable as $vl )
            {
                foreach( $vl as $vl2 )
                {
                    if( $vl2 > 0 )
=======
            foreach( $this->Paytable as $vl ) 
            {
                foreach( $vl as $vl2 ) 
                {
                    if( $vl2 > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $allRateCnt++;
                        $allRate += $vl2;
                        break;
                    }
                }
            }
            return $allRate / $allRateCnt;
        }
        public function GetRandomPay()
        {
            $allRate = [];
<<<<<<< HEAD
            foreach( $this->Paytable as $vl )
            {
                foreach( $vl as $vl2 )
                {
                    if( $vl2 > 0 )
=======
            foreach( $this->Paytable as $vl ) 
            {
                foreach( $vl as $vl2 ) 
                {
                    if( $vl2 > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $allRate[] = $vl2;
                    }
                }
            }
            shuffle($allRate);
<<<<<<< HEAD
            if( $this->game->stat_in < ($this->game->stat_out + ($allRate[0] * $this->AllBet)) )
=======
            if( $this->game->stat_in < ($this->game->stat_out + ($allRate[0] * $this->AllBet)) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $allRate[0] = 0;
            }
            return $allRate[0];
        }
        public function HasGameDataStatic($key)
        {
<<<<<<< HEAD
            if( isset($this->gameDataStatic[$key]) )
=======
            if( isset($this->gameDataStatic[$key]) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public function SaveGameDataStatic()
        {
            $this->game->advanced = serialize($this->gameDataStatic);
            $this->game->save();
            $this->game->refresh();
        }
        public function SetGameDataStatic($key, $value)
        {
            $timeLife = 86400;
            $this->gameDataStatic[$key] = [
<<<<<<< HEAD
                'timelife' => time() + $timeLife,
=======
                'timelife' => time() + $timeLife, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                'payload' => $value
            ];
        }
        public function GetGameDataStatic($key)
        {
<<<<<<< HEAD
            if( isset($this->gameDataStatic[$key]) )
=======
            if( isset($this->gameDataStatic[$key]) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                return $this->gameDataStatic[$key]['payload'];
            }
            else
            {
                return 0;
            }
        }
        public function HasGameData($key)
        {
<<<<<<< HEAD
            if( isset($this->gameData[$key]) )
=======
            if( isset($this->gameData[$key]) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public function GetHistory()
        {
            $history = \VanguardLTE\GameLog::whereRaw('game_id=? and user_id=? ORDER BY id DESC LIMIT 10', [
<<<<<<< HEAD
                $this->slotDBId,
                $this->playerId
            ])->get();
            $this->lastEvent = 'NULL';
            foreach( $history as $log )
            {
                $tmpLog = json_decode($log->str);
                if( $tmpLog->responseEvent != 'gambleResult' )
=======
                $this->slotDBId, 
                $this->playerId
            ])->get();
            $this->lastEvent = 'NULL';
            foreach( $history as $log ) 
            {
                $tmpLog = json_decode($log->str);
                if( $tmpLog->responseEvent != 'gambleResult' ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $this->lastEvent = $log->str;
                    break;
                }
            }
<<<<<<< HEAD
            if( isset($tmpLog) )
=======
            if( isset($tmpLog) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                return $tmpLog;
            }
            else
            {
                return 'NULL';
            }
        }
        public function UpdateJackpots($bet)
        {
            $bet = $bet * $this->CurrentDenom;
            $count_balance = $this->count_balance;
            $jsum = [];
            $payJack = 0;
<<<<<<< HEAD
            for( $i = 0; $i < count($this->jpgs); $i++ )
            {
                if( $count_balance == 0 || $this->jpgPercentZero )
                {
                    $jsum[$i] = $this->jpgs[$i]->balance;
                }
                else if( $count_balance < $bet )
=======
            for( $i = 0; $i < count($this->jpgs); $i++ ) 
            {
                if( $count_balance == 0 || $this->jpgPercentZero ) 
                {
                    $jsum[$i] = $this->jpgs[$i]->balance;
                }
                else if( $count_balance < $bet ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $jsum[$i] = $count_balance / 100 * $this->jpgs[$i]->percent + $this->jpgs[$i]->balance;
                }
                else
                {
                    $jsum[$i] = $bet / 100 * $this->jpgs[$i]->percent + $this->jpgs[$i]->balance;
                }
<<<<<<< HEAD
                if( $this->jpgs[$i]->get_pay_sum() < $jsum[$i] && $this->jpgs[$i]->get_pay_sum() > 0 )
=======
                if( $this->jpgs[$i]->get_pay_sum() < $jsum[$i] && $this->jpgs[$i]->get_pay_sum() > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $payJack = $this->jpgs[$i]->get_pay_sum() / $this->CurrentDenom;
                    $jsum[$i] = $jsum[$i] - $this->jpgs[$i]->get_pay_sum();
                    $this->SetBalance($this->jpgs[$i]->get_pay_sum() / $this->CurrentDenom);
<<<<<<< HEAD
                    if( $this->jpgs[$i]->get_pay_sum() > 0 )
                    {
                        \VanguardLTE\StatGame::create([
                            'user_id' => $this->playerId,
                            'balance' => $this->Balance * $this->CurrentDenom,
                            'bet' => 0,
                            'win' => $this->jpgs[$i]->get_pay_sum(),
                            'game' => $this->game->name . ' JPG ' . $this->jpgs[$i]->id,
                            'in_game' => 0,
                            'in_jpg' => 0,
                            'in_profit' => 0,
                            'shop_id' => $this->shop_id,
=======
                    if( $this->jpgs[$i]->get_pay_sum() > 0 ) 
                    {
                        \VanguardLTE\StatGame::create([
                            'user_id' => $this->playerId, 
                            'balance' => $this->Balance * $this->CurrentDenom, 
                            'bet' => 0, 
                            'win' => $this->jpgs[$i]->get_pay_sum(), 
                            'game' => $this->game->name . ' JPG ' . $this->jpgs[$i]->id, 
                            'in_game' => 0, 
                            'in_jpg' => 0, 
                            'in_profit' => 0, 
                            'shop_id' => $this->shop_id, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                            'date_time' => \Carbon\Carbon::now()
                        ]);
                    }
                }
                $this->jpgs[$i]->balance = $jsum[$i];
                $this->jpgs[$i]->save();
<<<<<<< HEAD
                if( $this->jpgs[$i]->balance < $this->jpgs[$i]->get_min('start_balance') )
                {
                    $summ = $this->jpgs[$i]->get_start_balance();
                    if( $summ > 0 )
=======
                if( $this->jpgs[$i]->balance < $this->jpgs[$i]->get_min('start_balance') ) 
                {
                    $summ = $this->jpgs[$i]->get_start_balance();
                    if( $summ > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $this->jpgs[$i]->add_jpg('add', $summ);
                    }
                }
            }
<<<<<<< HEAD
            if( $payJack > 0 )
=======
            if( $payJack > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $payJack = sprintf('%01.2f', $payJack);
                $this->Jackpots['jackPay'] = $payJack;
            }
        }
        public function GetBank($slotState = '')
        {
<<<<<<< HEAD
            if( $this->isBonusStart || $slotState == 'bonus' || $slotState == 'freespin' || $slotState == 'respin' )
=======
            if( $this->isBonusStart || $slotState == 'bonus' || $slotState == 'freespin' || $slotState == 'respin' ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $slotState = 'bonus';
            }
            else
            {
                $slotState = '';
            }
            $game = $this->game;
            $this->Bank = $game->get_gamebank($slotState);
            return $this->Bank / $this->CurrentDenom;
        }
        public function GetPercent()
        {
            return $this->Percent;
        }
        public function GetCountBalanceUser()
        {
            return $this->user->count_balance;
        }
        public function InternalErrorSilent($errcode)
        {
            $strLog = '';
            $strLog .= "\n";
            $strLog .= ('{"responseEvent":"error","responseType":"' . $errcode . '","serverResponse":"InternalError"}');
            $strLog .= "\n";
            $strLog .= ' ############################################### ';
            $strLog .= "\n";
            $slg = '';
<<<<<<< HEAD
            if( file_exists(storage_path('logs/') . $this->slotId . 'Internal.log') )
=======
            if( file_exists(storage_path('logs/') . $this->slotId . 'Internal.log') ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $slg = file_get_contents(storage_path('logs/') . $this->slotId . 'Internal.log');
            }
            file_put_contents(storage_path('logs/') . $this->slotId . 'Internal.log', $slg . $strLog);
        }
        public function InternalError($errcode)
        {
            $strLog = '';
            $strLog .= "\n";
            $strLog .= ('{"responseEvent":"error","responseType":"' . $errcode . '","serverResponse":"InternalError"}');
            $strLog .= "\n";
            $strLog .= ' ############################################### ';
            $strLog .= "\n";
            $slg = '';
<<<<<<< HEAD
            if( file_exists(storage_path('logs/') . $this->slotId . 'Internal.log') )
=======
            if( file_exists(storage_path('logs/') . $this->slotId . 'Internal.log') ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $slg = file_get_contents(storage_path('logs/') . $this->slotId . 'Internal.log');
            }
            file_put_contents(storage_path('logs/') . $this->slotId . 'Internal.log', $slg . $strLog);
            exit( '' );
        }
        public function SetBank($slotState = '', $sum, $slotEvent = '')
        {
<<<<<<< HEAD
            if( $this->isBonusStart || $slotState == 'bonus' || $slotState == 'freespin' || $slotState == 'respin' )
=======
            if( $this->isBonusStart || $slotState == 'bonus' || $slotState == 'freespin' || $slotState == 'respin' ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $slotState = 'bonus';
            }
            else
            {
                $slotState = '';
            }
<<<<<<< HEAD
            if( $this->GetBank($slotState) + $sum < 0 )
=======
            if( $this->GetBank($slotState) + $sum < 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->InternalError('Bank_   ' . $sum . '  CurrentBank_ ' . $this->GetBank($slotState) . ' CurrentState_ ' . $slotState . ' Trigger_ ' . ($this->GetBank($slotState) + $sum));
            }
            $sum = $sum * $this->CurrentDenom;
            $game = $this->game;
            $bankBonusSum = 0;
<<<<<<< HEAD
            if( $sum > 0 && $slotEvent == 'bet' )
=======
            if( $sum > 0 && $slotEvent == 'bet' ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->toGameBanks = 0;
                $this->toSlotJackBanks = 0;
                $this->toSysJackBanks = 0;
                $this->betProfit = 0;
                $prc = $this->GetPercent();
                $prc_b = 10;
<<<<<<< HEAD
                if( $prc <= $prc_b )
=======
                if( $prc <= $prc_b ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $prc_b = 0;
                }
                $count_balance = $this->count_balance;
                $gameBet = $sum / $this->GetPercent() * 100;
<<<<<<< HEAD
                if( $count_balance < $gameBet && $count_balance > 0 )
                {
                    $firstBid = $count_balance;
                    $secondBid = $gameBet - $firstBid;
                    if( isset($this->betRemains0) )
=======
                if( $count_balance < $gameBet && $count_balance > 0 ) 
                {
                    $firstBid = $count_balance;
                    $secondBid = $gameBet - $firstBid;
                    if( isset($this->betRemains0) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $secondBid = $this->betRemains0;
                    }
                    $bankSum = $firstBid / 100 * $this->GetPercent();
                    $sum = $bankSum + $secondBid;
                    $bankBonusSum = $firstBid / 100 * $prc_b;
                }
<<<<<<< HEAD
                else if( $count_balance > 0 )
                {
                    $bankBonusSum = $gameBet / 100 * $prc_b;
                }
                for( $i = 0; $i < count($this->jpgs); $i++ )
                {
                    if( !$this->jpgPercentZero )
                    {
                        if( $count_balance < $gameBet && $count_balance > 0 )
                        {
                            $this->toSlotJackBanks += ($count_balance / 100 * $this->jpgs[$i]->percent);
                        }
                        else if( $count_balance > 0 )
=======
                else if( $count_balance > 0 ) 
                {
                    $bankBonusSum = $gameBet / 100 * $prc_b;
                }
                for( $i = 0; $i < count($this->jpgs); $i++ ) 
                {
                    if( !$this->jpgPercentZero ) 
                    {
                        if( $count_balance < $gameBet && $count_balance > 0 ) 
                        {
                            $this->toSlotJackBanks += ($count_balance / 100 * $this->jpgs[$i]->percent);
                        }
                        else if( $count_balance > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                        {
                            $this->toSlotJackBanks += ($gameBet / 100 * $this->jpgs[$i]->percent);
                        }
                    }
                }
                $this->toGameBanks = $sum;
                $this->betProfit = $gameBet - $this->toGameBanks - $this->toSlotJackBanks - $this->toSysJackBanks;
            }
<<<<<<< HEAD
            if( $sum > 0 )
            {
                $this->toGameBanks = $sum;
            }
            if( $bankBonusSum > 0 )
=======
            if( $sum > 0 ) 
            {
                $this->toGameBanks = $sum;
            }
            if( $bankBonusSum > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $sum -= $bankBonusSum;
                $game->set_gamebank($bankBonusSum, 'inc', 'bonus');
            }
<<<<<<< HEAD
            if( $sum == 0 && $slotEvent == 'bet' && isset($this->betRemains) )
=======
            if( $sum == 0 && $slotEvent == 'bet' && isset($this->betRemains) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $sum = $this->betRemains;
            }
            $game->set_gamebank($sum, 'inc', $slotState);
            $game->save();
            return $game;
        }
        public function SetBalance($sum, $slotEvent = '')
        {
<<<<<<< HEAD
            if( $this->GetBalance() + $sum < 0 )
=======
            if( $this->GetBalance() + $sum < 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->InternalError('Balance_   ' . $sum);
            }
            $sum = $sum * $this->CurrentDenom;
<<<<<<< HEAD
            if( $sum < 0 && $slotEvent == 'bet' )
            {
                $user = $this->user;
                if( $user->count_balance == 0 )
=======
            if( $sum < 0 && $slotEvent == 'bet' ) 
            {
                $user = $this->user;
                if( $user->count_balance == 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $remains = [];
                    $this->betRemains = 0;
                    $sm = abs($sum);
<<<<<<< HEAD
                    if( $user->address < $sm && $user->address > 0 )
                    {
                        $remains[] = $sm - $user->address;
                    }
                    for( $i = 0; $i < count($remains); $i++ )
                    {
                        if( $this->betRemains < $remains[$i] )
=======
                    if( $user->address < $sm && $user->address > 0 ) 
                    {
                        $remains[] = $sm - $user->address;
                    }
                    for( $i = 0; $i < count($remains); $i++ ) 
                    {
                        if( $this->betRemains < $remains[$i] ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                        {
                            $this->betRemains = $remains[$i];
                        }
                    }
                }
<<<<<<< HEAD
                if( $user->count_balance > 0 && $user->count_balance < abs($sum) )
=======
                if( $user->count_balance > 0 && $user->count_balance < abs($sum) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $remains0 = [];
                    $sm = abs($sum);
                    $tmpSum = $sm - $user->count_balance;
                    $this->betRemains0 = $tmpSum;
<<<<<<< HEAD
                    if( $user->address > 0 )
                    {
                        $this->betRemains0 = 0;
                        if( $user->address < $tmpSum && $user->address > 0 )
                        {
                            $remains0[] = $tmpSum - $user->address;
                        }
                        for( $i = 0; $i < count($remains0); $i++ )
                        {
                            if( $this->betRemains0 < $remains0[$i] )
=======
                    if( $user->address > 0 ) 
                    {
                        $this->betRemains0 = 0;
                        if( $user->address < $tmpSum && $user->address > 0 ) 
                        {
                            $remains0[] = $tmpSum - $user->address;
                        }
                        for( $i = 0; $i < count($remains0); $i++ ) 
                        {
                            if( $this->betRemains0 < $remains0[$i] ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                            {
                                $this->betRemains0 = $remains0[$i];
                            }
                        }
                    }
                }
                $sum0 = abs($sum);
<<<<<<< HEAD
                if( $user->count_balance == 0 )
                {
                    $sm = abs($sum);
                    if( $user->address < $sm && $user->address > 0 )
                    {
                        $user->address = 0;
                    }
                    else if( $user->address > 0 )
=======
                if( $user->count_balance == 0 ) 
                {
                    $sm = abs($sum);
                    if( $user->address < $sm && $user->address > 0 ) 
                    {
                        $user->address = 0;
                    }
                    else if( $user->address > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $user->address -= $sm;
                    }
                }
<<<<<<< HEAD
                else if( $user->count_balance > 0 && $user->count_balance < $sum0 )
                {
                    $sm = $sum0 - $user->count_balance;
                    if( $user->address < $sm && $user->address > 0 )
                    {
                        $user->address = 0;
                    }
                    else if( $user->address > 0 )
=======
                else if( $user->count_balance > 0 && $user->count_balance < $sum0 ) 
                {
                    $sm = $sum0 - $user->count_balance;
                    if( $user->address < $sm && $user->address > 0 ) 
                    {
                        $user->address = 0;
                    }
                    else if( $user->address > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $user->address -= $sm;
                    }
                }
                $this->user->count_balance = $this->user->updateCountBalance($sum, $this->count_balance);
                $this->user->count_balance = $this->FormatFloat($this->user->count_balance);
            }
            $this->user->increment('balance', $sum);
            $this->user->balance = $this->FormatFloat($this->user->balance);
            $this->user->save();
            return $this->user;
        }
        public function GetBalance()
        {
            $user = $this->user;
            $this->Balance = $user->balance / $this->CurrentDenom;
            return $this->Balance;
        }
        public function SaveLogReport($spinSymbols, $bet, $lines, $win, $slotState)
        {
            $reportName = $this->slotId . ' ' . $slotState;
<<<<<<< HEAD
            if( $slotState == 'freespin' )
            {
                $reportName = $this->slotId . ' FG';
            }
            else if( $slotState == 'bet' )
            {
                $reportName = $this->slotId . '';
            }
            else if( $slotState == 'slotGamble' )
=======
            if( $slotState == 'freespin' ) 
            {
                $reportName = $this->slotId . ' FG';
            }
            else if( $slotState == 'bet' ) 
            {
                $reportName = $this->slotId . '';
            }
            else if( $slotState == 'slotGamble' ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $reportName = $this->slotId . ' DG';
            }
            $game = $this->game;
<<<<<<< HEAD
            if( $slotState == 'bet' )
            {
                $this->user->update_level('bet', $bet * $lines * $this->CurrentDenom);
            }
            if( $slotState != 'freespin' )
=======
            if( $slotState == 'bet' ) 
            {
                $this->user->update_level('bet', $bet * $lines * $this->CurrentDenom);
            }
            if( $slotState != 'freespin' ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $game->increment('stat_in', $bet * $lines * $this->CurrentDenom);
            }
            $game->increment('stat_out', $win * $this->CurrentDenom);
            $game->tournament_stat($slotState, $this->user->id, $bet * $lines * $this->CurrentDenom, $win * $this->CurrentDenom);
<<<<<<< HEAD
            if( !isset($this->betProfit) )
=======
            if( !isset($this->betProfit) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->betProfit = 0;
                $this->toGameBanks = 0;
                $this->toSlotJackBanks = 0;
                $this->toSysJackBanks = 0;
            }
<<<<<<< HEAD
            if( !isset($this->toGameBanks) )
=======
            if( !isset($this->toGameBanks) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->toGameBanks = 0;
            }
            $this->game->increment('bids');
            $this->game->refresh();
            $gamebank = \VanguardLTE\GameBank::where(['shop_id' => $game->shop_id])->first();
<<<<<<< HEAD
            if( $gamebank )
=======
            if( $gamebank ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                list($slotsBank, $bonusBank, $fishBank, $tableBank, $littleBank) = \VanguardLTE\Lib\Banker::get_all_banks($game->shop_id);
            }
            else
            {
                $slotsBank = $game->get_gamebank('', 'slots');
                $bonusBank = $game->get_gamebank('bonus', 'bonus');
                $fishBank = $game->get_gamebank('', 'fish');
                $tableBank = $game->get_gamebank('', 'table_bank');
                $littleBank = $game->get_gamebank('', 'little');
            }
            $totalBank = $slotsBank + $bonusBank + $fishBank + $tableBank + $littleBank;
            \VanguardLTE\GameLog::create([
<<<<<<< HEAD
                'game_id' => $this->slotDBId,
                'user_id' => $this->playerId,
                'ip' => $_SERVER['REMOTE_ADDR'],
                'str' => $spinSymbols,
                'shop_id' => $this->shop_id
            ]);
            \VanguardLTE\StatGame::create([
                'user_id' => $this->playerId,
                'balance' => $this->Balance * $this->CurrentDenom,
                'bet' => $bet * $lines * $this->CurrentDenom,
                'win' => $win * $this->CurrentDenom,
                'game' => $reportName,
                'in_game' => $this->toGameBanks,
                'in_jpg' => $this->toSlotJackBanks,
                'in_profit' => $this->betProfit,
                'denomination' => $this->CurrentDenom,
                'shop_id' => $this->shop_id,
                'slots_bank' => (double)$slotsBank,
                'bonus_bank' => (double)$bonusBank,
                'fish_bank' => (double)$fishBank,
                'table_bank' => (double)$tableBank,
                'little_bank' => (double)$littleBank,
                'total_bank' => (double)$totalBank,
=======
                'game_id' => $this->slotDBId, 
                'user_id' => $this->playerId, 
                'ip' => $_SERVER['REMOTE_ADDR'], 
                'str' => $spinSymbols, 
                'shop_id' => $this->shop_id
            ]);
            \VanguardLTE\StatGame::create([
                'user_id' => $this->playerId, 
                'balance' => $this->Balance * $this->CurrentDenom, 
                'bet' => $bet * $lines * $this->CurrentDenom, 
                'win' => $win * $this->CurrentDenom, 
                'game' => $reportName, 
                'in_game' => $this->toGameBanks, 
                'in_jpg' => $this->toSlotJackBanks, 
                'in_profit' => $this->betProfit, 
                'denomination' => $this->CurrentDenom, 
                'shop_id' => $this->shop_id, 
                'slots_bank' => (double)$slotsBank, 
                'bonus_bank' => (double)$bonusBank, 
                'fish_bank' => (double)$fishBank, 
                'table_bank' => (double)$tableBank, 
                'little_bank' => (double)$littleBank, 
                'total_bank' => (double)$totalBank, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                'date_time' => \Carbon\Carbon::now()
            ]);
        }
        public function GetSpinSettings($garantType = 'bet', $bet, $lines)
        {
            $curField = 10;
<<<<<<< HEAD
            switch( $lines )
=======
            switch( $lines ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                case 10:
                    $curField = 10;
                    break;
                case 9:
                case 8:
                    $curField = 9;
                    break;
                case 7:
                case 6:
                    $curField = 7;
                    break;
                case 5:
                case 4:
                    $curField = 5;
                    break;
                case 3:
                case 2:
                    $curField = 3;
                    break;
                case 1:
                    $curField = 1;
                    break;
                default:
                    $curField = 10;
                    break;
            }
<<<<<<< HEAD
            if( $garantType != 'bet' )
=======
            if( $garantType != 'bet' ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $pref = '_bonus';
            }
            else
            {
                $pref = '';
            }
            $this->AllBet = $bet * $lines;
            $linesPercentConfigSpin = $this->game->get_lines_percent_config('spin');
            $linesPercentConfigBonus = $this->game->get_lines_percent_config('bonus');
            $currentPercent = $this->shop->percent;
            $currentSpinWinChance = 0;
            $currentBonusWinChance = 0;
            $percentLevel = '';
<<<<<<< HEAD
            foreach( $linesPercentConfigSpin['line' . $curField . $pref] as $k => $v )
=======
            foreach( $linesPercentConfigSpin['line' . $curField . $pref] as $k => $v ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $l = explode('_', $k);
                $l0 = $l[0];
                $l1 = $l[1];
<<<<<<< HEAD
                if( $l0 <= $currentPercent && $currentPercent <= $l1 )
=======
                if( $l0 <= $currentPercent && $currentPercent <= $l1 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $percentLevel = $k;
                    break;
                }
            }
            $currentSpinWinChance = $linesPercentConfigSpin['line' . $curField . $pref][$percentLevel];
            $currentBonusWinChance = $linesPercentConfigBonus['line' . $curField . $pref][$percentLevel];
            $RtpControlCount = 200;
<<<<<<< HEAD
            if( !$this->HasGameDataStatic('SpinWinLimit') )
            {
                $this->SetGameDataStatic('SpinWinLimit', 0);
            }
            if( !$this->HasGameDataStatic('RtpControlCount') )
            {
                $this->SetGameDataStatic('RtpControlCount', $RtpControlCount);
            }
            if( $this->game->stat_in > 0 )
=======
            if( !$this->HasGameDataStatic('SpinWinLimit') ) 
            {
                $this->SetGameDataStatic('SpinWinLimit', 0);
            }
            if( !$this->HasGameDataStatic('RtpControlCount') ) 
            {
                $this->SetGameDataStatic('RtpControlCount', $RtpControlCount);
            }
            if( $this->game->stat_in > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $rtpRange = $this->game->stat_out / $this->game->stat_in * 100;
            }
            else
            {
                $rtpRange = 0;
            }
<<<<<<< HEAD
            if( $this->GetGameDataStatic('RtpControlCount') == 0 )
            {
                if( $currentPercent + rand(1, 2) < $rtpRange && $this->GetGameDataStatic('SpinWinLimit') <= 0 )
                {
                    $this->SetGameDataStatic('SpinWinLimit', rand(25, 50));
                }
                if( $pref == '' && $this->GetGameDataStatic('SpinWinLimit') > 0 )
=======
            if( $this->GetGameDataStatic('RtpControlCount') == 0 ) 
            {
                if( $currentPercent + rand(1, 2) < $rtpRange && $this->GetGameDataStatic('SpinWinLimit') <= 0 ) 
                {
                    $this->SetGameDataStatic('SpinWinLimit', rand(25, 50));
                }
                if( $pref == '' && $this->GetGameDataStatic('SpinWinLimit') > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $currentBonusWinChance = 5000;
                    $currentSpinWinChance = 20;
                    $this->MaxWin = rand(1, 5);
<<<<<<< HEAD
                    if( $rtpRange < ($currentPercent - 1) )
=======
                    if( $rtpRange < ($currentPercent - 1) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $this->SetGameDataStatic('SpinWinLimit', 0);
                        $this->SetGameDataStatic('RtpControlCount', $this->GetGameDataStatic('RtpControlCount') - 1);
                    }
                }
            }
<<<<<<< HEAD
            else if( $this->GetGameDataStatic('RtpControlCount') < 0 )
            {
                if( $currentPercent + rand(1, 2) < $rtpRange && $this->GetGameDataStatic('SpinWinLimit') <= 0 )
=======
            else if( $this->GetGameDataStatic('RtpControlCount') < 0 ) 
            {
                if( $currentPercent + rand(1, 2) < $rtpRange && $this->GetGameDataStatic('SpinWinLimit') <= 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $this->SetGameDataStatic('SpinWinLimit', rand(25, 50));
                }
                $this->SetGameDataStatic('RtpControlCount', $this->GetGameDataStatic('RtpControlCount') - 1);
<<<<<<< HEAD
                if( $pref == '' && $this->GetGameDataStatic('SpinWinLimit') > 0 )
=======
                if( $pref == '' && $this->GetGameDataStatic('SpinWinLimit') > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $currentBonusWinChance = 5000;
                    $currentSpinWinChance = 10;
                    $this->MaxWin = rand(1, 5);
<<<<<<< HEAD
                    if( $rtpRange < ($currentPercent - 1) )
=======
                    if( $rtpRange < ($currentPercent - 1) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $this->SetGameDataStatic('SpinWinLimit', 0);
                    }
                }
<<<<<<< HEAD
                if( $this->GetGameDataStatic('RtpControlCount') < (-1 * $RtpControlCount) && $currentPercent - 1 <= $rtpRange && $rtpRange <= ($currentPercent + 2) )
=======
                if( $this->GetGameDataStatic('RtpControlCount') < (-1 * $RtpControlCount) && $currentPercent - 1 <= $rtpRange && $rtpRange <= ($currentPercent + 2) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $this->SetGameDataStatic('RtpControlCount', $RtpControlCount);
                }
            }
            else
            {
                $this->SetGameDataStatic('RtpControlCount', $this->GetGameDataStatic('RtpControlCount') - 1);
            }
            $bonusWin = rand(1, $currentBonusWinChance);
            $spinWin = rand(1, $currentSpinWinChance);
            $return = [
<<<<<<< HEAD
                'none',
                0
            ];
            if( $bonusWin == 1 && $this->slotBonus )
=======
                'none', 
                0
            ];
            if( $bonusWin == 1 && $this->slotBonus ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->isBonusStart = true;
                $garantType = 'bonus';
                $winLimit = $this->GetBank($garantType);
                $return = [
<<<<<<< HEAD
                    'bonus',
                    $winLimit
                ];
                if( $this->game->stat_in < ($this->CheckBonusWin() * $bet + $this->game->stat_out) || $winLimit < ($this->CheckBonusWin() * $bet) )
                {
                    $return = [
                        'none',
=======
                    'bonus', 
                    $winLimit
                ];
                if( $this->game->stat_in < ($this->CheckBonusWin() * $bet + $this->game->stat_out) || $winLimit < ($this->CheckBonusWin() * $bet) ) 
                {
                    $return = [
                        'none', 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                        0
                    ];
                }
            }
<<<<<<< HEAD
            else if( $spinWin == 1 )
            {
                $winLimit = $this->GetBank($garantType);
                $return = [
                    'win',
                    $winLimit
                ];
            }
            if( $garantType == 'bet' && $this->GetBalance() <= (2 / $this->CurrentDenom) )
            {
                $randomPush = rand(1, 10);
                if( $randomPush == 1 )
                {
                    $winLimit = $this->GetBank('');
                    $return = [
                        'win',
=======
            else if( $spinWin == 1 ) 
            {
                $winLimit = $this->GetBank($garantType);
                $return = [
                    'win', 
                    $winLimit
                ];
            }
            if( $garantType == 'bet' && $this->GetBalance() <= (2 / $this->CurrentDenom) ) 
            {
                $randomPush = rand(1, 10);
                if( $randomPush == 1 ) 
                {
                    $winLimit = $this->GetBank('');
                    $return = [
                        'win', 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                        $winLimit
                    ];
                }
            }
            return $return;
        }
        public function GetRandomScatterPos($rp)
        {
            $rpResult = [];
<<<<<<< HEAD
            for( $i = 0; $i < count($rp); $i++ )
            {
                if( $rp[$i] == 'SCAT' )
                {
                    if( $this->slotReelsConfig[0][2] == 4 )
                    {
                        if( isset($rp[$i + 1]) && isset($rp[$i + 2]) && isset($rp[$i + 3]) )
                        {
                            array_push($rpResult, $i);
                        }
                        if( isset($rp[$i - 1]) && isset($rp[$i + 1]) && isset($rp[$i + 2]) )
                        {
                            array_push($rpResult, $i - 1);
                        }
                        if( isset($rp[$i - 2]) && isset($rp[$i - 1]) && isset($rp[$i + 1]) )
                        {
                            array_push($rpResult, $i - 2);
                        }
                        if( isset($rp[$i - 3]) && isset($rp[$i - 2]) && isset($rp[$i - 1]) )
=======
            for( $i = 0; $i < count($rp); $i++ ) 
            {
                if( $rp[$i] == 'SCAT' ) 
                {
                    if( $this->slotReelsConfig[0][2] == 4 ) 
                    {
                        if( isset($rp[$i + 1]) && isset($rp[$i + 2]) && isset($rp[$i + 3]) ) 
                        {
                            array_push($rpResult, $i);
                        }
                        if( isset($rp[$i - 1]) && isset($rp[$i + 1]) && isset($rp[$i + 2]) ) 
                        {
                            array_push($rpResult, $i - 1);
                        }
                        if( isset($rp[$i - 2]) && isset($rp[$i - 1]) && isset($rp[$i + 1]) ) 
                        {
                            array_push($rpResult, $i - 2);
                        }
                        if( isset($rp[$i - 3]) && isset($rp[$i - 2]) && isset($rp[$i - 1]) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                        {
                            array_push($rpResult, $i - 3);
                        }
                    }
                    else
                    {
<<<<<<< HEAD
                        if( isset($rp[$i + 1]) && isset($rp[$i + 2]) )
                        {
                            array_push($rpResult, $i);
                        }
                        if( isset($rp[$i - 1]) && isset($rp[$i + 1]) )
                        {
                            array_push($rpResult, $i - 1);
                        }
                        if( isset($rp[$i - 2]) && isset($rp[$i - 1]) )
=======
                        if( isset($rp[$i + 1]) && isset($rp[$i + 2]) ) 
                        {
                            array_push($rpResult, $i);
                        }
                        if( isset($rp[$i - 1]) && isset($rp[$i + 1]) ) 
                        {
                            array_push($rpResult, $i - 1);
                        }
                        if( isset($rp[$i - 2]) && isset($rp[$i - 1]) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                        {
                            array_push($rpResult, $i - 2);
                        }
                    }
                }
            }
            shuffle($rpResult);
<<<<<<< HEAD
            if( !isset($rpResult[0]) )
=======
            if( !isset($rpResult[0]) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $rpResult[0] = rand(2, count($rp) - 3);
            }
            return $rpResult[0];
        }
        public function GetGambleSettings()
        {
            $spinWin = rand(1, $this->WinGamble);
            return $spinWin;
        }
        public function GetReelStrips($winType)
        {
<<<<<<< HEAD
            if( $winType != 'bonus' )
            {
                $prs = [];
                foreach( [
                    'reelStrip1',
                    'reelStrip2',
                    'reelStrip3',
                    'reelStrip4',
                    'reelStrip5',
                    'reelStrip6'
                ] as $index => $reelStrip )
                {
                    if( is_array($this->$reelStrip) && count($this->$reelStrip) > 0 )
=======
            if( $winType != 'bonus' ) 
            {
                $prs = [];
                foreach( [
                    'reelStrip1', 
                    'reelStrip2', 
                    'reelStrip3', 
                    'reelStrip4', 
                    'reelStrip5', 
                    'reelStrip6'
                ] as $index => $reelStrip ) 
                {
                    if( is_array($this->$reelStrip) && count($this->$reelStrip) > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $prs[$index + 1] = mt_rand(0, count($this->$reelStrip) - 3);
                    }
                }
            }
            else
            {
                $reelsId = [];
                foreach( [
<<<<<<< HEAD
                    'reelStrip1',
                    'reelStrip2',
                    'reelStrip3',
                    'reelStrip4',
                    'reelStrip5',
                    'reelStrip6'
                ] as $index => $reelStrip )
                {
                    if( is_array($this->$reelStrip) && count($this->$reelStrip) > 0 )
=======
                    'reelStrip1', 
                    'reelStrip2', 
                    'reelStrip3', 
                    'reelStrip4', 
                    'reelStrip5', 
                    'reelStrip6'
                ] as $index => $reelStrip ) 
                {
                    if( is_array($this->$reelStrip) && count($this->$reelStrip) > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $prs[$index + 1] = $this->GetRandomScatterPos($this->$reelStrip);
                        $reelsId[] = $index + 1;
                    }
                }
                $scattersCnt = rand(3, count($reelsId));
                shuffle($reelsId);
<<<<<<< HEAD
                for( $i = 0; $i < count($reelsId); $i++ )
                {
                    if( $i < $scattersCnt )
=======
                for( $i = 0; $i < count($reelsId); $i++ ) 
                {
                    if( $i < $scattersCnt ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $prs[$reelsId[$i]] = $this->GetRandomScatterPos($this->{'reelStrip' . $reelsId[$i]});
                    }
                    else
                    {
                        $prs[$reelsId[$i]] = rand(0, count($this->{'reelStrip' . $reelsId[$i]}) - 3);
                    }
                }
            }
            $reel = [
                'rp' => []
            ];
<<<<<<< HEAD
            foreach( $prs as $index => $value )
=======
            foreach( $prs as $index => $value ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $key = $this->{'reelStrip' . $index};
                $reel['reel' . $index][0] = $key[$value];
                $reel['reel' . $index][1] = $key[$value + 1];
                $reel['reel' . $index][2] = $key[$value + 2];
                $reel['reel' . $index][3] = '';
                $reel['rp'][] = $value;
            }
            return $reel;
        }
    }

}
