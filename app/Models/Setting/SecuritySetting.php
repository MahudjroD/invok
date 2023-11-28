<?php


namespace App\Models\Setting;


class SecuritySetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['login_open_in_modal'] = '1';
			$value['login_max_attempts'] = '5';
			$value['login_decay_minutes'] = '15';
			
		} else {
			$value = json_decode($value,true);
			if (!isset($value['login_open_in_modal'])) {
				$value['login_open_in_modal'] = '1';
			}
			if (!isset($value['login_max_attempts'])) {
				$value['login_max_attempts'] = '5';
			}
			if (!isset($value['login_decay_minutes'])) {
				$value['login_decay_minutes'] = '15';
			}
			
		}
		//dd($value);
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
}