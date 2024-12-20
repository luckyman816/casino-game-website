<?php

namespace VanguardLTE\Games\Merkur\Doubletriplechance;

class Settings
{
    // класс настроек, таблица выплат, набор символов в катушках, бонусные символы, вайлды
    public $reels = [
            '62222004444001111005573333262222004444001111557333326222200444400111155733332',
            '600130011153533332712220040014446001003333111535333327222300400444600100111535333327222004500444',
            '62222007444400111155003333262222007444400111155333326222200744440011115533332'
    ];

    public $paytable = [
        '0' => 1, // Diamond
        '1' => 8, // Lemon
        '2' => 8, // Cherry
        '3' => 8, // Orange
        '4' => 8, // plum
        '5' => 12, // Bell
        '6' => 40, // watermelon
        '7' => 150 //Seven
    ];

    public $randomSlotArea = [
        [0,3,1,2],
        [0,4,2,5],
        [0,5,5,1],
    ];

    public $scatter = false;

    public $lines = [
        1 => [1, 1, 1 ], // line 1
        2 => [0, 0, 0 ], // line 2
        3 => [2, 2, 2 ], // line 3
        4 => [0, 1, 2 ], // line 4
        5 => [2, 1, 0 ] // line 5

    ];

}
