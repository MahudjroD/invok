<?php


namespace App\Models\Setting;


class SmsSetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['nexmo_key'] = env('NEXMO_KEY', '');
			$value['nexmo_secret'] = env('NEXMO_SECRET', '');
			$value['nexmo_from'] = env('NEXMO_FROM', '');
			$value['twilio_username'] = env('TWILIO_USERNAME', '');
			$value['twilio_password'] = env('TWILIO_PASSWORD', '');
			$value['twilio_auth_token'] = env('TWILIO_AUTH_TOKEN', '');
			$value['twilio_account_sid'] = env('TWILIO_ACCOUNT_SID', '');
			$value['twilio_from'] = env('TWILIO_FROM', '');
			$value['twilio_alpha_sender'] = env('TWILIO_ALPHA_SENDER', '');
			$value['twilio_sms_service_sid'] = env('TWILIO_SMS_SERVICE_SID', '');
			$value['twilio_debug_to'] = env('TWILIO_DEBUG_TO', '');
			
		} else {
			$value = json_decode($value, true);
			if (!isset($value['nexmo_key'])) {
				$value['nexmo_key'] = env('NEXMO_KEY', '');
			}
			if (!isset($value['nexmo_secret'])) {
				$value['nexmo_secret'] = env('NEXMO_SECRET', '');
			}
			if (!isset($value['nexmo_from'])) {
				$value['nexmo_from'] = env('NEXMO_FROM', '');
			}
			if (!isset($value['twilio_username'])) {
				$value['twilio_username'] = env('TWILIO_USERNAME', '');
			}
			if (!isset($value['twilio_password'])) {
				$value['twilio_password'] = env('TWILIO_PASSWORD', '');
			}
			if (!isset($value['twilio_auth_token'])) {
				$value['twilio_auth_token'] = env('TWILIO_AUTH_TOKEN', '');
			}
			if (!isset($value['twilio_account_sid'])) {
				$value['twilio_account_sid'] = env('TWILIO_ACCOUNT_SID', '');
			}
			if (!isset($value['twilio_from'])) {
				$value['twilio_from'] = env('TWILIO_FROM', '');
			}
			if (!isset($value['twilio_alpha_sender'])) {
				$value['twilio_alpha_sender'] = env('TWILIO_ALPHA_SENDER', '');
			}
			if (!isset($value['twilio_sms_service_sid'])) {
				$value['twilio_sms_service_sid'] = env('TWILIO_SMS_SERVICE_SID', '');
			}
			if (!isset($value['twilio_debug_to'])) {
				$value['twilio_debug_to'] = env('TWILIO_DEBUG_TO', '');
			}
			
		}
		
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
}