<?php


class Oglasna extends Eloquent{

	protected $fillable = array('name', 'description', 'user', 'rank', 'status', 'new', 'modified_user', 'editable', 'modified_at');

	protected $table = 'views';

	private $record_count;

	// get only the active activities	

	public function scopeGetActive($query) {
		
		return $query->where('status', '<>', 9);
	}

	public function owner(){

		return $this->belongsTo('User');
	}

	

}