@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('blog') }}
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 pl-5">

                <h2>Категории</h2>
                @foreach($categories as $category)
                    <a href="/category/{{$category->alias}}">
                        <button type="button" class="btn btn-light container-fluid text-left mb-2">{{$category->title}}</button>
                    </a>
                @endforeach
            <!-- Yandex.RTB R-A-2404949-10 -->
            <div>
                <div id="yandex_rtb_R-A-2404949-10"></div>
                <script>window.yaContextCb.push(()=>{
                        Ya.Context.AdvManager.render({
                            "blockId": "R-A-2404949-10",
                            "renderTo": "yandex_rtb_R-A-2404949-10"
                        })
                    })
                </script>
            </div>
            </div>
            <div class="col-md-8">
                <h2>Блоговые записи</h2>
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4">
                            @include('blocks.article')
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col-md-2">
                    <h2>Новости</h2>
                    @foreach($news as $post)
                        <div class="col p-0">
                            @include('blocks.sidebar_article')
                        </div>
                    @endforeach
            <!-- Yandex.RTB R-A-2404949-10 -->
                    <div class="mt-2 mb-2" id="yandex_rtb_R-A-2404949-10"></div>
                    <script>window.yaContextCb.push(()=>{
                            Ya.Context.AdvManager.render({
                                "blockId": "R-A-2404949-10",
                                "renderTo": "yandex_rtb_R-A-2404949-10"
                            })
                        })
                    </script>
            </div>
        </div>
    </div>
@stop
