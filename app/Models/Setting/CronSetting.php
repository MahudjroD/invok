<?php


namespace App\Models\Setting;


class CronSetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['unactivated_posts_expiration'] = '30';
			$value['activated_posts_expiration'] = '30';
			$value['archived_posts_expiration'] = '7';
			$value['manually_archived_posts_expiration'] = '90';
			
		} else {
			$value = json_decode($value,true);
			if (!isset($value['unactivated_posts_expiration'])) {
				$value['unactivated_posts_expiration'] = '30';
			}
			if (!isset($value['activated_posts_expiration'])) {
				$value['activated_posts_expiration'] = '30';
			}
			if (!isset($value['archived_posts_expiration'])) {
				$value['archived_posts_expiration'] = '7';
			}
			if (!isset($value['manually_archived_posts_expiration'])) {
				$value['manually_archived_posts_expiration'] = '90';
			}
			
		}
		
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
}