<?php


namespace App\Models\Setting\Traits;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait UploadTrait
{
	public static function upload($setting,$value,$params)
	{
		
		$attribute_name = $params['attribute'];
		$destination_path = $params['path'];
		if (!isset($value[$attribute_name])) {
			return $value;
		}
		
		
		// If the image was erased (Using $setting->value === Old value)
		if (empty($value[$attribute_name])) {
			// Delete the image from disk
			if (isset($setting->value) && isset($setting->value[$attribute_name])) {
				if (!empty($params['default'])) {
					if (!Str::contains($setting->value[$attribute_name], $params['default'])) {
						Storage::disk()->delete($setting->value[$attribute_name]);
					}
				} else {
					Storage::disk()->delete($setting->value[$attribute_name]);
				}
			}
			
			// Set null in the database column
			$value[$attribute_name] = null;
			
			return $value;
		}
		if ($attribute_name=='logo'){
			$fullPath = storage_path() . '/app/public/files/logo/';
		}
		
		if ($attribute_name=='favicon'){
			$fullPath = storage_path() . '/app/public/files/favicon/';
		}
		
		$extension =$value[$attribute_name]->getClientOriginalExtension();
		if (empty($extension)) {
			$extension = 'jpg';
		}
		// Generate a filename.
		$filename = uniqid($params['filename']) . '.' . $extension;
		if (!file_exists($fullPath)){
			File::makeDirectory($fullPath, 0777, true);
		}
		$imageIntervention = Image::make($value[$attribute_name]->getRealPath());
		$imageIntervention->resize($params['width'], $params['height'], function ($constraint) use ($params){
			if (isset($params['ratio']) && $params['ratio'] == '1') {
				$constraint->aspectRatio();
			}
			if (isset($params['upsize']) && $params['upsize'] == '1') {
				$constraint->upsize();
			}
			
		});
		// Encode the Image!
		$image = $imageIntervention->encode($extension, $params['quality']);
		
		// Save the path to the database
		$value[$attribute_name] = $destination_path . $filename;
		$image->stream();
		Storage::disk()->put($destination_path . '/' . $filename,$image);
		return $value;
		
	}
}