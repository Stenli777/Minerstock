<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css"/>
    <link rel="shortcut icon" href="/images/uploads/favicon.ico" type="image/x-icon">
@yield('og-tags')
    @yield('canonical')
<title>@if($_SERVER['REQUEST_URI'] ==='/')
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
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/91418378" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9DFCFMXT7B"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-9DFCFMXT7B');
    </script>
    <!-- /Google tag (gtag.js) -->
    <!-- /Yandex.Webmaster -->
    <meta name="yandex-verification" content="cc8b91a0430ae765"/>
    <!-- /Yandex.Webmaster counter -->
    <!-- /Google Search Console -->
    <meta name="google-site-verification" content="ppfx7H1OhSoHhzenMvF1KfciycWVevBOdkZvcyKXDss"/>
    <!-- /Google Search Console -->
</head>
<body class="antialiased {{$_SERVER['REQUEST_URI'] === '/'?"main-page":""}}">
@include('parts.header')

@yield('main')

@include('parts.footer')
<!-- Форма консультации -->
<div class="modal fade" id="sendConsultation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <form>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Заявка на получение консультации</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Введите ваше имя</label>
                        <input type="text" required class="form-control" id="exampleInputName1" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Введите ваш телефон</label>
                        <input type="tel" required class="form-control" id="exampleInputPhone"
                               aria-describedby="phoneHelp" placeholder="Телефон">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Введите ваш e-mail</label>
                        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                               placeholder="Введите email">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck">
                        <label class="form-check-label" for="exampleCheck1">Я согласен с условиями пользовательского
                            согласшения</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="/js/jquery-3.6.1.min.js"></script>
<script src="/js/bootstrap.bundle.js"></script>
<script src="extensions/mobile/bootstrap-table-mobile.js"></script>
<script src="/js/app.js"></script>
</body>
</html>
