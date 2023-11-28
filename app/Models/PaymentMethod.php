<?php

namespace App\Models;

use App\Observers\PaymentMethodObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PaymentMethod extends Model
{
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'payment_methods';
	public $timestamps = false;
	protected $fillable = [
		'slug',
		'name',
		'description',
		'deleted_at',
	];
	
	public function payments()
	{
		return $this->hasMany(PaymentMethod::class, 'payment_method_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		PaymentMethod::observe(PaymentMethodObserver::class);
	}
}
