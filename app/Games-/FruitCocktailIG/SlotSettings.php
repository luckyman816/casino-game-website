<<<<<<< HEAD
<?php
=======
<?php 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
namespace VanguardLTE\Games\FruitCocktailIG
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
        public $lastEvent = null;
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
        public $fuseBet = null;
        public $cardsID = null;
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
            $this->cardsID['2D'] = 66;
            $this->cardsID['3D'] = 67;
            $this->cardsID['4D'] = 68;
            $this->cardsID['5D'] = 69;
            $this->cardsID['6D'] = 70;
            $this->cardsID['7D'] = 71;
            $this->cardsID['8D'] = 72;
            $this->cardsID['9D'] = 73;
            $this->cardsID['TD'] = 74;
            $this->cardsID['JD'] = 75;
            $this->cardsID['QD'] = 76;
            $this->cardsID['KD'] = 77;
            $this->cardsID['AD'] = 78;
            $this->cardsID['2C'] = 34;
            $this->cardsID['3C'] = 35;
            $this->cardsID['4C'] = 36;
            $this->cardsID['5C'] = 37;
            $this->cardsID['6C'] = 38;
            $this->cardsID['7C'] = 39;
            $this->cardsID['8C'] = 40;
            $this->cardsID['9C'] = 41;
            $this->cardsID['TC'] = 42;
            $this->cardsID['JC'] = 43;
            $this->cardsID['QC'] = 44;
            $this->cardsID['KC'] = 45;
            $this->cardsID['AC'] = 46;
            $this->cardsID['2S'] = 18;
            $this->cardsID['3S'] = 19;
            $this->cardsID['4S'] = 20;
            $this->cardsID['5S'] = 21;
            $this->cardsID['6S'] = 22;
            $this->cardsID['7S'] = 23;
            $this->cardsID['8S'] = 24;
            $this->cardsID['9S'] = 25;
            $this->cardsID['TS'] = 26;
            $this->cardsID['JS'] = 27;
            $this->cardsID['QS'] = 28;
            $this->cardsID['KS'] = 29;
            $this->cardsID['AS'] = 30;
            $this->cardsID['2H'] = 130;
            $this->cardsID['3H'] = 131;
            $this->cardsID['4H'] = 132;
            $this->cardsID['5H'] = 133;
            $this->cardsID['6H'] = 134;
            $this->cardsID['7H'] = 135;
            $this->cardsID['8H'] = 136;
            $this->cardsID['9H'] = 137;
            $this->cardsID['TH'] = 138;
            $this->cardsID['JH'] = 139;
            $this->cardsID['QH'] = 140;
            $this->cardsID['KH'] = 141;
            $this->cardsID['AH'] = 142;
            $this->cardsID['JOKERD'] = 511;
            $this->cardsID['JOKERC'] = 511;
            $this->cardsID['JOKERH'] = 511;
            $this->cardsID['JOKERS'] = 511;
            $this->Paytable[0] = [
<<<<<<< HEAD
                0,
                0,
                0,
                0,
                0,
                0
            ];
            $this->Paytable[1] = [
                0,
                0,
                0,
                200,
                1000,
                5000
            ];
            $this->Paytable[2] = [
                0,
                0,
                0,
                100,
                500,
                2000
            ];
            $this->Paytable[3] = [
                0,
                0,
                0,
                30,
                100,
                500
            ];
            $this->Paytable[4] = [
                0,
                0,
                0,
                20,
                50,
                200
            ];
            $this->Paytable[5] = [
                0,
                0,
                0,
                10,
                30,
                100
            ];
            $this->Paytable[6] = [
                0,
                0,
                0,
                5,
                10,
                50
            ];
            $this->Paytable[7] = [
                0,
                0,
                0,
                3,
                5,
                20
            ];
            $this->Paytable[8] = [
                0,
                0,
                0,
                2,
                3,
=======
                0, 
                0, 
                0, 
                0, 
                0, 
                0
            ];
            $this->Paytable[1] = [
                0, 
                0, 
                0, 
                200, 
                1000, 
                5000
            ];
            $this->Paytable[2] = [
                0, 
                0, 
                0, 
                100, 
                500, 
                2000
            ];
            $this->Paytable[3] = [
                0, 
                0, 
                0, 
                30, 
                100, 
                500
            ];
            $this->Paytable[4] = [
                0, 
                0, 
                0, 
                20, 
                50, 
                200
            ];
            $this->Paytable[5] = [
                0, 
                0, 
                0, 
                10, 
                30, 
                100
            ];
            $this->Paytable[6] = [
                0, 
                0, 
                0, 
                5, 
                10, 
                50
            ];
            $this->Paytable[7] = [
                0, 
                0, 
                0, 
                3, 
                5, 
                20
            ];
            $this->Paytable[8] = [
                0, 
                0, 
                0, 
                2, 
                3, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                10
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
            $this->slotViewState = ($game->slotViewState == '' ? 'Normal' : $game->slotViewState);
<<<<<<< HEAD
            if( isset($game->slotKeyConfig) )
=======
            if( isset($game->slotKeyConfig) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->slotKeyConfig = $game->slotKeyConfig;
            }
            else
            {
                $this->slotKeyConfig = '{"h_Exit":[83],"h_Start":[32,67],"h_Line1":[49],"h_Line3":[50],"h_Line5":[51],"h_Line7":[52],"h_Line9":[53],"h_AutoPlay":[90],"h_FullScreen":[54],"h_Help":[73],"h_MaxBet":[77],"h_Bet":[66],"h_Sound":[57]}';
            }
            $this->keyController = [
<<<<<<< HEAD
                '13' => 'uiButtonSpin,uiButtonSkip',
                '49' => 'uiButtonInfo',
                '50' => 'uiButtonCollect',
                '51' => 'uiButtonExit2',
                '52' => 'uiButtonLinesMinus',
                '53' => 'uiButtonLinesPlus',
                '54' => 'uiButtonBetMinus',
                '55' => 'uiButtonBetPlus',
                '56' => 'uiButtonGamble',
                '57' => 'uiButtonRed',
                '48' => 'uiButtonBlack',
                '189' => 'uiButtonAuto',
=======
                '13' => 'uiButtonSpin,uiButtonSkip', 
                '49' => 'uiButtonInfo', 
                '50' => 'uiButtonCollect', 
                '51' => 'uiButtonExit2', 
                '52' => 'uiButtonLinesMinus', 
                '53' => 'uiButtonLinesPlus', 
                '54' => 'uiButtonBetMinus', 
                '55' => 'uiButtonBetPlus', 
                '56' => 'uiButtonGamble', 
                '57' => 'uiButtonRed', 
                '48' => 'uiButtonBlack', 
                '189' => 'uiButtonAuto', 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                '187' => 'uiButtonSpin'
            ];
            $this->slotReelsConfig = [
                [
<<<<<<< HEAD
                    425,
                    142,
                    3
                ],
                [
                    669,
                    142,
                    3
                ],
                [
                    913,
                    142,
                    3
                ],
                [
                    1157,
                    142,
                    3
                ],
                [
                    1401,
                    142,
=======
                    425, 
                    142, 
                    3
                ], 
                [
                    669, 
                    142, 
                    3
                ], 
                [
                    913, 
                    142, 
                    3
                ], 
                [
                    1157, 
                    142, 
                    3
                ], 
                [
                    1401, 
                    142, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    3
                ]
            ];
            $this->slotBonusType = 1;
            $this->slotScatterType = 0;
            $this->splitScreen = false;
            $this->slotBonus = true;
            $this->slotGamble = true;
            $this->slotFastStop = 1;
            $this->slotExitUrl = '/';
            $this->slotWildMpl = 1;
            $this->GambleType = 1;
            $this->slotFreeCount = 15;
            $this->slotFreeMpl = 1;
            $this->slotViewState = ($game->slotViewState == '' ? 'Normal' : $game->slotViewState);
            $this->hideButtons = [];
            $this->jpgs = \VanguardLTE\JPG::where('shop_id', $this->shop_id)->lockForUpdate()->get();
            $this->Line = [
<<<<<<< HEAD
                1,
                2,
                3,
                4,
                5,
                6,
                7,
                8,
                9,
                10
            ];
            $this->gameLine = [
                1,
                2,
                3,
                4,
                5,
                6,
                7,
                8,
                9
            ];
            $this->Bet = [
                1,
                2,
                3,
                4,
                5,
                6,
                7,
                8,
                9,
                10,
                15,
                20,
                25,
                30,
                35,
                40,
                45,
                50,
                60,
                70,
                80,
=======
                1, 
                2, 
                3, 
                4, 
                5, 
                6, 
                7, 
                8, 
                9, 
                10
            ];
            $this->gameLine = [
                1, 
                2, 
                3, 
                4, 
                5, 
                6, 
                7, 
                8, 
                9
            ];
            $this->Bet = [
                1, 
                2, 
                3, 
                4, 
                5, 
                6, 
                7, 
                8, 
                9, 
                10, 
                15, 
                20, 
                25, 
                30, 
                35, 
                40, 
                45, 
                50, 
                60, 
                70, 
                80, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                90
            ];
            $this->Balance = $user->balance;
            $this->SymbolGame = [
<<<<<<< HEAD
                '0',
                '1',
                2,
                3,
                4,
                5,
                6,
                7,
=======
                '0', 
                '1', 
                2, 
                3, 
                4, 
                5, 
                6, 
                7, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                8
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
=======
            else if( $user->count_balance == 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->Percent = 100;
            }
            $this->fuseBet = 999999999;
<<<<<<< HEAD
            if( !isset($this->user->session) || strlen($this->user->session) <= 0 )
=======
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
        public function is_active()
        {
<<<<<<< HEAD
            if( $this->game && $this->shop && $this->user && (!$this->game->view || $this->shop->is_blocked || $this->user->is_blocked || $this->user->status == \VanguardLTE\Support\Enum\UserStatus::BANNED) )
=======
            if( $this->game && $this->shop && $this->user && (!$this->game->view || $this->shop->is_blocked || $this->user->is_blocked || $this->user->status == \VanguardLTE\Support\Enum\UserStatus::BANNED) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                \VanguardLTE\Session::where('user_id', $this->user->id)->delete();
                $this->user->update(['remember_token' => null]);
                return false;
            }
<<<<<<< HEAD
            if( !$this->game->view )
            {
                return false;
            }
            if( $this->shop->is_blocked )
            {
                return false;
            }
            if( $this->user->is_blocked )
            {
                return false;
            }
            if( $this->user->status == \VanguardLTE\Support\Enum\UserStatus::BANNED )
=======
            if( !$this->game->view ) 
            {
                return false;
            }
            if( $this->shop->is_blocked ) 
            {
                return false;
            }
            if( $this->user->is_blocked ) 
            {
                return false;
            }
            if( $this->user->status == \VanguardLTE\Support\Enum\UserStatus::BANNED ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                return false;
            }
            return true;
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
        public function GetDealerCard()
        {
            $idArr = [
<<<<<<< HEAD
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                'T',
                'J',
                'Q',
                'K',
                'A'
            ];
            $suitsArr = [
                'C',
                'D',
                'S',
=======
                '2', 
                '3', 
                '4', 
                '5', 
                '6', 
                '7', 
                '8', 
                '9', 
                'T', 
                'J', 
                'Q', 
                'K', 
                'A'
            ];
            $suitsArr = [
                'C', 
                'D', 
                'S', 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                'H'
            ];
            $resultCards = [];
            shuffle($idArr);
            shuffle($suitsArr);
            $resultCards = $idArr[0] . $suitsArr[0];
            return $resultCards;
        }
        public function Bonus($bet, $fuseBet, $rollCnt)
        {
<<<<<<< HEAD
            if( $rollCnt == 3 )
            {
                $rollCnt = 1;
            }
            if( $rollCnt == 4 )
            {
                $rollCnt = 2;
            }
            if( $rollCnt == 5 )
=======
            if( $rollCnt == 3 ) 
            {
                $rollCnt = 1;
            }
            if( $rollCnt == 4 ) 
            {
                $rollCnt = 2;
            }
            if( $rollCnt == 5 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $rollCnt = 3;
            }
            $bonusWins = [
<<<<<<< HEAD
                0,
                0,
                0,
                0,
                2,
                2,
                2,
                2,
                2,
                2,
                5,
                5,
                5,
                5,
                10,
                10,
                10,
                10,
                20,
                20,
                20,
                50,
                50,
                70,
=======
                0, 
                0, 
                0, 
                0, 
                2, 
                2, 
                2, 
                2, 
                2, 
                2, 
                5, 
                5, 
                5, 
                5, 
                10, 
                10, 
                10, 
                10, 
                20, 
                20, 
                20, 
                50, 
                50, 
                70, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                100
            ];
            $bonusSym = [];
            $bonusSym[0] = 0;
            $bonusSym[2] = 8;
            $bonusSym[5] = 7;
            $bonusSym[10] = 6;
            $bonusSym[20] = 5;
            $bonusSym[50] = 4;
            $bonusSym[70] = 3;
            $bonusSym[100] = 1;
            shuffle($bonusWins);
            $bWin = 0;
            $bStr = [];
            $strOut = '';
<<<<<<< HEAD
            for( $i = 0; $i < count($bonusWins); $i++ )
=======
            for( $i = 0; $i < count($bonusWins); $i++ ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $symCnt = rand(1, 3);
                $cwin = $bonusWins[$i] * $bet * $symCnt;
                $bWin += $cwin;
<<<<<<< HEAD
                if( $cwin > 0 )
=======
                if( $cwin > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $bStr[] = '{"Elem": ' . $bonusSym[$bonusWins[$i]] . ', "Count": ' . $symCnt . ',"Coef":' . $bonusWins[$i] . ',"Win":' . $cwin . '}';
                }
                else
                {
                    $bStr[] = 'null';
                    $rollCnt--;
<<<<<<< HEAD
                    if( $rollCnt < 1 )
=======
                    if( $rollCnt < 1 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        break;
                    }
                }
            }
<<<<<<< HEAD
            if( $i >= 4 && ($cwin > 0 || $fuseBet) )
            {
                $superWins = [
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    50,
                    50,
                    50,
                    50,
                    100,
                    100,
                    100,
                    150,
                    150,
=======
            if( $i >= 4 && ($cwin > 0 || $fuseBet) ) 
            {
                $superWins = [
                    0, 
                    0, 
                    0, 
                    0, 
                    0, 
                    0, 
                    0, 
                    0, 
                    0, 
                    0, 
                    0, 
                    0, 
                    50, 
                    50, 
                    50, 
                    50, 
                    100, 
                    100, 
                    100, 
                    150, 
                    150, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    250
                ];
                shuffle($superWins);
                $cwin = $superWins[0] * $bet;
                $bWin += $cwin;
                $strOut = '"BonusWins":[' . implode(',', $bStr) . '],"SuperWin":{"Coef":' . $superWins[0] . ',"Win":' . $cwin . '},';
            }
            else
            {
                $strOut = '"BonusWins":[' . implode(',', $bStr) . '],';
            }
            return [
<<<<<<< HEAD
                'win' => $bWin,
=======
                'win' => $bWin, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                'info' => $strOut
            ];
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
                if( isset($tmpLog->cmd) && $tmpLog->cmd == 'start' )
=======
                $this->slotDBId, 
                $this->playerId
            ])->get();
            $this->lastEvent = 'NULL';
            foreach( $history as $log ) 
            {
                $tmpLog = json_decode($log->str);
                if( isset($tmpLog->cmd) && $tmpLog->cmd == 'start' ) 
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
            for( $i = 0; $i < count($this->jpgs); $i++ )

            {
<<<<<<< HEAD
                if( $count_balance == 0 || $this->jpgPercentZero )
                {
                    $jsum[$i] = $this->jpgs[$i]->balance;
                }
                else if( $count_balance < $bet )
=======
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
                {
                    if( $this->jpgs[$i]->user_id && $this->jpgs[$i]->user_id != $this->user->id )
=======
                if( $this->jpgs[$i]->get_pay_sum() < $jsum[$i] && $this->jpgs[$i]->get_pay_sum() > 0 ) 
                {
                    if( $this->jpgs[$i]->user_id && $this->jpgs[$i]->user_id != $this->user->id ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                    }
                    else
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
                    $i++;
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
            $strLog .= ('{"responseEvent":"error","responseType":"' . $errcode . '","serverResponse":"InternalError","request":' . json_encode($_REQUEST) . ',"requestRaw":' . file_get_contents('php://input') . '}');
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
            $strLog .= ('{"responseEvent":"error","responseType":"' . $errcode . '","serverResponse":"InternalError","request":' . json_encode($_REQUEST) . ',"requestRaw":' . file_get_contents('php://input') . '}');
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
            $this->GetBalance();
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
            $this->user->update(['last_bid' => \Carbon\Carbon::now()]);
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
        public function GetSpinSettings($bet, $lines)
        {
            $pref = '';
            $garantType = 'bet';
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
                    $currentSpinWinChance = 20;
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
                if( $rp[$i] == '0' )
                {
                    if( isset($rp[$i + 1]) && isset($rp[$i + 2]) )
                    {
                        array_push($rpResult, $i);
                    }
                    if( isset($rp[$i + 1]) && isset($rp[$i - 1]) )
                    {
                        array_push($rpResult, $i - 1);
                    }
                    if( isset($rp[$i - 2]) && isset($rp[$i - 1]) )
=======
            for( $i = 0; $i < count($rp); $i++ ) 
            {
                if( $rp[$i] == '0' ) 
                {
                    if( isset($rp[$i + 1]) && isset($rp[$i + 2]) ) 
                    {
                        array_push($rpResult, $i);
                    }
                    if( isset($rp[$i + 1]) && isset($rp[$i - 1]) ) 
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
            if( !$winType )
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
            if( !$winType ) 
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
                $scattersCnt = rand(4, count($reelsId));
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
                $cnt = count($key);
                $key[-1] = $key[$cnt - 1];
                $key[$cnt] = $key[0];
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