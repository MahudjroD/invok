<?php


namespace App\Models\Setting;


use App\Models\Setting\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting
{
	use UploadTrait;
	
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			$value['purchase_code'] = env('PURCHASE_CODE', '');
			$value['app_name'] = config('app.name');
			$value['slogan'] = config('settings.slogan');
			$value['logo'] = config('settings.logo');
			$value['favicon'] = config('settings.favicon');
			//dd($value['favicon']);
			/*$value['auto_detect_language'] = '0';
			$value['date_format'] = config('larapen.core.dateFormat.default');
			$value['datetime_format'] = config('larapen.core.datetimeFormat.default');
			$value['logo_dark'] = config('larapen.admin.logo.dark');
			$value['logo_light'] = config('larapen.admin.logo.light');
			$value['vector_charts_type'] = 'morris_bar';
			$value['show_countries_charts'] = '1';
			$value['general_settings_as_submenu_in_sidebar'] = '1';*/
			
		} else {
			$value = json_decode($value, true);
			foreach ($value as $key => $item) {
				if ($key == 'logo') {
					if (!$disk->exists($value['logo'])) {
						$value[$key] = config('settings.logo');
					} else {
						$value[$key] = url('storage/' . $item);
					}
				}
				
				if ($key == 'favicon') {
					if (!$disk->exists($value['favicon'])) {
						$value[$key] = config('settings.favicon');
					} else {
						$value[$key] = $item;
					}
				}
				
				if ($key == 'purchaseCode') {
					$value['purchase_code'] = $item;
				}
				
				if ($key == 'appName') {
					$value['app_name'] = $item;
				}
				
				if ($key == 'appSlogan') {
					$value['slogan'] = $item;
				}
			}
			
			// Required keys & values
			// If $value exists and these keys don't exist, then set their default values
			if (!in_array('logo', array_keys($value))) {
				$value['logo'] = config('settings.logo');
			}
			if (!in_array('favicon', array_keys($value))) {
				$value['favicon'] = config('settings.favicon');
			}
		}
		
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		
		// Image quality
		$imageQuality = config('settings.upload.image_quality', 90);
		
		if (isset($value['logo'])) {
			// Image default sizes
			$width = (int)config('settings.upload.img_resize_logo_width', 454);
			$height = (int)config('settings.upload.img_resize_logo_height', 80);
			
			// Other parameters
			$ratio = config('settings.upload.img_resize_logo_ratio', '1');
			$upSize = config('settings.upload.img_resize_logo_upsize', '1');
			
			$logo = [
				'attribute' => 'logo',
				'path'      => 'files/logo/',
				'default'   => config('settings.logo'),
				'width'     => $width,
				'height'    => $height,
				'ratio'     => $ratio,
				'upsize'    => $upSize,
				'quality'   => $imageQuality,
				'filename'  => 'logo-',
				'orientate' => false,
			];
			$value = self::upload($setting, $value, $logo);
		}
		
		// Favicon
		if (isset($value['favicon'])) {
			$favicon = [
				'attribute' => 'favicon',
				'path'      => 'files/logo/',
				'default'   => config('larapen.core.favicon'),
				'width'     => (int)config('larapen.core.picture.otherTypes.favicon.width', 32),
				'height'    => (int)config('larapen.core.picture.otherTypes.favicon.height', 32),
				'ratio'     => config('larapen.core.picture.otherTypes.favicon.ratio', '1'),
				'upsize'    => config('larapen.core.picture.otherTypes.favicon.upsize', '0'),
				'quality'   => $imageQuality,
				'filename'  => 'ico-',
				'orientate' => false,
			];
			$value = self::upload($setting, $value, $favicon);
		}
		
		return $value;
		
	}
	
}