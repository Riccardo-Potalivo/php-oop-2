<?php

class Steam
{
    private int $id;
    private string $name;
    public function __construct($id, $title)
    {
        $this->appid = $id;
        $this->name = $title;

    }

    public function printCArd()
    {
        $img = $this->appid;
        $title = $this->name;

        include __DIR__ . "/../Views/cardGame.php";
    }
}

$gamesDb = file_get_contents(__DIR__ . '/steam_db.json');
$gamesList = json_decode($gamesDb, true);
$games = [];

foreach ($gamesList as $game) {
    $image = 'https://cdn.cloudflare.steamstatic.com/steam/apps/' . $game['appid'] . '/header.jpg';
    $games[] = new Steam($image, $game['name']);
    // var_dump($randgenres);
}


?>