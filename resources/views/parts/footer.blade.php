<footer class="text-light">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-9">
                <h3>Телеграм чат - покупка или продажа майнинг оборудование</h3>
            </div>
            <div class="col-md-3 text-md-right">
                <a href="https://t.me/miningstoreads" class="btn btn-primary mr-4 p-2 pl-4 pr-4 align-self-center">
                    Подписаться
                </a>
            </div>
        </div>
        <div class="border-top">
        <div class="row mt-5">
            <div class="col-md-3 mb-4 mb-md-0">
                <a href="/"><img src="/images/uploads/logo.png" class="img-fluid mb-3" alt="Логотип" ></a>
                <p class="UltraLight pt-2 lightGrey">Портал посвященный криптовалютам, майнингу и высоким технологиям.</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h3 class="mb-3">Карта сайта</h3>
                <ul class="list-unstyled">
                    <li>
                        <a href="/catalog" class="lightGrey UltraLight">Майнеры</a>
                    </li>
                    <li>
                        <a href="/coins" class="lightGrey UltraLight">Монеты</a>
                    </li>
                    <li>
                        <a href="/articles" class="lightGrey UltraLight">Статьи</a>
                    </li>
                    <li>
                        <a href="/news" class="lightGrey UltraLight">Новости</a>
                    </li>
                    <li>
                        <a href="/mining-pools" class="lightGrey UltraLight">Майнинг пулы</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h3 class="mb-3">Контакты</h3>
                <ul>
                    <li>
                        <p class="text-muted">Телефон: <a href="tel:+79817639661" class="UltraLight lightGrey">+7 (981)
                                763-96-61</a></p>
                    </li>
                    <li><p class="text-muted">E-mail: <a href="mailto:info@mineinfo.ru" class="UltraLight lightGrey">info@mineinfo.ru</a>
                        </p></li>
                    <li><p class="text-muted">Адрес: <span class="UltraLight lightGrey">Россия, Москва</span></p></li>
                </ul>
                <a data-toggle="modal" data-target="#privacyModal">
                    Политика конфиденциальности
                </a>
                <!-- Modal -->
                <div class="modal fade" id="privacyModal" tabindex="-1" role="dialog" aria-labelledby="privacyModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:60%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title pl-3" id="privacyModalLabel">Политика конфиденциальности</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="p-3">
                                    @include('parts.privacy_text')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <h3 class="mb-3">Дополнительно</h3>
                <button type="button" class="btn btn-primary p-2 pl-4 pr-4 align-self-center" data-toggle="modal" data-target="#improvementModal">
                    Предложить улучшение
                </button>
            </div>
        </div>
        </div>
    </div>
    <div class="bg-secondary mt-3 py-3">
        <div class="container text-center">
            <p class="m-0 copyright text-center UltraLight">©Топ майнинг отелей. Вся информация на сайте размещена исключительно в ознакомительных целях. Все
                изображения на сайте принадлежат их правообладателям.
            </p>
        </div>
    </div>
    <!-- Модальные окна -->
    @extends('blocks.auth-modal')

</footer>

