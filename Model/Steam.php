<?php

include __DIR__ . '/Product.php';
class Steam extends Product
{
    private int $id;
    // private string $name;
    private string $img_icon_url;
    public function __construct($id, $title, $icon, $price)
    {
        parent::__construct($price);
        $this->appid = $id;
        $this->name = $title;
        $this->img_icon_url = $icon;

    }

    public function printCArd()
    {
        $img = $this->appid;
        $title = $this->name;
        $icon = $this->img_icon_url;
        $price = $this->price;

        include __DIR__ . "/../Views/cardGame.php";
    }

    public static function fetchAll()
    {

        $gamesDb = file_get_contents(__DIR__ . '/steam_db.json');
        $gamesList = json_decode($gamesDb, true);
        $games = [];

        foreach ($gamesList as $game) {
            $image = 'https://cdn.cloudflare.steamstatic.com/steam/apps/' . $game['appid'] . '/header.jpg';
            $icon = 'https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/apps/' . $game['appid'] . '/' . $game['img_icon_url'] . '.jpg';
            $price = rand(1, 50) . '€';

            $games[] = new Steam($image, $game['name'], $icon, $price);
            // var_dump($randgenres);
        }

        return $games;
    }


}



?>