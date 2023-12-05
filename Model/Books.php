<?php

class Books
{
    private int $id;
    private string $title;
    private string $thumbnailUrl;
    public function __construct($id, $title, $img)
    {
        $this->_id = $id;
        $this->title = $title;
        $this->thumbnailUrl = $img;

    }

    public function printCArd()
    {
        $img = $this->thumbnailUrl;
        $title = $this->title;

        include __DIR__ . "/../Views/cardBook.php";
    }
}

$booksDb = file_get_contents(__DIR__ . '/books_db.json');
$booksList = json_decode($booksDb, true);
$books = [];

foreach ($booksList as $book) {

    $books[] = new Books($book['_id'], $book['title'], $book['thumbnailUrl']);
    // var_dump($randgenres);
}


?>