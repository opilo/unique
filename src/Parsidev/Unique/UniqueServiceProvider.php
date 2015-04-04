<?php

namespace Parsidev\Unique;

use Illuminate\Support\ServiceProvider;

class UniqueServiceProvider extends ServiceProvider {

    protected $defer = false;

    public function register() {
        $this->app['unique'] = $this->app->share(function($app) {
            return new Unique();
        });
    }

    public function provides() {
        return ['unique'];
    }

}
