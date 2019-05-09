<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GiphyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('giphy', function ($app)
		{
			$config = $app['config']->get('giphy');
			$client = new \App\Services\Giphy\Factories\Client($config['baseUri'], $config['apiKey']);
			return new \App\Services\Giphy\Giphy($client);
		});
		$this->app->alias('giphy', 'App\Services\Giphy\Giphy');
    }

    /**
	 * Configure.
	 *
	 * @return void
	 */
	protected function configure()
	{
		$source = realpath(__DIR__ . '/../../config/giphy.php');
		if ( class_exists('Illuminate\Foundation\Application', false) )
		{
			$this->publishes([ $source => config_path('giphy.php') ], 'config');
		}
		$this->mergeConfigFrom($source, 'giphy');
	}

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configure();
    }
}
