<?php

namespace App\Models;

use App\Notifications\ProjectCreated;
use App\Observers\ProjectFollowerObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class ProjectFollower extends Model
{
	use SoftDeletes;
	use HasFactory;
	use Notifiable;
	
	protected $table = 'project_followers';
	protected $fillable = ['project_id', 'user_id', 'added_at', 'added_by', 'access', 'deleted_at'];
	public $timestamps = false;
	
	public function project()
	{
		return $this->belongsTo(Project::class, 'project_id', 'id');
	}
	
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		ProjectFollower::observe(ProjectFollowerObserver::class);
	}
	
	public function routeNotificationForMail($notification)
	{
		return $this->user->email;
		
	}
}
