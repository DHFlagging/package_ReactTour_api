<?php
namespace dhflagging\ReactTour;
use Illuminate\Support\ServiceProvider;

class ReactTourServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register() : void
    {

    }
}