<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compras>
 */
use App\Models\Compras;

class ComprasFactory extends Factory
{
    protected $model = Compras::class;

    public function definition()
    {
        return [
            'fecha' => $this->faker->date,
            'metodo' => $this->faker->randomElement(['efectivo', 'deposito', 'tarjeta']),
            'total' => $this->faker->randomFloat(2, 1, 1000),
            'id_cliente' => \App\Models\Cliente::factory(),
        ];
    }
}
