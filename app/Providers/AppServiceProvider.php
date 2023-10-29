<?php

namespace App\Providers;

use App\Models\Todo;
use App\Models\TodoList;
use App\Observers\TodoObserver;
use App\Observers\TodoListObserver;
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
      Todo::observe(TodoObserver::class);
    }
}
