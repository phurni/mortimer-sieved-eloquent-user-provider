<?php namespace Mortimer\SievedEloquent;

use App\User;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app['auth']->provider('sieved_eloquent', function($app, $config)
		{
			return new UserProvider($this->app['hash'], $config['model']);
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
	}

}
