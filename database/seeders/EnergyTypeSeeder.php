<?php

namespace Database\Seeders;

use App\Models\EnergyType;
use Illuminate\Database\Seeder;

class EnergyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $energyTypes = [
            ['name' => 'Газогенерация'],
            ['name' => 'Гидроэнергетика'],
            ['name' => 'Теплоэнергетика'],
            ['name' => 'Ядерный'],
            ['name' => 'Электрический'],
            ['name' => 'Ветер'],
            ['name' => 'Неопределенные'],
        ];

        EnergyType::insert($energyTypes);
    }
}
