@extends('layouts.layout')
@section('main')
    {{--<div class="container-fluid p-0">--}}
    {{--<img src="/images/uploads/minepage.png" style="width:100%;margin-top: -96px;max-height: 900px">--}}
    {{--</div>--}}
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container">
{{--                    <div class="row border m-1">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <h1>Криптопортал MineInfo</h1>--}}
{{--                            <p>Подробный каталог ASIC Портал про криптовалюты с подробным справочником ASIC майнеров.</p>--}}
{{--                            <p>Вы всегда можете предложить улучшения или порекомендовать исправить неточность с помощью этой формы.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                <h2 class="mb-4 mt-4">Майнинг оборудование</h2>
                <div class="row">
                    @foreach($asics as $asic)
                        <div class="col-sm-3">
                            @include('blocks.product')
                        </div>
                    @endforeach
                </div>
                <div class="container justify-content-center d-flex py-3">
                    <a href="/catalog">
                        <button type="button" class="btn btn-primary p-2 pl-4 pr-4">
                            Все ASIC майнеры
                        </button>
                    </a>
                </div>
                <h2 class="mb-4">Последние статьи</h2>
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-3">
                            @include('blocks.article')
                        </div>
                    @endforeach
                </div>
                @if (!empty($news))
                    <h2 class="mb-4">Новости</h2>
                    <div class="row">
                        @foreach($news as $post)
                            <div class="col-md-3">
                                @include('blocks.article')
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}">
@stop


