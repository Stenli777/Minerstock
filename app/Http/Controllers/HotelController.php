<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function show(Request $request, $alias){
        $hotel = Hotel::with('location', 'energyType', 'conditions')->where('alias', $alias)->first();
        dd($hotel);
    }
}
