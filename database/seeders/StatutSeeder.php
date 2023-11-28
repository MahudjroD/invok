<?php

namespace Database\Seeders;

use App\Models\Statut;
use Illuminate\Database\Seeder;

class StatutSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$status = [
			[
				'name'       => 'not started',
				'related_to' => 'tasks',
			],
			[
				'name'       => 'paid',
				'related_to' => 'invoices',
			],
			[
				'name'       => 'mark as in progress',
				'related_to' => 'tasks',
			],
			[
				'name'       => 'mark as testing',
				'related_to' => 'tasks',
			],
			[
				'name'       => 'mark as awating feedback',
				'related_to' => 'tasks',
			],
			[
				'name'       => 'mark as complete',
				'related_to' => 'tasks',
			],
			[
				'name'       => 'cancelled',
				'related_to' => 'tasks',
			],
			[
				'name'       => 'in progress',
				'related_to' => 'projects',
			],
			[
				'name'       => 'on hold',
				'related_to' => 'projects',
			],
			[
				'name'       => 'cancelled',
				'related_to' => 'projects',
			],
			[
				'name'       => 'finished',
				'related_to' => 'projects',
			],
			[
				'name'       => 'unpaid',
				'related_to' => 'invoices',
			],
			[
				'name'       => 'partially paid',
				'related_to' => 'invoices',
			],
			[
				'name'       => 'approved',
				'related_to' => 'estimations',
			],
			[
				'name'       => 'declined',
				'related_to' => 'estimations',
			],
			[
				'name'       => 'draft',
				'related_to' => 'estimations',
			],
			[
				'name'       => 'sent',
				'related_to' => 'estimations',
			],
			[
				'name'       => 'expired',
				'related_to' => 'estimations',
			],
		];
		 foreach ($status as $statu){
		 	Statut::Create($statu);
		 }
	}
}
