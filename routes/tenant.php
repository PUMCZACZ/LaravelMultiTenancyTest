<?php


use App\Domains\Tenant\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('tenant')->name('tenant.')->group(function () {
        Route::get('/', [TenantController::class, 'index'])->name('index');
    });
});
