<?php namespace Kkstudio\Page\Controllers;

use Illuminate\Routing\Controller;
use Kkstudio\Page\Models\Page;
use Kkstudio\Page\Repositories\PageRepository;

class PageController extends Controller {
	
	public function admin(PageRepository $pages)
	{		
		return \View::make('page::admin')->with('pages', $pages->all());
	}

}