<?php

namespace VanguardLTE\Games\Merkur\Multiwild;

use mysql_xdevapi\Exception;

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

        // заполнить символами линии
        $lines = [];
        for ($i=0;$i<=$countLines;$i++){
            foreach ($settings->lines[$i] as $symbolX => $symbolY) {
                $lines[$i][] = $slotArea[$symbolX][$symbolY];
            }
        }

        // проверить линии на выигрыш
        $winLines = [];
        $totalWin = 0;
        foreach ($lines as $lineKey => $line) {
            // если первый символ не равен второму и ни один не дикий - идем дальше
            if ($line[0] !== $line[1] && $line[0] !== $settings->wild && $line[1] !== $settings->wild) continue;


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
            $winSymbol = self::getWinSymbol($winLine,$settings);
            $countSymbols = count($winLine);
            // если символ есть во всех 4 катушках, а дает выигрыш за 3 - то устанавливаем минимальное значение для выигрыша 4 символа (чтобы не считались пустые линии)
            if ($countSymbols < 4){
                if (in_array($winSymbol,$slotArea[3]) || in_array($settings->wild,$slotArea[3])) continue; // если символа 3 а на игровом поле 4 - то пропускаем линию
            }
                if (isset($settings->paytable[$winSymbol][$countSymbols])) { // если есть в таблице выплат
                    $tmpPointsArray = [];
                    $win = $settings->paytable[$winSymbol][$countSymbols] * $bet;
                    $points = []; // массив для точек
                    $tempPoints = ''; // для отсеивания
                    foreach ($winLine as $symKey => $sym) {
                        $points[] = ["point" => ["x" => $symKey, "y" => $settings->lines[$lineKey][$symKey]], "symbol" => $sym];
                        $tempPoints .= $symKey.$settings->lines[$lineKey][$symKey].$sym;
                    }
                    $tmpPointsArray[$lineKey] = $tempPoints;
                    $winLines[$lineKey] = [
                        'Line' => $lineKey + 1,
                        'Symbol' => $winSymbol,
                        'Points' => $points,
                        'Win' => $win
                    ];
                }
        }

        if ($winLines){
            $newWinLines = [];
            // удалить дубликаты линий и записать новый массив с выигрышными линиями
            $uniqPoints = array_unique($tmpPointsArray);
            foreach ($uniqPoints as $uniqPointKey => $uniqPoint) {
                if (isset($winLines[$uniqPointKey])){
                    $newWinLines[] = $winLines[$uniqPointKey];
                    $totalWin += $winLines[$uniqPointKey]['Win'];
                }else{
                    print_r($uniqPointKey);
                    print_r($tmpPointsArray);
                    print_r($uniqPoints);
                    print_r(array_keys($winLines));
                }
            }
            $winLines = $newWinLines;
        }

        // если можно выигрывать - идем дальше, если нет то сначала.
        if ($totalWin) {
            if (($totalWin / 100) > $bank->slots) goto newSpin;
        }
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

        return array($winnings, $readyReels, $slotArea, $totalWin);
    }

    private static function getWinSymbol(&$winLine, $settings)
    {
        // если первый символ не дикий - возвращаем его
        if ($winLine[0] !== $settings->wild) return $winLine[0];
        // если первый вдруг дикий а второй нет - возвращаем второй
        if ($winLine[0] === $settings->wild && $winLine[1] !== $settings->wild) return $winLine[1];
        // считаем сколько подряд диких символов
        $wildCount = 0;
        foreach ($winLine as $symbol) {
            if ($symbol === $settings->wild) $wildCount++;
            else {
                $winSymbol = $symbol;
                break;
            }
        }
        if($wildCount === 4) return $winLine[0];
        // смотрим оплату за количество диких символов, если она больше - то удаляем лишние символы из линии
        if (isset($settings->paytable[$settings->wild][$wildCount]) &&
            $settings->paytable[$settings->wild][$wildCount] > $settings->paytable[$winSymbol][count($winLine)]) {
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
            $symbol === $wild) {
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
