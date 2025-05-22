<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandlordDashboardController;
use App\Http\Controllers\LandlordTenantController;
use App\Http\Controllers\RegisterTenantController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Middleware;

//central domain routes
foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        Route::middleware('redirect')->group(function () {
            Route::get('/login', [LoginController::class, 'index'])->name('login');
            Route::post('/login', [LoginController::class, 'login'])->name('login.post');

            Route::get('/register', [RegisterTenantController::class, 'index'])->name('register');
            Route::post('/register/store', [RegisterTenantController::class, 'store'])->name('tenant.store');

            Route::get('/', function () {
                return redirect()->route('welcome');
            });

            Route::get('/welcome', function () {
                return view('welcome');
            })->name('welcome');
        });

        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        // landlord routes

        Route::middleware('landlord')->prefix('landlord')->group(function () {
            Route::get('/dashboard', [LandlordDashboardController::class, 'index'])->name('landlord.dashboard.index');
            Route::post('/tenants/generateReports', [LandlordDashboardController::class, 'generateReports'])->name('landlord.tenants.generateReports');

            Route::get('/tenants', [LandlordTenantController::class, 'index'])->name('landlord.tenants.index');
            Route::post('/tenants/store', [LandlordTenantController::class, 'store'])->name('landlord.tenants.store');

            // ✅ Enable/Disable routes
            Route::patch('/tenants/{id}/enable', [LandlordTenantController::class, 'enable'])->name('landlord.tenants.enable');
            Route::patch('/tenants/{id}/disable', [LandlordTenantController::class, 'disable'])->name('landlord.tenants.disable');
        });

    });
}