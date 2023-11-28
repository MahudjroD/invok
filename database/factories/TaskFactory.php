<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Project;
use App\Models\Statut;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		$colors = Color::all()->pluck('id');
		$status = Statut::where('related_to','tasks')->pluck('id');
        return [
			'author_id'        => User::factory()->create()->id,
			'color_id'         => $this->faker->randomElement($colors),
			'status_id'        => $this->faker->randomElement($status),
			'project_id'       => Project::factory()->create()->id,
			'subject'          => $this->faker->word,
			'description'      => $this->faker->text,
			'assigned_to'      => User::factory()->create()->id,
			'start_date'       => $this->faker->dateTime,
			'due_date'         => $this->faker->dateTime,
			'priority'         => $this->faker->randomElement(['low', 'high', 'medium', 'urgent']),
			'recurrent_every'  => $this->faker->randomElement([
				'disable',
				'1-week',
				'2-weeks',
				'1-month',
				'2-two months',
				'3-year',
				'custom',
			]),
			'recurrent_custom' => $this->faker->name,
		];
    }
}
