<?php


namespace App\Models\Setting;


class BackupSetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['disable_notifications'] = '1';
			$value['keep_all_backups_for_days'] = '7';
			$value['keep_daily_backups_for_days'] = '16';
			$value['keep_weekly_backups_for_weeks'] = '8';
			$value['keep_monthly_backups_for_months'] = '4';
			$value['keep_yearly_backups_for_years'] = '2';
			$value['maximum_storage_in_megabytes'] = '5000';
			
		} else {
			
			$value = json_decode($value,true);
			if (!isset($value['disable_notifications'])) {
				$value['disable_notifications'] = '1';
			}
			if (!isset($value['keep_all_backups_for_days'])) {
				$value['keep_all_backups_for_days'] = '7';
			}
			if (!isset($value['keep_daily_backups_for_days'])) {
				$value['keep_daily_backups_for_days'] = '16';
			}
			if (!isset($value['keep_weekly_backups_for_weeks'])) {
				$value['keep_weekly_backups_for_weeks'] = '8';
			}
			if (!isset($value['keep_monthly_backups_for_months'])) {
				$value['keep_monthly_backups_for_months'] = '4';
			}
			if (!isset($value['keep_yearly_backups_for_years'])) {
				$value['keep_yearly_backups_for_years'] = '2';
			}
			if (!isset($value['maximum_storage_in_megabytes'])) {
				$value['maximum_storage_in_megabytes'] = '5000';
			}
			
		}
		
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
}