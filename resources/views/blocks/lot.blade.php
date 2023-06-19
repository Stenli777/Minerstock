<div class="product-card js-link">
    <div class="product-card__image">
        <a href="/asic/{{$asic->alias}}">
            <img class="card-img-top" src="/{{$asic->img}}"
                 alt="изображение {{$asic->producer->name}} {{$asic->name}} {{$asic->humanHashrate()}}">
        </a>
    </div>
    <div class="product-card__name SemiBold">
        <a href="/asic/{{$asic->alias}}">
            {{$asic->producer->name}} {{$asic->name}}
            {{--        <br>--}}
            {{$asic->humanHashrate()}}
        </a>
    </div>
    <div class="product-card__params">
        <div class="product-card__params__item">Алгоритм: {{$asic->algorythm->name}}</div>
    </div>
    @if (\Illuminate\Support\Facades\Auth::id())
        <div class="toggle_favorite {{$asic->isFavorite()?'favorite':''}}" onclick="fetch(`/asic/{{$asic->id}}/favorite`); this.classList.toggle('favorite')" data-asic_id="{{$asic->id}}"></div>
    @endif
</div>

