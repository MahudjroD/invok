<?php

namespace App\Models;

use App\Observers\EventObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'events';
	protected $fillable = [
		'author_id',
		'category_id',
		'subject',
		'location',
		'description',
		'started_date',
		'end_date',
		'period_as_busy',
		'reminder_before',
		'reminder_before_type',
		'deleted_at',
	];
	
	public function category()
	{
		return $this->belongsTo(EventCategory::class, 'category_id', 'id');
	}
	
	public function author()
	{
		return $this->belongsTo(User::class, 'author_id', 'id');
	}
	
	protected static  function boot()
	{
		parent::boot();
		Event::observe(EventObserver::class);
	}
}
