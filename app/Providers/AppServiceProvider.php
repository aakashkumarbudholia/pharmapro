<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(255);

        

        app('view')->composer('layouts.master', function ($view) {

            $re = DB::table('admin_login')->select('logo')->first();
            if(!empty($re)){
                $header_logo_url = asset('/logo/').'/'.$re->logo;
            }else{
                $header_logo_url = "";
            }
        
            $function = app('request')->route()->getAction();

            $controller = class_basename($function['controller']);

            list($controller, $function) = explode('@', $controller);

            $view->with(compact('controller', 'function','header_logo_url'));
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
