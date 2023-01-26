{{--Навигационное меню--}}
<header class="header">
    <div class="container">
        <div class="row header__body">
            <div class="col-3 d-flex align-items-center">
                <a href="/">
                    <img src="/images/uploads/logo.png">
                </a>
            </div>
            <div class="col-6 text-center">
                <ul class="nav justify-content-left" style="height:100%">
                    <li class="nav-item">
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
                    <li class="nav-item">
                        <a class="nav-link" href="/news">Новости</a>
                    </li>
                    {{--                <li class="nav-item">--}}
                    {{--                    <a class="nav-link disabled" href="#">Майнинг отели</a>--}}
                    {{--                </li>--}}
                </ul>
            </div>
            <div class="col-3 d-flex justify-content-end">
                <button type="button" class="btn btn-primary btn-sm badge-pill p-2" data-toggle="modal"
                        data-target="#sendConsultation">
                    Необходима консультация?
                </button>
            </div>
        </div>
    </div>
</header>


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
