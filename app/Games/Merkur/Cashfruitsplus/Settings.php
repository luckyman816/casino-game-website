<?php

namespace VanguardLTE\Games\Merkur\Cashfruitsplus;

class Settings
{
    public $reelSymbols = 4;
    // класс настроек, таблица выплат, набор символов в катушках, бонусные символы, вайлды
    public $reels = [
            "64000565572223332244141110600051116557552223332244141110600056445572223332244141110",
            "642224464333370000111515526222446433337000011151445526222446433337000011151552",
            "6233371116144222040005535222623337111261440400055352226233371116144040005535222",
            "61111610007333552223233300446111126100075522232333004461111610007552223213330044",
            "6002224417111710002633355600222441711171000263335560022244171117100026333755",
    ];

    public $defaultReelSet = 0;
    public $incrRTP = 0;

    public $paytable = [
        '0' => [3 => 4, 4 => 10, 5 => 40], // Plum
        '1' => [3 => 4, 4 => 10, 5 => 40], // Orange
        '2' => [3 => 4, 4 => 10, 5 => 40], // Lemon
        '3' => [2 => 1, 3 => 4, 4 => 10, 5 => 40], // Cherry
        '4' => [3 => 10, 4 => 40, 5 => 100], // Watermelon
        '5' => [3 => 10, 4 => 40, 5 => 100], // Grapes
        '6' => [3 => 20, 4 => 200, 5 => 1000], // Seven
        '7' => [3 => 2, 4 => 10, 5 => 50] // Star
    ];

    public $randomSlotArea = [
        [0,3,1,2],
        [0,4,2,5],
        [0,5,5,1],
        [0,6,3,6],
        [0,1,2,0],
    ];

    public $scatter = '7';
    public $wild = [];

    public $lines = [
        1 => [1, 1, 1, 1, 1], // line 1
        2 => [0, 0, 0, 0, 0], // line 2
        3 => [2, 2, 2, 2, 2], // line 3
        4 => [0, 1, 2, 1, 0], // line 4
        5 => [2, 1, 0, 1, 2]  // line 5
    ];

}