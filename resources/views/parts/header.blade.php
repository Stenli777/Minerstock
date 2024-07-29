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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="usefulDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Полезное
                        </a>
                        <div class="dropdown-menu" aria-labelledby="usefulDropdown">
                            <a class="dropdown-item" href="/articles">Статьи</a>
                            <a class="dropdown-item" href="/news">Новости</a>
                            <a class="dropdown-item" href="/mining-pools">Майнинг пулы</a>
                            <a class="dropdown-item" href="/cryptowiki">Криптословарь</a>
                            <a class="dropdown-item disabled" href="#">Персоны</a>
                        </div>
                    </li>
                </ul>
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
                    <a class="nav-link" href="/mining-pools">Майнинг пулы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cryptowiki">Криптословарь</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/articles">Статьи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news">Новости</a>
                </li>

            </ul>
        </div>
    </div>

</header>


