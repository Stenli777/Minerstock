@extends('layouts.layout')
@section('main')
<div class="container-fluid p-0">
<img src="/images/uploads/minepage.png" style="width:100%;margin-top: -96px;max-height: 900px">
</div>
<div class="container-fluid asic-back">
<div class="container-fluid">
    <div class="container">
        <h1>Майнинг оборудование</h1>
        <div class="row">
            @foreach($asics as $asic)
                    <div class="col-sm-3">
                        <a href="/asic/{{$asic->alias}}"><div class="card rounded p-1" style="width: 17rem; min-height: 10rem; margin-bottom:1rem;">
                            <div class="text-center" style="min-height: 200px;">
                            <img class="card-img-top" src="/{{$asic->img}}" alt="изображение {{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}">
                            </div>
                            <div class="card-body">
                                <a href="/asic/{{$asic->alias}}"><h6 class="card-title bold">{{$asic->producer->name}} {{$asic->name}}<br>{{$asic->humanHashrate()}}</h6></a>
{{--                                <p class="card-text"> Хэшрейт: {{$asic->humanHashrate()}}--}}
                                <p>Алгоритм: {{$asic->algorythm->name}}</p>

                            </div>
                        </div>
                            </a>
                    </div>
            @endforeach
        </div>
        <div class="container justify-content-center d-flex py-3">
            <a href="/catalog"> <button type="button" class="btn btn-primary p-2 pl-4 pr-4">
                Все ASIC майнеры
            </button></a>
        </div>
    </div>
    <div class="container">
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div id="tradingview_8a3b9"></div>
            <div class="tradingview-widget-copyright"><a href="https://ru.tradingview.com/symbols/BTCUSD/?exchange=BITSTAMP" rel="noopener" target="_blank"><span class="blue-text">График Bitcoin</span></a> от TradingView</div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
                new TradingView.widget(
                    {
                        "autosize": true,
                        "symbol": "BITSTAMP:BTCUSD",
                        "interval": "D",
                        "timezone": "Etc/UTC",
                        "theme": "light",
                        "style": "3",
                        "locale": "ru",
                        "toolbar_bg": "#f1f3f6",
                        "enable_publishing": false,
                        "hide_top_toolbar": true,
                        "hide_legend": true,
                        "save_image": false,
                        "container_id": "tradingview_8a3b9"
                    }
                );
            </script>
        </div>
        <!-- TradingView Widget END -->
    </div>
</div>
</div>
    @stop
@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}">
@stop


