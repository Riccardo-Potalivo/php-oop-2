<?php

include __DIR__ . '/../Traits/PrintCard.php';

class Product
{
    use PrintCard;

    public string $price;

    public function __construct($price)
    {
        $this->price = $price;

    }

}

?>