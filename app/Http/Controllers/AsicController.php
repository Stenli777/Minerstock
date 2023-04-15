<?php

namespace App\Http\Controllers;

use App\Models\Asic;
use App\Models\Cbrf;
use App\Models\Coin;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (preg_match('/^\d+$/', $id)) {
            $model = Asic::query()->find($id);
            if (!$model) {
                return response('', 404);
            }
            return redirect("/asic/{$model->alias}", 301);
        }
        $model = Asic::with('producer', 'algorythm', 'coins')->where('alias', $id)->first();
        $usd = Cbrf::query()->latest()->first('usdrub')->usdrub;
        return view('asic', [
            'asic' => $model,
            'comments' => $model->comments(),
            'asics' => Asic::where([
                ['algorythm_id', $model->algorythm_id],
                ['id', '!=', $model->id]
            ])->inRandomOrder()->paginate(4),
            'usd' => $usd,
            'expenses' => (float)str_replace(',', '.', $request->input('expenses', 0.83)),
            'simular' => Asic::where([
                ['name', $model->name],
                ['id', '<>', $model->id]
            ])->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function favorite($asic_id) {
        $user_id = Auth::id();
        $asic = Asic::query()->find($asic_id);
        if (!$user_id) return;
        $favorite = Favorite::query()->where(['asic_id' => $asic_id, 'user_id' => $user_id])->first();
        if ($favorite) {
            $favorite->delete();
        } else {
            $favorite = new Favorite([
                'asic_id' => $asic_id,
                'user_id' => $user_id,
            ]);
            $favorite->save();
        }
        return;
    }
}
