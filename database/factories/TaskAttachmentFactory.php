<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TaskAttachment;

class TaskAttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskAttachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
			'task_id'   => Task::factory()->create()->id,
			'mime'      => $this->faker->mimeType,
			'file_path' => $this->faker->text,
		];
    }
}
