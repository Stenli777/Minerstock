@extends('layouts.layout')
@section('title')
    {{$asic->title}}
@stop
@section('description')
    <meta name="description" content="{{$asic->description}}"/>
@stop
@section('og-tags')
    <meta property="og:title" content="{{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}">
    <meta property="og:type" content="product">
    <meta property="og:image" content="{{ url('/') }}/{{$asic->img}}">
    <meta property="og:description" content="{{$asic->description}}">
    <meta property="og:url" content="{{ url('/') }}/asic/{{$asic->alias}}">
    <meta property="product:brand" content="{{$asic->producer->name}}">
    <meta property="og:site_name" content="MineInfo">
@stop
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('asic',$asic) }}
        </div>
    </nav>
    <div class="container asic-page pt-3 pb-3" itemscope itemtype="http://schema.org/Product">
        <h1 class="mt-0" itemprop="name">{{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}</h1>
        <div class="row">

            <div class="col-sm-4">
                <div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                    <img src="/{{$asic->img ? $asic->img : "images/uploads/asics/placeholder.png"}}"
                         class="img-fluid border border-dark bg-white"
                         alt="Bitmain Antminer KA3 166Th/s"
                         style="border-radius: 20px"/>
                    <meta itemprop="url"
                          content="/{{$asic->img ? $asic->img : "images/uploads/asics/placeholder.png"}}"/>
                    <meta itemprop="width" content="300"/>
                    <meta itemprop="height" content="300"/>
                </div>

            </div>
            <div class="col-sm-5">
                {{--                <h2>Характеристики асика</h2>--}}
                <div class="row">
                    {{--                    <p>Курс доллара: {{$asic->usd()}}</p>--}}
                    <div class="col-8">Хэшрейт:</div>
                    <div class="col">{{$asic->humanHashrate()}}</div>
                </div>
                <div class="row">
                    <div class="col-8">Энергоэффективность:</div>
                    <div class="col">{{$asic->efficiency()}}</div>
                </div>
                <div class="row" itemprop="brand" itemscope itemtype="http://schema.org/Brand">
                    <meta itemprop="name" content="{{$asic->producer->name}}"/>
                    <div class="col-8">Производитель:</div>
                    <div class="col">{{$asic->producer->name}}</div>
                </div>
                <div class="row">
                    <div class="col-8">Алгоритм:</div>
                    <div class="col">{{$asic->algorythm->name}}</div>
                </div>
                <div class="row">
                    <div class="col-8">Потребление:</div>
                    <div class="col">{{number_format($asic->consumption,0,'',' ')}} Вт</div>
                </div>
                @if($asic->sales_data_start!= null)
                    <div class="row">
                        <div class="col-8">Старт продаж:</div>
                        <div class="col">{{$asic->sales_data_start}}</div>
                    </div>
                @endif
                @if ($asic->packing_size != null)
                    <div class="row">
                        <div class="col-8">Габариты с упаковкой:</div>
                        <div class="col">{{$asic->packing_size}}</div>
                    </div>
                @endif
                @if ($asic->weight_brutto != null)
                    <div class="row">
                        <div class="col-8">Вес с упаковкой:</div>
                        <div class="col">{{$asic->weight_brutto}} кг.</div>
                    </div>
                @endif
                @if ($asic->dimensions != 'NA')
                    <div class="row">
                        <div class="col-8">Габариты асика:</div>
                        <div class="col">{{$asic->dimensions}}</div>
                    </div>
                @endif
                @if($asic->weight_netto != 0)
                    <div class="row">
                        <div class="col-8">Вес асика:</div>
                        <div class="col">{{$asic->weight_netto}} кг.</div>
                    </div>
                @endif
                @if ($asic->noise!=0)
                    <div class="row">
                        <div class="col-8">Шум:</div>
                        <div class="col">{{$asic->noise}} Дб</div>
                    </div>
                @endif
                @if($asic->chips != 0)
                    <div class="row">
                        <div class="col-8">Количество чипов:</div>
                        <div class="col">{{$asic->chips}}</div>
                    </div>
                @endif
                @if($asic->cooling != null)
                    <div class="row">
                        <div class="col-8">Охлаждение:</div>
                        <div class="col">{{$asic->cooling}}</div>
                    </div>
                @endif

            </div>
            <div class="col-sm-3">
                <div class="row">
                    <form action="{{url()->current()}}" method="get" class="col">

                        <h5 class="mb-3">Калькулятор доходности</h5>
                        <p>Чтобы определить расходы, доходы и прибыль от майнера укажите стоимость электроэнергии в
                            вашей локации за 1 кВтч и нажмите кнопку "Рассчитать"</p>
                        <p>Введите стоимость кВт/ч:</p>
                        <div class="row">
                            <div class="col-4">
                                <input name="expenses" value="{{$expenses}}" type="float" class="form-control"
                                       placeholder="{{$expenses}} руб">
                            </div>
                            <div class="col-8">
                                <input type="submit" class="btn btn-primary btn-sm btn-block mt-1"
                                       value="Рассчитать"></input>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        @if (empty($simylar))
            <div>
                <div>Похожее оборудование</div>
                @foreach($simular as $asic)
                    <a href="/asic/{{$asic->alias}}">
                        <button type="button" class="btn btn-light">{{$asic->humanHashrate()}}</button>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    <div class="container">
        <div class="col">
            <h3 class="font-weight-bold mt-3 mb-3">Добыча асика</h3>
        </div>
        <div class="col">
            @if(count($asic->coins()->where('coin_active',true)->orderBy('order')->get()) > 1)
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" href="#view_tabs" id="nav_tabs" data-toggle="tab" role="tab"
                           aria-controls="nav-tabs" data-target="#nav-tabs" aria-selected="true">Вкладками</a>
                        <a class="nav-link" href="#view_table" id="nav_table" data-toggle="tab" role="tab"
                           aria-controls="nav-table" data-target="#nav-table" aria-selected="false">Сравнение по
                            монетам</a>
                    </div>
                </nav>
            @endif
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-tabs" role="tabpanel" aria-labelledby="nav-tabs-tab">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach($asic->coins()->where('coin_active',true)->orderBy('order')->get() as $k=>$coin)
                                @if($coin->price() !== 0)
                                    <a class="nav-item nav-link {{$k==0?'active':''}}"
                                       id="nav-{{$coin->short_name}}-tab" data-toggle="tab"
                                       href="#nav-{{$coin->short_name}}" role="tab"
                                       aria-controls="nav-{{$coin->short_name}}"
                                       aria-selected="{{$k==0?'true':'false'}}">{{$coin->name}}({{$coin->short_name}}
                                        )</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($asic->coins()->where('coin_active',true)->orderBy('order')->get() as $k=>$coin)
                                <div class="table-responsive tab-pane fade show {{$k==0?'active':''}}" id="nav-{{$coin->short_name}}"
                                     role="tabpanel" aria-labelledby="nav-{{$coin->short_name}}-tab">
                                    <table class="table table-hover text-center" data-mobile-responsive="true">
                                        <thead>
                                        <tr>
                                            <th>
                                                Период
                                            </th>
                                            <th>
                                                Криптовалюта
                                            </th>
                                            <th>
                                                Добыча
                                            </th>
                                            <th>
                                                Пересчет на BTC
                                            </th>
                                            <th>
                                                Доход, ₽
                                            </th>
                                            <th>
                                                Расходы, ₽
                                            </th>
                                            <th>
                                                Прибыль, ₽
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                День
                                            </td>
                                            <td>
                                                {{$coin->name}} ({{$coin->short_name}})
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate),8,',',' ')}}
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate) * ($coin->priceBtc()),8,',',' ')}}
                                                ₿
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate) * ($coin->price()) * $usd,2,',',' ')}}
                                                ₽
                                            </td>
                                            <td>
                                                {{number_format($asic->expenses($expenses),2,',',' ')}} ₽
                                            </td>
                                            <td>
                                                {{number_format(($coin->minePerDay($asic->hashrate) * ($coin->price()) * $usd) - $asic->expenses($expenses),2,',',' ')}}
                                                ₽
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Месяц
                                            </td>
                                            <td>
                                                {{$coin->name}} ({{$coin->short_name}})
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate) * 30.5,8,',',' ')}}
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate) * ($coin->priceBtc()) * 30.5,8,',',' ')}}
                                                ₿
                                            </td>
                                            <td>
                                                {{number_format($coin->minePerDay($asic->hashrate) * ($coin->price()) * $usd * 30.5,2,',',' ')}}
                                                ₽
                                            </td>
                                            <td>
                                                {{number_format($asic->expenses($expenses) * 30.5,2,',',' ')}} ₽
                                            </td>
                                            <td>
                                                {{number_format((($coin->minePerDay($asic->hashrate) * ($coin->price()) * $usd) - $asic->expenses($expenses)) * 30.5,2,',',' ')}}
                                                ₽
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </nav>
                </div>
                <div class="tab-pane fade table-responsive" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab">
                    <table class="table table-hover" data-mobile-responsive="true">
                        <thead>
                        <tr>
                            <th>
                                Криптовалюта
                            </th>
                            <th>
                                Добыча в мес.
                            </th>
                            <th>
                                Пересчет на BTC
                            </th>
                            <th>
                                Прибыль, ₽ в мес.
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($asic->coins()->where('coin_active',true)->orderBy('order')->get() as $k=>$coin)
                            @if($coin->price() !== 0)
                                <tr>
                                    <td>
                                        {{$coin->name}} ({{$coin->short_name}})
                                    </td>
                                    <td>
                                        {{number_format($coin->minePerDay($asic->hashrate) * 30.5,8,',',' ')}}
                                    </td>
                                    <td>
                                        {{number_format($coin->minePerDay($asic->hashrate) * $coin->priceBtc() * 30.5,8,',',' ')}}
                                    </td>
                                    <td>
                                        {{number_format($coin->minePerDay($asic->hashrate) * $coin->price() * $usd * 30.5,2,',',' ')}}
                                        ₽
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
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


    <div
        style="background: linear-gradient(90deg, rgba(0, 32, 76, 0.1) 0%, rgba(168, 72, 56, 0.1) 29.72%, rgba(9, 22, 40, 0.1) 89.54%, rgba(0, 32, 76, 0.1) 100%);">
        <div class="container">
            @if($asic->seo_text != null)

                <div class="row pt-5 pb-5">
                    <div class="col-lg-8">
                        <h2 class="pb-3">{{$asic->h1}}</h2>
                        <div itemprop="description">{!!html_entity_decode($asic->seo_text)!!}</div>
                    </div>
                    <div class="col-lg-4">
                        <img src="/{{$asic->img}}" class="img-fluid">
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="table-responsive">
                <table class="table table-hover text-center mb-5" data-mobile-responsive="true">
                    <thead>
                    <tr>
                        <th>Майнер</th>
                        <th>{{$asic->name}} {{$asic->humanHashrate()}}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>


                    <tr>
                        <th></th>
                        <th>Разгон /<br> Performance</th>
                        <th>Заводской режим /<br> Normal</th>
                        <th>Сбалансированный режим /<br> Balanced</th>
                        <th>Режим эффективности /<br> Effective</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Хэшрейт</td>
                        <td>{{$asic->hashUnspeed() * 1.1}} {{$asic->speedHash()}}</td>
                        <td>{{$asic->hashUnspeed()}} {{$asic->speedHash()}}</td>
                        <td>{{$asic->hashUnspeed() * 0.8}} {{$asic->speedHash()}}</td>
                        <td>{{$asic->hashUnspeed() * 0.7}} {{$asic->speedHash()}}</td>
                    </tr>
                    <tr>
                        <td>Потребление</td>
                        <td>{{$asic->consumption * 1.1}} Вт</td>
                        <td>{{$asic->consumption}} Вт</td>
                        <td>{{$asic->consumption * 0.8}} Вт</td>
                        <td>{{$asic->consumption * 0.7}} Вт</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
                <div class="row">
                    @include('blocks.comment_form')
                </div>
        </div>

    </div>

    </div>
    <div class="separator">
        <h2 class="pt-5 pb-5">Другое оборудование на {{$asic->algorythm->name}}</h2>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            @foreach($asics as $asic)
                <div class="col-sm-3">
                    <a href="/asic/{{$asic->alias}}" style="text-decoration: none;">
                        <div class="card rounded" style="min-height: 10rem; margin-bottom:1rem;">
                            <div class="text-center" style="min-height: 200px;">
                                <img class="card-img-top"
                                     src="/{{$asic->img ? $asic->img : "images/uploads/asics/placeholder.png"}}"
                                     alt="изображение {{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}">
                            </div>
                            <div class="card-body pt-0">
                                <a href="/asic/{{$asic->alias}}" style="text-decoration: none;"><h6
                                        class="card-title lineHeight bold">ASIC майнер
                                        <br>{{$asic->producer->name}} {{$asic->name}}</h6></a>
                                <div class="row">
                                    <div class="col">
                                        <p class="mt-0 mb-0"> Хэшрейт:</p>
                                        <p class="mt-0">Алгоритм:</p>
                                    </div>
                                    <div class="col">
                                        <p class="mt-0 mb-0">{{$asic->humanHashrate()}}</p>
                                        <p class="mt-0">{{$asic->algorythm->name}}</p>
                                    </div>
                                </div>
                                {{--                                                <a href="/asic/{{$asic->alias}}" class="btn btn-primary btn-block">Перейти</a>--}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop


