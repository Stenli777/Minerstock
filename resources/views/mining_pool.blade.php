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
        <div class="row">
            <div class="col-md-8">
                <h1>{{$pool->name}}</h1>
                {{--        <p>{{$pool->description}}</p>--}}
                <p>Метод добычи</p>
                @if($pool->pps)
                    <p>PPS</p>
                @endif
                @if($pool->pplns)
                    <p>PPLNS</p>
                @endif
                @if($pool->solo)
                    <p>SOLO</p>
                @endif
            </div>
            <div class="col-md-4">
                <a class="btn btn-primary" href="{{$pool->partner_link}}">Ссылка на пул</a>
                <div>
                    <a href="{{$pool->mobile_app_android}}"><img src="/images/googlePlay.jpg"/></a>
                </div>
                <div>
                    <a href="{{$pool->mobile_app_ios}}"><img src="/images/appstore.jpg"/></a>
                </div>
            </div>
        </div>



    </div>
    <div class="container">
        <div itemprop="description">{!!html_entity_decode($pool->content)!!}</div>
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
