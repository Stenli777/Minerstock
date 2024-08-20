<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;


class AppTag extends Model implements Sitemapable
{
    use HasFactory;
    protected $table = 'app_tags';
    protected $guarded = false;

    public function save(array $options = []): bool
    {
        $this->alias = Str::slug($this->name);
        return parent::save($options);
    }

    public function toSitemapTag(): Url | string | array
    {
        return Url::create(route('app_tag', $this->alias))->setPriority(0.8);
    }
}
