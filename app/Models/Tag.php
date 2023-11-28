<?php

namespace App\Models;

use App\Observers\TagObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	use HasFactory;
	
	protected $table = 'tags';
	public $timestamps = false;
	protected $fillable = [
		'name',
		'color_id'
	];
	
	public function color()
	{
		return $this->belongsTo(Color::class, 'color_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		Tag::observe(TagObserver::class);
	}
}
