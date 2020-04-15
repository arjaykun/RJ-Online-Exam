<?php

namespace App\Http\Controllers;

use Facades\App\Repositories\KlassRepository;
use Facades\App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function index($class_id) {
        $class = KlassRepository::get($class_id);
        $class->load('student_profiles.course');


        return view('klass.students', compact('class'));
    }

    public function create($class_id) {
    	$class = KlassRepository::get($class_id);
    	$students = [];

    	return view('klass.enroll_students', compact('class', 'students'));
    }

    public function searchStudent($class_id) {

        $class = KlassRepository::get($class_id);
        $data = request()->validate(['search' => 'required']);
    	$students = StudentRepository::filter($data['search']);

        return view('klass.enroll_students', compact('class', 'students'));
    }

    public function enrollStudent($class_id, $student_id) {
        $class = KlassRepository::get($class_id);
        $student = StudentRepository::get($student_id);
        
        $class->student_profiles()->attach($student->student_profile->id);

        //email student when he is enrolled
         logger("An e-mail is sent to {$student->email} of his enrollement to class {$class->subject_full}");

        return redirect()
                ->route('enroll_student_to_class', ['class' => $class_id])
                ->with('student_enrolled', "You have successfully enrolled the student {$student->full_name} in class.");
    }

    public function destroyStudent($class_id, $student_id) {
        $class = KlassRepository::get($class_id);
        
        $class->students()->detach($student_id);

        return back()->with('student_unenrolled', "You have successfully removed the student from the class.");
    }
}
