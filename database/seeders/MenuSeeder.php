<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('menus')->truncate();
		
		$arrayMenu = [
			[
				'url'        => '#',
				'name'       => 'Dashboard',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
				'i18n'       => 'Dashboard',
				'icon'       => 'desktop',
				'tag'        => '2',
				'tagcustom'  => 'badge badge-light-danger badge-pill badge-round float-right mr-2',
				'submenu'    =>
					[
						[
							'url'        => 'theme/',
							'name'       => 'eCommerce',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,		   												tableManager-delete',
							'i18n'       => 'eCommerce',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'theme/dashboard-analytics',
							'name'       => 'Analytics',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,		   												tableManager-delete',
							'i18n'       => 'Analytics',
							'icon'       => 'bx bx-right-arrow-alt',
						],
					],
			],
			[
				'navheader' => 'Apps',
			],
			[
				'url'        => 'customers',
				'name'       => 'Customers',
				'permission' => 'tableManager-read,tableManager-create,
								tableManager-update,tableManager-delete,customer-read,
								customer-create,customer-update,customer-delete',
				'i18n'       => 'Customers',
				'icon'       => 'notebook',
				'submenu'    =>
					[
						[
							'url'        => 'customers',
							'name'       => 'Customers List',
							'permission' => 'tableManager-read,tableManager-create,
											tableManager-update,tableManager-delete,customer-read,
											customer-create,customer-update,customer-delete',
							'i18n'       => 'Customers List',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'customers/create',
							'name'       => 'Customers Add',
							'permission' => 'tableManager-read,tableManager-create,
											tableManager-update,tableManager-delete,
											customer-create,customer-update,customer-delete',
							'i18n'       => 'Customers Add',
							'icon'       => 'bx bx-right-arrow-alt',
						],
					],
			],
			[
				'url'        => 'admin/users',
				'name'       => 'Users',
				'permission' => 'tableManager-read,tableManager-create,
								tableManager-update,tableManager-delete,',
				'i18n'       => 'Users',
				'icon'       => 'users',
				'submenu'    =>
					[
						[
							'url'        => 'admin/users',
							'name'       => 'List',
							'permission' => 'tableManager-read,tableManager-create,
											tableManager-update,tableManager-delete',
							'i18n'       => 'List',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'admin/roles',
							'name'       => 'Roles',
							'permission' => 'tableManager-read,tableManager-create,
											tableManager-update,tableManager-delete',
							'i18n'       => 'Roles',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'admin/permissions',
							'name'       => 'Permissions',
							'permission' => 'tableManager-read,tableManager-create,
											tableManager-update,tableManager-delete',
							'i18n'       => 'Permissions',
							'icon'       => 'bx bx-right-arrow-alt',
						],
					],
			],
			[
				'url'        => 'projects/#',
				'name'       => 'Project',
				'permission' => 'tableManager-read,tableManager-create,
								tableManager-update,tableManager-delete,project-read,
								project-create,project-update,project-delete',
				'i18n'       => 'Project',
				'icon'       => 'grid',
				'submenu'    =>
					[
						[
							'url'        => 'projects',
							'name'       => 'Project List',
							'permission' => 'tableManager-read,tableManager-create,
											tableManager-update,tableManager-delete,project-read,
											project-create,project-update,project-delete',
							'i18n'       => 'Project List',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'projects/create',
							'name'       => 'Project Add',
							'permission' => 'tableManager-read,tableManager-create,
											 tableManager-update,tableManager-delete,project-create,
											 project-update,project-delete,',
							'i18n'       => 'Project Add',
							'icon'       => 'bx bx-right-arrow-alt',
						],
					],
			],
			[
				'url'        => 'tasks',
				'name'       => 'Task',
				'permission' => 'tableManager-read,tableManager-create,
								tableManager-update,tableManager-delete,
								task-read,task-create,task-update,task-delete',
				'i18n'       => 'Task',
				'icon'       => 'check-alt',
			],
			[
				'url'        => 'sales/#',
				'name'       => 'Sales',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,
								 tableManager-delete,invoice-read,invoice-create,estimate-read,
								 estimate-create,estimate-update,estimate-delete',
				'i18n'       => 'Sales',
				'icon'       => 'shoppingcart-out',
				'submenu'    =>
					[
						[
							'url'        => 'invoices',
							'name'       => 'Invoices List',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,		   												tableManager-delete,invoice-read,invoice-create
											invoice-update,invoice-delete',
							'i18n'       => 'Invoices List',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'invoices/create',
							'name'       => 'Create Invoice',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,		   												 tableManager-delete,invoice-create
											invoice-update,invoice-delete',
							'i18n'       => 'Create Invoice',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'estimations',
							'name'       => 'Estimations List',
							'permission' => 'tableManager-read,tableManager-create,
											 tableManager-update,tableManager-delete,
											 estimate-read,estimate-create,estimate-update,estimate-delete',
							'i18n'       => 'Estimations List',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'estimations/create',
							'name'       => 'Create Estimation',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,
											 tableManager-delete,estimate-create,estimate-update,estimate-delete',
							'i18n'       => 'Create Estimation',
							'icon'       => 'bx bx-right-arrow-alt',
						],
					],
			],
			[
				'url'        => 'calendars',
				'name'       => 'Calendar',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,
								 tableManager-delete,calendar-read,event-create,event-update,event-delete',
				'i18n'       => 'Calendar',
				'icon'       => 'calendar',
			],
			/*[
				'url'        => 'settings',
				'name'       => 'Settings',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,
								 tableManager-delete,calendar-read,event-create,event-update,event-delete',
				'i18n'       => 'Setting',
				'icon'       => 'gears',
				
				'submenu' =>
					[
						[
							'url'        => 'settings#general',
							'name'       => 'General',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
							'i18n'       => 'General',
							'icon'       => 'bx bx-right-arrow-alt',
							
							'submenu' =>
								[
									[
										'url'        => 'customers',
										'name'       => 'Application',
										'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
										'i18n'       => 'staff',
										'icon'       => 'bx bx-right-arrow-alt',
									],
									[
										'url'        => 'customers',
										'name'       => 'MailS',
										'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
										'i18n'       => 'staff',
										'icon'       => 'bx bx-right-arrow-alt',
									],
									[
										'url'        => 'customers',
										'name'       => 'Sms',
										'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
										'i18n'       => 'staff',
										'icon'       => 'bx bx-right-arrow-alt',
									],
								],
						
						],
					
					],
			],*/
			[
				'navheader'  => 'Settings',
				'icon'       => 'gears',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
			],
			[
				'url'        => 'admin/settings',
				'name'       => 'General',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
				'i18n'       => 'General',
				
				/*'submenu' =>
					[
						[
							'url'        => 'admin/setting/application',
							'name'       => 'Application',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
							'i18n'       => 'application',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'admin/setting/mail',
							'name'       => 'Mail',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
							'i18n'       => 'mail',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'admin/setting/sms',
							'name'       => 'Sms',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
							'i18n'       => 'sms',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'admin/setting/upload',
							'name'       => 'Upload',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
							'i18n'       => 'upload',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'admin/setting/security',
							'name'       => 'Security',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
							'i18n'       => 'security',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'admin/setting/cron',
							'name'       => 'Cron',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
							'i18n'       => 'cron',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'admin/setting/backup',
							'name'       => 'Backup',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
							'i18n'       => 'backup',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'admin/setting/footer',
							'name'       => 'Footer',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
							'i18n'       => 'footer',
							'icon'       => 'bx bx-right-arrow-alt',
						],
						[
							'url'        => 'admin/setting/other',
							'name'       => 'Other',
							'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete',
							'i18n'       => 'other',
							'icon'       => 'bx bx-right-arrow-alt',
						],
					],*/
			],
			[
				'url'        => '#',
				'name'       => 'Colors',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete
								 color-read,color-create,color-update,color-delete',
				'i18n'       => 'Colors',
				'icon'       => 'drop',
			],
			[
				'url'        => '#',
				'name'       => 'Countries',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete,
								 country-read,country-create,country-update,country-delete',
				'i18n'       => 'Countries',
				'icon'       => 'globe',
			],
			[
				'url'        => '#',
				'name'       => 'Currencies',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete
								 currency-read,currency-create,currency-update,currency-delete',
				'i18n'       => 'Currencies',
				'icon'       => 'us-dollar',
			],
			[
				'url'        => '#',
				'name'       => 'EventCategory',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete
								 eventCategory-read,eventCategory-create,eventCategory-update,eventCategory-delete',
				'i18n'       => 'EventCategory',
				'icon'       => 'thumbnails-big',
			],
			[
				'url'        => '#',
				'name'       => 'Status',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete,
								status-read,status-create,status-update,status-delete',
				'i18n'       => 'Status',
				'icon'       => 'check',
			],
			[
				'url'        => '#',
				'name'       => 'Tag',
				'permission' => 'tableManager-read,tableManager-create,tableManager-update,tableManager-delete
								tag-read,tag-create,tag-update,tag-delete',
				'i18n'       => 'Tag',
				'icon'       => 'tag',
			],
		];
		
		foreach ($arrayMenu as $menu) {
			$submenus = [];
			$parentSubMenuId=0;
			if (isset($menu['submenu'])) {
				$submenus[] = $menu['submenu'];
				unset($menu['submenu']);
			}
			$lft = isset($rgt) ? ($rgt + 1) : 1;
			$depth = 0;
			$menu['parent_id'] = 0;
			$tableName = (new Menu())->getTable();
			$parentId = DB::table($tableName)->insertGetId($menu);
			$parentId = intval($parentId);
			
			DB::table($tableName)->where('id', $parentId)->update(['lft' => $lft, 'depth' => $depth]);
			while (!empty($submenus)){
				if (!empty($submenus)) {
					unset($menu);
					$menu = $submenus;
					unset($submenus);
					$depth = $depth + 1;
					foreach ($menu as $arrayMenu) {
						foreach ($arrayMenu as $arrayArrayMenu) {
							if (isset($arrayArrayMenu['submenu'])) {
								$submenus[] = $arrayArrayMenu['submenu'];
								unset($arrayArrayMenu['submenu']);
							}
							$lft = $lft + 1;
							$rgt = $lft + 1;
							//$sub['parent_id'] = $parentId;
							//dd($sub);
							
							$subIds = DB::table($tableName)->insertGetId($arrayArrayMenu);
							$subIds = intval($subIds);
							$parentSubMenuId = $subIds;
							DB::table($tableName)->where('id', $subIds)->update([
								'parent_id' => $parentId,
								'lft'       => $lft,
								'rgt'       => $rgt,
								'depth'     => $depth,
							]);
						}
					}
					$parentId = $parentSubMenuId;
					$rgt = isset($rgt) ? ($rgt + 1) : 2;
				} else {
					$rgt = isset($lft) ? ($lft + 1) : 2;
				}
			}
			
			
			DB::table($tableName)->where('id', $parentId)->update(['rgt' => $rgt]);
		}
		
	}
}
