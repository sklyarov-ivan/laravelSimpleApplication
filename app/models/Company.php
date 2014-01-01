<?php

class Company extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required'
	);
}
