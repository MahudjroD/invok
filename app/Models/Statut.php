<?php

namespace App\Models;

use App\Observers\StatutObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
	protected $table='status';
	protected $fillable = ['name','related_to'];
	public $timestamps = false;
    use HasFactory;
	
	public function projects()
	{
		return $this->hasMany(Project::class, 'status_id', 'id');
	}
	
	public function estimations()
	{
		return $this->hasMany(Estimation::class, 'status_id', 'id');
	}
	
	public function tasks(){
		return $this->hasMany(Task::class,'status_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		Statut::observe(StatutObserver::class);
	}
}
