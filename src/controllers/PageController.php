<?php namespace Kkstudio\Page\Controllers;

use Illuminate\Routing\Controller;
use Kkstudio\Page\Models\Page;
use Kkstudio\Page\Repositories\PageRepository;

class PageController extends Controller {

	public function page($slug)
	{
		$content = m('Page')->$slug;

		return v('page', [ 'content' => $content ]);
	}
	
	public function admin(PageRepository $pages)
	{		
		return \View::make('page::admin')->with('pages', $pages->all());
	}

	public function create() 
	{
		return \View::make('page::create');
	}

	public function postCreate(PageRepository $pages) 
	{
		if(! \Request::get('name')) {

			\Flash::error('Please provide a name.');

			return \Redirect::back()->withInput();

		}

		$name = \Request::get('name');
		$slug = \Str::slug($name);
		$content = \Request::get('content');

		$exists = $pages->get($slug);

		if($exists) {

			\Flash::error('Page with that name already exists.');

			return \Redirect::back()->withInput();

		}

		$page = $pages->create($slug, $name, $content);

		\Flash::success('Page created successfully.');

		return \Redirect::to('admin/page');

	}

	public function edit($slug, PageRepository $pages) 
	{
		$page = $pages->get($slug);

		return \View::make('page::edit')->with('page', $page);
	}

	public function postEdit($slug, PageRepository $pages) 
	{
		$page = $pages->get($slug);

		if(! \Request::get('name')) {

			\Flash::error('Please provide a name.');

			return \Redirect::back()->withInput();

		}

		$name = \Request::get('name');
		$slug = \Str::slug($name);
		$content = \Request::get('content');

		$exists = $pages->get($slug);

		if($exists && $exists->id != $page->id) {

			\Flash::error('Page with that name already exists.');

			return \Redirect::back()->withInput();

		}

		$page->name = $name;
		$page->slug = $slug;
		$page->content = $content;	

		$page->save();	

		\Flash::success('Page edited successfully.');

		return \Redirect::to('admin/page/'.$slug.'/edit');

	}

	public function delete($slug, PageRepository $pages) 
	{
		$page = $pages->get($slug);

		return \View::make('page::delete')->with('page', $page);
	}

	public function postDelete($slug, PageRepository $pages) 
	{
		$page = $pages->get($slug);
		$page->delete();

		\Flash::success('Page deleted.');

		return \Redirect::to('admin/page/');
	}

}