<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['name' => 'Россия', 'type' => 'country'],
            ['name' => 'Казахстан', 'type' => 'country'],
            ['name' => 'США', 'type' => 'country'],
            ['name' => 'Норвегия', 'type' => 'country'],
            ['name' => 'Армения', 'type' => 'country'],
            ['name' => 'Парагвай', 'type' => 'country'],
            ['name' => 'Эфиопия', 'type' => 'country'],
        ];

        // Данные для регионов
        $regions = [
            ['name' => 'Раздан', 'type' => 'region'],
            ['name' => 'Москва', 'type' => 'region'],
            ['name' => 'Красноярск', 'type' => 'region'],
            ['name' => 'Удомля', 'type' => 'region'],
            ['name' => 'Иркутск', 'type' => 'region'],
            ['name' => 'Новый Уренгой', 'type' => 'region'],
            ['name' => 'Берген', 'type' => 'region'],
            ['name' => 'Кодинск', 'type' => 'region'],
            ['name' => 'Пермь', 'type' => 'region'],
            ['name' => 'Экибастуз', 'type' => 'region'],
            ['name' => 'Норильск', 'type' => 'region'],
            ['name' => 'Гатчина', 'type' => 'region'],
            ['name' => 'Верхняя Хава', 'type' => 'region'],
            ['name' => 'Амамбай', 'type' => 'region'],
            ['name' => 'Северная Дакота', 'type' => 'region'],
            ['name' => 'Кемерово', 'type' => 'region'],
            ['name' => 'Кандалакша', 'type' => 'region'],
            ['name' => 'Братск', 'type' => 'region'],
            ['name' => 'Челябинск', 'type' => 'region'],
            ['name' => 'Екатеринбург', 'type' => 'region'],
            ['name' => 'Троицк', 'type' => 'region'],
            ['name' => 'Сьюдад-дель-Эсте', 'type' => 'region'],
            ['name' => 'Кольчугино', 'type' => 'region'],
            ['name' => 'Александров', 'type' => 'region'],
            ['name' => 'Краснодар', 'type' => 'region'],
            ['name' => 'Солнечногорск', 'type' => 'region'],
            ['name' => 'Санкт‑Петербург', 'type' => 'region'],
            ['name' => 'Аддис-Абеба', 'type' => 'region'],
            ['name' => 'Петрозаводск', 'type' => 'region'],
            ['name' => 'Ангарск', 'type' => 'region'],
            ['name' => 'Тольятти', 'type' => 'region'],
            ['name' => 'Озерск', 'type' => 'region'],
            ['name' => 'Домодедово', 'type' => 'region'],
            ['name' => 'Амур', 'type' => 'region'],
            ['name' => 'Тула', 'type' => 'region'],
            ['name' => 'Хакасия', 'type' => 'region'],
            ['name' => 'Нижний Новгород', 'type' => 'region'],
            ['name' => 'Мурманск', 'type' => 'region'],
            ['name' => 'Липецкая область', 'type' => 'region'],
            ['name' => 'Актюбинская область', 'type' => 'region'],
            ['name' => 'Дивногорск', 'type' => 'region'],
            ['name' => 'Туим', 'type' => 'region'],
            ['name' => 'Липецк', 'type' => 'region'],
            ['name' => 'Челябинская область', 'type' => 'region'],
        ];

        Location::insert(array_merge($countries, $regions));
    }
}
