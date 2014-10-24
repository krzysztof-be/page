<?php namespace Kkstudio\Page\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Page extends Eloquent {

	protected $table = 'kkstudio_page_pages';

	protected $guarded = [ 'id' ];

}