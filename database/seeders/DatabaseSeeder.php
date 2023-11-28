<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(ColorSeeder::class);
		$this->call(EventCategorySeeder::class);
		$this->call(CountrySeeder::class);
		$this->call(CurrencySeeder::class);
		$this->call(TagSeeder::class);
		$this->call(StatutSeeder::class);
		$this->call(MenuSeeder::class);
		$this->call(SettingSeeder::class);
		$this->call(FakerSeeder::class);
		$this->call(PermissionSeeder::class);
		$this->call(MenuSeeder::class);
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
