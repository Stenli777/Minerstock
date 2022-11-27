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
})->name('home');
Route::resource('/alg',\App\Http\Controllers\AlgorythmController::class);
Route::resource('/coin',\App\Http\Controllers\CoinController::class);
Route::resource('/asic',\App\Http\Controllers\AsicController::class)->middleware([\App\Http\Middleware\Breadcrumbs::class])->names('asic');

Route::get('/login',function(){return view('auth.login');})->name('login');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'authenticate']);
Route::get('/catalog', function (Illuminate\Http\Request $request) {
    $asics = \App\Models\Asic::with('producer');
    if ($request->input('producer_id')) {
        $asics = $asics->where('producer_id',$request->input('producer_id'));
    }
    if ($request->input('coin')) {
        $asics = $asics->whereHas('coins',function($query) use($request){
            return $query->whereIn('id',$request->input('coin'));
        });
//        dd($asics);
    }
//    if ($request->input('producer_id')) {
//        $asics = $asics->where(['producer_id',$request->input('min'],['producer_id',$request->input('max']));
//    }
//    var_dump($request->input('coin'));
    return view('catalog',['asics'=>$asics->paginate(12)->withQueryString()]);
})->name('catalog');
Route::get('/coins', function () {
    return view('coins',['coins'=>\App\Models\Coin::with('algorythm')->where('coin_active',true)->paginate(12)]);
});

