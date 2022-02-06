<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Ascensor;
use App\Models\User;

class IncidenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nSeries= Ascensor::all()->pluck('n_serie')->toArray();
     

        return [
            'prioridad' => $this->faker->randomElement(['0','1','2']),
            'estado'=>$this->faker->randomElement(['0','1','2']),
            'detalles_op'=>$this->faker->address(),
            'detalles_tec'=>$this->faker->address(),
            'tipo'=>$this->faker->randomElement(['electrica','mecanica','estetica']),

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
