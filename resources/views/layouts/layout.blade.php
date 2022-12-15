<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/style-font.css" />
    <link rel="shortcut icon" href="/images/uploads/favicon.ico" type="image/x-icon">
    @yield('canonical')
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script src="extensions/mobile/bootstrap-table-mobile.js"></script>
    <title>
    @if($_SERVER['REQUEST_URI'] ==='/')
MineInfo - подробный справочник по ASIC майнерам. Добыча, характеристики и другая информация.
@else
    @yield('title')
@endif
    </title>
    @yield('description')
    <style>
    </style>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(91418378, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/91418378" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <!-- /Yandex.Webmaster -->
    <meta name="yandex-verification" content="cc8b91a0430ae765" />
    <!-- /Yandex.Webmaster counter -->
    <!-- /Google Search Console -->
    <meta name="google-site-verification" content="ppfx7H1OhSoHhzenMvF1KfciycWVevBOdkZvcyKXDss" />
    <!-- /Google Search Console -->
</head>
<body class="antialiased {{$_SERVER['REQUEST_URI'] === '/'?"main-page":""}}">
{{--Навигационное меню--}}
<div class="container-fluid top-menu">
    <div class="row d-flex align-content-center" style="height:96px">
        <div class="col-4 text-center">
            <img src="{{ $_SERVER['REQUEST_URI'] ==='/'?'/images/uploads/logo.png':'/images/uploads/logo-black.png'}}">
        </div>
        <div class="col-4 text-center">
            <ul class="nav justify-content-left" style="height:100%">
                <li class="nav-item" >
                    <a class="nav-link active" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/catalog">Майнеры</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/coins">Монеты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/articles">Статьи</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link disabled" href="#">Майнинг отели</a>--}}
{{--                </li>--}}
            </ul>
        </div>
        <div class="col-4 d-flex flex-row-reverse">
            <button type="button" class="btn btn-primary btn-sm badge-pill p-2 ">Необходима консультация?</button>
        </div>
    </div>
</div>

{{--<ol class="breadcrumb">--}}
{{--    <li><i class="fa fa-dashboard"></i>Главная</li>--}}
{{--    <?php $segments = ''; ?>--}}
{{--    @foreach($request->breadcrums as $segment)--}}
{{--        <?php $segments .= '/'. $segment; ?>--}}
{{--        <li>--}}
{{--            <a href="{{ $segments }}">{{$segment}}</a>--}}
{{--        </li>--}}
{{--    @endforeach--}}
{{--</ol>--}}

@yield('main')
    <footer class="pt-5" style="background-color: #131A2A; color:#ffffff">

        <div class="container">
            <p class="pb-0 pt-5">Подпишитесь</p>
            <div class="row pb-5" style="border-bottom: 0.2px solid #FFFFFF;">
                <div class="col-6">
                <h3>Телеграм чат - здесь можно купить или продать майнинг оборудование</h3>
                </div>
                <div class="col-6 text-center">
                    <a href="https://t.me/miningstoreads">
                        <button type="button" class="btn btn-footer btn-primary btn-sm badge-pill pt-2 pb-2 pl-5 pr-5">Подписаться</button>
                    </a>
                </div>
            </div>
        <div class="row pt-5">
            <div class="col-3">
                <img src="/images/uploads/logo.png" style="margin-bottom: 0.5rem;">
                <p class="UltraLight pt-4 lightGrey">Рейтинг майнинг отелей формируется на основе независимых оценок майнеров и агентов. Перед размещением в дешёвых майнинг отелях рекомендуем ознакомиться с отзывами, условиями и стоимостью из нашего каталога отелей для майнинга.</p>
            </div>
            <div class="col-3">
                <h3 class="pb-3">Карта сайта</h3>
                <a href="/" class="lightGrey UltraLight"><p>Главная</p></a>
                <a href="/catalog" class="lightGrey UltraLight"><p>Майнеры</p></a>
                <a href="/coins" class="lightGrey UltraLight"><p>Монеты</p></a>
                <a href="/articles" class="lightGrey UltraLight"><p>Статьи</p></a>
            </div>
            <div class="col-3">
                <h3 class="pb-3">Контакты</h3>
                <p>Телефон: <a href="tel:+79817639661" class="UltraLight lightGrey">+7 (981) 763-96-61</a></p>
                <p>E-mail: <a href="mailto:info@mineinfo.ru" class="UltraLight lightGrey">info@mineinfo.ru</a></p>
                <p>Адрес: <span class="UltraLight lightGrey">Россия, Москва</span></p>
            </div>
            <div class="col-3">
                <h3 class="pb-3">Наши новости</h3>

            </div>
        </div>
            <div class="row text-center">
                <div class="col-4"></div>
                <div class="col-8 float-right">
                <p class="lightGrey UltraLight">©Топ майнинг отелей. Вся информация на сайте размещена исключительно в ознакомительных целях. Все изображения на сайте принадлежат их правообладателям.</p>
                </div>
            </div>
    </div>

    </footer>
</blockquote>
</body>
</html>
