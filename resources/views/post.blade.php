@extends('layouts.layout')
@section('og-tags')
    <!-- Open Graph -->
    <meta property="og:url" content="{{url('/')}}/{{$post->is_news === 1?'new':'post'}}/{{$post->alias}}" />
    <meta property="og:type" content="{{$post->is_news === 1 ? 'NewsArticle' : 'Article'}}" />
    <meta property="og:title" content="{{$post->title}}" />
    <meta property="og:description" content="{{$post->description}}" />
    <meta property="og:image" content="{{url('/')}}/storage/{{$post->img}}" />
    <meta property="og:image:alt" content="{{$post->title}}" />
    <meta property="article:published_time" content="{{$post->created_at}}" />
    {!!$post->is_news === 1 ? '' : "<meta property=\"article:section\" content=\"{$post->category->alias}\" />" !!}
    <!-- End Open Graph -->
@endsection

@section('main')
    <div class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{$post->is_news === 1?Breadcrumbs::render('new',$post):Breadcrumbs::render('post',$post) }}
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <article class="col-sm-8" itemscope itemtype="{{$post->is_news === 1 ? 'http://schema.org/NewsArticle' : 'http://schema.org/Article'}}">
                <header>
                    <h1 itemprop="headline">{{$post->title}}</h1>
                    {!!$post->is_news === 1 ? "<p><time itemprop=\"datePublished\" datetime=\"".$post->created_at."\">".$post->publicDate()."</time></p>": ''!!}
                </header>
                <div itemprop="articleBody">
                    {!! $post->content !!}
                </div>
                {!! $post->is_news === 1 ? '' : "<p>Категория: <a href=\"/category/{$post->category->alias}\"><span itemprop=\"articleSection\">" . $post->category->title . '</span></a></p>' !!}
            </article>
        </div>
{{--        <div>--}}
{{--            <form>--}}
{{--                <input type="text" name="email">--}}
{{--                <textarea name="content"></textarea>--}}
{{--                <input type="submit">--}}
{{--            </form>--}}
{{--        </div>--}}

            <h2>Оставить комментарий</h2>
            <form>
                <div class="form-group">
                    <label for="name">Имя:</label>
                    <input type="text" class="form-control" id="name" placeholder="Введите ваше имя" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Введите ваш email" required>
                </div>
                <div class="form-group">
                    <label for="comment">Комментарий:</label>
                    <textarea class="form-control" name="content" id="comment" rows="5" placeholder="Введите ваш комментарий" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
            <br>
            <h2>Комментарии</h2>
            <div class="comments">
                <div class="comment">
                    <div class="comment-header">
                        <span class="name">Имя пользователя</span>
                        <span class="date">Дата комментария</span>
                    </div>
                    <div class="comment-body">
                        <p>Текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария,</p>
                    </div>
                    <div class="comment-footer">
                        <button type="button" class="btn btn-sm btn-success">Лайк</button>
                        <button type="button" class="btn btn-sm btn-danger">Дизлайк</button>
                    </div>
                </div>
                <div class="comment">
                    <div class="comment-header">
                        <span class="name">Алексей</span>
                        <span class="date">16.03.2023</span>
                    </div>
                    <div class="comment-body">
                        <p>Текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария, текст комментария,</p>
                    </div>
                    <div class="comment-footer">
                        <button type="button" class="btn btn-sm btn-success">Лайк</button>
                        <button type="button" class="btn btn-sm btn-danger">Дизлайк</button>
                    </div>
                </div>
            </div>

    </div>

@endsection
@section('title')
{{$post->title}}
@endsection
@section('description')
    <meta name="description" content="{{$post->description}}"/>
@endsection
