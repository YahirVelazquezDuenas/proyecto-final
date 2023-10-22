<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleCompra>
 */
use App\Models\DetalleCompra;

class DetalleCompraFactory extends Factory
{
    protected $model = DetalleCompra::class;

    public function definition()
    {
        return [
            'id_compra' => \App\Models\Compras::factory(),
            'id_aceite' => \App\Models\Aceite::factory(),
            'cantidad' => $this->faker->randomNumber(2),
        ];
    }
}