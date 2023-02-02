<?php

namespace src\Products;

use src\Quality;
use src\SellIn;

class Product
{
    public $quality;

    public $sellIn;

    public function __construct($quality=null, $sellIn=null)
    {
        $this->quality = new Quality($quality);
        $this->sellIn = new SellIn($sellIn);
    }
}