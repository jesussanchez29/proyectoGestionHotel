<?php

namespace App\Providers;

use App\Models\Hotel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        View::share('hotel', Hotel::first()); // Reemplaza "TuModelo" por el nombre de tu modelo o clase que interactúa con la base de datos
    }
}
