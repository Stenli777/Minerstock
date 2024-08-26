
<div class="row">
    <h3 class="mb-3">Комментарии</h3>
</div>
<div class="average-rating">
    <br>
    <label>Средняя оценка:</label>
    <div class="stars" id="average-stars">
        <!-- Звезды будут вставляться через JavaScript -->
    </div>
</div>
<div class="row">
        @if(count($comments)!=0)
            <div class="comments pb-3 col-md-9">
                <ul class="list-unstyled">
                    @foreach($comments as $comment)
                        <li>
                            <div class="comment mb-3 card" itemscope itemtype="https://schema.org/Comment">
                                <div class="card-body">
                                {{--                        <meta itemprop="url" content="/" />--}}
                                <div class="comment-meta d-flex justify-content-between">
                                    <div itemprop="author" itemscope itemtype="https://schema.org/Person">
                                        <span class="h5 bold" itemprop="name">{{$comment->nickname}}</span>
                                    </div>
                                    <time itemprop="datePublished" datetime="{{$comment->created_at}}">{{date_format($comment->created_at,'d.m.Y')}}</time>
                                    {{--                            <h4 class="comment-author">{{$comment->nickname}}</h4>--}}
                                    {{--                            <span class="comment-date">{{date_format($comment->created_at,'d.m.Y')}}</span>--}}
                                </div>
                                <p class="card-text mt-2">{{$comment->content}}</p>
                                {{--                        <div itemprop="about" itemscope itemtype="https://schema.org/CreativeWork">--}}
                                {{--                            <meta itemprop="url" content="https://example.com/post/1" />--}}
                                {{--                            <span style="display:none" itemprop="name">Название статьи, к которой относится комментарий</span>--}}
                                {{--                        </div>--}}
                                {{--                        <div itemprop="commentCount">5</div>--}}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
    @else
        <div class="col-md-9">
            <h5 class="pt-2">Тут пока  нет комментария, но вы можете стать первым, кто его оставит</h5>
        </div>
        @endif

        <div class="col-md-3">
            <div class="border p-2">
                <h4>Поделиться мнением</h4>
                <p>Присоединяйтесь к дискуссии о популярном оборудовании для майнинга, мы ценим ваши комментарии</p>
                <div class="text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Оставить комментарий
            </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Модальное окно -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Оставить комментарий</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="pb-3" action="{{\URL::current()}}/comment" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nickname">Имя:</label>
                            <input type="text" class="form-control" name="nickname" id="email" placeholder="Введите ваше имя" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Введите ваш email" required>
                        </div>
                        <!-- Рейтинг в виде звезд -->
                        <div class="form-group">
                            <label for="rating">Оценка:</label>
                            <div class="star-rating">
                                <span data-value="1">&#9733;</span>
                                <span data-value="2">&#9733;</span>
                                <span data-value="3">&#9733;</span>
                                <span data-value="4">&#9733;</span>
                                <span data-value="5">&#9733;</span>
                            </div>
                            <!-- Поле скрытого ввода для отправки рейтинга -->
                            <input type="hidden" name="rating" id="rating-value" value="0">
                        </div>
                        <div class="form-group">
                            <label for="comment">Комментарий:</label>
                            <textarea class="form-control" name="content" id="comment" rows="5" placeholder="Введите ваш комментарий" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star-rating span');
        const ratingInput = document.getElementById('rating-value');
        const commentField = document.getElementById('comment');

        stars.forEach(star => {
            star.addEventListener('mouseover', function () {
                resetStars();
                const rating = this.getAttribute('data-value');
                highlightStars(rating);
            });

            star.addEventListener('mouseout', function () {
                resetStars();
                highlightStars(ratingInput.value);
            });

            star.addEventListener('click', function () {
                const rating = this.getAttribute('data-value');
                ratingInput.value = rating;
                highlightStars(rating);

                if (rating > 0) {
                    commentField.removeAttribute('required');
                } else {
                    commentField.setAttribute('required', 'required');
                }
            });
        });

        function highlightStars(rating) {
            stars.forEach(star => {
                if (star.getAttribute('data-value') <= rating) {
                    star.classList.add('selected');
                }
            });
        }

        function resetStars() {
            stars.forEach(star => {
                star.classList.remove('selected');
            });
        }
    });


        document.addEventListener('DOMContentLoaded', function () {
            const averageRating = {{ $avgRating??0 }};  // Получаем среднюю оценку из контроллера
            const starContainer = document.getElementById('average-stars');

            // Рассчитываем количество полных, половинчатых и пустых звезд
            const fullStars = Math.floor(averageRating);
            const halfStar = averageRating % 1 >= 0.5 ? 1 : 0;
            const emptyStars = 5 - fullStars - halfStar;
            // Добавляем полные звезды
            for (let i = 0; i < fullStars; i++) {
                const star = document.createElement('span');
                star.classList.add('star', 'full');
                star.innerHTML = '&#9733;';  // Золотая звезда
                starContainer.appendChild(star);
            }

            // Добавляем половину звезды, если нужно
            if (halfStar) {
                const halfStarElem = document.createElement('span');
                halfStarElem.classList.add('star', 'half');
                halfStarElem.innerHTML = '&#9733;';  // Символ звезды
                starContainer.appendChild(halfStarElem);
            }

            // Добавляем пустые звезды
            for (let i = 0; i < emptyStars; i++) {
                const star = document.createElement('span');
                star.classList.add('star', 'empty');
                star.innerHTML = '&#9733;';  // Символ звезды
                starContainer.appendChild(star);
            }
        });

</script>
