<?php

namespace Modules\Package\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected string $name = 'Package';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace('Modules\\Package\\Http\\Controllers') // Ensures the correct controller namespace
            ->group(module_path($this->name, 'Routes/web.php')); // Ensure the correct path to routes
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        Route::middleware('api')
            ->namespace('Modules\\Package\\Http\\Controllers') // Ensures the correct controller namespace
            ->prefix('api')
            ->name('api.')
            ->group(module_path($this->name, 'Routes/api.php')); // Ensure the correct path to API routes
    }
}
