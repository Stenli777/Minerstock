<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class MiningPool extends Model implements Sitemapable
{
    use HasFactory, \App\Traits\CommentTrait;

    public function save(array $options = []): bool
    {
        $this->alias = Str::slug($this->name);
        $this->title = "Майнинг пул $this->name";
        $this->description = "Майнинг пул $this->name";
        return parent::save($options);
    }

    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('mining_pool.show', $this->alias))->setPriority(0.9);
    }
}
