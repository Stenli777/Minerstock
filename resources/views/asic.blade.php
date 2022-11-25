@extends('layouts.homepage')
@section('main')
    <div class="container-fluid asic-back">
    <div class="container asic-page">
        <h1>{{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}</h1>
        <div class="row">

            <div class="col-sm-6">
                <img src="/{{$asic->img}}" style="background-color: white; border: 1px solid;max-width:433px; border-radius: 20px;padding: 20px">
            </div>
            <div class="col-sm-4">
                <h2>Характеристики асика</h2>
                <div class="row">
                    <div class="col-8">Хэшрейт: </div>
                    <div class="col">{{$asic->humanHashrate()}}</div>
                </div>
                <div class="row">
                    <div class="col-8">Энергоэффективность: </div>
                    <div class="col">{{$asic->efficiency()}}</div>
                </div>
                <div class="row">
                    <div class="col-8">Производитель: </div>
                    <div class="col">{{$asic->producer->name}}</div>
                </div>
                <div class="row">
                    <div class="col-8">Алгоритм: </div>
                    <div class="col">{{$asic->algorythm->name}}</div>
                </div>
                <div class="row">
                    <div class="col-8">Потребление: </div>
                    <div class="col">{{$asic->consumption}} Вт</div>
                </div>
                <div class="row">
                    <div class="col-8">Старт продаж: </div>
                    <div class="col">{{$asic->sales_data_start}}</div>
                </div>
                <div class="row">
                    <div class="col-8">Габариты с упаковкой: </div>
                    <div class="col">{{$asic->packing_size}}</div>
                </div>
                <div class="row">
                    <div class="col-8">Вес с упаковкой: </div>
                    <div class="col">{{$asic->weight_brutto}} кг.</div>
                </div>
                <div class="row">
                    <div class="col-8">Габариты асика: </div>
                    <div class="col">{{$asic->dimensions}}</div>
                </div>
                <div class="row">
                    <div class="col-8">Вес асика: </div>
                    <div class="col">{{$asic->weight_netto}} кг.</div>
                </div>
                <div class="row">
                    <div class="col-8">Шум: </div>
                    <div class="col">{{$asic->noise}} Дб</div>
                </div>
                <div class="row">
                    <div class="col-8">Количество чипов: </div>
                    <div class="col">{{$asic->chips}}</div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Стоимость кВт/ч</p>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="4.7 руб">
                    </div>
                    <button type="button" class="btn btn-primary btn-lg btn-block mt-3">Рассчитать доходность</button>
                </div>


            </div>
{{--            <div class="col-sm-4">--}}
{{--                <p>Габариты с упаковкой: {{$asic->packing_size}}</p>--}}
{{--                <p>Вес с упаковкой: {{$asic->weight_brutto}} кг.</p>--}}
{{--                <p>Габариты асика: {{$asic->dimensions}}</p>--}}
{{--                <p>Вес асика: {{$asic->weight_netto}} кг.</p>--}}
{{--                <p>Шум: {{$asic->noise}} Дб</p>--}}
{{--                <p>Количество чипов: {{$asic->chips}}</p>--}}
{{--                <button type="button" class="btn btn-primary btn-lg btn-block mt-3">Рассчитать доходность</button>--}}
{{--            </div>--}}
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
