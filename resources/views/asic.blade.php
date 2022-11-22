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
                <div class="row">
                    <div class="col">
                        <p>Стоимость кВт/ч</p>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="4.7 руб">
                    </div>
                </div>


            </div>
            <div class="col-sm-4">
                <p>Габариты с упаковкой: {{$asic->packing_size}}</p>
                <p>Вес с упаковкой: {{$asic->weight_brutto}} кг.</p>
                <p>Габариты асика: {{$asic->dimensions}}</p>
                <p>Вес асика: {{$asic->weight_netto}} кг.</p>
                <p>Шум: {{$asic->noise}} Дб</p>
                <p>Количество чипов: {{$asic->chips}}</p>
                <button type="button" class="btn btn-primary btn-lg btn-block mt-3">Рассчитать доходность</button>
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
            <div class="col">
                <h3 class="font-weight-bold">Добыча асика</h3>
            </div>
            <div class="col">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" href="#view_tabs" id="nav_tabs" data-toggle="tab" role="tab" aria-controls="nav-tabs" aria-selected="true">Вкладками</a>
                        <a class="nav-link" href="#view_table" id="nav_table" data-toggle="tab" role="tab" aria-controls="nav-table" aria-selected="true">Сравнение по монетам</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-tabs" role="tabpanel" aria-labelledby="nav-tabs-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @foreach($asic->coins->where('coin_active',true) as $k=>$coin)
                                    <a class="nav-item nav-link {{$k==0?'active':''}}" id="nav-{{$coin->short_name}}-tab" data-toggle="tab" href="#nav-{{$coin->short_name}}" role="tab" aria-controls="nav-{{$coin->short_name}}" aria-selected="{{$k==0?'true':'false'}}">{{$coin->name}}({{$coin->short_name}})</a>
                                @endforeach
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($asic->coins as $k=>$coin)
                                <div class="tab-pane fade show {{$k==0?'active':''}}" id="nav-{{$coin->short_name}}" role="tabpanel" aria-labelledby="nav-{{$coin->short_name}}-tab">
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
{{--                                            <td>--}}
{{--                                                Расходы--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                Прибыль--}}
{{--                                            </td>--}}
                                        </tr>
                                        <tr>
                                            <td>
                                                День
                                            </td>
                                            <td>
                                                {{$coin->name}} ({{$coin->short_name}})
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate),8)}}
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate) * 58.74 / 16531,8)}}
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate) * 58.74 * 61.5,2)}}
                                            </td>
{{--                                            <td>--}}
{{--                                                {{$asic->expenses()}}--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                {{$asic->profit()}}--}}
{{--                                            </td>--}}
                                        </tr>
                                        <tr>
                                            <td>
                                                Месяц
                                            </td>
                                            <td>
                                                {{$coin->name}} ({{$coin->short_name}}
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate) * 30.5,8)}}
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate) * 58.74 / 16531 * 30.5,8)}}
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate) * 58.74 * 61.5 * 30.5,2)}}
                                            </td>
{{--                                            <td>--}}
{{--                                                {{$asic->expenses() * 30.5}}--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                {{$asic->profit() * 30.5}}--}}
{{--                                            </td>--}}
                                        </tr>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab">
                        <table class="table">
                            <tr>
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
                            @foreach($asic->coins->where('coin_active',true) as $k=>$coin)
                                <tr>
                                    <td>
                                        {{$coin->name}} ({{$coin->short_name}})
                                    </td>
                                    <td>
                                        {{number_format($coin->minePerDay($asic->hashrate) * 30.5,8)}}
                                    </td>
                                    <td>
                                        {{number_format($coin->minePerDay($asic->hashrate) * 58.74 / 16531 * 30.5,8)}}
                                    </td>
                                    <td>
                                        {{number_format($coin->minePerDay($asic->hashrate) * 58.74 * 61.5 * 30.5,2)}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
{{--                <div class="row d-flex flex-row-reverse mb-3">--}}
{{--                    <ul class="nav nav-tabs">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active" href="#">Вкладками</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">Сравнение по монетам</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <p class="mr-5 mt-2 align-middle">Внешний вид</p>--}}
{{--                </div>--}}
            </div>





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
