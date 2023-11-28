<?php

namespace App\Models;

use App\Observers\TaskCommentObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TaskComment extends Model
{
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'task_comments';
	protected $fillable = [
		'task_id',
		'user_id',
		'message',
		'deleted_at',
	];
	
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
		TaskComment::observe(TaskCommentObserver::class);
	}
}
