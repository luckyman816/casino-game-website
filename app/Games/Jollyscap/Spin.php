<?php

namespace VanguardLTE\Games\Merkur\Jollyscap;

class Spin
{
    public static function get($bet, $countLines, $settings, $bank, $rtp, $statIn, $statOut)
    {
        newSpin:
        // рандомно получить позиции остановки. В каждой катушке дополнительно выделить несколько доп символов
        $readyReels = [];
        $reelSymbols = 4; // по умолчанию 4 символа
        foreach ($settings->reels as $reel) {
            $reelSymbols += 5; // добавляем для следующей катушки 2 доп символа (для поочередной остановки катушек) 6/8/10
            $position = rand(0, (count($reel) - 1)); // определяем позицию
            $doubleReel = array_merge($reel, $reel); // зацикливаем катушку
            $readyReels[] = array_slice($doubleReel, $position, $reelSymbols); // выбираем срез катушки с рандомной позиции, в нужном количестве
        }
        // заполнить игровое поле для работы с ним
        $slotArea = [];
        foreach ($readyReels as $readyReel) { // забираем 3 символа из каждой катушки
            $slotArea[] = array_slice($readyReel, 1, 3);
        }

        // перебрать slotArea среднюю катушку, узнать есть ли там скаттер, если да - то заменить 1 или 2 символа на дикие во всем игровом поле
        $params = self::scatterFunction($slotArea, $settings->scatter);

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
        foreach ($lines as $lineKey => $line) {
            // если первый символ не равен второму и ни один не дикий - идем дальше
            if ($line[0] !== $line[1] && $line[0] !== $settings->wild && $line[1] !== $settings->wild) continue;
            // если первый символ скаттер - то идем дальше
            if ($line[0] === $settings->scatter) continue;

            $winLine = [];
            foreach ($line as $symbolKey => $symbol) { // перебираем линию чтобы узнать сколько символов подряд одинаковы
                if ($symbolKey > 0) {
                    if (self::addSymbol($symbol, $symbolKey, $winLine, $settings->wild)) {
                        array_push($winLine, $symbol);
                    } else {
                        break;
                    } // выходим из цикла если следующий символ не из выигрышной комбинации
                } else {
                    $winLine[] = $symbol;
                }
            }
            // проверить собранную линию на выигрыш
            $winSymbol = self::getWinSymbol($winLine, $settings);
            if ($winSymbol !== $settings->scatter) { // если выигрышный символ не скаттер то засчитываем линию
                $countSymbols = count($winLine);
                if (isset($settings->paytable[$winSymbol][$countSymbols])) { // если есть в таблице выплат
                    $win = $settings->paytable[$winSymbol][$countSymbols] * $bet;
                    $points = []; // массив для точек
                    foreach ($winLine as $symKey => $sym) {
                        $points[] = ["point" => ["x" => $symKey, "y" => $settings->lines[$lineKey + 1][$symKey]], "symbol" => $sym];
                    }
                    $winLines[] = [
                        'Line' => $lineKey + 1,
                        'Symbol' => $winSymbol,
                        'Points' => $points,
                        'Win' => $win
                    ];
                    $totalWin += $win;
                }
            }
        }

        // если можно выигрывать - идем дальше, если нет то сначала.
        if ($totalWin) {
            if (($totalWin / 100) > $bank->slots) goto newSpin;
        }
        // тест розыгрыша в риск игре
        //if ($totalWin !== 240) goto newSpin;
        // если можно выигрывать - идем дальше, если нет то сначала. Если RTP высокий то сначала.
        /*if ($totalWin) {
            $currentRTP = $statIn == 0 ? 0 : ($statOut / $statIn) * 100;
            if ($currentRTP > 95 || ($totalWin / 100) > $bank->slots) goto newSpin;
        }*/
        $winnings = [];

        $scatters = self::checkScatters($slotArea, $settings, $bet); // проверить на скаттеры
        if ($scatters) $winnings[] = $scatters;

        foreach ($winLines as $winLine) {
            $winnings[] = [
                "wagerPositionId" => $winLine['Line'], "winFactor" => 40, "winSum" => $winLine['Win'], "wagerId" => $winLine['Line'], "winExtensions" => [],
                "items" => $winLine['Points'],
                "highlight" => ["payGroupMemberId" => $winLine['Symbol'], "occurrence" => 3], "lid" => $winLine['Line'], "eid" => 1
            ];
        }


        return array($winnings, $readyReels, $slotArea, $totalWin, $params);
    }

    private static function scatterFunction(&$slotArea, $scatter)
    {
        $params = [];
        // проверить есть ли скаттер в средней катушке, если есть то меняем 1 или 2 символа на дикие по всему игровому полю
        if (in_array($scatter, $slotArea[2])) {
            // получить список символов на поле
            foreach ($slotArea as $reel) {
                foreach ($reel as $areaSymbol) {
                    if ($areaSymbol === 9 || $areaSymbol === 10) continue;
                    $symbolsToArea[] = $areaSymbol;
                }
            }
            // выбрать 1 или 2 символа заменять на дикие
            $countChange = rand(1, 2);
            $changeSymbols = [];
            // выбрать какие символы заменять на дикие
            $symbolsToWild = array_unique($symbolsToArea);
            for ($i = 0; $i < $countChange; $i++) {
                $symbolsToWildKey = array_rand($symbolsToWild);
                $symbolToChange = $symbolsToWild[$symbolsToWildKey];
                unset($symbolsToWild[$symbolsToWildKey]);
                if($i === 0) $params['FIRST_REPLACED_SYMBOL'] = $symbolToChange;
                if($i === 1) $params['SECOND_REPLACED_SYMBOL'] = $symbolToChange;
                $changeSymbols[] = $symbolToChange;
            }
            foreach ($slotArea as $reelKey => $reels) {
                foreach ($reels as $key => $symbol) {
                    // если символ из списка заменяемых - то заменяем
                    if (in_array($symbol, $changeSymbols)) {
                        $slotArea[$reelKey][$key] = 9;
                    }
                    if ($symbol === 10) $slotArea[$reelKey][$key] = 9;
                }
            }
        }
        return $params;
    }

    private static function getWinSymbol(&$winLine, $settings)
    {
        // если первый символ не дикий - возвращаем его
        if ($winLine[0] !== $settings->wild) return $winLine[0];
        // если первый вдруг дикий а второй нет - возвращаем второй
        if ($winLine[0] === $settings->wild && $winLine[1] !== $settings->wild) return $winLine[1];
        // считаем сколько подряд диких символов
        $wildCount = 0;
        $winSymbol = $winLine[0];
        foreach ($winLine as $symbol) {
            if ($symbol === $settings->wild || $symbol === 10) $wildCount++;
            else {
                $winSymbol = $symbol;
                break;
            }
        }

        // смотрим оплату за количество диких символов, если она больше - то удаляем лишние символы из линии
        if (isset($settings->paytable[$settings->wild][$wildCount]) &&
            $settings->paytable[$settings->wild][$wildCount] >
            $settings->paytable[$winSymbol][count($winLine)]) {
            // удаляем из линии все винсимволы, оставляя только дикие
            foreach ($winLine as $key => $oldSymbol) {
                if ($oldSymbol !== $settings->wild) unset($winLine[$key]);
            }
            return $winLine[0];
        } else return $winSymbol;
    }

    private static function addSymbol($symbol, $symbolKey, $winLine, $wild)
    { // если символ равен предыдущему, или предыдущий дикий, или текущий дикий
        if ($symbol === $winLine[$symbolKey - 1] ||
            $winLine[$symbolKey - 1] === $wild ||
            $symbol === $wild || $symbol === 10) {
            // если текущий символ уже содержится в линии, или вся линия из диких, или текущий дикий
            if (in_array($symbol, $winLine) || count(array_unique($winLine)) === 1 || $symbol === $wild) {
                return true;
            } else return false;
        } else return false;
    }

    private static function checkScatters($slotArea, $settings, $bet)
    {
        $scattersCount = 0;
        $scatterPositions = [];
        foreach ($slotArea as $reelKey => $reel) {
            foreach ($reel as $symbolKey => &$symbol) {
                if ($symbolKey === 0) continue;
                if ($symbol === $settings->scatter) {
                    $scattersCount++;
                    array_push($scatterPositions, ["point" => ["x" => $reelKey, "y" => $symbolKey], "symbol" => $symbol]);
                }
            }
        }
        if ($scattersCount > 2) {
            $winnings = [
                "wagerPositionId" => 0,
                "winFactor" => 10,
                "winSum" => $settings->paytable[$settings->scatter][$scattersCount] * $bet,
                "wagerId" => 0,
                "winExtensions" => [],
                "items" => $scatterPositions,
                "highlight" => ["payGroupMemberId" => $settings->scatter, "occurrence" => $scattersCount],
                "lid" => 0, "eid" => 0
            ];
        } else {
            $winnings = [];
        }
        return $winnings;
    }

}
