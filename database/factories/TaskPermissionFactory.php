<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\TaskPermission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskPermissionFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = TaskPermission::class;
	
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'task_id'  => Task::factory()->create()->id,
			'user_id'  => User::factory()->create()->id,
			'added_at' => $this->faker->dateTime,
			'access'   => $this->faker->randomElement(['read', 'update', 'full']),
		];
	}
}
