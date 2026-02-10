<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; 
use Illuminate\Http\Request; // <--- 1. Add this for the segment check

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
    public function boot(Request $request): void // <--- 2. Add Request here
    {
        // HTTPS Check
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // 3. THE LANGUAGE FIX 
        // This tells Laravel: "Use the first part of the URL (en, fr, or ar) 
        // as the default value for the {lang} parameter in all routes."
        URL::defaults(['lang' => $request->segment(1)]);
    }
}