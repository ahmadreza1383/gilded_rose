<?php
namespace src\Interface;

interface Product
{
    public function perSellIn();

    public function handleAfterSellIn();
    
    public function getSellIn();   
}