<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});

// Home > Catalog
Breadcrumbs::for('catalog', function ($trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog'));
});

// Home > Catalog > [Asic]
Breadcrumbs::for('asic', function ($trail, $asic) {
    $trail->parent('catalog');
    $trail->push($asic->title, route('asic.show', $asic->id));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Статьи', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category',$category->alias));
});

// Home > Blog > Category > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $category = $post->category;
    $trail->parent('category', $category);
    $trail->push($post->title, route('post.show', $post->alias));
});

// Home > News
Breadcrumbs::for('news', function ($trail) {
    $trail->parent('home');
    $trail->push('Новости', route('news'));
});

// home > News > [New]
Breadcrumbs::for('new', function ($trail, $post) {
    $trail->parent('news');
    $trail->push($post->title, route('post.show', $post->alias));
});

Breadcrumbs::for('apps', function ($trail) {
    $trail->parent('home');
    $trail->push('Приложения', route('apps'));
});

Breadcrumbs::for('app', function ($trail, $app) {
    $trail->parent('apps');
    $trail->push($app->name, route('app.show', ['app' => $app->alias]));
});

Breadcrumbs::for('app_category', function ($trail, $category) {
    $trail->parent('apps');
    $trail->push($category->title, route('app.category', ['alias' => $category->alias]));
});
// Home > Blog > [Tag]
Breadcrumbs::for('tag', function ($trail, $tag) {
    $trail->parent('blog');
    $trail->push('Тег: '.$tag->name, route('tag',$tag->alias));
});
// Home > MiningPools
Breadcrumbs::for('mining-pools', function ($trail) {
    $trail->parent('home');
    $trail->push('Майнинг пулы', route('mining-pools'));
});
// home > MiningPools > [MiningPool]
Breadcrumbs::for('mining-pool', function ($trail, $pool) {
    $trail->parent('mining-pools');
    $trail->push($pool->title, route('post.show', $pool->alias));
});

// Home > Catalog
Breadcrumbs::for('privacy', function ($trail) {
    $trail->parent('home');
    $trail->push('Политика конфиденциальности', route('privacy'));
});

// Home > Cryptowiki
Breadcrumbs::for('cryptowiki', function ($trail) {
    $trail->parent('home');
    $trail->push('Криптословарь', route('cryptowiki'));
});

// Home > Calculator
Breadcrumbs::for('calculator', function ($trail) {
    $trail->parent('home');
    $trail->push('Калькулятор Intelion Data Systems', route('calculator'));
});


Breadcrumbs::for('hotels', function ($trail) {
    $trail->parent('home');
    $trail->push('Майнинг-отели', route('hotels'));
});

Breadcrumbs::for('hotels.show', function ($trail, $hotel) {
    $trail->parent('hotels');
    $trail->push('Отель '.$hotel->name, route('hotels.show', route('hotels.show', ['alias' => $hotel->alias])));
});
