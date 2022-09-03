<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model' => $this->faker->word,
            'plates' => 'BG' . $this->faker->numberBetween(100, 2500) . $this->faker->randomLetter . $this->faker->randomLetter
        ];
    }
}
