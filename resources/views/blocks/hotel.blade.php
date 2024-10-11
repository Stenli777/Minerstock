<div class="card mb-3 bg-dark-blue" style="border-radius: 0; max-width: 18rem; overflow: hidden;">
    <div class="image-container position-relative">
        <a href="/hotels/{{$hotel->alias}}">
            <img class="card-img"
                 src="/{{!empty($hotel->pictures) ? "storage/{$hotel->pictures[0]}" : "images/uploads/asics/placeholder.png"}}"
                 alt="изображение {{$hotel->name}}" style="height: 180px; object-fit: cover; width: 100%;">
            <div class="overlay">
                <h5 class="card-title text-white p-2 m-0">{{ $hotel->name }}</h5>
            </div>
        </a>
    </div>
    <div class="card-body text-white">
        <!-- Местоположение отеля -->
        <p class="card-text text-light"><i class="bi bi-geo-alt-fill"></i> {{ $hotel->location->name }}</p>

        <!-- Иконки условий -->
        <div class="mb-3">
            @foreach ($hotel->conditions as $condition)
                <img src="{{ asset('images/conditions_icons/'.$condition->icon) }}" class="condition-icon">
            @endforeach
        </div>

        <!-- Цена и мощность -->
        <ul class="list-unstyled">
            <li><strong>Цена:</strong> от {{ number_format($hotel->price_per_month, 2) }}₽/кВт/ч</li>
            <li><strong>Мощность:</strong> {{ $hotel->energy_capacity }} МВт</li>
        </ul>

        <!-- Кнопка -->
        <div class="d-flex justify-content-center">
            <a href="/hotels/{{$hotel->alias}}" class="btn btn-custom mt-2">Подробнее</a>
        </div>
    </div>
</div>
