<?php
namespace tests;

use src\GildedRose;

class TestBase
{
    /**
     * 
     * @param string $name product name 
     * @param integer $quality Sales value
     * @param integer $sellIn The number of days left until the sale deadline
     */
    public static function gildedRose($name, $quality, $sellIn):object
    {
        return new GildedRose($name, $quality, $sellIn);
    }
}