<?php

namespace VivekMistry\RepositoryInterface;

use Illuminate\Support\ServiceProvider;
use VivekMistry\RepositoryInterface\Commands\MakeRepo;

class RepositoryGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeRepo::class,
            ]);
            
            // $this->publishes([
            //     __DIR__.'/Stubs' => base_path('stubs/repository-generator'),
            // ], 'repository-generator-stubs');
        }
    }

    public function register()
    {
        //
    }
}