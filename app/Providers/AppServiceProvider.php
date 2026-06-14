<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (getenv('VERCEL') || getenv('NOW_REGION')) {
            $storagePath = '/tmp/storage';
            $this->app->useStoragePath($storagePath);
            $this->ensureStorageDirectories($storagePath);
        }
    }

    public function boot(): void
    {
        if (! is_dir(storage_path('framework/views'))) {
            $this->ensureStorageDirectories(storage_path());
        }

        if (env('VERCEL') || getenv('RENDER') || env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }

    private function ensureStorageDirectories(string $storagePath): void
    {
        foreach (['framework/views', 'framework/cache/data', 'framework/sessions', 'logs'] as $directory) {
            $path = $storagePath . DIRECTORY_SEPARATOR . $directory;

            if (! is_dir($path)) {
                mkdir($path, 0775, true);
            }
        }
    }
}
