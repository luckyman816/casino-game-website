<<<<<<< HEAD
<?php
=======
<?php 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
namespace VanguardLTE\Games\RouletteRoyalAM
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
<<<<<<< HEAD
            if( $game->stat_in > 0 )
=======
            if( $game->stat_in > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $this->currentRTP = $game->stat_out / $game->stat_in * 100;
            }
            else
            {
                $this->currentRTP = 0;
            }
            $this->increaseRTP = 1;
            $this->CurrentDenom = $this->game->denomination;
            $this->slotExitUrl = '/';
            $this->Bet = explode(',', $game->bet);
<<<<<<< HEAD
            if( $game->bet && $this->Bet[0] < 0.01 )
            {
                foreach( $this->Bet as &$bt )
=======
            if( $game->bet && $this->Bet[0] < 0.01 ) 
            {
                foreach( $this->Bet as &$bt ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $bt = $bt * 10;
                }
            }
            $this->Bet = array_slice($this->Bet, 0, 5);
            $this->Balance = $user->balance;
            $this->Bank = $game->get_gamebank();
            $this->Percent = $this->shop->percent;
            $this->jpgs = \VanguardLTE\JPG::where('shop_id', $this->shop_id)->lockForUpdate()->get();
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
        public function GetNumbersByField($fieldName)
        {
            $tmpName = $fieldName;
            $tmpType = $fieldName;
            $tmpBets = [];
<<<<<<< HEAD
            if( is_numeric($fieldName) )
=======
            if( is_numeric($fieldName) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $tmpType = 'straight';
            }
            $tmpType_ = explode('/', $fieldName);
<<<<<<< HEAD
            if( isset($tmpType_[1]) )
=======
            if( isset($tmpType_[1]) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $tmpType = 'column';
            }
            $tmpType_ = explode('-', $fieldName);
<<<<<<< HEAD
            if( isset($tmpType_[1]) )
            {
                $tmpType = 'twelve';
                if( $tmpType_[1] - $tmpType_[0] <= 2 )
=======
            if( isset($tmpType_[1]) ) 
            {
                $tmpType = 'twelve';
                if( $tmpType_[1] - $tmpType_[0] <= 2 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $tmpType = 'street';
                    $cn = (int)$tmpType_[0];
                    $tmpBets = [
<<<<<<< HEAD
                        $cn,
                        $cn + 1,
                        $cn + 2
                    ];
                }
                if( $tmpType_[1] - $tmpType_[0] > 2 && $tmpType_[1] - $tmpType_[0] <= 5 )
=======
                        $cn, 
                        $cn + 1, 
                        $cn + 2
                    ];
                }
                if( $tmpType_[1] - $tmpType_[0] > 2 && $tmpType_[1] - $tmpType_[0] <= 5 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $cn = (int)$tmpType_[0];
                    $tmpType = 'line';
                    $tmpBets = [
<<<<<<< HEAD
                        $cn,
                        $cn + 1,
                        $cn + 2,
                        $cn + 3,
                        $cn + 4,
=======
                        $cn, 
                        $cn + 1, 
                        $cn + 2, 
                        $cn + 3, 
                        $cn + 4, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                        $cn + 5
                    ];
                }
            }
            $tmpType_ = explode(',', $fieldName);
<<<<<<< HEAD
            if( isset($tmpType_[1]) )
=======
            if( isset($tmpType_[1]) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $tmpType = 'split';
            }
            $tmpType_ = explode('.', $fieldName);
<<<<<<< HEAD
            if( isset($tmpType_[1]) )
            {
                $tmpType = 'corner';
                $tmpBets = [
                    $tmpType_[0],
                    $tmpType_[0] + 1,
                    $tmpType_[1],
                    $tmpType_[1] - 1
                ];
            }
            if( $tmpType == 'split' )
            {
                $tmpBets = explode(',', $tmpName);
            }
            if( $tmpType == 'straight' )
            {
                $tmpBets = [$tmpName];
            }
            if( $tmpType == 'column' )
            {
                if( $tmpName == '1/12' )
                {
                    $tmpBets = [
                        1,
                        4,
                        7,
                        10,
                        13,
                        16,
                        19,
                        22,
                        25,
                        28,
                        31,
                        34
                    ];
                }
                if( $tmpName == '2/12' )
                {
                    $tmpBets = [
                        2,
                        5,
                        8,
                        11,
                        14,
                        17,
                        20,
                        23,
                        26,
                        29,
                        32,
                        35
                    ];
                }
                if( $tmpName == '3/12' )
                {
                    $tmpBets = [
                        3,
                        6,
                        9,
                        12,
                        15,
                        18,
                        21,
                        24,
                        27,
                        30,
                        33,
=======
            if( isset($tmpType_[1]) ) 
            {
                $tmpType = 'corner';
                $tmpBets = [
                    $tmpType_[0], 
                    $tmpType_[0] + 1, 
                    $tmpType_[1], 
                    $tmpType_[1] - 1
                ];
            }
            if( $tmpType == 'split' ) 
            {
                $tmpBets = explode(',', $tmpName);
            }
            if( $tmpType == 'straight' ) 
            {
                $tmpBets = [$tmpName];
            }
            if( $tmpType == 'column' ) 
            {
                if( $tmpName == '1/12' ) 
                {
                    $tmpBets = [
                        1, 
                        4, 
                        7, 
                        10, 
                        13, 
                        16, 
                        19, 
                        22, 
                        25, 
                        28, 
                        31, 
                        34
                    ];
                }
                if( $tmpName == '2/12' ) 
                {
                    $tmpBets = [
                        2, 
                        5, 
                        8, 
                        11, 
                        14, 
                        17, 
                        20, 
                        23, 
                        26, 
                        29, 
                        32, 
                        35
                    ];
                }
                if( $tmpName == '3/12' ) 
                {
                    $tmpBets = [
                        3, 
                        6, 
                        9, 
                        12, 
                        15, 
                        18, 
                        21, 
                        24, 
                        27, 
                        30, 
                        33, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                        36
                    ];
                }
            }
<<<<<<< HEAD
            if( $tmpType == 'twelve' )
            {
                if( $tmpName == '1-12' )
                {
                    $tmpBets = [
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
                        11,
                        12
                    ];
                }
                if( $tmpName == '13-24' )
                {
                    $tmpBets = [
                        13,
                        14,
                        15,
                        16,
                        17,
                        18,
                        19,
                        20,
                        21,
                        22,
                        23,
                        24
                    ];
                }
                if( $tmpName == '25-36' )
                {
                    $tmpBets = [
                        25,
                        26,
                        27,
                        28,
                        29,
                        30,
                        31,
                        32,
                        33,
                        34,
                        35,
                        36
                    ];
                }
                if( $tmpName == '1-18' )
                {
                    $tmpType = 'low';
                    $tmpBets = [
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
                        11,
                        12,
                        13,
                        14,
                        15,
                        16,
                        17,
                        18
                    ];
                }
                if( $tmpName == '19-36' )
                {
                    $tmpType = 'high';
                    $tmpBets = [
                        13,
                        14,
                        15,
                        16,
                        17,
                        18,
                        19,
                        20,
                        21,
                        22,
                        23,
                        24,
                        25,
                        26,
                        27,
                        28,
                        29,
                        30,
                        31,
                        32,
                        33,
                        34,
                        35,
=======
            if( $tmpType == 'twelve' ) 
            {
                if( $tmpName == '1-12' ) 
                {
                    $tmpBets = [
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
                        11, 
                        12
                    ];
                }
                if( $tmpName == '13-24' ) 
                {
                    $tmpBets = [
                        13, 
                        14, 
                        15, 
                        16, 
                        17, 
                        18, 
                        19, 
                        20, 
                        21, 
                        22, 
                        23, 
                        24
                    ];
                }
                if( $tmpName == '25-36' ) 
                {
                    $tmpBets = [
                        25, 
                        26, 
                        27, 
                        28, 
                        29, 
                        30, 
                        31, 
                        32, 
                        33, 
                        34, 
                        35, 
                        36
                    ];
                }
                if( $tmpName == '1-18' ) 
                {
                    $tmpType = 'low';
                    $tmpBets = [
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
                        11, 
                        12, 
                        13, 
                        14, 
                        15, 
                        16, 
                        17, 
                        18
                    ];
                }
                if( $tmpName == '19-36' ) 
                {
                    $tmpType = 'high';
                    $tmpBets = [
                        13, 
                        14, 
                        15, 
                        16, 
                        17, 
                        18, 
                        19, 
                        20, 
                        21, 
                        22, 
                        23, 
                        24, 
                        25, 
                        26, 
                        27, 
                        28, 
                        29, 
                        30, 
                        31, 
                        32, 
                        33, 
                        34, 
                        35, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                        36
                    ];
                }
            }
<<<<<<< HEAD
            if( $tmpType == 'even' )
            {
                $tmpBets = [
                    2,
                    4,
                    6,
                    8,
                    10,
                    12,
                    14,
                    16,
                    18,
                    20,
                    22,
                    24,
                    26,
                    28,
                    30,
                    32,
                    34,
                    36
                ];
            }
            if( $tmpType == 'odd' )
            {
                $tmpBets = [
                    1,
                    3,
                    5,
                    7,
                    9,
                    11,
                    13,
                    15,
                    17,
                    19,
                    21,
                    23,
                    25,
                    27,
                    29,
                    31,
                    33,
                    35
                ];
            }
            if( $tmpType == 'red' )
            {
                $tmpBets = [
                    1,
                    3,
                    5,
                    7,
                    9,
                    12,
                    14,
                    16,
                    18,
                    19,
                    21,
                    23,
                    25,
                    27,
                    30,
                    32,
                    34,
                    36
                ];
            }
            if( $tmpType == 'black' )
            {
                $tmpBets = [
                    2,
                    4,
                    6,
                    8,
                    10,
                    11,
                    13,
                    15,
                    17,
                    20,
                    22,
                    24,
                    26,
                    28,
                    29,
                    31,
                    33,
=======
            if( $tmpType == 'even' ) 
            {
                $tmpBets = [
                    2, 
                    4, 
                    6, 
                    8, 
                    10, 
                    12, 
                    14, 
                    16, 
                    18, 
                    20, 
                    22, 
                    24, 
                    26, 
                    28, 
                    30, 
                    32, 
                    34, 
                    36
                ];
            }
            if( $tmpType == 'odd' ) 
            {
                $tmpBets = [
                    1, 
                    3, 
                    5, 
                    7, 
                    9, 
                    11, 
                    13, 
                    15, 
                    17, 
                    19, 
                    21, 
                    23, 
                    25, 
                    27, 
                    29, 
                    31, 
                    33, 
                    35
                ];
            }
            if( $tmpType == 'red' ) 
            {
                $tmpBets = [
                    1, 
                    3, 
                    5, 
                    7, 
                    9, 
                    12, 
                    14, 
                    16, 
                    18, 
                    19, 
                    21, 
                    23, 
                    25, 
                    27, 
                    30, 
                    32, 
                    34, 
                    36
                ];
            }
            if( $tmpType == 'black' ) 
            {
                $tmpBets = [
                    2, 
                    4, 
                    6, 
                    8, 
                    10, 
                    11, 
                    13, 
                    15, 
                    17, 
                    20, 
                    22, 
                    24, 
                    26, 
                    28, 
                    29, 
                    31, 
                    33, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    35
                ];
            }
            return [
<<<<<<< HEAD
                $tmpType,
=======
                $tmpType, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                $tmpBets
            ];
        }
        public function HexFormat($num)
        {
            $str = strlen(dechex($num)) . dechex($num);
            return $str;
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
                $prc_b = 0;
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
            $this->user->update(['last_bid' => \Carbon\Carbon::now()]);
            if( !isset($this->betProfit) )
=======
            $this->user->update(['last_bid' => \Carbon\Carbon::now()]);																	   
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
        public function GetGambleSettings()
        {
            $spinWin = rand(1, $this->WinGamble);
            return $spinWin;
        }
    }

}
