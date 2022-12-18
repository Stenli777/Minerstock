@extends('layouts.layout')
@section('main')
    {{ Breadcrumbs::render('post',$post) }}
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
