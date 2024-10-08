<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class AppCategory extends Model implements Sitemapable
{
    use HasFactory;
    protected $guarded = false;
    public function app(){
        return $this->hasMany(App::class);
    }
    public function save(array $options = []): bool
    {
        $this->alias = Str::slug($this->title);

        return parent::save($options);
    }

    public function toSitemapTag(): Url | string | array
    {
        return Url::create(route('app.category', $this->alias))->setPriority(0.8);
    }

}
