<?php
namespace App\Classes;

use Illuminate\Support\Facades\Http;

class locationAPI
{
    public static function coordsToCity($geolat, $geolng)
    {
        $url = 'https://us1.locationiq.com/v1/reverse.php?key=' . env('LOCATIONIQ_ACCESS_TOKEN') .'&lat=' . $geolat . '&lon=' . $geolng . '&format=json';
        $city = Http::get($url)->json();
        $city = $city['address']['town'];

        return $city;
    }
}
