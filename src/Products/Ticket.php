<?php

namespace src\Products;

class Ticket extends Product
{

    public function perSellIn()
    {
        $quality = $this->quality->increamentQuality();

        if ($this->sellIn < 11) {
            $quality = $this->quality->increamentQuality();
        }
        if ($this->sellIn < 6) {
            $quality = $this->quality->increamentQuality();
        }

        return $quality;
    }

    public function handleAfterSellIn()
    {
        return 0;
    }
}