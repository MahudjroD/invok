<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventGuest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventGuestFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = EventGuest::class;
	
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'author_id' => User::factory()->create()->id,
			'event_id'  => Event::factory()->create()->id,
			'added_at'  => $this->faker->dateTime,
		];
	}
}
