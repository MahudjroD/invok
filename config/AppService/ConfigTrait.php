<?php


namespace App\Providers\AppService;


use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

trait ConfigTrait
{
	protected function setupConfigs()
	{
		// Create Configs for DB Settings
		$this->createConfigForSettings();
	}
	
	private function createConfigForSettings()
	{
		// Get some default values
		config()->set('settings.app.purchase_code', config('settings.purchaseCode'));
		
		// Check DB connection and catch it
		try {
			// Get all settings from the database
			$settings = Cache::remember('settings.active', $this->cacheExpiration, function () {
				$settings = Setting::where('active', 1)->get();
				
				return $settings;
			});
			
			// Bind all settings to the Laravel config, so you can call them like
			if ($settings->count() > 0) {
				foreach ($settings as $setting) {
					if (is_array($setting->value) && count($setting->value) > 0) {
						foreach ($setting->value as $subKey => $value) {
							if (!empty($value)) {
								config()->set('settings.' . $setting->key . '.' . $subKey, $value);
							}
						}
					}
				}
			}
		} catch (\Exception $e) {
			config()->set('settings.error', true);
			config()->set('settings.app.logo', config('settings.logo'));
		}
	}
}