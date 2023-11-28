<?php

namespace App\Models;

use App\Observers\EstimationObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estimation extends Model
{
    use HasFactory;
    use softdeletes;
	
	protected $table = 'estimations';
	protected $fillable = [
		'invoice_id',
		'status_id',
		'deleted_at',
	];
	
	public function status(){
		return $this->belongsTo(Statut::class,'status_id','id');
	}
	protected static function boot()
	{
		parent::boot();
		Estimation::observe(EstimationObserver::class);
	}
}
