<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Modelo;
use App\Models\Zona;

class AscensorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $nModelos= Modelo::all()->pluck('id')->toArray();
        return [
            'n_serie' => $this->faker->numberBetween(1000,9999),
            'modelo_id' => $this->faker->randomElement($nModelos),
            'direccion'=>$this->faker->address(),
            'zona_id' => $this->faker->randomElement(['Arriaga','Lakua','Sansomendi','Ibaiondo']),
            'segmento'=>$this->faker->randomElement(['industrial','hospital','comercial','residencial']),
            'sala_maquinas'=>$this->faker->boolean(),
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
