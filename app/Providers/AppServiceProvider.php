<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (getenv('VERCEL') || getenv('NOW_REGION') || getenv('RENDER')) {
            $this->app->useStoragePath('/tmp/storage');
        }
    }

    public function boot(): void
    {
        if (env('VERCEL') || getenv('RENDER') || env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}
