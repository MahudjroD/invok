<?php

namespace Database\Seeders;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		app()[PermissionRegistrar::class]->forgetCachedPermissions();
		
		$permissions = [
			[
				'name'       => 'invoice-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'invoice-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'invoice-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'invoice-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'estimation-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'estimation-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'estimation-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'estimation-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'customer-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'customer-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'customer-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'customer-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'project-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'project-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'project-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'project-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'task-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'task-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'task-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'task-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'calendar-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'event-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'event-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'event-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'tableManager-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'tableManager-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'tableManager-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'tableManager-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'color-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'color-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'color-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'color-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'country-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'country-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'country-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'country-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'currency-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'currency-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'currency-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'currency-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'eventCategory-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'eventCategory-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'eventCategory-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'eventCategory-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'menu-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'menu-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'menu-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'menu-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'status-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'status-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'status-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'status-delete',
				'guard_name' => 'web',
			],
			[
				'name'       => 'tag-read',
				'guard_name' => 'web',
			],
			[
				'name'       => 'tag-create',
				'guard_name' => 'web',
			],
			[
				'name'       => 'tag-update',
				'guard_name' => 'web',
			],
			[
				'name'       => 'tag-delete',
				'guard_name' => 'web',
			],
		
		];
		
		
		foreach ($permissions as $permission) {
			Permission::create($permission);
		}
		
		// create roles and assign existing permissions
		$superAdmin = Role::create(['name' => 'super-admin', 'guard_name' => 'web']);
		$superAdmin->givePermissionTo('tableManager-read');
		$superAdmin->givePermissionTo('tableManager-create');
		$superAdmin->givePermissionTo('tableManager-update');
		$superAdmin->givePermissionTo('tableManager-delete');
		
		$admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
		$admin->givePermissionTo('tableManager-read');
		$admin->givePermissionTo('tableManager-create');
		$userSuperAdmin = User::where('email','superAdmin@example.fr')->first();
		$userAdmin = User::where('email','admin@example.com')->first();
		$userSuperAdmin->assignRole($superAdmin);
		$userAdmin->assignRole($admin);
	}
}


