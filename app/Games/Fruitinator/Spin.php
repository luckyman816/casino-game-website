<?php

namespace VanguardLTE\Games\Merkur\Fruitinator;

class Spin
{
    public static function get($bet, $settings, $bank, $rtp, $statIn, $statOut)
    {
        newSpin:
        // рандомно получить позиции остановки. В каждой катушке дополнительно выделить несколько доп символов
        $readyReels = [];
        $reelSymbols = 4; // по умолчанию 4 символа
        foreach ($settings->reels as $reel) {
            $reelSymbols += 2; // добавляем для следующей катушки 2 доп символа (для поочередной остановки катушек) 6/8/10
            $position = rand(0, (strlen($reel) - 1)); // определяем позицию
            // из сдвоенной строки выбираем подстроку и преобразовав в массив кладем в slotArea
            $readyReels[] = str_split(substr($reel . $reel, $position, $reelSymbols));
        }
        // заполнить игровое поле для работы с ним
        $slotArea = [];
        foreach ($readyReels as $readyReel) { // забираем 3 символа из каждой катушки
            $slotArea[] = array_slice($readyReel, 1, 3);
        }

        // заполнить символами линии
        $lines = [];
        foreach ($settings->lines as $lineKeySet => $lineSet){
            foreach ($lineSet as $symbolX => $symbolY) {
                $lines[$lineKeySet-1][] = $slotArea[$symbolX][$symbolY];
            }
        }

        // проверить линии на выигрыш
        $winLines = [];
        $totalWin = 0;
        foreach ($lines as $lineKey => $line) {
            if (count(array_unique($line)) === count($line)) continue; // если все символы в линии разные то дальше
            if ($line[0] !== $line[1]) continue; // если первый символ не равен второму - идем дальше
            $winLine = [];
            foreach ($line as $symbolKey => $symbol) { // перебираем линию чтобы узнать сколько символов подряд одинаковы
                if ($symbolKey > 0){
                    if ($symbol === $winLine[$symbolKey-1]) {array_push($winLine, $symbol);}
                    else { break; } // выходим из цикла если следующий символ не из выигрышной комбинации
                } else {
                    $winLine[] = $symbol;
                }
            }
            // проверить собранную линию на выигрыш
            $winSymbol = $winLine[0];
            $countSymbols = count($winLine);
            if (isset($settings->paytable[$winSymbol][$countSymbols])){ // если есть в таблице выплат
                $win = $settings->paytable[$winSymbol][$countSymbols] * $bet;
                $points = []; // массив для точек
                foreach ($winLine as $symKey => $sym) {
                    $points[] = ["point" => ["x" => $symKey, "y" => $settings->lines[$lineKey+1][$symKey]], "symbol" => $sym];
                }
                $winLines[] = [
                    'Line' => $lineKey+1,
                    'Symbol' => $winSymbol,
                    'Points' => $points,
                    'Win' => $win
                ];
                $totalWin += $win;
            }
        }

        // если можно выигрывать - идем дальше, если нет то сначала.
        if ($totalWin) {
            if (($totalWin / 100) > $bank->slots) goto newSpin;
        }
        $winnings = [];

        foreach ($winLines as $winLine) {
            $winnings[] = [
                "wagerPositionId" => $winLine['Line'], "winFactor" => 40, "winSum" => $winLine['Win'], "wagerId" => $winLine['Line'], "winExtensions" => [],
                    "items" => $winLine['Points'],
                    "highlight" => ["payGroupMemberId" => $winLine['Symbol'], "occurrence" => 3], "lid" => $winLine['Line'], "eid" => 1
            ];
        }


        return array($winnings, $readyReels, $slotArea, $totalWin);
    }

}
