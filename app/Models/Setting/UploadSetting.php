<?php


namespace App\Models\Setting;


use Illuminate\Support\Str;

class UploadSetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['file_types'] = 'pdf,doc,docx,word,rtf,rtx,ppt,pptx,odt,odp,wps,jpeg,jpg,bmp,png';
			$value['min_file_size'] = '0';
			$value['max_file_size'] = '2500';
			
			$value['image_types'] = 'jpg,jpeg,gif,png';
			$value['image_quality'] = '90';
			$value['min_image_size'] = '0';
			$value['max_image_size'] = '2500';
		
			
		} else {
			$value = json_decode($value, true);
			
			if (!isset($value['file_types'])) {
				$value['file_types'] = 'pdf,doc,docx,word,rtf,rtx,ppt,pptx,odt,odp,wps,jpeg,jpg,bmp,png';
			}
			if (!isset($value['min_file_size'])) {
				$value['min_file_size'] = '0';
			}
			if (!isset($value['max_file_size'])) {
				$value['max_file_size'] = '2500';
			}
			
			if (!isset($value['image_types'])) {
				$value['image_types'] = 'jpg,jpeg,gif,png';
			}
			if (!isset($value['image_quality'])) {
				$value['image_quality'] = '90';
			}
			if (!isset($value['min_image_size'])) {
				$value['min_image_size'] = '0';
			}
			if (!isset($value['max_image_size'])) {
				$value['max_image_size'] = '2500';
			}
			
			
			
		}
		
		
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
}