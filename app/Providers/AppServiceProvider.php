<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('image', function ($app) {
            $driver = config('image.driver', 'gd');
            $driverClass = $driver === 'gd' ? GdDriver::class : ImagickDriver::class;
            
            return new ImageManager($driverClass);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set memory limit for image processing
        ini_set('memory_limit', config('image.memory_limit', '128M'));
    }
}
