<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       // dd($this);
        return [
            'currency' => 'nullable|string|in:USD,EUR,GBP,RUB',
            'verified' => 'nullable|boolean',
            'price_min' => 'nullable|numeric|min:0',
            'price_max' => 'nullable|numeric|min:0',
            'min_count_min' => 'nullable|numeric|min:0',
            'min_count_max' => 'nullable|numeric|min:0',
            'power_min' => 'nullable|numeric|min:0',
            'power_max' => 'nullable|numeric|min:0',
            'locations' => 'nullable|array',
            'locations.*' => 'nullable|integer|exists:locations,id',
            'energy_types' => 'nullable|array',
            'energy_types.*' => 'nullable|integer|exists:energy_types,id',
            'conditions' => 'nullable|array',
            'conditions.*' => 'nullable|integer|exists:conditions,id',
        ];
    }

//    public function messages()
//    {
//        return [
//            'currency.in' => 'Неверный формат валюты.',
//            'locations.*.exists' => 'Выбранная локация не существует.',
//            'energy_types.*.exists' => 'Выбранный тип энергии не существует.',
//            'conditions.*.exists' => 'Выбранное условие не существует.',
//        ];
//    }
}
