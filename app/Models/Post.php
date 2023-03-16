<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Post extends Model implements Sitemapable
{
    use HasFactory;

//    protected $table = 'posts';
//    protected $guarded = false;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function save(array $options = []): bool
    {
        $this->alias = Str::slug($this->title);

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
        return $this->created_at->format('d.m.Y');
    }

    public function comments(){
        $comments = Comment::query()
            ->where('entity', '=', self::class)
            ->where('entity_id', '=', $this->id)
            ->get();
//        dd($this->id, self::class, $comments);
        return $comments;
    }

    public static function aliasToId($alias) {
        $entity = self::query()->where('alias', '=', $alias)->first();
        return $entity->id;
    }

}
