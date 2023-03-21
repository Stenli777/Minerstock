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

    public static function aliasToId($alias) {
        $entity = self::query()->where('alias', '=', $alias)->first();
        return $entity->id;
    }
}
