<?php
namespace App\Services;

use App\Models\Setting;
//use Cache;
use Illuminate\Support\Facades\Cache;

class SettingsServices{

    function getSettings() { 
        return Cache::rememberForever('settings', function() {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    function setGlobalSettings() : void {
        $settings = $this->getSettings();
        config()->set('settings', $settings);
    }

    function clearCachedSettings() : void {
        Cache::forget('settings');
    }

}
