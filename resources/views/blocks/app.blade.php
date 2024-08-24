<div class="card mb-3" style="border-radius: 0">
    <div class="text-center" style="">
        <a href="/app/{{$post->alias}}">
        <img href="/app/{{$post->alias}}" class="card-img"
             src="/{{$post->img ? "storage/{$post->img}" : "images/uploads/asics/placeholder.png"}}"
             alt="изображение {{$post->name}}">
        </a>
    </div>
    <div class="card-body pt-0 mt-3">
        <p><a href="/app/{{$post->alias}}">{{$post->name}}</a></p>
        <a href="/app/{{$post->alias}}">{{$post->publicDate()}}</a>
    </div>
</div>
