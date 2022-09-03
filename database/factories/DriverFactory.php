<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstNameMale,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'social_security_number' => $this->faker->numberBetween(200, 5000)
        ];
    }
}
