<?php

namespace src\Products;

use src\Interface\Product as InterfaceProduct;
use src\Products\Product;

class Ticket extends Product implements InterfaceProduct
{

    public function perSellIn()
    {
        $quality = $this->quality->increamentQuality();

        if ($this->sellIn->getSellIn(false) < 11) 
        $quality = $this->quality->increamentQuality();
        
        if ($this->sellIn->getSellIn(false) < 6) 
        $quality = $this->quality->increamentQuality();
        
        return $quality;
    }

    public function handleAfterSellIn()
    {
        return 0;
    }

    public function getSellIn()
    {
        return $this->sellIn->getSellIn();
    }
}