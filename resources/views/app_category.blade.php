@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('app_category',$category) }}
        </div>
    </nav>
    <div class="container">
        <h1>{{$category->title}}</h1>
<div class="row">
    @foreach($posts as $post)
        <div class="col-md-3">
@include('blocks.app')
        </div>
    @endforeach
</div>
    </div>
@stop
