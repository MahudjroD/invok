<?php

namespace App\Models;

use App\Observers\InvoiceObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'invoices';
	protected $fillable = [
		'author_id',
		'agent_id',
		'customer_id',
		'project_id',
		'currency_code',
		'tax',
		'date_issue',
		'date_due',
		'amount',
		'discount',
		'status',
		'deleted_at',
	];
	
	public function project()
	{
		return $this->belongsTo(Project::class,'project_id','id');
	}
	
	public function currency()
	{
		return $this->belongsTo(Currency::class,'currency_code','code');
	}
	
	public function customer()
	{
		return $this->belongsTo(Customer::class, 'customer_id', 'id');
	}
	
	public function author()
	{
		return $this->belongsTo(User::class, 'author_id', 'id');
	}
	
	public function agent()
	{
		return $this->belongsTo(User::class, 'agent_id', 'id');
	}
	
	public function items()
	{
		return $this->hasMany(InvoiceItem::class, 'invoice_id', 'id');
	}
	
	public function payments()
	{
		return $this->hasMany(Payment::class, 'invoice_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		Invoice::observe(InvoiceObserver::class);
	}
}
