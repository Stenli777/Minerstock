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

// Home > Blog
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category',$category->alias));
});

// Home > Blog > [Category] > [Post]
//Breadcrumbs::for('post', function ($trail, $post) {
//    $trail->parent('blog', $post->category_id);
//    $trail->push($post->title, route('post.show', $post->id));
//});
Breadcrumbs::for('post', function ($trail, $post) {
    $category = $post->category;
    $trail->parent('category', $category);
    $trail->push($post->title, route('post.show', $post->alias));
});

