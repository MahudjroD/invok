<?php

namespace App\Models;

use App\Observers\InvoiceItemObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'invoice_items';
	public $timestamps = false;
	protected $fillable = [
		'invoice_id',
		'item_id',
		'tax',
		'item_name',
		'item_description',
		'item_price',
		'quantity',
		'total',
		'deleted_at',
	];
	
	public function invoice()
	{
		return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
	}
	
	public function item()
	{
		return $this->belongsTo(Item::class, 'item_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		InvoiceItem::observe(InvoiceItemObserver::class);
	}
}
