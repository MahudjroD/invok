<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$entries = [
			[
				'key'         => 'app',
				'name'        => 'Application',
				'value'       => null,
				'description' => 'Application Setup',
				'field'       => null,
				'parent_id'   => null,
				'lft'         => '2',
				'rgt'         => '3',
				'depth'       => '1',
				'active'      => '1',
				'created_at'  => null,
				'updated_at'  => null,
			],
			[
				'key'         => 'mail',
				'name'        => 'Mail',
				'value'       => null,
				'description' => 'Mail Sending Configuration',
				'field'       => null,
				'parent_id'   => null,
				'lft'         => '10',
				'rgt'         => '11',
				'depth'       => '1',
				'active'      => '1',
				'created_at'  => null,
				'updated_at'  => null,
			],
			[
				'key'         => 'sms',
				'name'        => 'SMS',
				'value'       => null,
				'description' => 'SMS Sending Configuration',
				'field'       => null,
				'parent_id'   => null,
				'lft'         => '12',
				'rgt'         => '13',
				'depth'       => '1',
				'active'      => '1',
				'created_at'  => null,
				'updated_at'  => null,
			],
			[
				'key'         => 'upload',
				'name'        => 'Upload',
				'value'       => null,
				'description' => 'Upload Settings',
				'field'       => null,
				'parent_id'   => null,
				'lft'         => '14',
				'rgt'         => '15',
				'depth'       => '1',
				'active'      => '1',
				'created_at'  => null,
				'updated_at'  => null,
			],
			[
				'key'         => 'security',
				'name'        => 'Security',
				'value'       => null,
				'description' => 'Security Options',
				'field'       => null,
				'parent_id'   => null,
				'lft'         => '18',
				'rgt'         => '19',
				'depth'       => '1',
				'active'      => '1',
				'created_at'  => null,
				'updated_at'  => null,
			],
			[
				'key'         => 'cron',
				'name'        => 'Cron',
				'value'       => null,
				'description' => 'Cron Job',
				'field'       => null,
				'parent_id'   => null,
				'lft'         => '30',
				'rgt'         => '31',
				'depth'       => '1',
				'active'      => '1',
				'created_at'  => null,
				'updated_at'  => null,
			],
			[
				'key'         => 'footer',
				'name'        => 'Footer',
				'value'       => null,
				'description' => 'Pages Footer',
				'field'       => null,
				'parent_id'   => null,
				'lft'         => '32',
				'rgt'         => '33',
				'depth'       => '1',
				'active'      => '1',
				'created_at'  => null,
				'updated_at'  => null,
			],
			[
				'key'         => 'backup',
				'name'        => 'Backup',
				'value'       => null,
				'description' => 'Backup Configuration',
				'field'       => null,
				'parent_id'   => null,
				'lft'         => '34',
				'rgt'         => '35',
				'depth'       => '1',
				'active'      => '1',
				'created_at'  => null,
				'updated_at'  => null,
			],
			[
				'key'         => 'other',
				'name'        => 'Others',
				'value'       => null,
				'description' => 'other Options',
				'field'       => null,
				'parent_id'   => null,
				'lft'         => '36',
				'rgt'         => '37',
				'depth'       => '1',
				'active'      => '1',
				'created_at'  => null,
				'updated_at'  => null,
			],
		];
		
		$tableName = (new Setting())->getTable();
		foreach ($entries as $entry) {
			DB::table($tableName)->insert($entry);
		}
	}
}
