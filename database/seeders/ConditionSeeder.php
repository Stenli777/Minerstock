<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = [
            ['name' => 'Договор'],
            ['name' => 'Безналичный расчет'],
            ['name' => 'Оплата криптовалютой'],
            ['name' => 'Техническая поддержка'],
            ['name' => 'Система мониторинга устройств'],
            ['name' => 'Доступ к площадке'],
            ['name' => 'Ремонт оборудования'],
            ['name' => 'Логистика'],
        ];

        Condition::insert($conditions);
    }
}
