<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',['asics'=>\App\Models\Asic::with('producer')->paginate(4)]);
});
Route::resource('/alg',\App\Http\Controllers\AlgorythmController::class);
Route::resource('/coin',\App\Http\Controllers\CoinController::class);
Route::resource('/asic',\App\Http\Controllers\AsicController::class);

Route::get('/login',function(){return view('auth.login');})->name('login');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'authenticate']);
Route::get('/catalog', function () {
    return view('catalog',['asics'=>\App\Models\Asic::with('producer')->paginate(12)]);
});
Route::get('/coins', function () {
    return view('coins',['coins'=>\App\Models\Coin::with('algorythm')->paginate(12)]);
});
