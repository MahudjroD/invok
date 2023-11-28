<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Estimation;
use App\Models\Event;
use App\Models\EventGuest;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Item;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Project;
use App\Models\ProjectFollower;
use App\Models\ProjectUser;
use App\Models\Task;
use App\Models\TaskAttachment;
use App\Models\TaskComment;
use App\Models\TaskFollower;
use App\Models\TaskPermission;
use App\Models\TaskUser;
use App\Models\Tax;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FakerSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		$tables = [
			'companies',
			'customers',
			'events',
			'invoices',
			'invoice_items',
			'items',
			'payments',
			'payment_methods',
			'projects',
			'project_followers',
			'task_attachments',
			'task_comments',
			'tasks',
			'task_permissions',
			'taxes',
			'users',
			'event_guests'
		];
		foreach ($tables as $table) {
			DB::table($table)->truncate();
		}
		
		$entryLimit = 5;
		$relEntryLimit = 4;
		User::factory()
			->count($entryLimit)
			->has(Customer::factory()->count($relEntryLimit), 'customers')
			->has(Event::factory()->count($relEntryLimit), 'events')
			->has(Invoice::factory()->count($relEntryLimit), 'invoices')
			->has(Project::factory()->count($relEntryLimit), 'projects')
			->has(TaskComment::factory()->count($relEntryLimit), 'taskComments')
			->has(Task::factory()->count($relEntryLimit), 'tasks')
			->has(TaskPermission::factory()->count($relEntryLimit), 'taskPermissions')
			->create();
		
		User::factory()->create([
			'name'     => 'Joel Djossou',
			'email'    => 'superAdmin@example.fr',
			'password' => Hash::make('123456'),
		]);
		
		User::factory()->create([
			'name'     => 'Harold Zinzindohoue',
			'email'    => 'admin@example.com',
			'password' => Hash::make('123456'),
		]);
		
		Item::factory()
			->count($entryLimit)
			->has(InvoiceItem::factory()->count($relEntryLimit), 'invoices')
			->create();
		
		PaymentMethod::factory()
			->count($entryLimit)
			->has(Payment::factory()->count($relEntryLimit), 'payments')
			->create();
		
		Tax::factory()
			->count($entryLimit)
			->create();
		//
		
		Company::factory()
			->count($entryLimit)
			->has(Customer::factory()->count($relEntryLimit), 'customers')
			->create();
		
		Customer::factory()
			->count($entryLimit)
			->has(Invoice::factory()->count($relEntryLimit), 'invoices')
			->create();
		
		Event::factory()
			->count($entryLimit)
			->create();
		
		EventGuest::factory()
			->count($entryLimit)
			->create();
		
		Invoice::factory()
			->count($entryLimit)
			->has(InvoiceItem::factory()->count($relEntryLimit), 'items')
			->has(Payment::factory()->count($relEntryLimit), 'payments')
			->create();
		
		Payment::factory()
			->count($entryLimit)
			->create();
		
		Project::factory()
			->count($entryLimit)
			->has(ProjectFollower::factory()->count($relEntryLimit), 'followers')
			->has(Task::factory()->count($relEntryLimit), 'tasks')
			->create();
		
		ProjectFollower::factory()
			->count($entryLimit)
			->create();
		
		TaskAttachment::factory()
			->count($entryLimit)
			->create();
		
		TaskComment::factory()
			->count($entryLimit)
			->create();
		
		Task::factory()
			->count($entryLimit)
			->has(TaskAttachment::factory()->count($relEntryLimit), 'attachments')
			->has(TaskComment::factory()->count($relEntryLimit), 'comments')
			->has(TaskPermission::factory()->count($relEntryLimit), 'taskPermissions')
			->create();
		
		TaskPermission::factory()
			->count($entryLimit)
			->create();
		
		Estimation::factory()
			->count($entryLimit)
			->create();
	}
}
