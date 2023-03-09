@extends('layouts.layout')
@section('og-tags')
    <!-- Open Graph -->
    <meta property="og:url" content="{{url('/')}}/{{$post->is_news === 1?'new':'post'}}/{{$post->alias}}" />
    <meta property="og:type" content="{{$post->is_news === 1 ? 'NewsArticle' : 'Article'}}" />
    <meta property="og:title" content="{{$post->title}}" />
    <meta property="og:description" content="{{$post->description}}" />
    <meta property="og:image" content="{{url('/')}}/storage/{{$post->img}}" />
    <meta property="og:image:alt" content="{{$post->title}}" />
    <meta property="article:published_time" content="{{$post->created_at}}" />
    {!!$post->is_news === 1 ? '' : "<meta property=\"article:section\" content=\"{$post->category->alias}\" />" !!}
    <!-- End Open Graph -->
@endsection

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
