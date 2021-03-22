<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // sidebar tracking
        Blade::directive('sbactive', function ($route) {
            return "<?php echo Route::currentRouteNamed($route) ? 'class=\"active\"' : '' ?>";
        });

        // navbar tracking
        Blade::directive('nbactive', function ($route) {
            return "<?php echo Route::currentRouteNamed($route) ? 'class=\"active\"' : '' ?>";
        });
    }
}
