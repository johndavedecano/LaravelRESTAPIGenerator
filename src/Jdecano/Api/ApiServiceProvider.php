<?php namespace Jdecano\Api;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Jdecano\ApiMake;

class ApiServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('jdecano/api');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerCommands();

        $this->registerBindings();
	}

    private function registerBindings()
    {
        $this->app->bind('Jdecano\Api\IApiControllerGenerator','Jdecano\Api\ApiControllerGenerator');
        $this->app->bind('Jdecano\Api\IApiRouteGenerator','Jdecano\Api\ApiRouteGenerator');
        $this->app->bind('Jdecano\Api\IApiValidator','Jdecano\Api\ApiValidator');
        $this->app->bind('Jdecano\Api\IApiProcessor','Jdecano\Api\ApiProcessor');
    }

    /**
     * Registers new Artisan Commands
     */
    private function registerCommands()
    {
        $this->app['api:make'] = $this->app->share(function($app) {
            return new ApiMakeCmd(new ApiProcessor($app));
        });

        $this->commands(array('api:make'));
    }

}
