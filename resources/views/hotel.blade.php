@extends('layouts.layout')
@section('og-tags')
    <!-- Open Graph -->
    <meta property="og:url" content="{{url('/')}}/{{$hotel->is_news === 1?'new':'post'}}/{{$hotel->alias}}" />
    <meta property="og:type" content="{{$hotel->is_news === 1 ? 'NewsArticle' : 'Article'}}" />
    <meta property="og:title" content="{{$hotel->title}}" />
    <meta property="og:description" content="{{$hotel->description}}" />
    <meta property="og:image" content="{{url('/')}}/storage/{{$hotel->img}}" />
    <meta property="og:image:alt" content="{{$hotel->title}}" />
    <meta property="article:published_time" content="{{$hotel->created_at}}" />
    <!-- End Open Graph -->

    <!-- Подключение CSS Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- Подключение CSS темы Owl Carousel (опционально) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection

@section('main')
    <nav class="container-fluid" style="background-color: #e9ecef">
        <div class="container">
            {{ Breadcrumbs::render('hotels.show', $hotel) }}
        </div>
    </nav>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ $hotel->name }}</h1>
                <p><i class="bi bi-geo-alt-fill"></i> {{ $hotel->location->name }}, {{ $hotel->location->type == 'region' ? 'Регион' : 'Страна' }}</p>
                <div class="info-card mb-4">
                    <table class="info-table">
                        <tr>
                            <td>Цена: от <span class="blue">{{ number_format($hotel->price_per_month, 2, '.', '') }}₽ кВт/ч</span></td>
                            <td>Мин. количество: <span class="blue">{{ $hotel->min_devices }} Устройств</span></td>
                        </tr>
                        <tr>
                            <td>Тип энергии: <span class="blue">{{ $hotel->energyType->name }}</span></td>
                            <td>Мощность: <span class="blue">{{ $hotel->energy_capacity }} МВт</span></td>
                        </tr>
                    </table>
                </div>
                <p>{!!   $hotel->description !!}</p>

                <!-- Теги -->
                <div class="tags">
                    @foreach ($hotel->conditions as $condition)
                        <span class="badge custom-badge"><img src="{{ asset('images/conditions_icons/'.$condition->icon) }}" class="condition-icon" style="filter: brightness(0) saturate(100%) invert(11%) sepia(38%) saturate(939%) hue-rotate(185deg) brightness(100%) contrast(86%)"> {{ $condition->name }}</span>
                    @endforeach
                </div>

                <!-- Кнопка заявки -->
                <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#hotelModal">
                    Заявка на размещение
                </button>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <img id="mainImage" src="{{ asset('storage/' . $hotel->pictures[0]) }}" class="main-img" alt="Main Image">
                </div>
                <div class="d-flex mt-3 justify-content-center">

                    @foreach ($hotel->pictures as $picture)
                        <img src="{{ asset('storage/' . $picture) }}" class="thumbnail-img mx-2" alt="Thumbnail" onclick="changeImage(this)">
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeImage(element) {
            document.getElementById('mainImage').src = element.src;
        }
    </script>
@endsection
    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        <script>
            function changeImage(element) {
                var mainImage = document.getElementById('mainImage');
                mainImage.src = element.src;
            }
        </script>
    @endsection

    @section('title')
        {{$hotel->title}}
    @endsection
    @section('description')
        <meta name="description" content="{{$hotel->description}}"/>
    @endsection
