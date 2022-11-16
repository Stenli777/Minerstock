@extends('layouts.homepage')
@section('main')
<div class="container-fluid asic-back">
<div class="container-fluid">
    <div class="container">
        <h1>Майнинг оборудование</h1>
        <div class="row">
            <div class="col-3">
                <div>
                    <p class="font-weight-bold mt-3">Фильтры</p>
{{--Производитель--}}
                    <p class="font-weight-bold mt-3">Производитель</p>
                        <select class="custom-select">
                            <option selected>Выберите производителя</option>
                            <option value="1">Bitmain</option>
                            <option value="2">MicroBT</option>
                            <option value="3">Canaan</option>
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
                    <p class="font-weight-bold mt-3">Монеты</p>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck12">
                            <label class="custom-control-label" for="customCheck12">Bitcoin (BTC)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck11">
                            <label class="custom-control-label" for="customCheck11">Litecoin (LTC)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck10">
                            <label class="custom-control-label" for="customCheck10">Dogecoin (DOGE)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck9">
                            <label class="custom-control-label" for="customCheck9">Etherium (ETH)</label>
                        </div>
                    <p class="font-weight-bold mt-2">Алгоритм</p>
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
                        <button type="button" class="btn btn-primary btn-lg btn-block mt-3">Применить фильтр</button>
{{--Хэшрейт--}}
                </div>
            </div>
            <div class="col-9">
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
                <div class="row">

            @foreach($asics as $asic)
                    <div class="col-sm-4">
                        <div class="card" style="width: 17rem; min-height: 10rem; margin-bottom:1rem;">
                            <div class="text-center" style="min-height: 200px;">
                            <img class="card-img-top" src="/{{$asic->img}}" alt="изображение {{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}">
                            </div>
                            <div class="card-body">
                                <a href="/asic/{{$asic->id}}"><h6 class="card-title">{{$asic->producer->name}} {{$asic->name}}<br>{{$asic->humanHashrate()}}</h6></a>
{{--                                <p class="card-text"> Хэшрейт: {{$asic->humanHashrate()}}--}}
                                <p>Алгоритм: {{$asic->algorythm->name}}</p>
                                <a href="/asic/{{$asic->id}}" class="btn btn-primary btn-block">Перейти</a>
                            </div>
                        </div>
                    </div>
            @endforeach
                </div>
                </div>
        </div>
        <div class="container justify-content-center d-flex py-3">
        {{ $asics->links() }}
        </div>
    </div>
</div>
</div>
    @stop


