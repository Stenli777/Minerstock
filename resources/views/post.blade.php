@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{$post->is_news === 1?Breadcrumbs::render('new',$post):Breadcrumbs::render('post',$post) }}
        </div>
    </nav>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-8" itemscope
                 itemtype="{{$post->is_news === 1 ? 'http://schema.org/NewsArticle' : 'http://schema.org/Article'}}">
                <div itemprop="articleBody">
                    <h1>{{$post->title}}</h1>
                    {!!$post->is_news === 1 ? "<p>".date('d.m.Y',$post->create_at)."</p>": ''!!}
                    <p></p>
                    {!! $post->content !!}
                </div>
                {!! $post->is_news === 1 ? '' : "<p>Категория: <a href=\"/category/{$post->category->alias}\" itemprop=\"articleSection\">" . $post->category->title . '</a></p>' !!}
            </div>
        </div>
    </div>
@endsection
@section('title')
    {{$post->title}}
@endsection
@section('description')
    <meta name="description" content="{{$post->description}}"/>
@endsection
