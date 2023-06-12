@extends('layouts.layout')
@section('title')
    Калькулятор майнинга для SHA-256 от Intelion Data Systems
@stop
@section('description')
    <meta name="description" content="Калькулятор майнинга для SHA-256 от Intelion Data Systems"/>
@stop
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('calculator')}}
        </div>
    </nav>
    <div class="container mt-4 mb-4">
{{--        <h1>Калькулятор майнинга</h1>--}}
        <script src="https://widget.intelionmine.ru/js/calc.js?v6470769151f7c"></script>
        <div id="intl-calculator"></div>
        <script>
            let calc = new IntelionCalculator({
                type: 'page',
                selector: '#intl-calculator',
                lang: 'ru'
            });
        </script>
    </div>

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            @include('blocks.comment_form')--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
