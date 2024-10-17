<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelFilterRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function show(Request $request, $alias){
        $hotel = Hotel::with('location', 'energyType', 'conditions')->where('alias', $alias)->first();
        $hotel->pictures = json_decode($hotel->pictures);
        return view('hotel', compact('hotel'));
    }

    public function all(HotelFilterRequest $request){
        //dd($request);
        // Получаем данные после валидации

        //dd($validated);
        $hotels = Hotel::query();
        //dd($request->all());
        $filters = [
            'currency' => request('currency', 'RUB'),
            'verified' => request('verified', 0),
            'price_min' => request('price_min', 0),
            'price_max' => request('price_max', 10),
            'min_count_min' => request('min_count_min', 0),
            'min_count_max' => request('min_count_max', 6),
            'power_min' => request('power_min', 0),
            'power_max' => request('power_max', 87),
            'locations' => request('locations', []),
            'energy_types' => request('energy_types', []),
            'conditions' => request('conditions', [])
        ];
        if(count($request->all()) > 0) {
            $validated = $request->validated();
//            if (isset($validated['currency'])) {
//                // Логика пересчета по валюте
//            }

            if (isset($validated['verified']) && $validated['verified']) {
                $hotels->where('verified', $validated['verified']);
            }

            if (isset($validated['price_min']) && isset($validated['price_max'])) {
                $hotels->whereBetween('price_per_month', [$validated['price_min'], $validated['price_max']]);
            }

            if (isset($validated['min_count_min']) && isset($validated['min_count_max'])) {
                $hotels->whereBetween('min_devices', [intval($validated['min_count_min']), intval($validated['min_count_max'])]);
            }

            if (isset($validated['power_min']) && isset($validated['power_max'])) {
                $hotels->whereBetween('power', [$validated['power_min'], $validated['power_max']]);
            }

            if (!empty($validated['locations'])) {
                $hotels->whereIn('location_id', $validated['locations']);
            }

            if (!empty($validated['energy_types'])) {
                $hotels->whereIn('energy_type_id', $validated['energy_types']);
            }

            if (!empty($validated['conditions'])) {
                $hotels->whereHas('conditions', function ($query) use ($validated) {
                    $query->whereIn('conditions.id', $validated['conditions']);
                });
            }
        }

        $hotels = $hotels->with('location', 'energyType', 'conditions')->get();
        foreach ($hotels as $key => $hotel){
            $hotels[$key]->pictures = json_decode($hotel->pictures);
        }

        return view('hotels', compact('hotels', 'filters'));

    }
}
