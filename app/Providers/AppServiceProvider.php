<?php

namespace App\Providers;

use App\Models\Employer;
use App\Policies\EmployerPolicy;
use App\Policies\JobPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         EmployerPolicy::class;
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('apply',[JobPolicy::class,'apply']);
    }
}
