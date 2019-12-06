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
            // Card
            Blade::component('components.card', 'card');
            Blade::component('components.cardbox', 'cardbox');
            Blade::component('components.card-widget', 'cwidget');
            // Bread Crumb
            Blade::component('components.breadcrumb', 'breadcrumb');
            // Other            
            Blade::component('components.alert', 'alert');
            // Modal
            Blade::component('components.modal', 'modal');
            Blade::component('components.modal', 'modal');
            Blade::include('inc.modalBtn', 'modalBtn');

        // Includes
            // Templates
            Blade::include('inc.templates.topbar', 'topbar');
            Blade::include('inc.templates.footer', 'footer');
            Blade::include('inc.templates.preloader', 'preloader');
            Blade::include('inc.templates.left-sidebar', 'lsidebar');
            Blade::include('inc.templates.right-sidebar', 'rsidebar');
            // Others
            Blade::include('inc.ifalert', 'ifAlert');
            Blade::include('inc.breadcrumb-item', 'bcItem');
        //.End Includes
    }
}
