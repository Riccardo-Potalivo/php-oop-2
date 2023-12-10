<?php
include __DIR__ . '/Product.php';

class Movie extends Product
{
    private int $id;
    private string $title;
    private string $poster_path;
    private string $overview;
    private string $vote_average;
    private string $original_language;
    public Genre $genre;
    function __construct($id, $title, $img, $overview, $vote, $lang, $genre, $price)
    {
        parent::__construct($price);
        $this->id = $id;
        $this->title = $title;
        $this->poster_path = $img;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->original_language = $lang;
        $this->genre = $genre;

    }
    public function getVote()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($n = 1; $n <= 5; $n++) {
            $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= '</p>';
        return $template;
    }
    public function formatCard()
    {

        if (ceil($this->vote_average) < 8) {
            try {
                $this->setDiscount(10 - $this->vote_average);
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        }

        $cardItem = [
            'error' => $error ?? '',
            'discount' => $this->getDiscount(),
            'img' => $this->poster_path,
            'title' => $this->title,
            'lang' => $this->original_language,
            'overview' => $this->overview,
            'vote' => $this->getVote(),
            'genre' => $this->genre->name,
            'price' => $this->price,
        ];

        return $cardItem;
    }

    public static function fetchAll()
    {
        include __DIR__ . '/Genre.php';

        $movieDb = file_get_contents(__DIR__ . '/movie_db.json');
        $movieList = json_decode($movieDb, true);
        $movies = [];

        foreach ($movieList as $movie) {

            $index = [rand(0, count($genres) - 1)];
            $rand_genre = $genres[$index[0]];
            $price = rand(1, 50) . '€';

            $movies[] = new Movie($movie['id'], $movie['title'], $movie['poster_path'], $movie['overview'], $movie['vote_average'], $movie['original_language'], $rand_genre, $price);
            // var_dump($randgenres)\;
        }

        return $movies;
    }

}





// var_dump($movies[1]);
// var_dump($genres);


?>