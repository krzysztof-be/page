<?php namespace Kkstudio\Page;

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

		\Route::group([ 'prefix' => 'admin', 'before' => 'admin'], function() {

			\Route::get('page', '\Kkstudio\Page\Controllers\PageController@admin');
			\Route::get('page/create', '\Kkstudio\Page\Controllers\PageController@create');
			\Route::post('page/create', '\Kkstudio\Page\Controllers\PageController@postCreate');
			\Route::get('page/{slug}/edit', '\Kkstudio\Page\Controllers\PageController@edit');
			\Route::post('page/{slug}/edit', '\Kkstudio\Page\Controllers\PageController@postEdit');
			\Route::get('page/{slug}/delete', '\Kkstudio\Page\Controllers\PageController@delete');
			\Route::post('page/{slug}/delete', '\Kkstudio\Page\Controllers\PageController@postDelete');

		});

		\Route::get('{slug}', '\Kkstudio\Page\Controllers\PageController@page');

	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
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
