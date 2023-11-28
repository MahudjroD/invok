<?php

namespace App\Models;

use App\Observers\ColorObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	use HasFactory;
	
	protected $table = 'colors';
	public $timestamps = false;
	protected $fillable = [
		'name',
		'class',
	];
	
	public function eventCategories()
	{
		return $this->hasMany(EventCategory::class, 'color_id', 'id');
	}
	
	public function tags()
	{
		return $this->hasMany(Tag::class, 'color_id', 'id');
	}
	
	public function tasks()
	{
		return $this->hasMany(Task::class, 'color_id', 'id');
	}
	protected static  function boot()
	{
		parent::boot();
		Color::observe(ColorObserver::class);
	}
}

