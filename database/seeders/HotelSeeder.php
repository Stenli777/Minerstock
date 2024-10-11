<?php

namespace Database\Seeders;

use App\Models\Condition;
use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::factory()
            ->count(10)
            ->create()
            ->each(function ($hotel) {
                // Привязываем случайные условия из базы данных
                $conditions = Condition::inRandomOrder()->limit(3)->pluck('id');
                $hotel->conditions()->attach($conditions);
            });

    }
}
