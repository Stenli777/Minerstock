<?php

namespace Database\Factories;

use App\Models\EnergyType;
use App\Models\Hotel;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Hotel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company . ' Hosting',
            'description' => $this->faker->realText(500),
            'location_id' => Location::inRandomOrder()->first()->id,
            'price_per_month' => $this->faker->randomFloat(2, 3, 10),
            'min_devices' => $this->faker->numberBetween(50, 500),
            'power' => $this->faker->numberBetween(10, 100),
            'energy_type_id' => EnergyType::inRandomOrder()->first()->id,
            'pictures' => json_encode(['image1.jpg', 'image2.jpg']),
        ];
    }
}
