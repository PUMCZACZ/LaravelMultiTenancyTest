<?php


use App\Application\Tenant\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('tenant')->name('tenant.')->group(function () {
        Route::get('/', [TenantController::class, 'index'])->name('index');
        Route::get('/switch/{user}', [TenantController::class, 'switchRole'])->name('switch-role');
    });
});
