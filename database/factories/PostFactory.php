<?php

namespace Database\Factories;

use Faker\Provider\ru_RU\Text;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
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
            'title' => $provider->realTextBetween(50),
            'description' => $provider->realTextBetween(50, 150),
            'content' => $provider->realTextBetween(200, 1000),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
