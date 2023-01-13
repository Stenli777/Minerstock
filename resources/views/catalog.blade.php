@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
        {{ Breadcrumbs::render('catalog') }}
        </div>
    </nav>

    <div class="container-fluid asic-back">
    <div class="container-fluid">
    <div class="container">
        <h1>Майнинг оборудование</h1>
        <div class="row">
            <div class="col-sm-3">
                <form class="asic-page p-3 rounded" method="get" action="/catalog">
                    <p class="font-weight-bold">Фильтр категории</p>
                    {{--Поиск--}}
                    <p class="font-weight-bold mt-3">Поиск</p>
                    <input type="text" name="title_search" value="{{$request->input('title_search')}}" class="form-control" placeholder="Поиск по фразе">
                    {{--Производитель--}}
                    <p class="font-weight-bold mt-3">Производитель</p>
                    <select class="custom-select" name="producer_id">
                            <option selected disabled>Выберите производителя</option>
                        @foreach(\App\Models\Producer::all() as $producer)
                                <option {{$request->input('producer_id')==$producer->id?'selected':''}} value="{{$producer->id}}">{{$producer->name}}</option>
                            @endforeach
                        </select>
                    {{--Хэшрейт--}}
                    <p class="font-weight-bold mt-3">Хэшрейт</p>
                    <div class="row">
                            <div class="col-7">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <input type="number" name="hashrate_min" value="{{$request->input('hashrate_min')}}" class="form-control" id="" placeholder="min">
                                    </div>
                                    <div class="col-6 pr-0">
                                        <input type="number" name="hashrate_max" value="{{$request->input('hashrate_max')}}" class="form-control" id="" placeholder="max">
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <select name="hashrate_power" class="custom-select">
                                    <option {{!$request->input('hashrate_power') || $request->input('hashrate_power')==12?'selected':''}} value="12">TH/s</option>
                                    <option {{!$request->input('hashrate_power') || $request->input('hashrate_power')==9?'selected':''}} value="9">GH/s</option>
                                    <option {{!$request->input('hashrate_power') || $request->input('hashrate_power')==6?'selected':''}} value="6">MH/s</option>
                                    <option {{!$request->input('hashrate_power') || $request->input('hashrate_power')==3?'selected':''}} value="3">KH/s</option>
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

                                @foreach(\App\Models\Coin::where('coin_active',true)->orderBy('order','ASC')->get() as $coin)
                                        @if($coin->price() != 0)
                                        <div class="custom-control custom-checkbox">
                                            <input name="coin[]" type="checkbox" class="custom-control-input" id="coin_{{ $coin->name }}" value="{{$coin->id}}">
                                            <label class="custom-control-label" for="coin_{{ $coin->name }}">{{ $coin->name }} ({{ $coin->short_name }})</label>
                                        </div>
                                        @endif
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
{{--                    <p class="font-weight-bold mt-3">Есть в продаже</p>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck4">--}}
{{--                                    <label class="custom-control-label" for="customCheck4">Да</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck3">--}}
{{--                                    <label class="custom-control-label" for="customCheck3">Нет</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--Окупается--}}
{{--                    <p class="font-weight-bold mt-3">Окупается</p>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck2">--}}
{{--                                    <label class="custom-control-label" for="customCheck2">Да</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck1">--}}
{{--                                    <label class="custom-control-label" for="customCheck1">Нет</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--Применить фильтр--}}
                        <input type="submit" class="btn btn-primary btn-lg btn-block mt-3" value="Применить фильтр"></input>
{{--Хэшрейт--}}
                </form>
            </div>
            <div class="col-9">
                <div class="row d-flex flex-row-reverse mb-3">
                    <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link" href="#view_tabs" id="nav_tabs" data-toggle="tab" role="tab" aria-controls="nav-tabs" data-target="#nav-tabs" aria-selected="true">Плиткой</a>
                            <a class="nav-link" href="#view_table" id="nav_table" data-toggle="tab" role="tab" aria-controls="nav-table" data-target="#nav-table" aria-selected="false">Списком</a>
                    </nav>
                </div>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane show active" id="nav-tabs" role="tabpanel" aria-labelledby="nav-tabs-tab">
                            <div class="row">
                                @foreach($asics as $asic)
                                    <div class="col-sm-4">
                                        <a href="/asic/{{$asic->alias}}" style="text-decoration: none;">
                                        <div class="card rounded" style="width: 17rem; min-height: 10rem; margin-bottom:1rem;">
                                            <div class="text-center" style="min-height: 200px;">
                                                <img class="card-img-top" src="/{{$asic->img ? $asic->img : "images/uploads/asics/placeholder.png"}}" alt="изображение {{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}">
                                            </div>
                                            <div class="card-body pt-0">
                                                <a href="/asic/{{$asic->alias}}" style="text-decoration: none;"><h6 class="card-title lineHeight bold">ASIC майнер <br>{{$asic->producer->name}} {{$asic->name}}</h6></a>
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
                                <div class="container justify-content-center d-flex py-3">
                                    {{ $asics->fragment('view_tabs')->links() }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab">
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
                                                <a href="/asic/{{$asic->alias}}">{{$asic->producer->name}}</a>
                                            </td>
                                            <td>
                                                <a href="/asic/{{$asic->alias}}">{{$asic->name}}</a>
                                            </td>
                                            <td>
                                                <a href="/asic/{{$asic->alias}}">{{$asic->humanHashrate()}}</a>
                                            </td>
                                            <td>
                                                <a href="/asic/{{$asic->alias}}">{{$asic->algorythm->name}}</a>
                                            </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="container justify-content-center d-flex py-3">
                                    {{ $asics->fragment('view_table')->links() }}
                                </div>
                            </div>
                        </div>
                </div>
        </div>

    </div>
</div>
</div>
        <script>
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var hash = $(e.target).attr('href');
                if (history.pushState) {
                    history.pushState(null, null, hash);
                } else {
                    location.hash = hash;
                }
            });

            var hash = window.location.hash;
            if (hash) {
                $('.nav-link[href="' + hash + '"]').tab('show');
            }
        </script>
    @stop
@section('canonical')
<link rel="canonical" href="{{ url()->current() }}">
@stop
@section('title')
        Каталог ASIC майнеров | MineInfo
@stop
@section('description')
            <meta name="description" content="Все ASIC майнеры, которые было произведены собраны в одном месте. Если вы нашли неточности - вы всегда можете предложить изменения через соответствующую форму" />
@stop



