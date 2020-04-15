<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public $timestamps = false;


    public function choices() {
    	return $this->hasMany(Choice::class);
    }

    public function test() {
    	return $this->belongsTo(Test::class);
    }
}
