<?php namespace LasseRafn\Pipedrive;

use Illuminate\Support\ServiceProvider;

class PipedriveServiceProvider extends ServiceProvider
{
	/**
	 * Boot
	 */
	public function boot()
	{
		$configPath = __DIR__ . '/config/pipedrive.php';
		$this->mergeConfigFrom($configPath, 'pipedrive');

		$configPath = __DIR__ . '/config/pipedrive.php';

		if (function_exists('config_path')) {
			$publishPath = config_path('pipedrive.php');
		} else {
			$publishPath = base_path('config/pipedrive.php');
		}

		$this->publishes([$configPath => $publishPath], 'config');
	}

	public function register() {

	}
}