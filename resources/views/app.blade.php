
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

    <!-- Подключение CSS Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- Подключение CSS темы Owl Carousel (опционально) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

@endsection

@section('main')
{{--    <div class="container-fluid" style="background-color: #e9ecef">--}}
{{--        <div class="container">--}}
{{--            {{$app->is_news === 1?Breadcrumbs::render('new',$app):Breadcrumbs::render('post',$app) }}--}}
{{--        </div>--}}
{{--    </div>--}}
<div class="container">
    <div class="row justify-content-center">
        <article class="col-sm-8 mb-3" itemscope itemtype="{{$app->is_news === 1 ? 'http://schema.org/NewsArticle' : 'http://schema.org/Article'}}">
            <header>
                <h1 itemprop="headline">{{$app->name}}</h1>
                {!!"<p><time itemprop=\"datePublished\" datetime=\"".$app->created_at."\">".$app->publicDate()."</time></p>"!!}
                <p><a href="{{ route('app.link', ['hash'=>$app->hashed_link]) }}" target="_blank">{{ $app->link_title }}</a></p>
            </header>
        </article>
    </div>
</div>

@if(is_array(json_decode($app->mobile_images)))
    <div class="image-gallery" id="mobileImagesGallery">
        @foreach(json_decode($app->mobile_images) as $imageName)
            <div class="image-item">
                <img src="{{ asset('storage/' . $imageName) }}" alt="Image">
            </div>
        @endforeach
    </div>
@endif


    <div class="container">
        <div class="row justify-content-center">
            <article class="col-sm-8 mb-3" itemscope itemtype="{{$app->is_news === 1 ? 'http://schema.org/NewsArticle' : 'http://schema.org/Article'}}">
                <div itemprop="articleBody">
                    {!! $app->content !!}


                </div>
                <p><a href="{{ route('app.link', ['hash'=>$app->hashed_link]) }}" target="_blank">{{ $app->link_title }}</a></p>

                @if(!empty($app->links))
                <p>
                    <h4>Ссылки:</h4>
                    {!! $app->links !!}
                </p>
                    @endif
                @if(!empty($app->lang))
                    <p>
                    <h4>Язык:</h4>
                    {!! $app->lang !!}
                    </p>
                @endif

                <!-- Yandex.RTB R-A-2404949-14 -->
                <div id="yandex_rtb_R-A-2404949-14" class="mb-4"></div>
                <script>
                    window.yaContextCb.push(() => {
                        Ya.Context.AdvManager.render({
                            "blockId": "R-A-2404949-14",
                            "renderTo": "yandex_rtb_R-A-2404949-14"
                        })
                    })
                </script>

            @if ($app && count($app->tags))
                <div>Теги:
                    @foreach($app->tags as $tag)
                        <a class="pl-1" href="/app_tag/{{$tag->alias}}"><span style="font-size: 1em;" class="badge badge-primary">{{$tag->name}}</span></a>
                    @endforeach
                </div>
            @endif
                @if ($app && count($app->blockchains))
                    <div class="mt-4">Блокчейны:
                        @foreach($app->blockchains as $blockchain)
                            <span style="font-size: 1em;" class="badge badge-secondary">{{$blockchain->name}}</span>
                        @endforeach
                    </div>
                @endif
                @if ($app && is_array(json_decode($app->platforms)))
                    <div class="mt-4">Платформы:
                        @foreach(json_decode($app->platforms) as $platform)
                            <span style="font-size: 1em;" class="badge badge-success">{{$platform}}</span>
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

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        jQuery.noConflict();

        jQuery(document).ready(function($){
            $('#mobileImagesCarousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                responsive:{
                    0:{
                        items:1 // На маленьких экранах
                    },
                    576:{
                        items:2 // От 576px
                    },
                    768:{
                        items:3 // От 768px
                    },
                    992:{
                        items:4 // От 992px
                    },
                    1200:{
                        items:5 // От 1200px и выше
                    }
                }
            });
        });
    </script>
@endsection

@section('title')
{{$app->title}}
@endsection
@section('description')
    <meta name="description" content="{{$app->description}}"/>
@endsection
