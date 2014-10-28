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

		\Route::group([ 'middleware' => 'admin'], function() {

			\Route::get('admin/page', '\Kkstudio\Page\Controllers\PageController@admin');
			\Route::get('admin/page/create', '\Kkstudio\Page\Controllers\PageController@create');
			\Route::post('admin/page/create', '\Kkstudio\Page\Controllers\PageController@postCreate');
			\Route::get('admin/page/{slug}/edit', '\Kkstudio\Page\Controllers\PageController@edit');
			\Route::post('admin/page/{slug}/edit', '\Kkstudio\Page\Controllers\PageController@postEdit');
			\Route::get('admin/page/{slug}/delete', '\Kkstudio\Page\Controllers\PageController@delete');
			\Route::post('admin/page/{slug}/delete', '\Kkstudio\Page\Controllers\PageController@postDelete');

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
