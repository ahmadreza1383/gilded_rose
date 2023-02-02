<?php

namespace src\Products;

use src\Interface\Product as InterfaceProduct;
use src\Products\Product;

class Torshi extends Product implements InterfaceProduct
{
    public function perSellIn()
    {
        return $this->quality->increamentQuality();
    }

    public function handleAfterSellIn()
    {
        return $this->quality->increamentQuality();
    }

    public function getSellIn()
    {
        return $this->sellIn->getSellIn();
    }
}