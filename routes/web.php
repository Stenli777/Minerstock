<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Главная
Route::get('/', function () {
    return view('home',
        [
            'asics' => \App\Models\Asic::with('producer')
                ->limit(8)
                ->orderByDesc('order')
                ->get(),
            'posts' => \App\Models\Post::with('category')
                ->where('is_news', 0)
                ->limit(4)
                ->orderByDesc('created_at')
                ->get(),
            'news' => \App\Models\Post::with('category')
                ->where('is_news', 1)
                ->limit(4)
                ->orderByDesc('created_at')
                ->get()
        ]);
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
    $asics = \App\Models\Asic::with('producer')
        ->orderByDesc('order');

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
        $asics = $asics->where('hashrate', '>',
            $request->input('hashrate_min') * pow(10, $request->input('hashrate_power')));
    }
    if ($request->input('hashrate_max')) {
        $asics = $asics->where('hashrate', '<',
            $request->input('hashrate_max') * pow(10, $request->input('hashrate_power')));
    }
//    if ($request->input('producer_id')) {
//        $asics = $asics->where(['producer_id',$request->input('min'],['producer_id',$request->input('max']));
//    }
//    var_dump($request->input('coin'));
    return view('catalog', ['asics' => $asics->paginate(12),
        'tabsAsics' => $asics->paginate(12)->withQueryString(),
    'tableAsics' => $asics->paginate(50)->withQueryString()
        ->withQueryString(), 'request' => $request]);
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

Route::get('/articles', function () {
    return view('blog', [
        'posts' => \App\Models\Post::all()
            ->where('is_news', 0)
            ->sortByDesc('created_at'),
        'news' => \App\Models\Post::query()
            ->where('is_news', 1)
            ->orderByDesc('created_at')
            ->limit(4)
            ->get(),
        'categories' => \App\Models\Category::all(),
    ]);
})->name('blog');

Route::get('/news', function () {
    return view('news', [
        'posts' => \App\Models\Post::query()
            ->where('is_news', 0)
            ->orderByDesc('created_at')
            ->limit(4)
            ->get(),
        'news' => \App\Models\Post::all()
            ->where('is_news', 1)
            ->sortByDesc('created_at'),
        'categories' => \App\Models\Category::all(),
    ]);
})->name('news');

Route::get('/category/{alias}', function ($alias) {
    $category = \App\Models\Category::query()
        ->where(['alias' => $alias])->first();
    return view('category', [
        'category' => $category,
        'posts' => \App\Models\Post::all()
            ->where('category_id', $category->id)
            ->sortByDesc('created_at')
    ]);
})->name('category');

Route::resource('/post',
    \App\Http\Controllers\PostController::class)
    ->middleware([\App\Http\Middleware\Breadcrumbs::class])
    ->names('post');

Route::resource('/new',
    \App\Http\Controllers\PostController::class)
    ->middleware([\App\Http\Middleware\Breadcrumbs::class])
    ->names('new');

Route::get('/link/{id_internal_link}', [\App\Http\Controllers\PartnerLinkController::class, 'show']);

Route::post('/api/gerwin/callback', [\App\Http\Controllers\GerwinController::class, 'callback']);

Route::post('/{entity}/{alias}/comment', [\App\Http\Controllers\CommentController::class, 'create']);
Route::get('/{entity}/{alias}/comment', [\App\Http\Controllers\CommentController::class, 'show']);

//Route::get('/asic', function($asic){
//    return redirect()->route('asic', [$asic->alias]);
//});


Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'sendContactForm'])->name('contact.submit');
Route::get('/contact/success', function () {
    return view('contact-success');
})->name('contact.success');
