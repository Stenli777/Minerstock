@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('mining-pools') }}
        </div>
    </nav>
    <div class="container">
       <div class="row">
            @foreach ($pools as $pool)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <img class="card-img" src="/storage/{{str_replace('\\','/',$pool->img)}}" />
                        <h5 class="card-title">{{$pool->name}}</h5>
{{--                        <h6 class="card-subtitle mb-2 text-muted">{{$pool->title}}</h6>--}}
{{--                        <p class="card-text">{{$pool->description}}</p>--}}
                        <p class="card-text"><small class="text-muted">Комиссия: {{$pool->pool_fee}}%</small></p>
                        <a href="/mining-pool/{{$pool->alias}}" class="btn btn-primary">Ссылка</a>
                    </div>
                </div>
            </div>
            @endforeach
       </div>
    </div>
@endsection
