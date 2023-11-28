<?php

namespace App\Models;

use App\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Company extends Model
{
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'companies';
	protected $fillable = [
		'name',
		'logo_path',
		'email',
		'address',
		'city',
		'country_code',
		'deleted_at',
	];
	
	public function country()
	{
		return $this->belongsTo(Country::class, 'country_code', 'code');
	}
	
	public function customers()
	{
		return $this->hasMany(Customer::class, 'company_id', 'id');
	}
	
	protected static  function boot()
	{
		parent::boot();
		Company::observe(CompanyObserver::class);
	}
}
