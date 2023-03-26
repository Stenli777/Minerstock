@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('mining-pool',$pool) }}
        </div>
    </nav>
    <div class="container asic-page pt-3 pb-3">
        <h1>{{$pool->title}}</h1>
        <p>{{$pool->description}}</p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <a href="/">Ссылка на пул</a>
        <div>
            <img src="/images/googlePlay.jpg"/>
            <a href="">Мобильное приложение GooglePlay</a>
        </div>
        <div>
            <img src="/images/appstore.jpg"/>
            <a href="">Мобильное приложение AppStore</a>
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
