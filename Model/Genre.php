<?php
class Genre
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

$genreDb = file_get_contents(__DIR__ . "/genre_db.json");
$genreList = json_decode($genreDb, true);

$genres = [];

foreach ($genreList as $genre) {
    $genres[] = new Genre($genre);
}


?>