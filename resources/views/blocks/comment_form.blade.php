    <h2>Оставить комментарий</h2>
    <form class="pb-3" action="{{\URL::current()}}/comment" method="POST">
        @csrf
{{--        <div class="form-group">--}}
{{--            <label for="name">Имя:</label>--}}
{{--            <input type="text" class="form-control" name="email" id="email" placeholder="Введите ваше имя" required>--}}
{{--        </div>--}}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Введите ваш email" required>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий:</label>
            <textarea class="form-control" name="content" id="comment" rows="5" placeholder="Введите ваш комментарий" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
