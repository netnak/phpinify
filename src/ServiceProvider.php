<?php

namespace Netnak\Phpinify;

use Statamic\Providers\AddonServiceProvider;
use Netnak\Phpinify\Http\Middleware\PhpinifyMiddleware;

class ServiceProvider extends AddonServiceProvider
{
	protected $config = false;

	public function bootAddon()
	{
		$this->bootAddonConfig();
	}

	//php artisan vendor:publish --tag=phpinify-config  --force
	protected function bootAddonConfig()
	{
		$this->mergeConfigFrom(__DIR__ . '/../config/phpinify.php', 'phpinify');
		$this->publishes([
			__DIR__ . '/../config/phpinify.php' => config_path('phpinify.php'),
		], 'phpinify-config');

		return $this;
	}

	// only minify web requests, leave CP alone. We have to manually check for /!/* routes inside the handler
	protected $middlewareGroups = [
		'web' => [
			PhpinifyMiddleware::class,
		]
	];
}
