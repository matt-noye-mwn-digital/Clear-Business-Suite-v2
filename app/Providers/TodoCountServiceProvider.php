<?php

namespace App\Providers;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TodoCountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function($view){
            // You can now use $userId as the ID of the logged-in user
            $todoCount = Todo::where('status', 0)->count();
            view()->share('todoCount', $todoCount);
        });
    }
}
