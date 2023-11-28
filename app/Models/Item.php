<?php

namespace App\Models;

use App\Observers\ItemObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'items';
	protected $fillable = [
		'name',
		'description',
		'type',
		'price',
		'deleted_at',
	];
	
	public function invoices()
	{
		return $this->hasMany(InvoiceItem::class, 'item_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		Item::observe(ItemObserver::class);
	}
}
