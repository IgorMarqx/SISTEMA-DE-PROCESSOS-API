<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\auth\{AuthRepository, AuthRepositoryInterface};
use App\Repositories\individual\{IndividualRepository, IndividualRepositoryInterface};
use App\Repositories\process\{ProcessRepository, ProcessRepositoryInterface};
use Illuminate\Support\Facades\{Schema, Validator};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->singleton(ProcessRepositoryInterface::class, ProcessRepository::class);
        $this->app->singleton(IndividualRepositoryInterface::class, IndividualRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Validator::extend('user_exist', function ($attribute, $value) {
            return User::where('id', $value)->exists();
        });

    }
}
