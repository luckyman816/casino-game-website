<<<<<<< HEAD
<?php
=======
<?php 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
namespace VanguardLTE\Games\VirtualRouletteEGT
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
        public $Paytable = [];
        public $slotSounds = [];
        public $jpgs = null;
        private $Bank = null;
        private $Percent = null;
        private $WinLine = null;
        private $WinGamble = null;
        private $Bonus = null;
        private $shop_id = null;
        public $licenseDK = null;
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
            $this->increaseRTP = rand(0, 1);
            $this->CurrentDenomGame = $this->game->denomination;
            $this->Denominations = \VanguardLTE\Game::$values['denomination'];
            $this->CurrentDenom = 1;
            $this->scaleMode = 0;
            $this->numFloat = 0;
            $this->NumbersId[144] = [0];
            $this->NumbersId[97] = [1];
            $this->NumbersId[99] = [4];
            $this->NumbersId[101] = [7];
            $this->NumbersId[103] = [10];
            $this->NumbersId[105] = [13];
            $this->NumbersId[107] = [16];
            $this->NumbersId[109] = [19];
            $this->NumbersId[111] = [22];
            $this->NumbersId[113] = [25];
            $this->NumbersId[115] = [28];
            $this->NumbersId[117] = [31];
            $this->NumbersId[119] = [34];
            $this->NumbersId[49] = [2];
            $this->NumbersId[51] = [5];
            $this->NumbersId[53] = [8];
            $this->NumbersId[55] = [11];
            $this->NumbersId[57] = [14];
            $this->NumbersId[59] = [17];
            $this->NumbersId[61] = [20];
            $this->NumbersId[63] = [23];
            $this->NumbersId[65] = [26];
            $this->NumbersId[67] = [29];
            $this->NumbersId[69] = [32];
            $this->NumbersId[71] = [35];
            $this->NumbersId[1] = [3];
            $this->NumbersId[3] = [6];
            $this->NumbersId[5] = [9];
            $this->NumbersId[7] = [12];
            $this->NumbersId[9] = [15];
            $this->NumbersId[11] = [18];
            $this->NumbersId[13] = [21];
            $this->NumbersId[15] = [24];
            $this->NumbersId[17] = [27];
            $this->NumbersId[19] = [30];
            $this->NumbersId[21] = [33];
            $this->NumbersId[23] = [36];
            $this->NumbersId[0] = [
<<<<<<< HEAD
                0,
                3
            ];
            $this->NumbersId[48] = [
                0,
                2
            ];
            $this->NumbersId[96] = [
                0,
                1
            ];
            $this->NumbersId[98] = [
                1,
                4
            ];
            $this->NumbersId[100] = [
                1,
                7
            ];
            $this->NumbersId[102] = [
                7,
                10
            ];
            $this->NumbersId[104] = [
                10,
                13
            ];
            $this->NumbersId[106] = [
                13,
                16
            ];
            $this->NumbersId[108] = [
                16,
                19
            ];
            $this->NumbersId[110] = [
                19,
                22
            ];
            $this->NumbersId[112] = [
                22,
                25
            ];
            $this->NumbersId[114] = [
                25,
                28
            ];
            $this->NumbersId[116] = [
                28,
                31
            ];
            $this->NumbersId[118] = [
                31,
                34
            ];
            $this->NumbersId[50] = [
                2,
                5
            ];
            $this->NumbersId[52] = [
                5,
                8
            ];
            $this->NumbersId[54] = [
                8,
                11
            ];
            $this->NumbersId[56] = [
                11,
                14
            ];
            $this->NumbersId[58] = [
                14,
                17
            ];
            $this->NumbersId[60] = [
                17,
                20
            ];
            $this->NumbersId[62] = [
                20,
                23
            ];
            $this->NumbersId[64] = [
                23,
                26
            ];
            $this->NumbersId[66] = [
                26,
                29
            ];
            $this->NumbersId[68] = [
                29,
                32
            ];
            $this->NumbersId[70] = [
                32,
                35
            ];
            $this->NumbersId[2] = [
                3,
                6
            ];
            $this->NumbersId[4] = [
                6,
                9
            ];
            $this->NumbersId[6] = [
                9,
                12
            ];
            $this->NumbersId[8] = [
                12,
                15
            ];
            $this->NumbersId[10] = [
                15,
                18
            ];
            $this->NumbersId[12] = [
                18,
                21
            ];
            $this->NumbersId[14] = [
                21,
                24
            ];
            $this->NumbersId[16] = [
                24,
                27
            ];
            $this->NumbersId[18] = [
                27,
                30
            ];
            $this->NumbersId[20] = [
                30,
                33
            ];
            $this->NumbersId[22] = [
                33,
                36
            ];
            $this->NumbersId[73] = [
                1,
                2
            ];
            $this->NumbersId[75] = [
                4,
                5
            ];
            $this->NumbersId[77] = [
                7,
                8
            ];
            $this->NumbersId[79] = [
                10,
                11
            ];
            $this->NumbersId[81] = [
                13,
                14
            ];
            $this->NumbersId[83] = [
                16,
                17
            ];
            $this->NumbersId[85] = [
                19,
                20
            ];
            $this->NumbersId[87] = [
                22,
                23
            ];
            $this->NumbersId[89] = [
                25,
                26
            ];
            $this->NumbersId[91] = [
                28,
                29
            ];
            $this->NumbersId[93] = [
                31,
                32
            ];
            $this->NumbersId[95] = [
                34,
                35
            ];
            $this->NumbersId[25] = [
                2,
                3
            ];
            $this->NumbersId[27] = [
                5,
                6
            ];
            $this->NumbersId[29] = [
                8,
                9
            ];
            $this->NumbersId[31] = [
                11,
                12
            ];
            $this->NumbersId[33] = [
                14,
                15
            ];
            $this->NumbersId[35] = [
                17,
                18
            ];
            $this->NumbersId[37] = [
                20,
                21
            ];
            $this->NumbersId[39] = [
                23,
                24
            ];
            $this->NumbersId[41] = [
                26,
                27
            ];
            $this->NumbersId[43] = [
                29,
                30
            ];
            $this->NumbersId[45] = [
                32,
                33
            ];
            $this->NumbersId[47] = [
                35,
                36
            ];
            $this->NumbersId[24] = [
                0,
                2,
                3
            ];
            $this->NumbersId[72] = [
                1,
                2,
                0
            ];
            $this->NumbersId[121] = [
                1,
                2,
                3
            ];
            $this->NumbersId[123] = [
                4,
                5,
                6
            ];
            $this->NumbersId[125] = [
                7,
                8,
                9
            ];
            $this->NumbersId[127] = [
                10,
                11,
                12
            ];
            $this->NumbersId[129] = [
                13,
                14,
                15
            ];
            $this->NumbersId[131] = [
                16,
                17,
                18
            ];
            $this->NumbersId[133] = [
                19,
                20,
                21
            ];
            $this->NumbersId[135] = [
                22,
                23,
                24
            ];
            $this->NumbersId[137] = [
                25,
                26,
                27
            ];
            $this->NumbersId[139] = [
                28,
                29,
                30
            ];
            $this->NumbersId[141] = [
                31,
                32,
                33
            ];
            $this->NumbersId[143] = [
                34,
                35,
                36
            ];
            $this->NumbersId[120] = [
                0,
                1,
                2,
                3
            ];
            $this->NumbersId[74] = [
                1,
                2,
                4,
                5
            ];
            $this->NumbersId[76] = [
                4,
                5,
                7,
                8
            ];
            $this->NumbersId[78] = [
                7,
                8,
                10,
                11
            ];
            $this->NumbersId[80] = [
                10,
                11,
                13,
                14
            ];
            $this->NumbersId[82] = [
                13,
                14,
                16,
                17
            ];
            $this->NumbersId[84] = [
                16,
                17,
                19,
                20
            ];
            $this->NumbersId[86] = [
                19,
                20,
                22,
                23
            ];
            $this->NumbersId[88] = [
                22,
                23,
                25,
                26
            ];
            $this->NumbersId[90] = [
                25,
                26,
                28,
                29
            ];
            $this->NumbersId[92] = [
                28,
                29,
                31,
                32
            ];
            $this->NumbersId[94] = [
                31,
                32,
                34,
                35
            ];
            $this->NumbersId[26] = [
                2,
                3,
                5,
                6
            ];
            $this->NumbersId[28] = [
                5,
                6,
                8,
                9
            ];
            $this->NumbersId[30] = [
                8,
                9,
                11,
                12
            ];
            $this->NumbersId[32] = [
                11,
                12,
                14,
                15
            ];
            $this->NumbersId[34] = [
                14,
                15,
                17,
                18
            ];
            $this->NumbersId[36] = [
                17,
                18,
                20,
                21
            ];
            $this->NumbersId[38] = [
                20,
                21,
                23,
                24
            ];
            $this->NumbersId[40] = [
                23,
                24,
                26,
                27
            ];
            $this->NumbersId[42] = [
                26,
                27,
                29,
                30
            ];
            $this->NumbersId[44] = [
                29,
                30,
                32,
                33
            ];
            $this->NumbersId[46] = [
                32,
                33,
                35,
                36
            ];
            $this->NumbersId[122] = [
                1,
                2,
                3,
                4,
                5,
                6
            ];
            $this->NumbersId[124] = [
                4,
                5,
                6,
                7,
                8,
                9
            ];
            $this->NumbersId[126] = [
                7,
                8,
                9,
                10,
                11,
                12
            ];
            $this->NumbersId[128] = [
                10,
                11,
                12,
                13,
                14,
                15
            ];
            $this->NumbersId[130] = [
                13,
                14,
                15,
                16,
                17,
                18
            ];
            $this->NumbersId[132] = [
                16,
                17,
                18,
                19,
                20,
                21
            ];
            $this->NumbersId[134] = [
                19,
                20,
                21,
                22,
                23,
                24
            ];
            $this->NumbersId[136] = [
                22,
                23,
                24,
                25,
                26,
                27
            ];
            $this->NumbersId[138] = [
                25,
                26,
                27,
                28,
                29,
                30
            ];
            $this->NumbersId[140] = [
                28,
                29,
                30,
                31,
                32,
                33
            ];
            $this->NumbersId[142] = [
                31,
                32,
                33,
                34,
                35,
                36
            ];
            $this->NumbersId[151] = [
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
            $this->NumbersId[152] = [
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
            $this->NumbersId[153] = [
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
                36
            ];
            $this->NumbersId[154] = [
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
            $this->NumbersId[155] = [
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
            $this->NumbersId[156] = [
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
            $this->NumbersId[145] = [
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
            $this->NumbersId[146] = [
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
                36
            ];
            $this->NumbersId[147] = [
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
            $this->NumbersId[148] = [
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
            $this->NumbersId[149] = [
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
            $this->NumbersId[150] = [
                2,
                4,
                6,
                8,
                11,
                10,
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
                0, 
                3
            ];
            $this->NumbersId[48] = [
                0, 
                2
            ];
            $this->NumbersId[96] = [
                0, 
                1
            ];
            $this->NumbersId[98] = [
                1, 
                4
            ];
            $this->NumbersId[100] = [
                1, 
                7
            ];
            $this->NumbersId[102] = [
                7, 
                10
            ];
            $this->NumbersId[104] = [
                10, 
                13
            ];
            $this->NumbersId[106] = [
                13, 
                16
            ];
            $this->NumbersId[108] = [
                16, 
                19
            ];
            $this->NumbersId[110] = [
                19, 
                22
            ];
            $this->NumbersId[112] = [
                22, 
                25
            ];
            $this->NumbersId[114] = [
                25, 
                28
            ];
            $this->NumbersId[116] = [
                28, 
                31
            ];
            $this->NumbersId[118] = [
                31, 
                34
            ];
            $this->NumbersId[50] = [
                2, 
                5
            ];
            $this->NumbersId[52] = [
                5, 
                8
            ];
            $this->NumbersId[54] = [
                8, 
                11
            ];
            $this->NumbersId[56] = [
                11, 
                14
            ];
            $this->NumbersId[58] = [
                14, 
                17
            ];
            $this->NumbersId[60] = [
                17, 
                20
            ];
            $this->NumbersId[62] = [
                20, 
                23
            ];
            $this->NumbersId[64] = [
                23, 
                26
            ];
            $this->NumbersId[66] = [
                26, 
                29
            ];
            $this->NumbersId[68] = [
                29, 
                32
            ];
            $this->NumbersId[70] = [
                32, 
                35
            ];
            $this->NumbersId[2] = [
                3, 
                6
            ];
            $this->NumbersId[4] = [
                6, 
                9
            ];
            $this->NumbersId[6] = [
                9, 
                12
            ];
            $this->NumbersId[8] = [
                12, 
                15
            ];
            $this->NumbersId[10] = [
                15, 
                18
            ];
            $this->NumbersId[12] = [
                18, 
                21
            ];
            $this->NumbersId[14] = [
                21, 
                24
            ];
            $this->NumbersId[16] = [
                24, 
                27
            ];
            $this->NumbersId[18] = [
                27, 
                30
            ];
            $this->NumbersId[20] = [
                30, 
                33
            ];
            $this->NumbersId[22] = [
                33, 
                36
            ];
            $this->NumbersId[73] = [
                1, 
                2
            ];
            $this->NumbersId[75] = [
                4, 
                5
            ];
            $this->NumbersId[77] = [
                7, 
                8
            ];
            $this->NumbersId[79] = [
                10, 
                11
            ];
            $this->NumbersId[81] = [
                13, 
                14
            ];
            $this->NumbersId[83] = [
                16, 
                17
            ];
            $this->NumbersId[85] = [
                19, 
                20
            ];
            $this->NumbersId[87] = [
                22, 
                23
            ];
            $this->NumbersId[89] = [
                25, 
                26
            ];
            $this->NumbersId[91] = [
                28, 
                29
            ];
            $this->NumbersId[93] = [
                31, 
                32
            ];
            $this->NumbersId[95] = [
                34, 
                35
            ];
            $this->NumbersId[25] = [
                2, 
                3
            ];
            $this->NumbersId[27] = [
                5, 
                6
            ];
            $this->NumbersId[29] = [
                8, 
                9
            ];
            $this->NumbersId[31] = [
                11, 
                12
            ];
            $this->NumbersId[33] = [
                14, 
                15
            ];
            $this->NumbersId[35] = [
                17, 
                18
            ];
            $this->NumbersId[37] = [
                20, 
                21
            ];
            $this->NumbersId[39] = [
                23, 
                24
            ];
            $this->NumbersId[41] = [
                26, 
                27
            ];
            $this->NumbersId[43] = [
                29, 
                30
            ];
            $this->NumbersId[45] = [
                32, 
                33
            ];
            $this->NumbersId[47] = [
                35, 
                36
            ];
            $this->NumbersId[24] = [
                0, 
                2, 
                3
            ];
            $this->NumbersId[72] = [
                1, 
                2, 
                0
            ];
            $this->NumbersId[121] = [
                1, 
                2, 
                3
            ];
            $this->NumbersId[123] = [
                4, 
                5, 
                6
            ];
            $this->NumbersId[125] = [
                7, 
                8, 
                9
            ];
            $this->NumbersId[127] = [
                10, 
                11, 
                12
            ];
            $this->NumbersId[129] = [
                13, 
                14, 
                15
            ];
            $this->NumbersId[131] = [
                16, 
                17, 
                18
            ];
            $this->NumbersId[133] = [
                19, 
                20, 
                21
            ];
            $this->NumbersId[135] = [
                22, 
                23, 
                24
            ];
            $this->NumbersId[137] = [
                25, 
                26, 
                27
            ];
            $this->NumbersId[139] = [
                28, 
                29, 
                30
            ];
            $this->NumbersId[141] = [
                31, 
                32, 
                33
            ];
            $this->NumbersId[143] = [
                34, 
                35, 
                36
            ];
            $this->NumbersId[120] = [
                0, 
                1, 
                2, 
                3
            ];
            $this->NumbersId[74] = [
                1, 
                2, 
                4, 
                5
            ];
            $this->NumbersId[76] = [
                4, 
                5, 
                7, 
                8
            ];
            $this->NumbersId[78] = [
                7, 
                8, 
                10, 
                11
            ];
            $this->NumbersId[80] = [
                10, 
                11, 
                13, 
                14
            ];
            $this->NumbersId[82] = [
                13, 
                14, 
                16, 
                17
            ];
            $this->NumbersId[84] = [
                16, 
                17, 
                19, 
                20
            ];
            $this->NumbersId[86] = [
                19, 
                20, 
                22, 
                23
            ];
            $this->NumbersId[88] = [
                22, 
                23, 
                25, 
                26
            ];
            $this->NumbersId[90] = [
                25, 
                26, 
                28, 
                29
            ];
            $this->NumbersId[92] = [
                28, 
                29, 
                31, 
                32
            ];
            $this->NumbersId[94] = [
                31, 
                32, 
                34, 
                35
            ];
            $this->NumbersId[26] = [
                2, 
                3, 
                5, 
                6
            ];
            $this->NumbersId[28] = [
                5, 
                6, 
                8, 
                9
            ];
            $this->NumbersId[30] = [
                8, 
                9, 
                11, 
                12
            ];
            $this->NumbersId[32] = [
                11, 
                12, 
                14, 
                15
            ];
            $this->NumbersId[34] = [
                14, 
                15, 
                17, 
                18
            ];
            $this->NumbersId[36] = [
                17, 
                18, 
                20, 
                21
            ];
            $this->NumbersId[38] = [
                20, 
                21, 
                23, 
                24
            ];
            $this->NumbersId[40] = [
                23, 
                24, 
                26, 
                27
            ];
            $this->NumbersId[42] = [
                26, 
                27, 
                29, 
                30
            ];
            $this->NumbersId[44] = [
                29, 
                30, 
                32, 
                33
            ];
            $this->NumbersId[46] = [
                32, 
                33, 
                35, 
                36
            ];
            $this->NumbersId[122] = [
                1, 
                2, 
                3, 
                4, 
                5, 
                6
            ];
            $this->NumbersId[124] = [
                4, 
                5, 
                6, 
                7, 
                8, 
                9
            ];
            $this->NumbersId[126] = [
                7, 
                8, 
                9, 
                10, 
                11, 
                12
            ];
            $this->NumbersId[128] = [
                10, 
                11, 
                12, 
                13, 
                14, 
                15
            ];
            $this->NumbersId[130] = [
                13, 
                14, 
                15, 
                16, 
                17, 
                18
            ];
            $this->NumbersId[132] = [
                16, 
                17, 
                18, 
                19, 
                20, 
                21
            ];
            $this->NumbersId[134] = [
                19, 
                20, 
                21, 
                22, 
                23, 
                24
            ];
            $this->NumbersId[136] = [
                22, 
                23, 
                24, 
                25, 
                26, 
                27
            ];
            $this->NumbersId[138] = [
                25, 
                26, 
                27, 
                28, 
                29, 
                30
            ];
            $this->NumbersId[140] = [
                28, 
                29, 
                30, 
                31, 
                32, 
                33
            ];
            $this->NumbersId[142] = [
                31, 
                32, 
                33, 
                34, 
                35, 
                36
            ];
            $this->NumbersId[151] = [
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
            $this->NumbersId[152] = [
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
            $this->NumbersId[153] = [
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
                36
            ];
            $this->NumbersId[154] = [
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
            $this->NumbersId[155] = [
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
            $this->NumbersId[156] = [
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
            $this->NumbersId[145] = [
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
            $this->NumbersId[146] = [
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
                36
            ];
            $this->NumbersId[147] = [
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
            $this->NumbersId[148] = [
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
            $this->NumbersId[149] = [
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
            $this->NumbersId[150] = [
                2, 
                4, 
                6, 
                8, 
                11, 
                10, 
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
            $this->slotBonus = false;
            $this->slotGamble = true;
            $this->slotFastStop = 1;
            $this->slotExitUrl = '/';
            $this->slotWildMpl = 1;
            $this->GambleType = 1;
            $this->slotFreeCount = 20;
            $this->slotFreeMpl = 3;
            $this->slotViewState = ($game->slotViewState == '' ? 'Normal' : $game->slotViewState);
            $this->hideButtons = [];
            $this->jpgs = \VanguardLTE\JPG::where('shop_id', $this->shop_id)->lockForUpdate()->get();
            $this->slotJackPercent = [];
            $this->slotJackpot = [];
<<<<<<< HEAD
            for( $jp = 0; $jp < 4; $jp++ )
            {
                if( $this->jpgs[$jp]->balance != '' )
=======
            for( $jp = 0; $jp < 4; $jp++ ) 
            {
                if( $this->jpgs[$jp]->balance != '' ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $this->slotJackpot[$jp] = sprintf('%01.4f', $this->jpgs[$jp]->balance);
                    $this->slotJackpot[$jp] = substr($this->slotJackpot[$jp], 0, strlen($this->slotJackpot[$jp]) - 2);
                    $this->slotJackPercent[] = $this->jpgs[$jp]->percent;
                }
            }
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
                10,
                11,
                12,
                13,
                14,
                15
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
                9,
                10,
                11,
                12,
                13,
                14,
                15
            ];
            $this->Bet = explode(',', $game->bet);
            if( $this->Bet[0] < 0.1 )
            {
                foreach( $this->Bet as &$bt )
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
                10, 
                11, 
                12, 
                13, 
                14, 
                15
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
                9, 
                10, 
                11, 
                12, 
                13, 
                14, 
                15
            ];
            $this->Bet = explode(',', $game->bet);
            if( $this->Bet[0] < 0.1 ) 
            {
                foreach( $this->Bet as &$bt ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    $bt = $bt * 10;
                }
            }
            $this->Bet = array_slice($this->Bet, 0, 5);
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
        }
        public function GetFieldName($fieldId)
        {
            $fieldNames = [];
            $fieldNames['zero'] = [144];
            $fieldNames['straight'] = [
<<<<<<< HEAD
                144,
                97,
                99,
                101,
                103,
                105,
                107,
                109,
                111,
                113,
                115,
                117,
                119,
                49,
                51,
                53,
                55,
                57,
                59,
                61,
                63,
                65,
                67,
                69,
                71,
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
                23
            ];
            $fieldNames['split'] = [
                0,
                48,
                96,
                98,
                100,
                102,
                104,
                106,
                108,
                110,
                112,
                114,
                116,
                118,
                50,
                52,
                54,
                56,
                58,
                60,
                62,
                64,
                66,
                68,
                70,
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
                73,
                75,
                77,
                79,
                81,
                83,
                85,
                87,
                89,
                91,
                93,
                95,
                25,
                27,
                29,
                31,
                33,
                35,
                37,
                39,
                41,
                43,
                45,
                47
            ];
            $fieldNames['street'] = [
                24,
                72,
                121,
                123,
                125,
                127,
                129,
                131,
                133,
                135,
                137,
                139,
                141,
                143
            ];
            $fieldNames['corner'] = [
                120,
                74,
                76,
                78,
                80,
                82,
                84,
                86,
                88,
                90,
                92,
                94,
                26,
                28,
                30,
                32,
                34,
                36,
                38,
                40,
                42,
                44,
                46
            ];
            $fieldNames['line'] = [
                122,
                124,
                126,
                128,
                130,
                132,
                134,
                136,
                138,
                140,
                142
            ];
            $fieldNames['column'] = [
                151,
                152,
                153
            ];
            $fieldNames['twelve'] = [
                154,
                155,
=======
                144, 
                97, 
                99, 
                101, 
                103, 
                105, 
                107, 
                109, 
                111, 
                113, 
                115, 
                117, 
                119, 
                49, 
                51, 
                53, 
                55, 
                57, 
                59, 
                61, 
                63, 
                65, 
                67, 
                69, 
                71, 
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
                23
            ];
            $fieldNames['split'] = [
                0, 
                48, 
                96, 
                98, 
                100, 
                102, 
                104, 
                106, 
                108, 
                110, 
                112, 
                114, 
                116, 
                118, 
                50, 
                52, 
                54, 
                56, 
                58, 
                60, 
                62, 
                64, 
                66, 
                68, 
                70, 
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
                73, 
                75, 
                77, 
                79, 
                81, 
                83, 
                85, 
                87, 
                89, 
                91, 
                93, 
                95, 
                25, 
                27, 
                29, 
                31, 
                33, 
                35, 
                37, 
                39, 
                41, 
                43, 
                45, 
                47
            ];
            $fieldNames['street'] = [
                24, 
                72, 
                121, 
                123, 
                125, 
                127, 
                129, 
                131, 
                133, 
                135, 
                137, 
                139, 
                141, 
                143
            ];
            $fieldNames['corner'] = [
                120, 
                74, 
                76, 
                78, 
                80, 
                82, 
                84, 
                86, 
                88, 
                90, 
                92, 
                94, 
                26, 
                28, 
                30, 
                32, 
                34, 
                36, 
                38, 
                40, 
                42, 
                44, 
                46
            ];
            $fieldNames['line'] = [
                122, 
                124, 
                126, 
                128, 
                130, 
                132, 
                134, 
                136, 
                138, 
                140, 
                142
            ];
            $fieldNames['column'] = [
                151, 
                152, 
                153
            ];
            $fieldNames['twelve'] = [
                154, 
                155, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                156
            ];
            $fieldNames['low'] = [145];
            $fieldNames['high'] = [146];
            $fieldNames['red'] = [149];
            $fieldNames['black'] = [150];
            $fieldNames['odd'] = [148];
            $fieldNames['even'] = [147];
<<<<<<< HEAD
            foreach( $fieldNames as $key => $vl )
            {
                if( in_array($fieldId, $vl) )
=======
            foreach( $fieldNames as $key => $vl ) 
            {
                if( in_array($fieldId, $vl) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    return $key;
                }
            }
            return 'NULL';
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
                if( $log->str == 'NONE' )
=======
                $this->slotDBId, 
                $this->playerId
            ])->get();
            $this->lastEvent = 'NULL';
            foreach( $history as $log ) 
            {
                if( $log->str == 'NONE' ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                {
                    return 'NULL';
                }
                $tmpLog = json_decode($log->str);
<<<<<<< HEAD
                if( $tmpLog->responseEvent != 'gambleResult' && $tmpLog->responseEvent != 'jackpot' )
=======
                if( $tmpLog->responseEvent != 'gambleResult' && $tmpLog->responseEvent != 'jackpot' ) 
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
        public function ClearJackpot($jid)
        {
            $this->jpgs[$jid]->balance = sprintf('%01.4f', 0);
            $this->jpgs[$jid]->save();
        }
        public function UpdateJackpots($bet)
        {
            $bet = $bet * $this->CurrentDenom;
            $count_balance = $this->count_balance;
            $slotJackSum = [];
            $game = $this->game;
            $isJackPay = 0;
            $isJackId = 0;
<<<<<<< HEAD
            for( $jp = 1; $jp <= 4; $jp++ )
            {
                if( $this->jpgs[$jp - 1]->balance != '' )
                {
                    $this->slotJackpot[$jp - 1] = number_format($this->jpgs[$jp - 1]->balance, 4, '.', '');
                    if( $count_balance == 0 || $this->jpgPercentZero )
                    {
                        $slotJackSum[$jp - 1] = $this->slotJackpot[$jp - 1];
                    }
                    else if( $count_balance < $bet )
=======
            for( $jp = 1; $jp <= 4; $jp++ ) 
            {
                if( $this->jpgs[$jp - 1]->balance != '' ) 
                {
                    $this->slotJackpot[$jp - 1] = number_format($this->jpgs[$jp - 1]->balance, 4, '.', '');
                    if( $count_balance == 0 || $this->jpgPercentZero ) 
                    {
                        $slotJackSum[$jp - 1] = $this->slotJackpot[$jp - 1];
                    }
                    else if( $count_balance < $bet ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $slotJackSum[$jp - 1] = number_format($count_balance / 100 * $this->slotJackPercent[$jp - 1] + $this->slotJackpot[$jp - 1], 4, '.', '');
                    }
                    else
                    {
                        $slotJackSum[$jp - 1] = number_format($bet / 100 * $this->slotJackPercent[$jp - 1] + $this->slotJackpot[$jp - 1], 4, '.', '');
                    }
                    $leftOver = $slotJackSum[$jp - 1];
<<<<<<< HEAD
                    if( $this->jpgs[$jp - 1]->get_pay_sum() <= $this->slotJackpot[$jp - 1] && !$isJackPay && $this->jpgs[$jp - 1]->get_pay_sum() > 0 )
                    {
                        if( $this->jpgs[$jp - 1]->user_id && $this->jpgs[$jp - 1]->user_id != $this->user->id )
=======
                    if( $this->jpgs[$jp - 1]->get_pay_sum() <= $this->slotJackpot[$jp - 1] && !$isJackPay && $this->jpgs[$jp - 1]->get_pay_sum() > 0 ) 
                    {
                        if( $this->jpgs[$jp - 1]->user_id && $this->jpgs[$jp - 1]->user_id != $this->user->id ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                        {
                        }
                        else
                        {
                            $isJackPay = 1;
                            $isJackId = $jp - 1;
                        }
                    }
                    $this->slotJackpot[$jp - 1] = sprintf('%01.2f', $slotJackSum[$jp - 1]);
                    $this->jpgs[$jp - 1]->balance = sprintf('%01.4f', $leftOver);
                    $this->jpgs[$jp - 1]->save();
                }
            }
            $game->save();
<<<<<<< HEAD
            for( $jp = 0; $jp < 4; $jp++ )
            {
                if( $this->jpgs[$jp]->balance != '' && $this->jpgs[$jp]->balance < $this->jpgs[$jp]->get_min('start_balance') )
                {
                    $summ = $this->jpgs[$jp]->get_start_balance() - $this->jpgs[$jp]->balance;
                    if( $summ > 0 )
=======
            for( $jp = 0; $jp < 4; $jp++ ) 
            {
                if( $this->jpgs[$jp]->balance != '' && $this->jpgs[$jp]->balance < $this->jpgs[$jp]->get_min('start_balance') ) 
                {
                    $summ = $this->jpgs[$jp]->get_start_balance() - $this->jpgs[$jp]->balance;
                    if( $summ > 0 ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $this->jpgs[$jp]->add_jpg('add', $summ);
                    }
                }
            }
            return [
<<<<<<< HEAD
                'isJackPay' => $isJackPay,
=======
                'isJackPay' => $isJackPay, 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                'isJackId' => $isJackId
            ];
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
                $this->user->update_level('bet', $bet * $this->CurrentDenom);
            }
            if( $slotState != 'freespin' )
=======
            if( $slotState == 'bet' ) 
            {
                $this->user->update_level('bet', $bet * $this->CurrentDenom);
            }
            if( $slotState != 'freespin' ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $game->increment('stat_in', $bet * $this->CurrentDenom);
            }
            $game->increment('stat_out', $win * $this->CurrentDenom);
            $game->tournament_stat($slotState, $this->user->id, $bet * $this->CurrentDenom, $win * $this->CurrentDenom);
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
                'bet' => $bet * $this->CurrentDenom,
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
                'bet' => $bet * $this->CurrentDenom, 
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
                if( $rp[$i] == '7' )
                {
                    if( isset($rp[$i + 1]) && isset($rp[$i - 1]) )
                    {
                        array_push($rpResult, $i);
                    }
                    if( isset($rp[$i - 1]) && isset($rp[$i - 2]) )
                    {
                        array_push($rpResult, $i - 1);
                    }
                    if( isset($rp[$i + 1]) && isset($rp[$i + 2]) )
=======
            for( $i = 0; $i < count($rp); $i++ ) 
            {
                if( $rp[$i] == '7' ) 
                {
                    if( isset($rp[$i + 1]) && isset($rp[$i - 1]) ) 
                    {
                        array_push($rpResult, $i);
                    }
                    if( isset($rp[$i - 1]) && isset($rp[$i - 2]) ) 
                    {
                        array_push($rpResult, $i - 1);
                    }
                    if( isset($rp[$i + 1]) && isset($rp[$i + 2]) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        array_push($rpResult, $i + 1);
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
        public function GetReelStrips($winType, $slotEvent)
        {
            $game = $this->game;
<<<<<<< HEAD
            if( $slotEvent == 'freespin' )
=======
            if( $slotEvent == 'freespin' ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
            {
                $reel = new GameReel();
                $fArr = $reel->reelsStripBonus;
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
                    $curReel = array_shift($fArr);
                    if( count($curReel) )
=======
                    'reelStrip1', 
                    'reelStrip2', 
                    'reelStrip3', 
                    'reelStrip4', 
                    'reelStrip5', 
                    'reelStrip6'
                ] as $reelStrip ) 
                {
                    $curReel = array_shift($fArr);
                    if( count($curReel) ) 
>>>>>>> 7ca4ba0f61bb3bb1377303a455295c82f2bbc557
                    {
                        $this->$reelStrip = $curReel;
                    }
                }
            }
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
                $cnt = count($key);
                $key[-1] = $key[$cnt - 1];
                $key[$cnt] = $key[0];
                $reel['reel' . $index][0] = $key[$value - 1];
                $reel['reel' . $index][1] = $key[$value];
                $reel['reel' . $index][2] = $key[$value + 1];
                $reel['reel' . $index][3] = '';
                $reel['rp'][] = $value;
            }
            return $reel;
        }
    }

}
