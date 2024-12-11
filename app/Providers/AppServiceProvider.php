<?php

namespace App\Providers;

use Illuminate\Routing\Router;
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
    public function boot(Router $router): void
    {
        // Registrar el alias para el middleware 'admin'
        $router->aliasMiddleware('admin', \App\Http\Middleware\AdminMiddleware::class);
    }
}
