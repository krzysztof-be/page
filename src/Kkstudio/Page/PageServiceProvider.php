

		\Route::get('admin/info', '\Kkstudio\Info\Controllers\InfoController@admin');
		\Route::post('admin/info', '\Kkstudio\Info\Controllers\InfoController@edit');<?php namespace Kkstudio\Page;

use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider {

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
		$this->package('kkstudio/page');

		\Route::get('admin/page', '\Kkstudio\Page\Controllers\PageController@admin');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
