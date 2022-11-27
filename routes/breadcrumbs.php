<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});

//// Home > About
//Breadcrumbs::for('about', function ($trail) {
//    $trail->parent('home');
//    $trail->push('About', route('about'));
//});

// Home > Blog
Breadcrumbs::for('catalog', function ($trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('asic', function ($trail, $asic) {
    $trail->parent('catalog');
    $trail->push($asic->title, route('asic.show', $asic->id));
});

//// Home > Blog > [Category] > [Post]
//Breadcrumbs::for('post', function ($trail, $post) {
//    $trail->parent('category', $post->category);
//    $trail->push($post->title, route('post', $post->id));
//});
