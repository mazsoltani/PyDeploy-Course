<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('home');
});


Route::get('/api', [ApiController::class, 'index'])->name('Api.index');
Route::post('/fruit', [ApiController::class, 'fruit'])->name('fruit');
Route::post('/number', [ApiController::class, 'number'])->name('number');
Route::get('/quran', [ApiController::class, 'quran'])->name('quran');
Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/weather', [WeatherController::class, 'search'])->name('weather.search');