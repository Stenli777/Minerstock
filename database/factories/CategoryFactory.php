<?php

namespace Database\Factories;

use Faker\Provider\ru_RU\Text;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $provider = new Text($this->faker);
        return [
            'title' => $provider->realText(100),
            'description' => $provider->realTextBetween(50, 150),
        ];
    }
}
