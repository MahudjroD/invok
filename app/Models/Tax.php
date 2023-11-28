<?php

namespace App\Models;

use App\Observers\TaxObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tax extends Model
{
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'taxes';
	public $timestamps = false;
	protected $fillable = [
		'name',
		'rate',
		'type',
		'deleted_at',
	];
	
	protected static function boot()
	{
		parent::boot();
		Tax::observe(TaxObserver::class);
	}
}
