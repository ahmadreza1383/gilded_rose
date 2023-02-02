<?php
namespace tests;

use src\GildedRose;

class TestBase
{
    public static function gildedRose($name, $quality, $sellIn):object
    {
        return new GildedRose($name, $quality, $sellIn);
    }
}