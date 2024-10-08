@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('apps') }}
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 pl-5">

                <h2>Категории</h2>
                @foreach($categories as $category)
                    <a href="/app-category/{{$category->alias}}">
                        <button type="button" class="btn btn-light container-fluid text-left mb-2">{{$category->title}}</button>
                    </a>
                @endforeach
                    <div class="mt-3 mb-3" id="yandex_rtb_R-A-2404949-10"></div>
                    <script>window.yaContextCb.push(()=>{
                            Ya.Context.AdvManager.render({
                                "blockId": "R-A-2404949-10",
                                "renderTo": "yandex_rtb_R-A-2404949-10"
                            })
                        })
                    </script>
            </div>
            <div class="col-md-8">
                <h2>Приложения</h2>
                <div class="row">
                    @foreach($news as $post)
                        <div class="col-md-3">
                            @include('blocks.app')
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col-md-2">
                <h2>Статьи</h2>
                @foreach($posts as $post)
                    <div class="col p-0">
                        @include('blocks.sidebar_article')
                    </div>
                @endforeach
            <!-- Yandex.RTB R-A-2404949-10 -->
                    <div class="mt-3 mb-3" id="yandex_rtb_R-A-2404949-10"></div>
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
