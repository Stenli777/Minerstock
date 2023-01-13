@extends('layouts.layout')
@section('main')
    {{ Breadcrumbs::render('category',$category) }}
    <div class="container">
<div class="row">
    @foreach($posts as $post)
        <div class="col-md-6">
            <div class="card mb-3" style="border-radius: 0">
                <div class="text-center" style="min-height: 200px;">
                    <img class="card-img" src="/{{$post->img ? $post->img : "images/uploads/asics/placeholder.png"}}" alt="изображение {{$post->title}}">
                </div>
                <div class="card-body pt-0">
            <a href="/post/{{$post->alias}}">{{$post->title}}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
    </div>
@stop
