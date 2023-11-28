<?php

namespace App\Models;

use App\Observers\PaymentObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Payment extends Model
{
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'payments';
	protected $fillable = [
		'invoice_id',
		'customer_id',
		'payment_method_id',
		'amount',
		'date_payment',
		'deleted_at'
	];
	
	public function invoice()
	{
		return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
	}
	
	public function customer()
	{
		return $this->belongsTo(Customer::class, 'customer_id', 'id');
	}
	
	public function method()
	{
		return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		Payment::observe(PaymentObserver::class);
	}
}
