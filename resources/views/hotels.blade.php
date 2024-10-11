@extends('layouts.layout')
@section('og-tags')
    <link href="{{ asset('css/nouislider.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
@endsection
@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('hotels') }}
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Майнинг-отели</h2>
                <div class="container-fluid py-3">
                    <form action="{{ route('hotels') }}" method="GET">
                        @csrf
                    <div class="d-flex align-items-center justify-content-between">
                        <!-- Dropdown для выбора валюты -->
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownCurrency" data-toggle="dropdown" aria-expanded="false">
                                RUB
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownCurrency">
                                <li><a class="dropdown-item" href="#">USD</a></li>
                                <li><a class="dropdown-item" href="#">EUR</a></li>
                                <li><a class="dropdown-item" href="#">GBP</a></li>
                                <li><a class="dropdown-item" href="#">RUB</a></li>
                            </ul>
                        </div>

                        <!-- Чекбокс для проверенных -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="verifiedCheck">
                            <label class="form-check-label" for="verifiedCheck">
                                <i class="bi bi-check-circle"></i> Проверенные
                            </label>
                        </div>

                        <!-- Фильтр Локации -->
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Локация
                            </button>
                            <div class="dropdown-menu p-5" aria-labelledby="dropdownMenuButton">
                                @foreach (\App\Models\Location::all() as $location)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="locations[]" value="{{ $location->id }}" id="location-{{ $location->id }}">
                                        <label class="form-check-label" for="location-{{ $location->id }}">
                                            {{ $location->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Выпадающий фильтр для Цены -->
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownPrice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Цена
                            </button>
                            <div class="dropdown-menu p-3" aria-labelledby="dropdownPrice" style="min-width: 250px;">
                                <label for="priceSlider">За кВт</label>
                                <div id="priceSlider"></div>
                                <div id="priceValue" class="text-center mt-2">0.00 - 7.21 RUB / за кВт</div>
                            </div>
                        </div>
                        <!-- Фильтр Типа Энергии -->
                        <div class="dropdown me-2">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownEnergyType" data-toggle="dropdown" aria-expanded="false">
                                Тип энергии
                            </button>
                            <div class="dropdown-menu p-3" aria-labelledby="dropdownEnergyType">
                                @foreach(\App\Models\EnergyType::all() as $energy_type)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="energy_types[]" value="{{ $energy_type->id }}" id="energy-type-{{ $energy_type->id }}">
                                        <label class="form-check-label" for="energy-type-{{ $energy_type->id }}">
                                            {{ $energy_type->name }}
                                        </label>
                                    </div>                                @endforeach
                            </div>
                        </div>

                        <!-- Выпадающий фильтр для Мин. количества -->
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMinCount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Мин. Количество
                            </button>
                            <div class="dropdown-menu p-3" aria-labelledby="dropdownMinCount" style="min-width: 250px;">
                                <label for="minCountSlider">Устройств</label>
                                <div id="minCountSlider"></div>
                                <div id="minCountValue" class="text-center mt-2">0 - 6 устройств</div>
                            </div>
                        </div>

                        <!-- Выпадающий фильтр для Мощности -->
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownPower" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Мощность
                            </button>
                            <div class="dropdown-menu p-3" aria-labelledby="dropdownPower" style="min-width: 250px;">
                                <label for="powerSlider">МВт</label>
                                <div id="powerSlider"></div>
                                <div id="powerValue" class="text-center mt-2">0 - 87 МВт</div>
                            </div>
                        </div>

                        <!-- Фильтр Условий -->
                        <div class="dropdown me-2">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownConditions" data-toggle="dropdown" aria-expanded="false">
                                Условия
                            </button>
                            <div class="dropdown-menu p-3" aria-labelledby="dropdownConditions">
                                @foreach(\App\Models\Condition::all() as $condition)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="conditions[]" value="{{ $condition->id }}" id="condition-{{ $condition->id }}">
                                        <label class="form-check-label" for="condition-{{ $condition->id }}">
                                            {{ $condition->name }}
                                        </label>
                                    </div>                                @endforeach
                            </div>
                        </div>

                        <!-- Кнопки "Применить" и "Очистить" -->
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-primary me-2 mr-1">Применить</button>
                            <a href="{{ route('hotels') }}" class="text-primary">Очистить</a>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="row">
                    @foreach($hotels as $hotel)
                        <div class="col-md-3">
                            @include('blocks.hotel')
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@stop
@section('script')
    <script>
        // Ползунок для Мин. Количества
        var minCountSlider = document.getElementById('minCountSlider');
        noUiSlider.create(minCountSlider, {
            start: [0, 6],
            connect: true,
            step: 1,
            range: {
                'min': 0,
                'max': 6
            }
        });
        minCountSlider.noUiSlider.on('update', function (values, handle) {
            document.getElementById('minCountValue').innerText = values[0] + ' - ' + values[1] + ' устройств';
        });

        // Ползунок для Мощности
        var powerSlider = document.getElementById('powerSlider');
        noUiSlider.create(powerSlider, {
            start: [0, 87],
            connect: true,
            range: {
                'min': 0,
                'max': 87
            }
        });
        powerSlider.noUiSlider.on('update', function (values, handle) {
            document.getElementById('powerValue').innerText = values[0] + ' - ' + values[1] + ' МВт';
        });

        // Ползунок для Цены
        var priceSlider = document.getElementById('priceSlider');
        noUiSlider.create(priceSlider, {
            start: [0, 7.21],
            connect: true,
            range: {
                'min': 0,
                'max': 7.21
            }
        });
        priceSlider.noUiSlider.on('update', function (values, handle) {
            document.getElementById('priceValue').innerText = parseFloat(values[0]).toFixed(2) + ' - ' + parseFloat(values[1]).toFixed(2) + ' RUB / за кВт';
        });

        // Предотвращаем закрытие dropdown при клике внутри него
        $('.dropdown-menu').on('click', function (e) {
            e.stopPropagation();
        });
    </script>
@endsection
