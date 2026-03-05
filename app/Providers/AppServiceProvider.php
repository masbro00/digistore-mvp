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
        // Tambahkan 3 baris ini untuk memaksa limit upload
    @ini_set('upload_max_size', '2048M');
    @ini_set('post_max_size', '2048M');
    @ini_set('max_execution_time', '300'); // Biar gak timeout pas upload gede
    }
}
