<?php

class Company extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required|alpha|min:2|max:200|unique:companies,title'
	);
}
