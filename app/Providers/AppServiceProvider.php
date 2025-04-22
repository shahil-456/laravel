<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


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
    View::share('url', 'user/');

    View::composer('*', function ($view) {
        $view->with('user', Auth::user());
    });
}



    public function map()
{
    $this->mapWebRoutes();
    $this->mapApiRoutes();
    $this->mapStudentRoutes(); 
}

protected function mapStudentRoutes()
{
    Route::middleware('web')
        ->group(base_path('routes/student.php')); 
}




}
