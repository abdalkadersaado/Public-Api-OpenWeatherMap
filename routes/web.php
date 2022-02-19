<?php

use App\Http\Controllers\InformationWeatherController;
use Illuminate\Support\Facades\Route;



######## to select view page
Route::get('/', function () {
    return view('indexWeather');
});
############ Api to select the data weather by city
Route::get('/apiWeather', [InformationWeatherController::class, 'apiWeather'])
    ->name('apiweather');
