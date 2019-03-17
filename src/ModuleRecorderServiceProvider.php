<?php

namespace Larangular\ModuleRecorder;

use \Illuminate\Support\ServiceProvider;
use Larangular\ModuleRecorder\Register\ModuleRegister;

class ModuleRecorderServiceProvider extends ServiceProvider {

    public function boot() {/*
        $this->publishes([
                             __DIR__ . '/../config/uf-scraper.php' => config_path('uf-scraper.php'),
                         ]);*/
    }

    public function register() {
        $this->app->register('Larangular\Support\SupportServiceProvider');
        //$this->mergeConfigFrom(__DIR__ . '/../config/uf-scraper.php', 'uf-scraper');

        $this->registerServiceRecords();

        /*
        $this->app->singleton(ServiceRequest::class, function ($app) {
            return new ServiceRequest($app['ws-manager.register']);
        });*/
    }

    public function provides() {
        return [
            ModuleRegister::class,
        ];
    }

    private function registerServiceRecords(): void {
        $this->app->singleton(ModuleRegister::class, function () {
            return new ModuleRegister();
        });
    }
}
