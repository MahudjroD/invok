<?php

namespace Database\Factories;

use App\Models\Estimation;
use App\Models\Invoice;
use App\Models\Statut;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstimationFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Estimation::class;
	
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$status = Statut::all()->pluck('id');
		
		return [
			'invoice_id' => Invoice::factory()->create()->id,
			'status_id' => $this->faker->randomElement($status),
		
		];
	}
}
