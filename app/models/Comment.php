<?php

class Comment extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'body' => 'required',
		'user_id' => 'required',
		'offer_id' => 'required',
		'mark' => 'required'
	);
}
