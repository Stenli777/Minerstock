<?php

namespace App\Models;

use App\Events\NewsPublished;
use App\Jobs\PublishJob;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Post extends Model implements Sitemapable
{
    use HasFactory, \App\Traits\CommentTrait;

//    protected $table = 'posts';
//    protected $guarded = false;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags');
    }

    public function save(array $options = []): bool
    {
        $this->alias = Str::slug($this->title);
        $moscowTime = 'Europe/Moscow';
        $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at, $moscowTime)
            ->setTimezone('UTC');
        return parent::save($options);
    }

    public function toSitemapTag(): Url|string|array
    {
        if ($this->is_news === 0) {
            $post = route('post.show', $this->alias);
        } else {
            $post = route('new.show', $this->alias);
        }
        return $post;
    }

    public function publicDate()
    {
        if ($this->created_at) {
            return $this->created_at->format('d.m.Y');
        } else {
            return null;
        }
    }
    protected static function booted()
    {
        static::created(function ($post) {
            if ($post->created_at > now()) {
                PublishJob::dispatch($post)->delay($post->created_at);
            } else {
                event(new \App\Events\NewsPublished($post));
            }
        });
    }

    public function contentWithRtb()
    {
        $replacementCode = [
            '
        <div class="mt-3 mb-3" id="yandex_rtb_R-A-2404949-13"></div>
        <script>window.yaContextCb.push(()=>{
            Ya.Context.AdvManager.render({
                "blockId": "R-A-2404949-13",
                "renderTo": "yandex_rtb_R-A-2404949-13"
            })
        })
        </script>
        ',
            '
        <div class="mt-3 mb-3" id="yandex_rtb_R-A-2404949-14"></div>
        <script>window.yaContextCb.push(()=>{
            Ya.Context.AdvManager.render({
                "blockId": "R-A-2404949-14",
                "renderTo": "yandex_rtb_R-A-2404949-14"
            })
        })
        </script>
        ',
            '
        <div class="mt-3 mb-3" id="yandex_rtb_R-A-2404949-15"></div>
        <script>window.yaContextCb.push(()=>{
            Ya.Context.AdvManager.render({
                "blockId": "R-A-2404949-15",
                "renderTo": "yandex_rtb_R-A-2404949-15"
            })
        })
        </script>
        ',
        ];

        $callback = function($matches) use (&$replacementCode) {
            return array_shift($replacementCode);
        };

        return preg_replace_callback('/\[\[advert\]\]/', $callback, $this->content);
    }
}
