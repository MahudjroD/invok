<?php

namespace App\Models;

use App\Observers\UserObserver;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use HasFactory, Notifiable, HasRoles, SoftDeletes;
	
	protected $table = 'users';
	protected $fillable = [
		'name',
		'email',
		'password',
		'photo_path',
		'phone',
		'mobile_phone',
		'deleted_at',
	];
	
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];
	
	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];
	
	
	public function customers()
	{
		return $this->hasMany(Customer::class, 'author_id', 'id');
	}
	
	public function events()
	{
		return $this->hasMany(Event::class, 'author_id', 'id');
	}
	
	public function invoices()
	{
		return $this->hasMany(Invoice::class, 'author_id', 'id');
	}
	
	public function sales()
	{
		return $this->hasMany(Invoice::class, 'agent_id', 'id');
	}
	
	public function projects()
	{
		return $this->hasMany(Project::class, 'author_id', 'id');
	}
	
	public function tasks()
	{
		return $this->hasMany(Task::class, 'author_id', 'id');
	}
	
	
	public function projectFollowed()
	{
		return $this->hasMany(ProjectFollower::class, 'user_id', 'id');
	}
	
	public function taskComments()
	{
		return $this->hasMany(TaskComment::class, 'user_id', 'id');
	}
	
	public function taskPermissions()
	{
		return $this->hasMany(TaskPermission::class, 'user_id', 'id');
	}
	
	protected static function boot()
	{
		parent::boot();
		User::observe(UserObserver::class);
	}
	
	public function getFirstnameAttribute()
	{
		
		$name = explode(" ", $this['name']);
		$lastname = end($name);
		$firstname = str_replace($lastname, '', $name);
		$firstname = array_filter($firstname);
		$firstname = implode($firstname);
		
		return $firstname;
	}
	
	public function getLastnameAttribute()
	{
		$name = explode(" ", $this['name']);
		$lastname = end($name);
		return $lastname;
	}
	
	public function setPhotoAttribute($value)
	{
		$fullPath = storage_path() . '/app/public/files/' . $this->id . '/';
		$path = 'files/' . $this->id.'/';
		$filename = 'avatar_' . md5(time()). '.' . $value->getClientOriginalExtension();
		$filePath = $path.$filename. '';
		
		if (!file_exists($fullPath)){
			File::makeDirectory($fullPath, 0777, true);
		}
		$imageIntervention = Image::make($value->getRealPath());
		$imageIntervention->resize( function ($constraint) {
			$constraint->aspectRatio();
		});
		
		$imageIntervention->stream();
		/*$url =  __DIR__.'app/public/storage/users/20201005/avatar-s-1.jpg';
		$file = file_get_contents($url);*/
		//Storage::disk('public')->copy($file, $filePath);
		Storage::disk()->put($filePath,$imageIntervention);
		$this->attributes['photo_path'] = $filePath;
	}
	
	public function routeNotificationForMail($notification)
	{
		return $this->email;
		
	}
}
