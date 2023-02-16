{{--Навигационное меню--}}
<header class="header">
    <!-- Desktop Menu -->
    <div class="container d-none d-lg-block">
        <div class="row header__body">
            <div class="col-3 d-flex align-items-center">
                <a href="/">
                    <img src="/images/uploads/logo.png">
                </a>
            </div>
            <div class="col-6 text-center">
                <ul class="nav justify-content-left" style="height:100%">
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

    <!-- Mobile Menu -->
    <div class="container d-lg-none">
        <div class="row header__body">
            <div class="col-3 d-flex align-items-center">
                <a href="/">
                    <img src="/images/uploads/logo.png">
                </a>
            </div>
            <div class="col-9 d-flex justify-content-end align-items-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="background-image: url('/images/uploads/hamburger-icon.png');"></span>
                </button>
            </div>
        </div>
        <div class="collapse" id="mobileMenu">
            <ul class="nav flex-column text-center" style="">
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
                <li class="nav-item">
                    <button type="button" class="btn btn-primary btn-sm badge-pill p-2 my-3" data-toggle="modal"
                            data-target="#sendConsultation">
                        Необходима консультация?
                    </button>
                </li>
            </ul>
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
