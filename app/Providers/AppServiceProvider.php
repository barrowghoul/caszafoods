<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $keys = ['pusher_app_id', 'pusher_app_key', 'pusher_app_secret', 'pusher_app_cluster'];
        $pusherConf = Setting::whereIn('key', $keys)->pluck('value','key');

        config(['broadcasting.connections.pusher.key' => $pusherConf['pusher_app_key']]);
        config(['broadcasting.connections.pusher.secret' => $pusherConf['pusher_app_secret']]);
        config(['broadcasting.connections.pusher.app_id' => $pusherConf['pusher_app_id']]);
        config(['broadcasting.connections.pusher.options.cluster' => $pusherConf['pusher_app_cluster']]);

    }
}
