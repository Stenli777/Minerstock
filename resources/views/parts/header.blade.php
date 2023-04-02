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
            @if(Auth::user())
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="loginDropdown" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="loginDropdown">
                        <a class="dropdown-item" href="/profile">Профиль</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" id="logout_item" href="#">Выйти</a>
                        <script>
                            let logout_item = document.getElementById('logout_item');
                            logout_item.addEventListener('click', (e) => {
                                e.preventDefault();
                                fetch('/logout').then(() => {
                                    window.location.reload();
                                });
                            });
                        </script>

                    </div>
                </div>
        </div>
        @else
            <div class="col-3 d-flex justify-content-end">
                <button type="button" class="btn btn-primary btn-sm badge-pill mr-2" data-toggle="modal"
                        data-target="#loginModal">
                    Войти
                </button>
                <button type="button" class="btn btn-primary btn-sm badge-pill" data-toggle="modal"
                        data-target="#registerModal">
                    Регистрация
                </button>
            </div>
        @endif
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobileMenu"
                        aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"
                          style="background-image: url('/images/uploads/hamburger-icon.png');"></span>
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
                <li class="nav-item pb-2">
                    <button type="button" class="btn btn-primary btn-sm badge-pill mr-2" data-toggle="modal"
                            data-target="#loginModal">
                        Войти
                    </button>
                    <button type="button" class="btn btn-primary btn-sm badge-pill" data-toggle="modal"
                            data-target="#registerModal">
                        Регистрация
                    </button>
                </li>
            </ul>
        </div>
    </div>

</header>


