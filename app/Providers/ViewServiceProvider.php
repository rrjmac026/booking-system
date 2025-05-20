<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // For tenant.admin.sidebar
        View::composer('tenant.admin.sidebar', function ($view) {
            $user = Auth::user();
            $color_hex = $user->color_hex ?? '#6D2932'; // fallback
            $view->with('color_hex', $color_hex);
        });

        // For partials.header
        View::composer('partials.header', function ($view) {
            $user = Auth::user();
            $color_hex = $user->color_hex ?? '#6D2932'; // fallback
            $view->with('color_hex', $color_hex);
        });
    }
}