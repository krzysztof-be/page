<?php namespace Kkstudio\Page;

class Page extends \App\Module {

	private $pages;
	private $cache = [];

	public function __construct() 
	{
		$this->pages = new Repositories\PageRepository;
	}

	public function __call($func, $args) {

		$page = null;

		if(isset($this->cache[$func])) {

			$page = $this->cache[$func];

		} else {

			$page = $this->pages->get($func);

		}

		if($page) {

			$this->cache[$func] = $page;

			if(isset($args[0])) {

				if(isset($page->args[0])) return $page->args[0];
				
			} else {

				return $page->content;

			}

		}

		return '';

	}

}