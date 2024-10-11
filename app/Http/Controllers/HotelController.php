<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function show(Request $request, $alias){
        $hotel = Hotel::with('location', 'energyType', 'conditions')->where('alias', $alias)->first();
        $hotel->pictures = json_decode($hotel->pictures);
        return view('hotel', compact('hotel'));
    }

    public function all(Request $request){
        $hotels = Hotel::with('location', 'energyType', 'conditions')->get();
        foreach ($hotels as $key => $hotel){
            $hotels[$key]->pictures = json_decode($hotel->pictures);
        }
        return view('hotels', compact('hotels'));

    }
}
