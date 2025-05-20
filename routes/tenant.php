<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminBorrowBookController;
use App\Http\Controllers\AdminReturnBookController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\UserBorrowBooksController;
use App\Http\Controllers\UserReturnController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\GenerateReportsController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });

    // tenant welcome page
Route::get('/welcome', function () {
    return view('tenant.welcome');
})->name('welcome');

// admin routes
Route::middleware('admin')->prefix('admin')->group(function () {
    // dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

    //student
    Route::get('/student', [AdminStudentController::class, 'index'])->name('admin.student.index');
    Route::post('/student/store', [AdminStudentController::class, 'store'])->name('admin.student.store');
    Route::put('/student/update', [AdminStudentController::class, 'update'])->name('admin.student.update');
    Route::delete('/student/delete', [AdminStudentController::class, 'destroy'])->name('admin.student.delete');


    //books
    Route::get('/book', [AdminBookController::class, 'index'])->name('admin.book.index');
    Route::post('/book/store', [AdminBookController::class, 'store'])->name('admin.book.store');
    Route::put('/book/update', [AdminBookController::class, 'update'])->name('admin.book.update');
    Route::delete('/book/delete', [AdminBookController::class, 'destroy'])->name('admin.book.delete');

    //borrow books
    Route::get('/borrow', [AdminBorrowBookController::class, 'index'])->name('admin.borrow.index');
    Route::post('/borrow/store', [AdminBorrowBookController::class, 'store'])->name('admin.borrow.store');

    //return books
    Route::get('/return', [AdminReturnBookController::class, 'index'])->name('admin.return.index');
    Route::delete('/return/delete', [AdminReturnBookController::class, 'destroy'])->name('admin.return.delete');

    //settings
    Route::get('/settings', [AdminSettingsController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings/change-password', [AdminSettingsController::class, 'changePass'])->name('admin.settings.change-password');
    Route::post('/settings/customize', [AdminSettingsController::class, 'customize'])->name('admin.settings.customize');
    Route::post('/settings/pro', [AdminSettingsController::class, 'pro'])->name('admin.settings.pro');
});

// Students here
// user or student routes
Route::middleware('student')->prefix('user')->group(function () {
    // Borrow books
    Route::get('/borrow', [UserBorrowBooksController::class, 'index'])->name('user.borrow.index');
    Route::post('/borrow/store', [UserBorrowBooksController::class, 'store'])->name('user.borrow.store');

    // Return books
    Route::get('/return', [UserReturnController::class, 'index'])->name('user.return.index');
    Route::delete('/borrow/delete', [UserReturnController::class, 'destroy'])->name('user.return.delete');
});

// google auth
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])
    ->name('tenant.auth.google.redirect');

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])
    ->name('tenant.auth.google.callback');

Route::get('/logout/student', [GoogleController::class, 'logout'])->name('student.logout');

// generate report
Route::post('/generate', [GenerateReportsController::class, 'generateTenant'])->name('generateTenant');
});
