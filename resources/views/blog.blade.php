@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('blog') }}
        </div>
    </nav>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-2">

            <h2>Категории</h2>
            @foreach($categories as $category)
                <div>
                    <a href="/category/{{$category->alias}}"><div class="card-body">{{$category->title}}</div></a>
                </div>
            @endforeach

    </div>
<div class="col-md-8">
        <h2>Блоговые записи</h2>
    <div class="row">
    @foreach($posts as $post)
        <div class="col-4">
            @include('blocks.article')
        </div>
    @endforeach
    </div>

</div>
    <div class="col-md-3">

    </div>
    </div>
    </div>
@stop
