<?php namespace Parsidev\Unique;

use Illuminate\Support\ServiceProvider;

class UniqueServiceProvider extends ServiceProvider {

    protected $defer = false;

    public function boot() {
        $this->publishes([
            __DIR__ . '/../../config/pars_unique.php' => config_path('pars_unique.php'),
        ]);
    }

    public function register() {
        $this->app['unique'] = $this->app->share(function($app) {
            $config = config('unique');
            return new Unique($config, new SoapClient($config['webserviceUrl']));
        });
    }

    public function provides() {
        return ['unique'];
    }

}
