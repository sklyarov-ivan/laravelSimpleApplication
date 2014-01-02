<?php

class Offer extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required|between:5,200',
		'description' => 'required|min:10',
		'city_id' => 'required|exists:cities,id',
		'company_id' => 'required|exists:companies,id',
		'off' => 'required|numeric|min:1|max:100',
		'image' => 'required|regex:/\/images\/\d{4}\/\d{2}\/\d{2}\/([A-z0-9]){30}\.jpg/', 
		// matches /images/2012/12/21/ThisIsTheEndOfTheWorldMaya2112.jpg
		'expires' => 'required|date'
	);

}
