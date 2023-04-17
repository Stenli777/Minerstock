@extends('layouts.layout')
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('privacy') }}
        </div>
    </nav>
    <div class="container privacy">
        <h1>Политика конфиденциальности</h1>
    @include('parts.privacy_text')
    </div>
@endsection
