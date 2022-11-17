<?php

namespace App\Http\Controllers;

use App\Models\Asic;
use App\Models\Coin;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Asic::with('producer','algorythm','coins')->find($id);
//        $coin = Coin::with('wtm_coin')->where('id',[1,2,3,4,5])->get();
//        $coin = Coin::with('wtm_coin')->find(1);
//        $algorythmCoin = Coin::with('wtm_coin')->where('algorythm_id',$model->algorythm_id)->get();
//        $wtm_coin = $coin->wtm_coin()->orderByDesc('id')->first();
        return view('asic',['asic'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
