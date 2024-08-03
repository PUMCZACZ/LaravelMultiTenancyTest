<?php

namespace App\Providers;

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
        $this->loadMigrationsFrom([
            database_path('migrations'),
            app_path('Domains/User/Migrations'),
            app_path('Domains/Chapter/Migrations'),
            app_path('Domains/Production/Migrations'),
            app_path('Domains/MyStoryTrainings/Migrations'),
            app_path('Domains/Learning/Migrations'),
            app_path('Domains/Company/Migrations'),
            app_path('Domains/Tenant/Migrations'),
        ]);
    }
}
