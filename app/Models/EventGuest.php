<?php

namespace App\Models;

use App\Observers\EventGuestObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventGuest extends Model
{
	use SoftDeletes;
	protected $table = 'event_guests';
	protected $fillable = ['event_id', 'user_id', 'added_at','deleted_at'];
	public $timestamps = false;
	use HasFactory;
	
	protected static function boot()
	{
		parent::boot();
		EventGuest::observe(EventGuestObserver::class);
	}
}

