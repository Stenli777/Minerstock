<div class="card mb-3" style="border-radius: 0">
    <div class="text-center" style="min-height: 200px;">
        <img href="{{$post->is_news === 1?'/new/':'/post/'}}{{$post->alias}}" class="card-img"
             src="/{{$post->img ? $post->img : "images/uploads/asics/placeholder.png"}}"
             alt="изображение {{$post->title}}">
    </div>
    <div class="card-body pt-0">
        <p><a href="{{$post->is_news === 1?'/new/':'/post/'}}{{$post->alias}}">{{$post->title}}</a></p>
        <a href="{{$post->is_news === 1?'/new/':'/post/'}}{{$post->alias}}">{{date('d.m.Y',$post->create_at)}}</a>
    </div>
</div>
