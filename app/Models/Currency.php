<?php

namespace App\Models;

use App\Observers\CurrencyObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
	use HasFactory;
	
	protected $table = 'currencies';
	protected $primaryKey = 'code';
	protected $keyType = 'string';
	public $incrementing = false;
	
	protected $fillable = [
		'code',
		'name',
		'html_entity',
		'symbol',
		'in_left',
		'decimal_places',
		'decimal_separator',
		'thousand_separator',
	];
	
	public function countries()
	{
		return $this->hasMany(Country::class, 'currency_code', 'code');
	}
	
	public function invoices ()
	{
		return $this->hasMany(Invoice::class,'currency_code','code');
	}
	
	protected static  function boot()
	{
		parent::boot();
		Currency::observe(CurrencyObserver::class);
	}
}
