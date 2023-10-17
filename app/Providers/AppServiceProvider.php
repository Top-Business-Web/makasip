<?php

namespace App\Providers;

use App\Models\Notification;
use App\Models\Setting;
use App\Models\SiteType;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use View;

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
        View::share('setting',Setting::first());
        if(isset($_GET['site_type'])) {
            $id = $_GET['site_type'];
            View::share('siteType', SiteType::find($id));
        }
        Paginator::useBootstrap();
    }
}
