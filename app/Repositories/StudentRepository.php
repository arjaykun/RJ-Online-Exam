<?php 	

namespace App\Repositories;

use App\User;

class StudentRepository 
{
	public function all($name='student_id', $orderBy = 1) {
		$students = User::active()->students()->orderBy($name)->get();
		$students->load('student_profile.course');

		return $students;
	}

	public function filter($filterText) {
		$students = User::active()->students()
								->where( function($query) use($filterText) {
										$query->where('last_name', 'like', "%{$filterText}%")
													->orWhere('first_name', 'like', "%{$filterText}%")
													->orWhere('middle_name', 'like', "%{$filterText}%")
													->orWhere('email', $filterText);
								})
								->with(['student_profile.course', 'klasses'])
								->get();

		return $students;
	}

	public function get($id) {
		$student = User::findOrFail($id);
		$student->load('student_profile.course');

		return $student;
	}
}