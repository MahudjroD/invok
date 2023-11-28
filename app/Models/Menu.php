<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
	
	protected $table = 'menus';
	public $timestamps = false;
	protected $fillable = [
		'url',
		'name',
		'i18n',
		'icon',
		'tag',
		'tagcustom',
		'navheader',
		'parent_id',
		'lft',
		'rgt',
		'depth',
	];
	
	public function parents()
	{
		return $this->belongsTo(Menu::class, 'parent_id', '0');
	}
	
	public function childrens()
	{
		return $this->hasMany(Menu::class, 'parent_id', 'id');
	}
}
