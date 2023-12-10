<?php
trait PrintCard
{
    public function printCard($item)
    {
        extract($item);

        include __DIR__ . "/../Views/card.php";
    }
}

?>