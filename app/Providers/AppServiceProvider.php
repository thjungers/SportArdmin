<?php

namespace App\Providers;

use App\Override\Routing\ResourceRegistrar;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

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
        JsonResource::withoutWrapping();

        $registrar = new ResourceRegistrar($this->app['router']);
        $this->app->instance('Illuminate\Routing\ResourceRegistrar', $registrar);
    }
}
