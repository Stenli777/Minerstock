@extends('layouts.homepage')
@section('main')
<div class="container-fluid p-0">
<img src="/images/uploads/minepage.png" style="width:100%">
</div>
<div class="container-fluid asic-back">
<div class="container-fluid">
    <div class="container">
        <h1>Майнинг оборудование</h1>
        <div class="row">
            @foreach($asics as $asic)
                    <div class="col-sm-3">
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
        <div class="container justify-content-center d-flex py-3">
        {{ $asics->links() }}
        </div>
    </div>
</div>
</div>
    @stop


