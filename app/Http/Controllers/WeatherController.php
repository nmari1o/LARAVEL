<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;


class WeatherController extends Controller
{
    //

    public function getWeather($city)
{
    $apiKey = 'fa24d9a2ece140338840d654aa454e4f';
    $this->city=$city;

    $client = new Client();
    $response = $client->get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey");

    $weatherData = json_decode($response->getBody());

    // Dohvati temperaturu u Fahrenheitima iz API-ja
    $temperatureFahrenheit = $weatherData->main->temp;

    // Konvertiraj temperaturu iz Fahrenheit u Celzijus
    $temperatureCelsius = ($temperatureFahrenheit - 32) * 5/9;

    // Dodaj temperaturu u Celzijusima u weatherData objekt
    $weatherData->main->temp = $temperatureCelsius;

    // Vrati view 'weather' i proslijedi mu podatke o vremenskoj prognozi (weatherData)
    return view('weather', compact('weatherData'));
}

}
