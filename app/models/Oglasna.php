<?php


class Oglasna extends Eloquent{

	protected $fillable = array('name', 'description', 'user', 'rank', 'status', 'new');

	protected $table = 'views';

	// get only the active activities	

	public function scopeGetActive($query) {
		
		return $query->where('status', '<>', 9);
	}

	

}