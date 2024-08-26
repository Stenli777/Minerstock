<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function show(Request $request, $alias)
    {
        $app = App::where('alias', $alias)->first();
        //dd($app->comments());
        return view('app', [
            'app' => $app,
            'comments' => $app->comments(),
            'avgRating' => $app->avgRating()
        ]);
    }

    public function link($hash){
        $app = App::where('hashed_link', $hash)->first();
        return redirect($app->referral_link);
    }

}
