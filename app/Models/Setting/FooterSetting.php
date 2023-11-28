<?php


namespace App\Models\Setting;


class FooterSetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['hide_payment_plugins_logos'] = '1';
			
		} else {
			$value = json_decode($value,true);
			if (!isset($value['hide_payment_plugins_logos'])) {
				$value['hide_payment_plugins_logos'] = '1';
			}
			
		}
		
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
}