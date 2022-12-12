@extends('layouts.layout')
@section('main')
    <div class="container">
<div class="row">
    @foreach($posts as $post)
        <div class="col-3">
            <a href="/post/{{$post->alias}}">{{$post->title}}</a>
        </div>
    @endforeach
</div>
    </div>
@stop
