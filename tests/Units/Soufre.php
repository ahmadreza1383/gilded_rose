<?php

namespace tests\Units;

use tests\TestBase;

class Soufre extends TestBase
{
    private string $product = 'گوگرد';

    public function The_sale_date_is_valid()
    {
        $item = $this->gildedRose($this->product, 10, 5);
        $item->tick();
        
        assert($item->getQuality() == 10, 'updates Soufre items before the sell date');
        assert($item->getSellIn() == 5, 'updates Soufre items before the sell date');
    }

    public function after_the_expiration_of_the_sale_date()
    {
        $item = $this->gildedRose($this->product, 10, -1);
        $item->tick();
        assert($item->getQuality() == 10, 'updates Soufre items after the sell date');
        assert($item->getSellIn() == -1, 'updates Soufre items after the sell date');
    }

    public function without_quality_and_date_sale_expirate()
    {
        $item = $this->gildedRose($this->product, 0, 0);
        $item->tick();
        assert($item->getQuality() == 0, 'updates Soufre items after the sell date');
        assert($item->getSellIn() == 0, 'updates Soufre items after the sell date');
    }
}



