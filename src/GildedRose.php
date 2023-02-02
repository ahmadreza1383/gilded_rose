<?php
namespace src;

class GildedRose
{
    public $name;

    private $quality;

    private $sellIn;

    /**
     * 
     * @param string $name product name 
     * @param integer $quality Sales value
     * @param integer $sellIn The number of days left until the sale deadline
     */
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

    private function map($name)
    {
        return[
            'ترشی' => "src\Products\Torshi",
            'گوگرد' => "src\Products\Soufre",
            'عادی' => "src\Products\Normal",
            'بلیت هواپیما' => "src\Products\Ticket",
        ][$name];
    }

    public function tick()
    {
        $class = $this->map($this->name);

        $class = new $class($this->quality, $this->sellIn); 

        $this->quality = $class->perSellIn(); 
        $this->sellIn = $class->getSellIn();

        if ($this->sellIn < 0) 
        $this->quality = $class->handleAfterSellIn(); 
    }
}