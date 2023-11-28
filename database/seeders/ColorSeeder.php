<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('colors')->truncate();
		$colors = [
			[
				'name'  => 'Primary',
				'class' => 'primary',
			],
			[
				'name'  => 'Secondary',
				'class' => 'secondary',
			],
			[
				'name'  => 'Success',
				'class' => 'success',
			],
			[
				'name'  => 'Danger',
				'class' => 'danger',
			],
			[
				'name'  => 'Warning',
				'class' => 'warning',
			],
			[
				'name'  => 'Info',
				'class' => 'info',
			],
			[
				'name'  => 'Light',
				'class' => 'light',
			],
			[
				'name'  => 'Dark',
				'class' => 'dark',
			],
		];
		
		foreach ($colors as $color) {
			Color::create($color);
		}
	}
}
