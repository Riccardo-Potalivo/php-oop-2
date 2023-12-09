<?php

include __DIR__ . '/Product.php';

class Books extends Product
{
    private int $id;
    private string $title;
    private string $thumbnailUrl;
    public function __construct($id, $title, $img, $price)
    {
        parent::__construct($price);
        $this->_id = $id;
        $this->title = $title;
        $this->thumbnailUrl = $img;

    }

    public function printCArd()
    {
        $img = $this->thumbnailUrl;
        $title = $this->title;
        $price = $this->price;

        include __DIR__ . "/../Views/cardBook.php";
    }
    public static function fetchAll()
    {

        $booksDb = file_get_contents(__DIR__ . '/books_db.json');
        $booksList = json_decode($booksDb, true);
        $books = [];

        foreach ($booksList as $book) {
            $price = rand(1, 50) . '€';

            $books[] = new Books($book['_id'], $book['title'], $book['thumbnailUrl'], $price);
            // var_dump($randgenres);
        }

        return $books;
    }
}




?>