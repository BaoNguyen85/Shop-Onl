<?php

namespace App\Providers;

use App\Models\Collections;
use Illuminate\Support\Facades\Session;
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
    // public function boot(): void
    // {
    //     //
    // }
    public function boot()
    {
        view()->composer('*', function ($view) {
            $customerName = Session::get('customer_name');
            $customerID = Session::get('customer_id');
            $adminName = Session::get('admin_name');
            $adminID = Session::get('admin_id');
            $all_collection = Collections::orderBy('collection_id', 'ASC')->get();
            $view->with([
                'all_collection' => $all_collection,
                'customerName' => $customerName,
                'customerID' => $customerID,
                'adminName' => $adminName,
                'adminID' => $adminID
            ]);
        });
    }
}
