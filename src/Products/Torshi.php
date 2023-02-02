<?php

namespace src\Products;

class Torshi extends Product
{
    public function perSellIn()
    {
        return $this->quality->increamentQuality();
    }

    public function handleAfterSellIn()
    {
        return $this->quality->increamentQuality();
    }
}