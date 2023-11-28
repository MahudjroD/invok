<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Project;
use App\Models\Statut;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Project::class;
	
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$status = Statut::all()->pluck('id');
		$start_date = $this->faker->dateTimeBetween('+0 days', '+1 month');
		$start_date_clone = clone $start_date;
		
		$deadline = $this->faker->dateTimeBetween($start_date, $start_date_clone->modify('+5 hours'));
		
		return [
			'author_id'   => User::factory()->create()->id,
			'customer_id' => Customer::factory()->create()->id,
			'status_id'   => $this->faker->randomElement($status),
			'name'        => $this->faker->word,
			'description' => $this->faker->text,
			'start_date'  => $start_date,
			'deadline'    => $deadline,
			'draft'       => $this->faker->boolean,
		];
	}
}
