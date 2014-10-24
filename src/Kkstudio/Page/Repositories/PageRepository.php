<?php namespace Kkstudio\Page\Repositories;

use Kkstudio\Page\Models\Page as Model;

class PageRepository {

	public function get($slug) 
	{
		$page = Model::where('slug', $slug)->first();

		if($page) return $page;

		return null;
	}

}