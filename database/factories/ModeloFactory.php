<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModeloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'marca' => $this->faker->randomElement(['Eleser','Embarba','Fuji','Orona','Schindler']),
            'modelo' => $this->faker->numberBetween(100,999),
            'peso'=>$this->faker->numberBetween(1000,9999),
            'peso_max'=>$this->faker->numberBetween(100,999),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}