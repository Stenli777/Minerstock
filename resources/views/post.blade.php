@extends('layouts.layout')
@section('main')
    <div class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{$post->is_news === 1?Breadcrumbs::render('new',$post):Breadcrumbs::render('post',$post) }}
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <article class="col-sm-8" itemscope itemtype="{{$post->is_news === 1 ? 'http://schema.org/NewsArticle' : 'http://schema.org/Article'}}">
                <header>
                    <h1 itemprop="headline">{{$post->title}}</h1>
                    {!!$post->is_news === 1 ? "<p><time itemprop=\"datePublished\" datetime=\"".$post->created_at."\">".$post->publicDate()."</time></p>": ''!!}
                </header>
                <div itemprop="articleBody">
                    {!! $post->content !!}
                </div>
                {!! $post->is_news === 1 ? '' : "<p>Категория: <a href=\"/category/{$post->category->alias}\"><span itemprop=\"articleSection\">" . $post->category->title . '</span></a></p>' !!}
            </article>
        </div>
    </div>

@endsection
@section('title')
    {{$post->title}}
@endsection
@section('description')
    <meta name="description" content="{{$post->description}}"/>
@endsection
