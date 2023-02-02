<?php

namespace src\Products;

use src\Interface\Product as InterfaceProduct;
use src\Products\Product;

class Normal extends Product implements InterfaceProduct
{
    public function perSellIn()
    {
        return $this->quality->decrementQuality();
    }

    public function handleAfterSellIn()
    {
        return $this->quality->decrementQuality();
    }

    public function getSellIn()
    {
        return $this->sellIn->getSellIn();
    }
}
