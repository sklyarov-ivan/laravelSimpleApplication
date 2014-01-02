<?php

class City extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required|alpha|min:2|max:200|unique:cities,name'
	);
}
