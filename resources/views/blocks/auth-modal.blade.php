<!-- Модальное окно авторизации -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Вход</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="loginEmail">Электронная почта</label>
                        <input type="email" class="form-control" id="loginEmail" placeholder="Введите email">
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Пароль</label>
                        <input type="password" class="form-control" id="loginPassword" placeholder="Пароль">
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Запомнить меня</label>
                        </div>
                        <button type="button" class="pt-0 btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#passwordResetModal">Забыли пароль?</button>
                    </div>
                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно регистрации -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Регистрация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="registerName">Логин</label>
                        <input type="text" class="form-control" id="registerName" placeholder="Введите логин">
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Электронная почта</label>
                        <input type="email" class="form-control" id="registerEmail" placeholder="Введите email">
                    </div>
                    <div class="form-group">
                        <label for="registerPassword">Пароль</label>
                        <input type="password" class="form-control" id="registerPassword" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <label for="registerPasswordConfirm">Подтверждение пароля</label>
                        <input type="password" class="form-control" id="registerPasswordConfirm" placeholder="Подтвердите пароль">
                    </div>
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно восстановления пароля -->
<div class="modal fade" id="passwordResetModal" tabindex="-1" role="dialog" aria-labelledby="passwordResetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordResetModalLabel">Восстановление пароля</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="resetEmail">Электронная почта</label>
                        <input type="email" class="form-control" id="resetEmail" placeholder="Введите email">
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить ссылку для сброса пароля</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Вернуться к входу</button>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно предложения улучшения -->
<div class="modal fade" id="improvementModal" tabindex="-1" role="dialog" aria-labelledby="improvementModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="improvementModalLabel">Предложить улучшение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="userName">Ваше имя</label>
                        <input type="text" class="form-control" id="userName" placeholder="Введите ваше имя">
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Ваш Email</label>
                        <input type="email" class="form-control" id="userEmail" placeholder="Введите ваш email">
                    </div>
                    <div class="form-group">
                        <label for="improvementText">Предложение или замечание</label>
                        <textarea class="form-control" id="improvementText" rows="3" placeholder="Опишите ваше предложение или замечание"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>

