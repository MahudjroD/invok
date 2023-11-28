<?php

namespace App\Models;

use App\Observers\CountryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	use HasFactory;
	
	protected $table = 'countries';
	protected $primaryKey = 'code';
	protected $keyType = 'string';
	public $incrementing = false;
	
	protected $fillable = [
		'code',
		'name',
		'tld',
		'continent_code',
		'currency_code',
		'int_calling_code',
		'languages',
	];
	
	public function currency()
	{
		return $this->belongsTo(Currency::class, 'currency_code', 'code');
	}
	
	public function companies()
	{
		return $this->hasMany(Company::class, 'country_code', 'code');
	}
	
	public function customers()
	{
		return $this->hasMany(Customer::class, 'country_code', 'code');
	}
	
	protected static  function boot()
	{
		parent::boot();
		Country::observe(CountryObserver::class);
	}
}
