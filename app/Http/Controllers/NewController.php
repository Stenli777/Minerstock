<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NewController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $alias)
    {
        $model = Post::with('category')->where('alias', $alias)->first();
        if($model->is_news == 0){
            return abort(404);
        }
        return view('post', [
            'post' => $model,
            'category' => $model->category,
            'comments' => $model->comments(),
            'avgRating' => $model->avgRating()
        ]);
    }

}
