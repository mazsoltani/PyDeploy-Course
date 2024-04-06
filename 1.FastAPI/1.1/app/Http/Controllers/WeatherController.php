<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{

    public function index()
    {
        // نمایش صفحه weather.blade.php بدون داده‌های جستجو
        return view('weather');
    }

    // پردازش فرم جستجو و نمایش نتایج
    public function search(Request $request)
    {
        $city = $request->input('city');
        $response = Http::get("https://goweather.herokuapp.com/weather/{$city}");
        $weatherData = $response->json();

        // ارسال داده‌های جستجو و نتایج به صفحه weather.blade.php
        return view('weather', ['weatherData' => $weatherData, 'city' => $city]);
    }



}
