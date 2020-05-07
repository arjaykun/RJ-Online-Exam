<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	protected $guarded = [];

	public function user() {
		$this->belongsTo(User::class);
	}   
}
