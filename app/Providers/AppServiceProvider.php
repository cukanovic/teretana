<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBladeMacros();
    }

    private function registerBladeMacros()
    {
        Blade::include('layout.fields.input', 'input');
        Blade::include('layout.fields.textarea', 'textarea');
        Blade::include('layout.fields.dropdown', 'dropdown');
        Blade::include('layout.fields.hidden', 'hidden');
    }
}
