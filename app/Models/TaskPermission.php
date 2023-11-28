<?php

namespace App\Models;


use App\Observers\TaskPermissionObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class TaskPermission extends Model
{
	use SoftDeletes;
	use Notifiable;
	
	protected $table = 'task_permissions';
	protected $fillable = ['task_id', 'user_id', 'added_at', 'added_by', 'access', 'deleted_at'];
	public $timestamps = false;
	use HasFactory;
	
	public function task()
	{
		return $this->belongsTo(Task::class, 'task_id', 'id');
	}
	
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		TaskPermission::observe(TaskPermissionObserver::class);
	}
	
	public function routeNotificationForMail($notification)
	{
		return $this->user->email;
		
	}
}
