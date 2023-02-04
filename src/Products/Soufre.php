<?php

namespace src\Products;

use src\Interface\Product as InterfaceProduct;

class Soufre extends Product implements InterfaceProduct
{
    public function perSellIn()
    {
        return $this->quality->getQuality();
    }

    public function handleAfterSellIn()
    {
        $this->sellIn->getSellIn();
        return $this->quality->getQuality();
    }

    public function getSellIn()
    {
        return $this->sellIn->getSellIn(false);
    }
}