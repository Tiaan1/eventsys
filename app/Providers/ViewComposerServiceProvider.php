<?php

namespace App\Providers;

use App\Models\AboutUs;
use App\Models\Day;
use App\Models\Category;
use App\Models\HomePage;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Speaker;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.admin', function($view)
        {
            $view->with('currentUser', Auth::user('is_admin', true)->first());
            $view->with('days', Day::all());
            $view->with('about', AboutUs::all());
        });

        view()->composer('frontend.home', function($view){
            $view->with('partners', Partner::all());
            $view->with('slides', Slider::all());
            $view->with('boxes', HomePage::all());
            $view->with('speakers', Speaker::all());
//            $view->with('about', AboutUs::find(1)->first());
        });

        view()->composer('frontend.about.index', function($view){
//            $view->with('about', AboutUs::find(1)->first());
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
