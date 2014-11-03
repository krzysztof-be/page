<?php namespace Kkstudio\Page\Controllers;

use Illuminate\Routing\Controller;
use Kkstudio\Page\Models\Page;
use Kkstudio\Page\Repositories\PageRepository;

class PageController extends Controller {

	protected $pages;

	public function __construct(PageRepository $pages)
	{
		$this->pages = $pages;
	}

	public function page($slug)
	{
		$content = m('Page')->$slug();

		return v('page.index', [ 'content' => $content ]);
	}
	
	public function admin()
	{		
		return \View::make('page::admin')->with('pages', $this->pages->all());
	}

	public function create() 
	{
		return \View::make('page::create');
	}

	public function postCreate() 
	{
		if(! \Request::get('name')) {

			\Flash::error('Musisz podać nazwę strony.');

			return \Redirect::back()->withInput();

		}

		$name = \Request::get('name');
		$slug = \Str::slug($name);
		$content = \Request::get('content');

		$exists = $this->pages->get($slug);

		if($exists) {

			\Flash::error('Strona z tą nazwą już istnieje.');

			return \Redirect::back()->withInput();

		}

		$page = $this->pages->create($slug, $name, $content);

		\Flash::success('Pomyślnie dodano stronę.');

		return \Redirect::to('admin/page');

	}

	public function edit($slug) 
	{
		$page = $this->pages->get($slug);

		return \View::make('page::edit')->with('page', $page);
	}

	public function postEdit($slug) 
	{
		$page = $this->pages->get($slug);

		if(! \Request::get('name')) {

			\Flash::error('Musisz podać nazwę strony.');

			return \Redirect::back()->withInput();

		}

		$name = \Request::get('name');
		$slug = \Str::slug($name);
		$content = \Request::get('content');

		$exists = $this->pages->get($slug);

		if($exists && $exists->id != $page->id) {

			\Flash::error('Strona z tą nazwą już istnieje.');

			return \Redirect::back()->withInput();

		}

		$page->name = $name;
		$page->slug = $slug;
		$page->content = $content;	

		$page->save();	

		\Flash::success('Pomyślnie edytowano stronę');

		return \Redirect::to('admin/page/'.$slug.'/edit');

	}

	public function delete($slug) 
	{
		$page = $this->pages->get($slug);

		return \View::make('page::delete')->with('page', $page);
	}

	public function postDelete($slug) 
	{
		$page = $this->pages->get($slug);
		$page->delete();

		\Flash::success('Strona usunięta.');

		return \Redirect::to('admin/page/');
	}

}