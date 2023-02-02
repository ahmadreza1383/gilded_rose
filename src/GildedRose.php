<?php
namespace src;

class GildedRose
{
    public $name;

    private $quality;

    private $sellIn;


    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function getSellIn()
    {
        return $this->sellIn;
    }

    public function tick()
    {
        $map = [
            'ترشی' => "src\Products\Torshi",
            'گوگرد' => "src\Products\Soufre",
            'عادی' => "src\Products\Normal",
            'بلیت هواپیما' => "src\Products\Ticket",
        ];
        
        $class = $map[$this->name];
        $class = new $class($this->quality, $this->sellIn);      
        $this->quality = $class->perSellIn();  

        if ($this->name != 'گوگرد') {
            $this->sellIn = $this->sellIn - 1;
        }

        if ($this->sellIn >= 0) {
            return ;
        }

        $this->quality = $class->handleAfterSellIn(); 

    }
}