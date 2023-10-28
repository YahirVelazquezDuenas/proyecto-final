<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aceite>
 */
use App\Models\Aceite;

class AceiteFactory extends Factory
{
    protected $model = Aceite::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'tipo' => $this->faker->randomElement(['vegetal', 'animal', 'mineral']),
            'cantidad' => $this->faker->randomNumber(2),
            'precio' => $this->faker->randomFloat(2, 1, 1000),
            'marca' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
        ];
    }
}
