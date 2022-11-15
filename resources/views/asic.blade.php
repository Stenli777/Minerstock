@extends('layouts.homepage')
@section('main')
    <div class="container-fluid asic-back">
    <div class="container">
        <h1>{{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}</h1>
        <div class="row">

            <div class="col-sm-4">
                <img src="/{{$asic->img}}" style="border: 1px solid;max-width:300px; border-radius: 20px;padding: 20px">
            </div>
            <div class="col-sm-4">
                <p>Хэшрейт: {{$asic->humanHashrate()}}</p>
                <p>Энергоэффективность: {{$asic->efficiency()}}</p>
                <p>Производитель: {{$asic->producer->name}}</p>
                <p>Алгоритм: {{$asic->algorythm->name}}</p>
                <p>Потребление: {{$asic->consumption}} Вт</p>
                <p>Старт продаж: {{$asic->sales_data_start}}</p>
            </div>
            <div class="col-sm-4">
                <p>Габариты с упаковкой: {{$asic->packing_size}}</p>
                <p>Вес с упаковкой: {{$asic->weight_brutto}} кг.</p>
                <p>Габариты асика: {{$asic->dimensions}}</p>
                <p>Вес асика: {{$asic->weight_netto}} кг.</p>
                <p>Шум: {{$asic->noise}} Дб</p>
                <p>Количество чипов: {{$asic->chips}}</p>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid">
        <div class="separator">
        <h1>Добываемые монеты</h1>
        </div>
    </div>
    <div class="container">
        <h1>Добыча асика</h1>
        <ul class="nav nav-tabs">
            @foreach($algorythmCoin as $algorythmCoin1)
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">{{$wtm_coin->name}}({{$wtm_coin->tag}})</a>
            </li>
            @endforeach
        </ul>
        <table class="table">
            <tr>
                <td>
                   Добыча в
                </td>
                <td>
                    Криптовалюта
                </td>
                <td>
                    Добыто монет
                </td>
                <td>
                    Пересчет на BTC
                </td>
                <td>
                    Пересчет на Рубли
                </td>
            </tr>
            <tr>
                <td>
                    День
                </td>
                <td>
                    Bitcoin (BTC)
                </td>
                <td>
{{number_format((86400 * $wtm_coin->block_reward * $asic->hashrate) / (2 ** 32 * $wtm_coin->difficulty),8)}};
                </td>
                <td>
                    0.00025642
                </td>
                <td>
                    270.2
                </td>
            </tr>
            <tr>
                <td>
                    Месяц
                </td>
                <td>
                    Bitcoin (BTC)
                </td>
                <td>
                    {{number_format((86400 * $wtm_coin->block_reward * $asic->hashrate) / (2 ** 32 * $wtm_coin->difficulty) * 30.5,8)}};
                </td>
                <td>
                    0.00782024
                </td>
                <td>
                    8242.49
                </td>
            </tr>
        </table>
    </div>
    <div class="container-fluid">
        <div class="separator">
            <h1>Другое оборудование на {{$asic->algorythm->name}}</h1>
        </div>
    <div class="container">
        <div class="row">
    <a href="/asic/{{$asic->id}}">
                <div class="col-sm-3">
                    <div class="card" style="width: 17rem; min-height: 10rem; margin-bottom:1rem;">
                        {{--                        <img class="card-img-top" src="..." alt="Card image cap">--}}
                        <div class="card-body">
                            <h6 class="card-title">{{$asic->producer->name}} {{$asic->name}}</h6>
                            <p class="card-text"> Хэшрейт: {{$asic->humanHashrate()}}
                                <br>Алгоритм: {{$asic->algorythm->name}}</p>
                            <a href="/asic/{{$asic->id}}" class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                </div>
            </a>
    <a href="/asic/{{$asic->id}}">
                <div class="col-sm-3">
                    <div class="card" style="width: 17rem; min-height: 10rem; margin-bottom:1rem;">
                        {{--                        <img class="card-img-top" src="..." alt="Card image cap">--}}
                        <div class="card-body">
                            <h6 class="card-title">{{$asic->producer->name}} {{$asic->name}}</h6>
                            <p class="card-text"> Хэшрейт: {{$asic->humanHashrate()}}
                                <br>Алгоритм: {{$asic->algorythm->name}}</p>
                            <a href="/asic/{{$asic->id}}" class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                </div>
            </a>
    <a href="/asic/{{$asic->id}}">
                <div class="col-sm-3">
                    <div class="card" style="width: 17rem; min-height: 10rem; margin-bottom:1rem;">
                        {{--                        <img class="card-img-top" src="..." alt="Card image cap">--}}
                        <div class="card-body">
                            <h6 class="card-title">{{$asic->producer->name}} {{$asic->name}}</h6>
                            <p class="card-text"> Хэшрейт: {{$asic->humanHashrate()}}
                                <br>Алгоритм: {{$asic->algorythm->name}}</p>
                            <a href="/asic/{{$asic->id}}" class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@stop
