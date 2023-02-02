<?php

namespace src;

class SellIn
{
    private int $sellIn;

    public function __construct($sellIn)
    {
        $this->sellIn = $sellIn;
    }

    /**
     * @param boolean $timeStatus Reduce the time remaining for the sales deadline
     */
    public function getSellIn($timeStatus=true)
    {
        return $this->calcTime($timeStatus);
    }

    private function calcTime($status)
    {
        if($status)
        return $this->sellIn - 1 ;

        return $this->sellIn;
    }
}