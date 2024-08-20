<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
//    public function index($entity, $alias) {
//        $comments = Comment::all();
//        return view('blocks.comment_form', ['comments' => $comments]);
//    }

    public function create(Request $request, $entity, $alias) {
        $entity_types = [
            'post' => 'Post',
            'asic' => 'Asic',
            'new' => 'Post',
            'app' => 'App',
        ];
        $entity_model = 'App\\Models\\' . $entity_types[$entity];
        $id = $entity_model::aliasToId($alias);
        $comment = new Comment([
            'entity' => $entity_model,
            'entity_id' => $id,
            'nickname' => $request->input('nickname'),
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
            'asic' => 'Asic',
            'new' => 'Post'
        ];
        $entity_model = 'App\\Models\\' . $entity_types[$entity];
        $id = $entity_model::aliasToId($alias);
        $model = $entity_model::find($id);
        return response()->json($model->comments());
    }
}
