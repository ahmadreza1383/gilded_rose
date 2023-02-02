<?php

namespace src\Products;

use src\Products\Product;

class Normal extends Product
{
    public function perSellIn()
    {
        return $this->quality->decrementQuality();

    }

    public function handleAfterSellIn()
    {
        return $this->quality->decrementQuality();
    }
}
