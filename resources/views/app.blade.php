@extends('layouts.layout')
@section('og-tags')
    <!-- Open Graph -->
    <meta property="og:url" content="{{url('/')}}/{{$app->is_news === 1?'new':'post'}}/{{$app->alias}}" />
    <meta property="og:type" content="{{$app->is_news === 1 ? 'NewsArticle' : 'Article'}}" />
    <meta property="og:title" content="{{$app->title}}" />
    <meta property="og:description" content="{{$app->description}}" />
    <meta property="og:image" content="{{url('/')}}/storage/{{$app->img}}" />
    <meta property="og:image:alt" content="{{$app->title}}" />
    <meta property="article:published_time" content="{{$app->created_at}}" />
    <!-- End Open Graph -->
@endsection

@section('main')
    <div class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
{{--            {{$app->is_news === 1?Breadcrumbs::render('new',$app):Breadcrumbs::render('post',$app) }}--}}
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <article class="col-sm-8 mb-3" itemscope itemtype="{{$app->is_news === 1 ? 'http://schema.org/NewsArticle' : 'http://schema.org/Article'}}">
                <header>
                    <h1 itemprop="headline">{{$app->name}}</h1>
                    {!!"<p><time itemprop=\"datePublished\" datetime=\"".$app->created_at."\">".$app->publicDate()."</time></p>"!!}
                    <p><a href="{{ route('app.link', ['hash'=>$app->hashed_link]) }}" target="_blank">{{ $app->link_title }}</a></p>

                </header>
                <div itemprop="articleBody">
                    {!! $app->content !!}
                </div>
                <p><a href="{{ route('app.link', ['hash'=>$app->hashed_link]) }}" target="_blank">{{ $app->link_title }}</a></p>
            @if ($app && count($app->tags))
                <div>Теги:
                    @foreach($app->tags as $tag)
                        <a class="pl-1" href="/app_tag/{{$tag->alias}}"><span style="font-size: 1em;" class="badge badge-primary">{{$tag->name}}</span></a>
                    @endforeach
                </div>
            @endif
            </article>
{{--            <div class="col-sm-8">--}}
{{--            </div>--}}
            <div class="container border-top my-4 mt-3">
                <div class="pt-4">
                    @include('blocks.comment_form')
                </div>
            </div>
        </div>
        </div>

    </div>
@endsection
@section('title')
{{$app->title}}
@endsection
@section('description')
    <meta name="description" content="{{$app->description}}"/>
@endsection
