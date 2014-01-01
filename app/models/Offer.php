<?php

class Offer extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'description' => 'required',
		'city_id' => 'required',
		'company_id' => 'required',
		'off' => 'required',
		'image' => 'required',
		'expires' => 'required'
	);
}
