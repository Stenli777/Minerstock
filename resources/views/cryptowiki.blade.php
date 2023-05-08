@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('cryptowiki') }}
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 pl-5">

                <h2>Категории</h2>
                @foreach($categories as $category)
                    <a href="/category/{{$category->alias}}">
                        <button type="button" class="btn btn-light container-fluid text-left mb-2">{{$category->title}}</button>
                    </a>
                @endforeach

            </div>
            <div class="col-md-8 mb-5">
                <h2>Криптословарь</h2>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Введите термин, чтобы его найти">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-search"></i> Найти
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="accordion">
                    @foreach($cryptowikis as $cryptowiki)

                                <div class="card rounded-0">
                                    <div class="card-header" id="heading-{{$cryptowiki->id}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-{{$cryptowiki->id}}" aria-expanded="true" aria-controls="collapse-{{$cryptowiki->id}}">
                                                <h4>{{$cryptowiki->name}}</h4>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse-{{$cryptowiki->id}}" class="collapse fade" aria-labelledby="heading-{{$cryptowiki->id}}" data-parent="#accordion">
                                        <div class="card-body">
                                            {!!$cryptowiki->content!!}
                                        </div>
                                    </div>
                                </div>
                    @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-2">
                    <h2>Новости</h2>
                    @foreach($news as $post)
                        <div class="col p-0">
                            @include('blocks.sidebar_article')
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
@stop
