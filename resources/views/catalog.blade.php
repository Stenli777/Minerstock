@extends('layouts.homepage')
@section('main')
{{--    {{ Breadcrumbs::render('catalog') }}--}}
<div class="container-fluid asic-back">
<div class="container-fluid">
    <div class="container">
        <h1>Майнинг оборудование</h1>
        <div class="row">
            <div class="col-3">
                <form class="asic-page p-3" method="get" action="/catalog">
                    <p class="font-weight-bold">Фильтр категории</p>
{{--Поиск--}}
                    <p class="font-weight-bold mt-3">Поиск</p>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Поиск по фразе">
{{--Производитель--}}
                    <p class="font-weight-bold mt-3">Производитель</p>
                        <select class="custom-select" name="producer_id">
                            <option selected disabled>Выберите производителя</option>
                            @foreach(\App\Models\Producer::all() as $producer)
                                <option value="{{$producer->id}}">{{$producer->name}}</option>
                            @endforeach
                        </select>
{{--Хэшрейт--}}
                    <p class="font-weight-bold mt-3">Хэшрейт</p>
                        <div class="row">
                            <div class="col-7">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="min">
                                    </div>
                                    <div class="col-6">
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="max">
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <select class="custom-select">
                                    <option value="1">TH/s</option>
                                    <option value="2">GH/s</option>
                                    <option value="3">MH/s</option>
                                    <option value="4">KH/s</option>
                                </select>
                            </div>
                        </div>
{{--Монеты--}}
                    <div id="coinAccordion">
                            <div class="" id="coinFilter">
                                    <p class="font-weight-bold mt-3 pl-0 btn link dropdown-toggle" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Монеты
                                    </p>
                            <div id="collapseOne" class="collapse" aria-labelledby="coinFilter" data-parent="#coinAccordion">
                                <div class="">
                                    @foreach(\App\Models\Coin::where('coin_active',true)->orderBy('order','ASC')->get() as $coin)
                                        <div class="custom-control custom-checkbox">
                                            <input name="coin[]" type="checkbox" class="custom-control-input" id="coin_{{ $coin->name }}" value="{{$coin->id}}">
                                            <label class="custom-control-label" for="coin_{{ $coin->name }}">{{ $coin->name }} ({{ $coin->short_name }})</label>
                                        </div>
                                    @endforeach
{{--                                    --}}
{{--                                        <input type="checkbox" class="custom-control-input" id="customCheck12">--}}
{{--                                        <label class="custom-control-label" for="customCheck12">Bitcoin (BTC)</label>--}}
{{--                                    --}}
{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input" id="customCheck11">--}}
{{--                                        <label class="custom-control-label" for="customCheck11">Litecoin (LTC)</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input" id="customCheck10">--}}
{{--                                        <label class="custom-control-label" for="customCheck10">Dogecoin (DOGE)</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input" id="customCheck9">--}}
{{--                                        <label class="custom-control-label" for="customCheck9">Etherium (ETH)</label>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <p class="font-weight-bold mt-3">Монеты</p>--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="customCheck12">--}}
{{--                            <label class="custom-control-label" for="customCheck12">Bitcoin (BTC)</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="customCheck11">--}}
{{--                            <label class="custom-control-label" for="customCheck11">Litecoin (LTC)</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="customCheck10">--}}
{{--                            <label class="custom-control-label" for="customCheck10">Dogecoin (DOGE)</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="customCheck9">--}}
{{--                            <label class="custom-control-label" for="customCheck9">Etherium (ETH)</label>--}}
{{--                        </div>--}}

{{--                    <p class="font-weight-bold mt-3">Алгоритм</p>--}}
                    <div id="algorythmAccordion">
                        <div class="" id="algorythmFilter">
                            <p class="font-weight-bold mt-3 pl-0 btn link dropdown-toggle" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                Алгоритм
                            </p>
                            <div id="collapseTwo" class="collapse" aria-labelledby="algorythmFilter" data-parent="#algorythmAccordion">
                                <div class="">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck8">
                                        <label class="custom-control-label" for="customCheck8">SHA-256</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                                        <label class="custom-control-label" for="customCheck7">Scrypt</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck6">
                                        <label class="custom-control-label" for="customCheck6">Ethash</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck5">
                                        <label class="custom-control-label" for="customCheck5">Equihash</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--Есть в продаже--}}
                    <p class="font-weight-bold mt-3">Есть в продаже</p>
                        <div class="row">
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label" for="customCheck4">Да</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">Нет</label>
                                </div>
                            </div>
                        </div>
{{--Окупается--}}
                    <p class="font-weight-bold mt-3">Окупается</p>
                        <div class="row">
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Да</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Нет</label>
                                </div>
                            </div>
                        </div>
{{--Применить фильтр--}}
                        <input type="submit" class="btn btn-primary btn-lg btn-block mt-3" value="Применить фильтр"></input>
{{--Хэшрейт--}}
                </form>
            </div>
            <div class="col-9">
                <div class="row d-flex flex-row-reverse mb-3">
                    <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" href="#view_tabs" id="nav_tabs" data-toggle="tab" role="tab" aria-controls="nav-tabs" data-target="#nav-tabs" aria-selected="true">Плиткой</a>
                            <a class="nav-link" href="#view_table" id="nav_table" data-toggle="tab" role="tab" aria-controls="nav-table" data-target="#nav-table" aria-selected="false">Списком</a>
                    </nav>
                </div>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-tabs" role="tabpanel" aria-labelledby="nav-tabs-tab">
                            <div class="row">
                                @foreach($asics as $asic)
                                    <div class="col-sm-4">
                                        <a href="/asic/{{$asic->id}}" style="text-decoration: none;">
                                        <div class="card" style="width: 17rem; min-height: 10rem; margin-bottom:1rem;">
                                            <div class="text-center" style="min-height: 200px;">
                                                <img class="card-img-top" src="/{{$asic->img ? $asic->img : "images/uploads/asics/placeholder.png"}}" alt="изображение {{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}">
                                            </div>
                                            <div class="card-body pt-0">
                                                <h6 class="card-title">ASIC майнер <br>{{$asic->producer->name}} {{$asic->name}}</h6>
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
                                                <a href="/asic/{{$asic->id}}" class="btn btn-primary btn-block">Перейти</a>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                @endforeach
                                <div class="container justify-content-center d-flex py-3">
                                    {{ $asics->links() }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab">
                            <div class="row">
                                <table class="table table-hover">
                                   <thead>
                                    <tr>
                                        <th scope="col">
                                            Производитель
                                        </th>
                                        <th scope="col">
                                            Название
                                        </th>
                                        <th scope="col">
                                            Хэшрейт
                                        </th>
                                        <th scope="col">
                                            Алгоритм
                                        </th>
                                    </tr>
                                   </thead>
                                    <tbody>
                                    @foreach($asics as $asic)
                                        <tr>
                                            <td>
                                                <a href="/asic/{{$asic->id}}">{{$asic->producer->name}}</a>
                                            </td>
                                            <td>
                                                <a href="/asic/{{$asic->id}}">{{$asic->name}}</a>
                                            </td>
                                            <td>
                                                <a href="/asic/{{$asic->id}}">{{$asic->humanHashrate()}}</a>
                                            </td>
                                            <td>
                                                <a href="/asic/{{$asic->id}}">{{$asic->algorythm->name}}</a>
                                            </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="container justify-content-center d-flex py-3">
                                    {{ $asics->links() }}
                                </div>
                            </div>
                        </div>
                </div>
        </div>

    </div>
</div>
</div>
    @stop
@section('canonical')
<link rel="canonical" href="{{ url()->current() }}">
@stop



