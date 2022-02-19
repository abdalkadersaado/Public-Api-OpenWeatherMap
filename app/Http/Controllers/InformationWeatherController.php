<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InformationWeatherController extends Controller
{

    public function apiWeather(Request $request)
    {

        $city_name = $request->city;

        $api_key = config('apiWeather.app_id');

        $weather_data = Http::get('https://api.openweathermap.org/data/2.5/weather?q=' . $city_name . '&appid=' . $api_key);

        $temperature = $weather_data['main']['temp'];
        $temperature_in_celsius = round($temperature - 273.15);

        $temperature_current_weather = $weather_data['weather'][0]['main'];
        $temperature_current_weather_description = $weather_data['weather'][0]['description'];
        $temperature_current_weather_icon = $weather_data['weather'][0]['icon'];

        return response()->json([
            'data' => [
                'temperature' => $temperature_in_celsius,
                'temperature_in_celsius' => $temperature_in_celsius,
                'temperature_current_weather' => $temperature_current_weather,
                'temperature_current_weather_description' => $temperature_current_weather_description,
                'temperature_current_weather_icon' => $temperature_current_weather_icon,
            ],
            'message' => 'data successful',
            'status' => true
        ]);
    }
}
