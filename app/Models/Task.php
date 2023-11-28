<?php

namespace App\Models;

use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class    Task extends Model
{
	
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'tasks';
	protected $fillable = [
		'author_id',
		'project_id',
		'color_id',
		'status_id',
		'subject',
		'description',
		'assigned_to',
		'start_date',
		'due_date',
		'priority',
		'lft',
		'rgt',
		'recurrent_every',
		'recurrent_custom',
		'deleted_at',
	];
	
	public function color()
	{
		return $this->belongsTo(Color::class, 'color_id', 'id');
	}
	
	public function statu()
	{
		return $this->belongsTo(Statut::class, 'status_id', 'id');
	}
	
	public function attachments()
	{
		return $this->hasMany(TaskAttachment::class, 'task_id', 'id');
	}
	
	public function comments()
	{
		return $this->hasMany(TaskComment::class, 'task_id', 'id');
	}
	
	public function author()
	{
		return $this->belongsTo(User::class, 'author_id', 'id');
	}
	
	public function project()
	{
		return $this->belongsTo(Project::class,'project_id','id');
	}
	
	public function taskPermissions()
	{
		return $this->hasMany(TaskPermission::class, 'task_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		Task::observe(TaskObserver::class);
	}
}
