<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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
        //Settings
        if(Schema::hasTable('settings')){
            $settings = Cache::remember('settings', now()->addDay(), function(){
               return Setting::all();
            });

            foreach($settings as $setting) {
                Config::set('settings.'. $setting->key, $setting->value);
            }
        }
    }
}
