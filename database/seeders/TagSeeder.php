<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('tags')->truncate();
		$tags = [
			[
				'color_id'   => 1,
				'name'       => 'Design'
			],
			[
				'color_id'   => 2,
				'name'       => 'Frontend'
			],
			[
				'color_id'   => 3,
				'name'       => 'Backend'
			],
			[
				'color_id'   => 4,
				'name'       => 'Issue'
			],
			[
				'color_id'   => 5,
				'name'       => 'Wireframe'
			],
		];
		
		foreach ($tags as $tag) {
			Tag::create($tag);
		}
	}
}
