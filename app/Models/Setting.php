<?php

namespace App\Models;

use App\Helpers\Files\Storage\StorageDisk;
use App\Models\Setting\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Setting extends Model
{
	use HasFactory,UploadTrait;
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'settings';
	
	//protected $fakeColumns = ['value'];
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';
	
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var boolean
	 */
	public $timestamps = false;
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $guarded = ['id'];
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'key', 'name', 'value', 'description', 'field', 'parent_id', 'lft', 'rgt', 'depth', 'active'];
	
	/**
	 * The attributes that should be hidden for arrays
	 *
	 * @var array
	 */
	// protected $hidden = [];
	
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	// protected $dates = [];
	
	protected $casts = [
		'value' => 'array',
	];
	
	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	/*protected static function boot()
	{
		parent::boot();
		
		Setting::observe(SettingObserver::class);
	}*/
	
	public function getValueAttribute($value)
	{
		$disk = StorageDisk::getDisk();
		$settingClassName = ucfirst(Str::camel($this->key)) . 'Setting';
		$settingNamespace = '\\App\Models\Setting\\';
		$settingClass = $settingNamespace . $settingClassName;
		if (class_exists($settingClass)) {
			if (method_exists($settingClass, 'getValues')) {
				$value = $settingClass::getValues($value,$disk);
			}
		}
		
		return $value;
	}
	
	public function setValueAttribute($value)
	{
		$settingClassName = ucfirst(Str::camel($this->key)) . 'Setting';
		$settingNamespace = '\\App\Models\Setting\\';
		$settingClass = $settingNamespace . $settingClassName;
		if (class_exists($settingClass)) {
			if (method_exists($settingClass, 'setValues')) {
				$value = $settingClass::setValues($value, $this);
			}
		}
		$this->attributes['value'] = json_encode($value);
		return $value;
	}
	
}
