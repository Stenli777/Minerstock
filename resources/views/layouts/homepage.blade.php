<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>

    <title>Laravel</title>
    <style>
    </style>
</head>
<body class="antialiased">
{{--Навигационное меню--}}
<div class="container-fluid" style="background: rgb(0,32,76);background: linear-gradient(90deg, rgba(0, 32, 76, 0.1) 0%, rgba(168, 72, 56, 0.1) 29.72%, rgba(9, 22, 40, 0.1) 89.54%, rgba(0, 32, 76, 0.1) 100%);">
    <div class="row d-flex align-content-center" style="height:96px">
        <div class="col-4">
            <ul class="nav justify-content-left" style="height:100%">
                <li class="nav-item" >
                    <a class="nav-link active" href="http://minerstock.ru/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://minerstock.ru/catalog">Майнеры</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://minerstock.ru/coins">Монеты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Майнинг отели</a>
                </li>
            </ul>
        </div>
        <div class="col-4 text-center">
            <h4>Mine Info - справочник по майнерам</h4>
        </div>
        <div class="col-4 d-flex flex-row-reverse">
            <button type="button" class="btn btn-primary btn-sm badge-pill p-2 ">Необходима консультация?</button>
        </div>
    </div>
</div>
@yield('main')
    <footer style="background-color: #131A2A; color:#ffffff">

        <div class="container pt-8">
        <div class="row">
            <div class="col-3">
                <h2>Mine Info</h2>
                <p>Рейтинг майнинг отелей формируется на основе независимых оценок майнеров и агентов. Перед размещением в дешёвых майнинг отелях рекомендуем ознакомиться с отзывами, условиями и стоимостью из нашего каталога отелей для майнинга.</p>
            </div>
            <div class="col-3">
                <h2>Карта сайта</h2>
            </div>
            <div class="col-3">
                <h2>Контакты</h2>
            </div>
            <div class="col-3">
                <h2>Наши новости</h2>
            </div>
        </div>
    </div>

    </footer>
</blockquote>
</body>
</html>
