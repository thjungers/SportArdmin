<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use App\Override\Routing\ResourceRegistrar;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $registrar = new ResourceRegistrar($this->app['router']);
        $this->app->instance('Illuminate\Routing\ResourceRegistrar', $registrar);

        if(App::hasDebugModeEnabled()) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
    }
}
