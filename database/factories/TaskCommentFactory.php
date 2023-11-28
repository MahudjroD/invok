<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TaskComment;

class TaskCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
			'task_id' => Task::factory()->create()->id,
			'user_id' => User::factory()->create()->id,
			'message' => $this->faker->text,
		];
    }
}
