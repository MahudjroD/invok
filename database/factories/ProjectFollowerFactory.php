<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectFollower;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFollowerFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = ProjectFollower::class;
	
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'project_id' => Project::factory()->create()->id,
			'user_id'    => User::factory()->create()->id,
			'added_at'   => $this->faker->dateTime,
			'access'     => $this->faker->randomElement(['read', 'update', 'full']),
			'added_by'   => User::factory()->create()->id,
		];
	}
}
