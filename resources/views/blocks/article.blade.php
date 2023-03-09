<div class="card mb-3" style="border-radius: 0">
    <div class="text-center" style="">
        <img href="{{$post->is_news === 1?'/new/':'/post/'}}{{$post->alias}}" class="card-img"
             src="/{{$post->img ? "storage/{$post->img}" : "images/uploads/asics/placeholder.png"}}"
             alt="изображение {{$post->title}}">
    </div>
    <div class="card-body pt-0 mt-3">
        <p><a href="{{$post->is_news === 1?'/new/':'/post/'}}{{$post->alias}}">{{$post->title}}</a></p>
        <a href="{{$post->is_news === 1?'/new/':'/post/'}}{{$post->alias}}">{{$post->publicDate()}}</a>
    </div>
</div>
