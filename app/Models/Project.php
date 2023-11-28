<?php

namespace App\Models;

use App\Observers\ProjectObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
	use SoftDeletes;
	use HasFactory;
	
	protected $table = 'projects';
	protected $fillable = [
		'author_id',
		'customer_id',
		'name',
		'description',
		'start_date',
		'deadline',
		'status_id',
		'draft',
		'deleted_at',
	];
	
	public function customer()
	{
		return $this->belongsTo(Customer::class, 'customer_id', 'id');
	}
	public function status()
	{
		return $this->belongsTo(Statut::class, 'status_id', 'id');
	}
	
	public function invoices()
	{
		return $this->hasMany(Invoice::class, 'project_id', 'id');
	}
	
	public function author()
	{
		return $this->belongsTo(User::class, 'author_id', 'id');
	}
	
	public function followers()
	{
		return $this->hasMany(ProjectFollower::class, 'project_id', 'id');
	}
	
	public function tasks(){
		return $this->hasMany(Task::class,'project_id','id');
	}
	
	protected static function boot()
	{
		parent::boot();
		Project::observe(ProjectObserver::class);
	}
}
