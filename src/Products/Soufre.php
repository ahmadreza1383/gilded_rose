<?php

namespace src\Products;

use src\SellIn;

class Soufre
{
    public $quality;

    public SellIn $sellIn;

    public function __construct($quality=null, $sellIn=null)
    {
        $this->quality = $quality;
        $this->sellIn = new SellIn($sellIn);
    }

    public function perSellIn()
    {
        return $this->quality;
    }

    public function handleAfterSellIn()
    {
        $this->sellIn->getSellIn();
        return $this->quality;
    }

    public function getSellIn()
    {
        return $this->sellIn->getSellIn(false);
    }
}