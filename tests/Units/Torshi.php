<?php

namespace tests\Units;

use tests\TestBase;

class Torshi extends TestBase
{
    public function up()
    {
        $item = $this->gildedRose('ترشی', 10, 5);

        $item->tick();
        assert($item->getQuality() == 11, 'updates Brie items before the sell date');
        assert($item->getSellIn() == 4, 'updates Brie items before the sell date');

        $item = $this->gildedRose('ترشی', 50, 5);

        $item->tick();

        assert($item->getQuality() == 50, 'updates Brie items before the sell date with maximum quality');
        assert($item->getSellIn() == 4, 'updates Brie items before the sell date with maximum quality');

        $item = $this->gildedRose('ترشی', 10, 0);

        $item->tick();

        assert($item->getQuality() == 12, 'updates Brie items on the sell date');
        assert($item->getSellIn() == -1, 'updates Brie items on the sell date');

        $item = $this->gildedRose('ترشی', 49, 0);

        $item->tick();

        assert($item->getQuality() == 50, 'updates Brie items on the sell date, near maximum quality');
        assert($item->getSellIn() == -1, 'updates Brie items on the sell date, near maximum quality');

        $item = $this->gildedRose('ترشی', 50, 0);

        $item->tick();

        assert($item->getQuality() == 50, 'updates Brie items on the sell date with maximum quality');
        assert($item->getSellIn() == -1, 'updates Brie items on the sell date with maximum quality');

        $item = $this->gildedRose('ترشی', 10, -10);

        $item->tick();

        assert($item->getQuality() == 12, 'updates Brie items after the sell date');
        assert($item->getSellIn() == -11, 'updates Brie items after the sell date');

        $item = $this->gildedRose('ترشی', 50, -10);

        $item->tick();

        assert($item->getQuality() == 50, 'updates Briem items after the sell date with maximum quality');
        assert($item->getSellIn() == -11, 'updates Briem items after the sell date with maximum quality');
    }
}

