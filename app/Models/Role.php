<?php

namespace App\Models;

use App\Observers\RoleObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as OriginalRole;

class Role extends OriginalRole
{
    use HasFactory;
	
	protected $fillable = [
		'name',
		'guard_name'
	];
    
    protected static function boot(){
		parent::boot();
    	Role::observe(RoleObserver::class);
	}
	
	public static function getSuperAdminRole()
	{
		$role = 'super-admin';
		
		return $role;
	}
	
	
	public static function checkSuperAdminRole()
	{
		try {
			$role = Role::where('name', Role::getSuperAdminRole())->first();
			if (empty($role)) {
				return false;
			}
		} catch (\Exception $e) {}
		
		return true;
	}
}
