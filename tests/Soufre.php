<?php

namespace tests;

use tests\TestBase;

class Soufre extends TestBase
{
    public function up()
    {
        $item = $this->gildedRose('گوگرد', 10, 5);
        $item->tick();

        assert($item->getQuality() == 10, 'updates Soufre items before the sell date');
        assert($item->getSellIn() == 5, 'updates Soufre items before the sell date');

        $item = $this->gildedRose('گوگرد', 10, 5);
        $item->tick();
        assert($item->getQuality() == 10, 'updates Soufre items on the sell date');
        assert($item->getSellIn() == 5, 'updates Soufre items on the sell date');



        $item = $this->gildedRose('گوگرد', 10, -1);
        $item->tick();
        assert($item->getQuality() == 10, 'updates Soufre items after the sell date');
        assert($item->getSellIn() == -1, 'updates Soufre items after the sell date');

    }
}



