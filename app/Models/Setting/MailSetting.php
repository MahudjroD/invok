<?php


namespace App\Models\Setting;


class MailSetting
{
	public static function getValues($value)
	{
		
		if (empty($value)) {
			
			$value['sendmail_path'] = '/usr/sbin/sendmail -bs';
			if (env('APP_ENV') == 'local') {
				$value['sendmail_path'] = '/usr/bin/env catchmail -f some@from.address';
			}
			
		} else {
			$value = json_decode($value, true);
			if (!isset($value['sendmail_path'])) {
				$value['sendmail_path'] = '/usr/sbin/sendmail -bs';
				if (env('APP_ENV') == 'local') {
					$value['sendmail_path'] = '/usr/bin/env catchmail -f some@from.address';
				}
			}
			
		}
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
	
}