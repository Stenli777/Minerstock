@extends('layouts.layout')
@section('main')
    {{ Breadcrumbs::render('blog') }}
<div class="container-fluid">
    <div class="row">
    <div class="col-md-2">

            <h2>Категории</h2>
            @foreach($categories as $category)
                <div>
                    <a href="/category/{{$category->alias}}"><div class="card-body">{{$category->title}}</div></a>
                </div>
            @endforeach

    </div>
<div class="col-md-8">
        <h2>Блоговые записи</h2>
    <div class="row">
    @foreach($posts as $post)
        <div class="col-4">
            <div class="card mb-3" style="border-radius: 0">
                <div class="text-center" style="min-height: 200px;">
                    <img class="card-img" src="/{{$post->img ? $post->img : "images/uploads/asics/placeholder.png"}}" alt="изображение {{$post->title}}">
                </div>
                <div class="card-body pt-0">
            <a href="/post/{{$post->alias}}">{{$post->title}}</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>

</div>
    <div class="col-md-3">

    </div>
    </div>
    </div>
@stop
