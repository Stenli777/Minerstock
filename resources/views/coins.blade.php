@extends('layouts.layout')
@section('main')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container">
                <h1>Монеты</h1>
                <div class="row">
{{--                    @foreach($coins as $coin)--}}
{{--                        @if($coin->price() !== 0)--}}
{{--                            <div class="col-md-3">--}}
{{--                                <div class="card" style="width: 17rem; margin-bottom:1rem;">--}}
{{--                                    <div class="text-center" style="">--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body">--}}
{{--                                        <img class="" src="/storage/{{str_replace('\\','/',$coin->img_coin)}}" />--}}
{{--                                        <h6 class="card-title">{{$coin->name}} {{$coin->short_name}}</h6>--}}
{{--                                        <p>Стоимость - $ {{number_format($coin->price(),2,',',' ')}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
                        @foreach($coins as $coin)
                            @if($coin->price() !== 0)
                            <div class="col-md-4">
                                <div class="card rounded-0 mb-4" style="">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <img class="" src="/images/{{str_replace('\\','/',$coin->img_coin)}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$coin->name}} {{$coin->short_name}}</h5>
                                                <p>Стоимость - $ {{number_format($coin->price(),2,',',' ')}}</p>
                                            </div>
                                        </div>
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
@stop
@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}">
@stop
@section('title')
    Каталог криптовалют / монет | MineInfo
@stop
@section('description')
    <meta name="description"
          content="Все монеты / криптовалюты которые добываются асиками или являются востребованными криптоэнтузиастами. Если вы нашли неточности - вы всегда можете предложить изменения через соответствующую форму"/>
@stop


