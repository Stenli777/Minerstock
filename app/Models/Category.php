<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Category extends Model implements Sitemapable
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = false;

    public function post(){
        return $this->hasMany(Post::class);
    }
    public function save(array $options = []): bool
    {
        $this->alias = Str::slug($this->title);

        return parent::save($options);
    }
    public function toSitemapTag(): Url | string | array
    {
        return route('asic.show', $this->alias);
    }
}
