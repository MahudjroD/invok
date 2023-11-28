<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCategorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('event_categories')->truncate();
		$eventCategories = [
			[
				'color_id' => 1,
				'name'     => 'My calendar',
			],
			[
				'color_id' => 2,
				'name'     => 'Company',
			],
			[
				'color_id' => 3,
				'name'     => 'Family',
			],
			[
				'color_id' => 4,
				'name'     => 'Friend',
			],
			[
				'color_id' => 5,
				'name'     => 'Travel',
			],
			[
				'color_id' => 6,
				'name'     => 'Birthday',
			],
			[
				'color_id' => 7,
				'name'     => 'Holiday',
			],
		];
		
		foreach ($eventCategories as $eventCategory) {
			EventCategory::create($eventCategory);
		}
	}
}
