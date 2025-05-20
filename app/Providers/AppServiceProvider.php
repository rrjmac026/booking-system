<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
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
         // Dynamically set the APP_URL based on the current request
         $scheme = Request::getScheme(); // http or https
         $host = Request::getHost(); // e.g., cmu.readsphere.com
         $port = Request::getPort() ? ':' . Request::getPort() : ''; // Include port if present
 
         // Construct the dynamic APP_URL
         $dynamicAppUrl = "{$scheme}://{$host}{$port}";
 
         // Override the APP_URL configuration
         Config::set('app.url', $dynamicAppUrl);
    }
}
