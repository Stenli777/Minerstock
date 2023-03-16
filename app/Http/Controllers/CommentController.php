<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request, $entity, $alias) {
        $entity_types = [
            'post' => 'Post',
            'asic' => 'Asic',
            'new' => 'Post'
        ];
        $entity_model = 'App\\Models\\' . $entity_types[$entity];
        $id = $entity_model::aliasToId($alias);
        $comment = new Comment([
            'entity' => $entity_model,
            'entity_id' => $id,
            'email' => $request->input('email'),
            'content_orig' => $request->input('content'),
            'content' =>  $request->input('content'),
        ]);
        $comment->save();
        return redirect(\URL::previous());
    }

    public function show($entity, $alias) {
        $entity_types = [
            'post' => 'Post',
        ];
        $entity_model = 'App\\Models\\' . $entity_types[$entity];
        $id = $entity_model::aliasToId($alias);
        $model = $entity_model::find($id);
        return response()->json($model->comments());
    }
}
