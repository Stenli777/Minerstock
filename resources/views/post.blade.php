@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
           {{ $post->is_news === 1?Breadcrumbs::render('new',$post):Breadcrumbs::render('post',$post) }}
        </div>
    </nav>

    <div class="container">
<div class="row d-flex justify-content-center">
<div class="col-sm-8">
    <h1>{{$post->title}}</h1>
    <div>{!! $post->content !!}</div>
</div>
</div>
    </div>
@endsection
@section('title')
    {{$post->title}}
@endsection
@section('description')
    <meta name="description" content="{{$post->description}}" />
@endsection
