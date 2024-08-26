<?php
namespace App\Traits;

use App\Models\Comment;

trait CommentTrait {
    public function comments(){
        $comments = Comment::query()
            ->where('entity', '=', self::class)
            ->where('entity_id', '=', $this->id)
            ->whereNotNull('moderated_at')
            ->get();
        return $comments;
    }

    public function avgRating(){
        $avg = Comment::query()
            ->where('entity', '=', self::class)
            ->where('entity_id', '=', $this->id)
            ->avg('rating');
        return $avg;
    }

    public static function aliasToId($alias) {
        $entity = self::query()->where('alias', '=', $alias)->first();
        return $entity->id;
    }
}
