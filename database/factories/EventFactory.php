<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Event::class;
	
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$categories = EventCategory::all()->pluck('id');
		$start_date = $this->faker->dateTimeBetween('+0 days', '+1 month');
		$start_date_clone = clone $start_date;
		
		$end_date = $this->faker->dateTimeBetween($start_date, $start_date_clone->modify('+5 hours'));
		
		
		return [
			'author_id'            => User::factory()->create()->id,
			'category_id'          => $this->faker->randomElement($categories),
			'subject'              => $this->faker->word,
			'description'          => $this->faker->text,
			'location'             => $this->faker->address,
			'started_date'         => $start_date,
			'end_date'             => $end_date,
			'reminded_before'      => 18,
			'reminded_before_type' => $this->faker->randomElement(
				['minutes', 'hours', 'days', 'weeks', 'months', 'years']),
			'period_as_busy'       => $this->faker->boolean,
		];
	}
}
