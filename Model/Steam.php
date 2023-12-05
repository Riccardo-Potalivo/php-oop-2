<?php

class Steam
{
    private int $id;
    private string $name;
    private string $img_icon_url;
    public function __construct($id, $title, $icon)
    {
        $this->appid = $id;
        $this->name = $title;
        $this->img_icon_url = $icon;

    }

    public function printCArd()
    {
        $img = $this->appid;
        $title = $this->name;
        $icon = $this->img_icon_url;

        include __DIR__ . "/../Views/cardGame.php";
    }
}

$gamesDb = file_get_contents(__DIR__ . '/steam_db.json');
$gamesList = json_decode($gamesDb, true);
$games = [];

foreach ($gamesList as $game) {
    $image = 'https://cdn.cloudflare.steamstatic.com/steam/apps/' . $game['appid'] . '/header.jpg';
    $icon = 'https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/apps/' . $game['appid'] . '/' . $game['img_icon_url'] . '.jpg';
    // https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/apps/240/9052fa60c496a1c03383b27687ec50f4bf0f0e10.jpg
    $games[] = new Steam($image, $game['name'], $icon);
    // var_dump($randgenres);
}


?>