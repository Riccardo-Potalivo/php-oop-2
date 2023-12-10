<?php

include __DIR__ . '/../Traits/PrintCard.php';

class Product
{
    use PrintCard;

    public int $discount = 0;

    public string $price;


    public function __construct($price)
    {
        $this->price = $price;
    }

    public function setDiscount(int $p)
    {
        if ($p < 1) {
            throw new Exception('prova');
        } else {
            $this->discount = $p;
        }
    }

    public function getDiscount()
    {
        return $this->discount;
    }

}

?>