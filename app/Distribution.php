<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model {

	protected $guarded = ['created_at', 'updated_at'];

	public function events()
	{
		return $this->hasMany('distribution_events');
	}

}