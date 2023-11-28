<?php

namespace App\Models;

use App\Observers\EventCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
	
	use HasFactory;
	
	protected $table = 'event_categories';
	public $timestamps = false;
	protected $fillable = [
		'name',
		'color_id',
	];
	
	public function color()
	{
		return $this->belongsTo(Color::class, 'color_id', 'id');
	}
	
	public function events()
	{
		return $this->hasMany(EventCategory::class, 'category_id', 'id');
	}
	
	protected static  function boot()
	{
		parent::boot();
		EventCategory::observe(EventCategoryObserver::class);
	}
}
