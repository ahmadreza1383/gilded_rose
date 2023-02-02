<?php

namespace src;

class Quality
{

    private $quality;

    private $maxQualtily = 50;

    public function __construct($quality)
    {
        $this->quality = $quality;
    }

    public function increamentQuality()
    {
        if ($this->quality < $this->maxQualtily) 
        return $this->quality = $this->quality + 1;
        
        return $this->quality;
    }
    public function decrementQuality()
    {
        if ($this->quality > 0) {
            return $this->quality = $this->quality - 1;
        }

        return $this->quality;
    }

    public function getQuality()
    {
        return $this->quality;
    }
}
