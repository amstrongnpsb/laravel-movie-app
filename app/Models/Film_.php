<?php

namespace App\Models;


class Film_
{
    private static $data_film = [
        [
            "title" => "Transformers: The Last Knight",
            "sinopsis" => "A deadly threat from Earth's history reappears and a hunt for a lost artifact takes place between Autobots and Decepticons, while Optimus Prime encounters his creator in space.",
            "director" => "Michael Bay",
            "stars" => ["Mark Wahlberg", "Anthony Hopkins", "Josh Duhamel"],
            "slugs" => "transformer-the-last-knight",
            "image" => "Transformers_The_Last_Knight"
        ],
        [
            "title" => "Thor: Ragnarok",
            "sinopsis" => "Imprisoned on the planet Sakaar, Thor must race against time to return to Asgard and stop Ragnarök, the destruction of his world, at the hands of the powerful and ruthless villain Hela.",
            "director" => "Taika Waititi",
            "stars" => ["Chris Hemsworth", "Tom Hiddleston", "Cate Blanchett"],
            "slugs" => "thor-ragnarok",
            "image" => "thor-ragnarok"
        ]
    ];

    public static function getDataFilm()
    {
        // self:: mengembalikan data karna static kalau biasa bisa paka $this->
        // return self::$data_film;
        return collect(self::$data_film);
    }
    public static function getDetailFilm($slug)
    {
        // $films = self::$data_film;
        // $detail_film = [];
        // foreach ($films as $film) {
        //     if ($film['slugs'] === $slug) {
        //         $detail_film = $film;
        //     }
        // }
        // return $detail_film;

        //vers2
        $films = static::getDataFilm();
        return $films->firstWhere('slugs', $slug);
    }
}
