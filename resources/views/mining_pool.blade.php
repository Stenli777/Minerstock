@extends('layouts.layout')
@section('title')
    {{$pool->title}}
@stop
@section('description')
    <meta name="description" content="{{$pool->description}}"/>
@stop
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('mining-pool',$pool) }}
        </div>
    </nav>
    <div class="container asic-page pt-3 pb-3">
        <h1>Майнинг-пул {{$pool->name}}</h1>
        <div class="row">
            <div class="col-md-4">

                <img class="" src="/images/{{str_replace('\\','/',$pool->img)}}" />
            </div>
            <div class="col-md-4">
                {{--        <p>{{$pool->description}}</p>--}}
                <p>Основан в стране: {{$pool->country}}</p>
                <p>Год основания: {{$pool->year_start}}</p>
                <p>Комиссия пула {{$pool->pool_fee}}%</p>
                @if ($pool->work_in_russia)
                <p>На пуле можно добывать из России</p>
                @endif
                <p>Методы добычи:</p>
                @if($pool->pps)
                    <button type="button" class="btn btn-light">PPS</button>
                @endif
                @if($pool->pplns)
                    <button type="button" class="btn btn-light">PPLNS</button>
                @endif
                @if($pool->solo)
                    <button type="button" class="btn btn-light">SOLO</button>
                @endif
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <a class="btn btn-primary" href="{{$pool->partner_link}}">Ссылка на пул</a>
                </div>
                <div class="mb-2">
                    <a href="{{$pool->mobile_app_android}}"><img src="/images/googlePlay.jpg"/></a>
                </div>
                <div class="mb-2">
                    <a href="{{$pool->mobile_app_ios}}"><img src="/images/appstore.jpg"/></a>
                </div>
            </div>
        </div>



    </div>
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="">Описание пула</h2>
        <div class="mt-3 col-sm-10" itemprop="description">{!!html_entity_decode($pool->content)!!}</div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @include('blocks.comment_form')
        </div>
    </div>
    <div class="container">
        <h2>Асики которые могут добывать на этом пуле</h2>
        @foreach ($asics as $asic)
            <p>{{$asic->title}}</p>
        @endforeach
    </div>
@endsection
