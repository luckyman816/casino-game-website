<?php

namespace VanguardLTE\Games\Merkur\Extrawild;

class Spin
{
    public static function get($bet, $countLines, $settings, $bank, $rtp, $statIn, $statOut)
    {
        newSpin:
        // рандомно получить позиции остановки. В каждой катушке дополнительно выделить несколько доп символов
        $readyReels = [];
        $reelSymbols = 4; // по умолчанию 4 символа
        foreach ($settings->reels as $reel) {
            $reelSymbols += 2; // добавляем для следующей катушки 2 доп символа (для поочередной остановки катушек) 6/8/10
            $position = rand(0, (count($reel) - 1)); // определяем позицию
            $doubleReel = array_merge($reel, $reel); // зацикливаем катушку
            $readyReels[] = array_slice($doubleReel, $position, $reelSymbols); // выбираем срез катушки с рандомной позиции, в нужном количестве
        }
/*        $readyReels = [
            [3,3,2,2,3,2,2],
            [0,2,2,0,0,2,0,0,0,4],
            [0,0,0,8,0,0,8,8,0,8,8,8,1],
            [2,5,2,2,2,4,2,2,4,4,2,4,2,2,3],
            [4,6,6,4,6,6,6,6,6,6,6,6,6,6,6,6,6,6]
        ];*/
        // заполнить игровое поле для работы с ним
        $slotArea = [];
        $variableSlotArea = [];
        foreach ($readyReels as $readyReel) { // забираем 3 символа из каждой катушки
            $needReel = array_slice($readyReel, 1, 3);
            $slotArea[] = $needReel;
            $variableSlotArea[] = $needReel;
        }


        // заполнить символами линии
        $lines = [];
        for ($i = 1; $i <= $countLines; $i++) {
            foreach ($settings->lines[$i] as $symbolX => $symbolY) {
                $lines[$i - 1][] = $slotArea[$symbolX][$symbolY];
            }
        }

        // проверить линии на выигрыш
        $winLines = [];
        $totalWin = 0;
        $wildParameters = [];
        // проверить дикие символы в третьей катушке, каждому присвоить свой множитель
        $wildsSymbols = [];
        foreach ($slotArea[2] as $k => $sym) {
            $multipliers = [2,2,2,2,2,2,2,3,3,3,3,3,7,7];
            if ($sym === $settings->wild) $wildsSymbols[$k] = $multipliers[array_rand($multipliers)];
        }

        foreach ($lines as $lineKey => $line) {
            // посчитать количество повторяющихся символов в линии
            $arrSymbols = array_count_values($line);
            // если в линии есть вайлд - то искать минимум 2 совпадения, иначе 3
            $symbolsMin = in_array($settings->wild, $line) ? 2 : 3;
            $winSymbol = [];
            foreach ($arrSymbols as $arrSymbolKey => $arrSymbol) {
                // если в линии нет нужного количества совпадений (с учетом дикого символа)
                if ($symbolsMin > $arrSymbol) continue;
                $winSymbol[] = $arrSymbolKey;
                if (count($winSymbol) > 1) goto newSpin; // если в линии больше чем одна комбинация - новый спин (чтобы не затруднять )
            }
            // если существует winSymbol - то проверяем по каждому символу из массива линию на то, что символы подряд
            // перебираем винсимволы если есть. Смотрим ключи символов в линии, если по порядку - то выиграла линия

            if ($winSymbol) {
                foreach ($winSymbol as $symbolWin) {
                    $winKeys = [];
                    $winKeys = array_keys($line, $symbolWin);
                    // если есть дикий символ - то составляем комбинацию с диким
                    if (in_array($settings->wild, $line)) {
                        $winKeys[] = 2;
                        asort($winKeys);
                        $winKeys = array_values($winKeys);
                    }
                    if ($winKeys === [0,2,3,4]) unset($winKeys[0]);
                    if ($winKeys === [0,1,2,4]) unset($winKeys[3]);
                    $realWinKeys = [];
                    // проверить комбинацию подряд или нет
                    if ($winKeys === [0,1,2,3,4] || $winKeys === [0,1,2,3] || $winKeys === [0,1,2] ||
                        $winKeys === [1,2,3,4] || $winKeys === [1,2,3] || $winKeys === [2,3,4] || $winKeys === [2,3,4,5] || $winKeys === [3,4,5]){
                        $realWinKeys = $winKeys;
                    }
                    $countWin = count($realWinKeys);
                    if (isset($settings->paytable[$symbolWin][$countWin])) { // если есть в таблице выплат
                        $win = $settings->paytable[$symbolWin][$countWin] * $bet;
                        // перебираем ключи символов в линии которые подходят под условия. Записываем линию, точки и выигрыш
                        $points = []; // массив для точек
                        $wildMultiplier = 1; // множитель комбинации
                        foreach ($realWinKeys as $realWinKey) {
                            $x = $realWinKey;
                            $y = $settings->lines[$lineKey + 1][$realWinKey];
                            $points[] = ["point" => ["x" => $x, "y" => $y], "symbol" => $line[$realWinKey]];
                            if ($countWin > 2 && $line[$realWinKey] === $settings->wild){
                                // удалить из variableSlotArea символы выигрышных линий, чтобы потом понять останутся ли вайлды не учавствующие в комбинациях
                                unset($variableSlotArea[$x][$y]);
                                $wildMultiplier = $wildsSymbols[$y];
                                $wildParameters[$y] = $wildMultiplier;
                            }
                        }
                        $winLines[] = [
                            'Line' => $lineKey + 1,
                            'Symbol' => $symbolWin,
                            'Points' => $points,
                            'Win' => $win*$wildMultiplier
                        ];
                        $totalWin += $win;
                    }
                }
            }
        }

        //if ($totalWin === 0) goto newSpin;
        // если можно выигрывать - идем дальше, если нет то сначала.
        if ($totalWin) {
            if (($totalWin / 100) > $bank->slots) goto newSpin;
        }
        // если можно выигрывать - идем дальше, если нет то сначала. Если RTP высокий то сначала.
        /*if ($totalWin) {
            $currentRTP = $statIn == 0 ? 0 : ($statOut / $statIn) * 100;
            if ($currentRTP > 95 || ($totalWin / 100) > $bank->slots) goto newSpin;
        }*/
        $winnings = [];

        foreach ($winLines as $winLine) {
            $winnings[] = [
                "wagerPositionId" => $winLine['Line'], "winFactor" => 40, "winSum" => $winLine['Win'], "wagerId" => $winLine['Line'], "winExtensions" => [],
                "items" => $winLine['Points'],
                "highlight" => ["payGroupMemberId" => $winLine['Symbol'], "occurrence" => 3], "lid" => $winLine['Line'], "eid" => 1
            ];
        }

        foreach ($variableSlotArea[2] as $varSymbolKey => $varSymbol) {
            // если символ дикий - значит он не учавствует ни в каких линиях и нужно оплатить его
            if ($varSymbol === $settings->wild){
                $winnings[] = [
                    "wagerPositionId" => 0,"winFactor" => 10,"winSum" => $bet,"wagerId" => 0,"winExtensions" => [],"items" => [["point" => ["x" => 2,"y" => $varSymbolKey],"symbol" => 8]],
                        "highlight" => ["payGroupMemberId" => $settings->wild,"occurrence" => 1],"lid" => 0,"eid" => 0
                ];
                $totalWin += $bet;
            }
        }
        if ($totalWin) {
            if (($totalWin / 100) > $bank->slots) goto newSpin;
        }

        $formattedWildParams = [];
        foreach ($wildParameters as $wildKey => $wildParameter) {
            switch ($wildKey){
                case 0:
                    $formattedWildParams['WILD_ONE'] = $wildParameter;
                case 1:
                    $formattedWildParams['WILD_TWO'] = $wildParameter;
                case 2:
                    $formattedWildParams['WILD_THREE'] = $wildParameter;
            }
        }


        return array($winnings, $readyReels, $slotArea, $totalWin, $formattedWildParams);
    }


}
