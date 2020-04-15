<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
	protected $guarded = [];
    
    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function course() {
    	return $this->belongsTo(Course::class);
    }

    public function klasses() {
    	return $this->belongsToMany(Klass::class)
                    ->using(KlassStudentProfile::class)
                    ->withTimestamps();
    }
}
