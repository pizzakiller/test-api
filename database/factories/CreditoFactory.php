<?php

namespace Database\Factories;

use App\Models\Credito;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CreditoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Credito::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

            return [
                'cliente_id' => $this->faker->numberBetween(1,10),
                'monto' => $this->faker->numberBetween(2552,54845),
                'num_cuotas' => $this->faker->numberBetween(12,48)

        ];
    }
}
