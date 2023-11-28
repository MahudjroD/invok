<?php


namespace App\Models\Setting;


class OtherSetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['cookie_consent_enabled'] = '0';
			$value['show_tips_messages'] = '1';
			
		} else {
			$value = json_decode($value,true);
			if (!isset($value['cookie_consent_enabled'])) {
				$value['cookie_consent_enabled'] = '0';
			}
			if (!isset($value['show_tips_messages'])) {
				$value['show_tips_messages'] = '1';
			}
		}
		
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
}