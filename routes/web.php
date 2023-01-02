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

//Авторизация
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate']);

//Главная
Route::get('/', function () {
    return view('home', ['asics' => \App\Models\Asic::with('producer')->limit(8)->orderByDesc('order')->get()]);
})->name('home');

//Карточка алгоритма
Route::resource('/alg', \App\Http\Controllers\AlgorythmController::class);

//Карточка монеты
Route::resource('/coin', \App\Http\Controllers\CoinController::class);

//Карточка асика
Route::resource('/asic',
    \App\Http\Controllers\AsicController::class)->middleware([\App\Http\Middleware\Breadcrumbs::class])->names('asic');

//Каталог асиков
Route::get('/catalog', function (Illuminate\Http\Request $request) {
    $asics = \App\Models\Asic::with('producer')->orderByDesc('order');
    if ($request->input('producer_id')) {
        $asics = $asics->where('producer_id', $request->input('producer_id'));
    }
    if ($request->input('coin')) {
        $asics = $asics->whereHas('coins', function ($query) use ($request) {
            return $query->whereIn('id', $request->input('coin'));
        });
//        dd($asics);
    }
    if ($request->input('title_search')) {
        $asics = $asics->where('title', 'like', "%{$request->input('title_search')}%");
    }
    if ($request->input('hashrate_min')) {
        $asics = $asics->where('hashrate', '>', $request->input('hashrate_min') * pow(10, $request->input('hashrate_power')));
    }
    if ($request->input('hashrate_max')) {
        $asics = $asics->where('hashrate', '<', $request->input('hashrate_max') * pow(10, $request->input('hashrate_power')));
    }
//    if ($request->input('producer_id')) {
//        $asics = $asics->where(['producer_id',$request->input('min'],['producer_id',$request->input('max']));
//    }
//    var_dump($request->input('coin'));
    return view('catalog', ['asics' => $asics->paginate(12)->withQueryString(), 'request' => $request]);
})->name('catalog');

//Каталог монет
Route::get('/coins', function () {
    return view('coins', ['coins' => \App\Models\Coin::with('algorythm')->where('coin_active', true)->paginate(36)]);
});

//Каталог майнинг компаний
Route::get('/mining-company', function () {
    return view('mining-company', ['mining-companies' => \App\Models\Company::all()]);
});
//Карточка компании
Route::resource('/company', \App\Models\Company::class);

//Карточка офиса
Route::resource('/office', \App\Models\Office::class);

//Карточка майнинг-центра
Route::resource('/mining-center', \App\Models\Dpc::class);

//Блог
//Route::group([], function () {
//Route::get('/articles','BlogController');
//});

Route::get('/articles', function () {
    return view('blog',['posts' => \App\Models\Post::all()->sortByDesc('created_at'), 'categories' => \App\Models\Category::all(),]);
})->name('blog');

Route::get('/category/{alias}', function ($alias) {
    $category = \App\Models\Category::query()->where(['alias'=>$alias])->first();
    return view('category',[
        'category' => $category,
        'posts' => \App\Models\Post::all()->where('category_id', $category->id)->sortByDesc('created_at')]);
})->name('category');

//Route::resource('/category',
//    \App\Http\Controllers\CategoryController::class)->middleware([\App\Http\Middleware\Breadcrumbs::class])->names('category');


Route::resource('/post',
    \App\Http\Controllers\PostController::class)
    ->middleware([\App\Http\Middleware\Breadcrumbs::class])
    ->names('post');

Route::post('/api/gerwin/callback', [\App\Http\Controllers\GerwinController::class, 'callback']);

//Route::get('/asic', function($asic){
//    return redirect()->route('asic', [$asic->alias]);
//});
