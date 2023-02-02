<?php

namespace src\Products;

class Soufre
{
    public $quality;

    public function __construct($quality=null)
    {
        $this->quality = $quality;
    }

    public function perSellIn()
    {
        return $this->quality;
    }

    public function handleAfterSellIn()
    {
        return $this->quality;
    }
}