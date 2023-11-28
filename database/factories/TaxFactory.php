<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tax;

class TaxFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tax::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
			'name' => $this->faker->word,
			'rate' => $this->faker->randomFloat(),
			'type' => $this->faker->randomElement(['fix', 'percentage']),
		];
    }
}
