@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('tag',$tag) }}
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 pl-5">

                <h2 class="mb-3">Категории</h2>
                @foreach($categories as $category)
                    <a href="/category/{{$category->alias}}">
                        <button type="button" class="btn btn-light container-fluid text-left mb-2">{{$category->title}}</button>
                    </a>
                @endforeach
                <h2 class="mt-3 mb-3">Теги</h2>
                @foreach($tags as $tag)
                    <a href="/tag/{{$tag->alias}}">
                        <button type="button" class="btn btn-light container-fluid text-left mb-2">{{$tag->name}}</button>
                    </a>
                @endforeach
            </div>
            <div class="col-md-8">
                <h2 class="mb-3">Записи по тегу: {{$tag->name}}</h2>
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4">
                            @include('blocks.article')
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col-md-2">
                    <h2 class="mb-3">Новости</h2>
                    @foreach($news as $post)
                        <div class="col p-0">
                            @include('blocks.sidebar_article')
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
@stop
