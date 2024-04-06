<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        return view('api');
    }

public function fruit(Request $request)
{
    $fruit = $request->input('fruit');
    $response = Http::get("https://www.fruityvice.com/api/fruit/{$fruit}");
    $fruitData = $response->json();
    return view('api', ['fruitData' => $fruitData, 'fruit' => $fruit]);
}

public function number(Request $request)
{
    $number = $request->input('number');
    $response = Http::get("http://numbersapi.com/{$number}");
    $numberData = $response->body();
    return view('api', ['numberData' => $numberData, 'number' => $number]);
}



public function quran(Request $request)
{
    $response = Http::get("http://api.alquran.cloud/v1/surah");
    $quranData = $response->json();
    return view('api', ['quranData' => $quranData]);
}


}
