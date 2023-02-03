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
        $this->sellIn = $class->getSellIn();

        if ($this->sellIn >= 0) {
            return ;
        }

        $this->quality = $class->handleAfterSellIn(); 

    }
}

// class SellIn
// {
//     private int $sellIn;

//     public function __construct($sellIn)
//     {
//         $this->sellIn = $sellIn;
//     }

//     /**
//      * @param boolean $timeStatus Reduce the time remaining for the sales deadline
//      */
//     public function getSellIn($timeStatus=true)
//     {
//         return $this->calcTime($timeStatus);
//     }

//     private function calcTime($status)
//     {
//         if($status)
//         return $this->sellIn - 1 ;

//         return $this->sellIn;
//     }

// }