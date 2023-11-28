<?php

namespace App\Models;

use App\Observers\PermissionObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission as OriginalPermission;


class Permission extends OriginalPermission
{
	use HasFactory;
	
	protected $fillable = [
		'name',
		'guard_name',
	];
	
	protected static function boot()
	{
		parent::boot();
		Permission::observe(PermissionObserver::class);
	}
	
	/*public static function getSuperAdminPermissions()
	{
		$permissions = [
			'permission-list',
			'permission-create',
			'permission-update',
			'permission-delete',
			'role-list',
			'role-create',
			'role-update',
			'role-delete',
		];
		
		return $permissions;
	}*/
	
	/*public static function checkDefaultPermissions()
	{
		if (!Role::checkSuperAdminRole() || !Permission::checkSuperAdminPermissions()) {
			return false;
		}
		
		return true;
	}*/
	
	/*public static function checkSuperAdminPermissions()
	{
		
		try {
			$superAdminPermissions = (array)self::getSuperAdminPermissions();
			if (!empty($superAdminPermissions)) {
				foreach ($superAdminPermissions as $superAdminPermission) {
					$permissions = Permission::where('name', $superAdminPermission)->first();
					if (empty($permissions)) {
						return false;
					}
				}
			} else {
				return false;
			}
		} catch (\Exception $e) {
		}
		
		return true;
	}*/
	
	/*public static function getRoutesPermissions()
	{
		$routeCollection = Route::getRoutes();
		
		$defaultAccess = ['list', 'create', 'update', 'delete', 'menu'];
		$defaultAllowAccess = ['list', 'create', 'update', 'delete'];
		$defaultDenyAccess = ['reorder', 'menu'];
		
		// Controller's Action => Access
		$accessOfActionMethod = [
			'index'                    => 'list',
			'show'                     => 'list',
			'search'                   => 'list',
			'country'                  => 'list',
			'invoice'                  => 'list',
			'project'                  => 'list',
			'getDashboardProjectData'  => 'list',
			'getDashboardTaskData'     => 'list',
			'preview'                  => 'list',
			'menu'                     => 'list',
			'create'                   => 'create',
			'store'                    => 'create',
			'storeItem'                => 'create',
			'invoicePayment'           => 'create',
			'edit'                     => 'update',
			'update'                   => 'update',
			'restore'                  => 'update',
			'updatePayment'            => 'update',
			'convertToInvoice'         => 'update',
			'delete'                   => 'delete',
			'multipleDelete'           => 'delete',
			'deletePayment'            => 'delete',
			'deleteItem'               => 'delete',
			'deleteFromPreview'        => 'delete',
			/*'reorder'                  => 'update',
			'saveReorder'              => 'update',
			'listRevisions'            => 'update',
			'restoreRevision'          => 'update',
			'destroy'                  => 'delete',
			'bulkDelete'               => 'delete',
			'saveAjaxRequest'          => 'update',
			'dashboard'                => 'access', // Dashboard
			'redirect'                 => 'access', // Dashboard
			'syncFilesLines'           => 'update', // Languages
			'showTexts'                => 'update', // Languages
			'updateTexts'              => 'update', // Languages
			'createDefaultPermissions' => 'create', // Permissions
			'reset'                    => 'delete', // Homepage Sections
			'download'                 => 'download', // Backup
			'banUserByEmail'           => 'ban-users-email', // Blacklist
			'make'                     => 'make', // Inline Requests
			'install'                  => 'install', // Plugins
			'uninstall'                => 'uninstall', // Plugins
			'reSendVerificationEmail'  => 'resend-verification-notification',
			'reSendVerificationSms'    => 'resend-verification-notification',
			'systemInfo'               => 'info',
			
			'createBulkCountriesSubDomain' => 'create', // Domain Mapping
			'generate'                     => 'create'
		];*/
		
		/*$tab = $data = [];
		foreach ($routeCollection as $key => $value){
			// Init.
			$data['filePath'] = null;
			$data['actionMethod'] = null;
			$data['methods'] = [];
			$data['permission'] = null;
			
			// Get & Clear the route prefix
			$routePrefix = $value->getPrefix();
			$routePrefix = trim($routePrefix, '/');
			if ($routePrefix != 'admin') {
				$routePrefix = head(explode('/', $routePrefix));
			}else{
				$data['methods'] = $value->methods();
				
				$data['uri'] = $value->uri();
				$data['uri'] = preg_replace('#\{[^\}]+\}#', '*', $data['uri']);
				
				$controllerActionPath = $value->getActionName();
			}
		}
		
	}*/
}

