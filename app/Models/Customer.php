<?php

namespace App\Models;

use App\Observers\CustomerObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Customer extends Model
{
	use HasFactory,SoftDeletes,Notifiable;
	
	protected $table = 'customers';
	protected $fillable = [
		'country_code',
		'company_id',
		'author_id',
		'name',
		'phone_number',
		'email',
		'address',
		'city',
		'deleted_at',
	];
	
	public function company()
	{
		return $this->belongsTo(Company::class, 'company_id', 'id');
	}
	
	public function projects()
	{
		return $this->hasMany(Project::class, 'customer_id', 'id');
	}
	
	public function country()
	{
		return $this->belongsTo(Country::class, 'country_code', 'code');
	}
	
	public function invoices()
	{
		return $this->hasMany(Invoice::class, 'customer_id', 'id');
	}
	
	public function author()
	{
		return $this->belongsTo(User::class, 'author_id', 'id');
	}
	
	public function getFirstnameAttribute()
	{
		
		$name = explode(" ", $this['name']);
		$lastname = end($name);
		$firstnames = str_replace($lastname, '', $name);
		$firstnames = array_filter($firstnames);
		//dd($firstnames);
		$firstname = implode(" ", $firstnames);
		
		return $firstname;
	}
	
	public function getLastnameAttribute()
	{
		$name = explode(" ", $this['name']);
		$lastname = end($name);
		
		//dd($lastname);
		return $lastname;
	}
	
	protected static function boot()
	{
		parent::boot();
		Customer::observe(CustomerObserver::class);
	}
}
