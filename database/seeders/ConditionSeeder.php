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
            ['name' => 'Договор', 'icon' => 'paperwork.svg'],
            ['name' => 'Безналичный расчет', 'icon' => 'info-card.svg'],
            ['name' => 'Оплата криптовалютой', 'icon' => 'crypto.svg'],
            ['name' => 'Техническая поддержка', 'icon' => 'support.svg'],
            ['name' => 'Система мониторинга устройств', 'icon' => 'system-monitoring.svg'],
            ['name' => 'Доступ к площадке', 'icon' => 'access.svg'],
            ['name' => 'Ремонт оборудования', 'icon' => 'repair.svg'],
            ['name' => 'Логистика', 'icon' => 'location.svg'],
        ];

        Condition::insert($conditions);
    }
}
