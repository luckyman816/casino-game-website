<?php

namespace VanguardLTE\Games\Merkur\Multiwild;

class Settings
{
    public $reelSymbols = 4;
    // класс настроек, таблица выплат, набор символов в катушках, бонусные символы, вайлды
    public $reels = [
        [0, 1, 6, 5, 6, 4, 4, 6, 3, 1, 6, 0, 6, 6, 7, 4, 2, 2, 2, 8, 4, 4, 7, 3, 4, 3, 2, 2, 1, 1, 2, 6, 6, 3, 5, 7, 5, 5, 3, 4, 2, 1, 7, 3, 0, 3, 3, 0, 7, 5, 4, 1, 2, 8, 4, 1, 4, 4, 4, 4, 5, 6, 1, 7, 1, 3, 7, 6, 0, 5, 6, 7, 2, 4, 0, 0, 8, 3, 0, 6, 1, 6, 4, 6, 4, 4, 6, 3, 1, 6, 0, 6, 7, 4, 2, 4, 2, 2, 2, 3, 4, 7, 3, 4, 3, 2, 1, 1, 2, 6, 6, 3, 5, 7, 5, 5, 3, 4, 2, 1, 7, 3, 0, 3, 3, 0, 7, 5, 4, 1, 2, 4, 1, 4, 4, 5, 6, 1, 7, 7, 1, 3, 7, 6, 0, 5, 6, 7, 2, 4, 0, 0, 3, 0, 6, 4, 4, 6, 4, 3, 0, 7, 4, 2, 2, 2, 3, 4, 7, 4, 3, 2, 1, 1, 2, 3, 3, 7, 5, 3, 2, 1, 7, 0, 0, 7, 1, 2, 1, 7, 0, 2, 8, 0, 0],
        [3, 8, 2, 1, 1, 2, 6, 6, 3, 3, 5, 7, 5, 5, 3, 4, 2, 1, 7, 3, 0, 3, 3, 0, 7, 5, 4, 0, 7, 5, 8, 1, 4, 1, 8, 2, 4, 1, 8, 4, 4, 5, 6, 1, 7, 1, 3, 7, 0, 0, 5, 6, 7, 2, 4, 8, 0, 0, 3, 0, 6, 1, 6, 4, 6, 4, 4, 6, 3, 1, 6, 0, 6, 7, 4, 2, 2, 2, 8, 3, 4, 7, 3, 4, 3, 2, 1, 6, 2, 1, 2, 6, 6, 3, 3, 7, 5, 5, 3, 4, 2, 1, 7, 1, 3, 7, 6, 0, 5, 6, 7, 2, 4, 8, 0, 0, 3, 0, 6, 1, 6, 4, 6, 4, 4, 6, 3, 1, 0, 7, 4, 2, 2, 2, 3, 4, 7, 3, 1, 1, 5, 7, 5, 5, 1, 7, 0, 0, 5, 5, 7, 5, 5, 0, 5, 0, 0, 1, 6, 4, 6, 4, 6, 3, 1, 6, 0, 6, 7, 4, 2, 2, 2, 8, 3, 4, 7, 3, 4, 3],
        [1, 1, 6, 4, 6, 4, 4, 6, 3, 1, 6, 0, 6, 7, 4, 2, 2, 2, 8, 3, 4, 7, 3, 4, 3, 8, 2, 1, 1, 2, 6, 6, 3, 3, 5, 7, 5, 5, 3, 4, 2, 1, 7, 3, 0, 3, 3, 0, 7, 5, 4, 1, 8, 2, 4, 1, 4, 4, 5, 6, 1, 7, 1, 3, 7, 6, 0, 5, 6, 7, 2, 4, 8, 4, 2, 0, 0, 3, 0, 6, 1, 6, 4, 6, 4, 4, 6, 4, 4, 6, 6, 0, 6, 7, 4, 2, 2, 2, 8, 3, 4, 7, 3, 4, 3, 2, 1, 1, 2, 6, 6, 3, 3, 5, 7, 5, 5, 3, 4, 2, 1, 7, 3, 0, 3, 3, 0, 7, 5, 4, 1, 8, 2, 8, 1, 4, 1, 4, 4, 5, 6, 1, 7, 1, 3, 7, 6, 0, 5, 6, 0, 7, 2, 4, 0, 0, 3, 0, 6, 0, 1, 6, 0, 6, 1, 4, 6, 4, 4, 6, 5, 1, 6, 0, 6, 7, 4, 2, 2, 2, 4, 7, 0, 0, 2, 1, 1, 2, 6, 6, 5, 7, 5, 5, 6, 0, 2, 1, 7, 1, 1, 5, 6, 1, 1, 1],
        [2, 1, 6, 4, 6, 4, 4, 6, 3, 1, 6, 0, 6, 7, 4, 2, 2, 2, 8, 3, 4, 7, 3, 4, 8, 3, 2, 1, 1, 2, 6, 6, 1, 7, 1, 6, 7, 6, 0, 3, 3, 5, 7, 5, 5, 3, 1, 8, 2, 1, 7, 3, 0, 8, 3, 0, 7, 5, 4, 1, 2, 8, 4, 1, 4, 4, 0, 6, 1, 6, 4, 6, 6, 1, 7, 1, 3, 7, 6, 0, 5, 6, 7, 2, 4, 8, 0, 0, 6, 7, 4, 2, 8, 4, 0, 6, 1, 6, 4, 6, 4, 4, 3, 5, 7, 5, 5, 3, 1, 5, 6, 7, 2, 0, 6, 7, 4, 2, 2, 2, 8, 3, 4, 7, 4, 3, 5, 4, 1, 2, 8, 1, 1, 2, 6, 1, 7, 1, 3, 7, 6, 0, 3, 3, 5, 7, 5, 5, 3, 5, 4, 1, 8, 2, 2, 1, 7, 3, 0, 8, 3, 3, 0, 7, 5, 4, 1, 2, 8, 3, 4, 7, 3, 4, 1, 8, 3, 0, 7, 5, 4, 2, 1, 7, 3, 0, 1, 5, 6, 7, 2, 1]
    ];

    public $defaultReelSet = 0;
    public $incrRTP = 0;

    public $paytable = [
        0 => [3 => 1, 4 => 2],                   //chery
        1 => [3 => 1, 4 => 4],                  //lemon
        2 => [3 => 1, 4 => 4],                 //orange
        3 => [3 => 1, 4 => 4],             //plum
        4 => [3 => 1, 4 => 4],             //grape
        5 => [3 => 4, 4 => 40],            //Bell
        6 => [3 => 6, 4 => 60],         //melon
        7 => [3 => 16, 4 => 160],            //seven
        8 => [4 => 2000]        //wild
    ];

    public $randomSlotArea = [
        [0, 3, 7, 2],
        [0, 8, 2, 5],
        [8, 5, 6, 1],
        [0, 6, 3, 2],
    ];

    public $scatter = false;
    public $wild = 8;

    public $lines = [
        [0,0,0,0],
        [0,0,0,1],
        [0,0,0,2],
        [0,0,1,0],
        [0,0,1,1],
        [0,0,1,2],
        [0,0,2,0],
        [0,0,2,1],
        [0,0,2,2],
        [0,1,0,0],
        [0,1,0,1],
        [0,1,0,2],
        [0,1,1,0],
        [0,1,1,1],
        [0,1,1,2],
        [0,1,2,0],
        [0,1,2,1],
        [0,1,2,2],
        [0,2,0,0],
        [0,2,0,1],
        [0,2,0,2],
        [0,2,1,0],
        [0,2,1,1],
        [0,2,1,2],
        [0,2,2,0],
        [0,2,2,1],
        [0,2,2,2],
        [1,0,0,0],
        [1,0,0,1],
        [1,0,0,2],
        [1,0,1,0],
        [1,0,1,1],
        [1,0,1,2],
        [1,0,2,0],
        [1,0,2,1],
        [1,0,2,2],
        [1,1,0,0],
        [1,1,0,1],
        [1,1,0,2],
        [1,1,1,0],
        [1,1,1,1],
        [1,1,1,2],
        [1,1,2,0],
        [1,1,2,1],
        [1,1,2,2],
        [1,2,0,0],
        [1,2,0,1],
        [1,2,0,2],
        [1,2,1,0],
        [1,2,1,1],
        [1,2,1,2],
        [1,2,2,0],
        [1,2,2,1],
        [1,2,2,2],
        [2,0,0,0],
        [2,0,0,1],
        [2,0,0,2],
        [2,0,1,0],
        [2,0,1,1],
        [2,0,1,2],
        [2,0,2,0],
        [2,0,2,1],
        [2,0,2,2],
        [2,1,0,0],
        [2,1,0,1],
        [2,1,0,2],
        [2,1,1,0],
        [2,1,1,1],
        [2,1,1,2],
        [2,1,2,0],
        [2,1,2,1],
        [2,1,2,2],
        [2,2,0,0],
        [2,2,0,1],
        [2,2,0,2],
        [2,2,1,0],
        [2,2,1,1],
        [2,2,1,2],
        [2,2,2,0],
        [2,2,2,1],
        [2,2,2,2]
    ];

}