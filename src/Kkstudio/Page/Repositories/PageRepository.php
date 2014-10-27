<?php namespace Kkstudio\Page\Repositories;

use Kkstudio\Page\Models\Page as Model;

class PageRepository {

	public function get($slug) 
	{
		$page = Model::where('slug', $slug)->first();

		if($page) return $page;

		return null;
	}

	public function getAll($slug) 
	{
		$pages = Model::where('slug', $slug)->get();
		
		return $pages;
	}

	public function all() {

		return Model::orderBy('name', 'asc')->get();

	}

	public function create($slug, $name, $content)
	{
		return Model::create([
			'slug' => $slug,
			'content' => $content,
			'name' => $name
		]);
	}

}