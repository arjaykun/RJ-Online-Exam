<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class KlassStudentProfile extends Pivot
{

	public function student_profile() {
		return $this->belongsTo(StudentProfile::class);
	}

	public function klass() {
		return $this->belongsTo(Klass::class);
	}

  public function users() {
  			return $this->hasManyThrough(User::class, StudentProfile::class);
  }
}
