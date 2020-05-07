<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
		public function __construct() {
			$this->middleware('auth');
		}

    public function print_test_grade(\App\Klass $class, \App\Test $test) {
      $class->load(['student_profiles' => function($query){

        $query->join('users', 'student_profiles.user_id', '=', 'users.id')
              ->orderBy('users.last_name')->orderBy('first_name');
      }]);
    
      $class->loadMissing(['student_profiles.user.grades' => function($query) use($test){ 
        $query->where('test_id', $test->id);
      }]);

      $test->loadCount(['grades', 
        'grades as avg_grade' => function($query) {
          $query->select(DB::raw('avg(grade)'));
        },
      ]);


  	  $data = [
  	  		'test' => $test,
  	  		'class' => $class,
  	  	];

      // return view('pdf.test-grades', $data);

      $pdf = PDF::loadView('pdf.test-grades', $data);
      $date = now()->format('m/d/y');

      return $pdf->download("{$class->section}_{$class->subject_code}_{$test->title}_grades_{$date}.pdf");

    }

     public function print_class_grade(\App\Klass $class) {
       $class->load(['student_profiles' => function($query){

        $query->join('users', 'student_profiles.user_id', '=', 'users.id')
              ->orderBy('users.last_name')->orderBy('first_name');
       }]);

       $class->loadMissing('student_profiles.user.grades');
       $class->loadCount(['tests', 'grades as avg_grade' => function($query){
        $query->select(DB::raw('avg(grade)'));
       }]);


      $pdf = PDF::loadView('pdf.class-grades',[ 'class' => $class ]);
      $date = now()->format('m/d/y');
      return $pdf->download("{$class->section}_{$class->subject_code}_all_tests_grades_{$date}.pdf");
     }
}
