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

class App extends Model implements Sitemapable
{
    use HasFactory, \App\Traits\CommentTrait;


    protected $guarded = false;

    public function save(array $options = []): bool
    {
        $this->alias = Str::slug($this->name);
        $this->hashed_link = Str::random();
        $moscowTime = 'Asia/Aden';
        $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at, $moscowTime)
            ->setTimezone('UTC');
        return parent::save($options);
    }
    public function toSitemapTag(): Url|string|array
    {
        $post = route('app.show', $this->alias);
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


    public function tags()
    {
        return $this->belongsToMany(AppTag::class,'app_app_tags');
    }

    public function blockchains()
    {
        return $this->belongsToMany(Blockchain::class, 'app_blockchain');
    }
}
