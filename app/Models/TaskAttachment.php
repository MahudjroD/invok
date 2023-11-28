<?php

namespace App\Models;

use App\Observers\TaskAttachmentObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TaskAttachment extends Model
{
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'task_attachments';
	protected $fillable = [
		'task_id',
		'mime',
		'file_path',
	];
	
	public function task()
	{
		return $this->belongsTo(Task::class, 'task_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		TaskAttachment::observe(TaskAttachmentObserver::class);
	}
}
