<?php

namespace tests\Units;

use tests\TestBase;

class Normal extends TestBase
{
    private string $product = 'عادی';

    public function The_sale_date_is_valid()
    {
        $item = $this->gildedRose($this->product, 10, 5); 
        $item->tick();
        assert($item->getQuality() == 9, 'updates normal items before sell date');
        assert($item->getSellIn() == 4, 'updates normal items before sell date');
    }

    public function The_sell_by_date_has_expired()
    {
        $item = $this->gildedRose($this->product, 10, 0);
        $item->tick();
        assert($item->getQuality() == 8 , 'updates normal items on the sell date');
        assert($item->getSellIn() == -1 , 'updates normal items on the sell date');
    }

    public function after_the_expiration_of_the_sale_date()
    {
        $item = $this->gildedRose($this->product, 10, -5);
        $item->tick();
        assert($item->getQuality() == 8, 'updates normal items after the sell date');
        assert($item->getSellIn() == -6, 'updates normal items after the sell date');
    }

    public function without_quality()
    {
        $item = $this->gildedRose($this->product, 0, 5);
        $item->tick();
        assert($item->getQuality() == 0, 'updates normal items with a quality of 0');
        assert($item->getSellIn() == 4 , 'updates normal items with a quality of 0');
    }
}



