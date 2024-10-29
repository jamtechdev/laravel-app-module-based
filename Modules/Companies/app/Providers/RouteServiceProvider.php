<?php

namespace Modules\Companies\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected string $name = 'Companies';

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
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')->group(module_path($this->name, '/routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        Route::middleware('api')->prefix('api')->name('api.')->group(module_path($this->name, '/routes/api.php'));
    }
}

// <?php

// namespace Modules\Companies\Providers;

// use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Route;

// class RouteServiceProvider extends ServiceProvider
// {
//     protected string $moduleNamespace = 'Modules\Companies\Http\Controllers';

//     public function boot(): void
//     {
//         $this->mapWebRoutes();
//         $this->mapApiRoutes();
//     }

//     protected function mapWebRoutes(): void
//     {
//         Route::middleware('web')
//             ->namespace($this->moduleNamespace)
//             ->group(module_path('Companies', 'Routes/web.php'));
//     }

//     protected function mapApiRoutes(): void
//     {
//         Route::prefix('api')
//             ->middleware('api')
//             ->namespace($this->moduleNamespace)
//             ->group(module_path('Companies', 'Routes/api.php'));
//     }
// }


