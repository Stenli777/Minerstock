<?php

namespace App\Models;

use App\Events\NewsPublished;
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


    public function tags()
    {
        return $this->belongsToMany(AppTag::class,'app_app_tags');
    }
}
