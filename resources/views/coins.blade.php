@extends('layouts.layout')
@section('main')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container">
                <h1>Монеты</h1>
                <div class="row">

                        <div class="row d-flex flex-row-reverse mb-3">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Плиткой</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Списком</a>
                                </li>
                            </ul>
                        </div>
                </div>
                <div class="row">
                    @foreach($coins as $coin)
                        @if($coin->price() !== 0)
                        <div class="col-3">
                            <div class="card" style="width: 17rem; margin-bottom:1rem;">
                                <div class="text-center" style="">
{{--                                    <img class="card-img-top" src="/{{$coin->img}}" alt="изображение {{$coin->name}} {{$coin->short_name}}">--}}
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">{{$coin->name}} {{$coin->short_name}}</h6>

                                    <p>$ {{number_format($coin->price(),2,',',' ')}}</p>
{{--                                    <a href="#" class="btn btn-primary btn-block">Перейти</a>--}}
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>

                <div class="container justify-content-center d-flex py-3">
                    {{$coins->links() }}
                </div>

                </div>
            </div>
        </div>
    </div>
@stop
@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}">
@stop
@section('title')
    Каталог криптовалют / монет | MineInfo
@stop
@section('description')
    <meta name="description" content="Все монеты / криптовалюты которые добываются асиками или являются востребованными криптоэнтузиастами. Если вы нашли неточности - вы всегда можете предложить изменения через соответствующую форму" />
@stop


