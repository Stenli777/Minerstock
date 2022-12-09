@extends('layouts.layout')
@section('main')
    <div class="container">
<div class="row">
    @foreach($posts as $post)
        <div class="col-3">
            {{$post->title}}
        </div>
    @endforeach
</div>
    </div>
@stop
