<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Klass;


class GradeController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function index(Klass $class) {
    	$user = auth()->user()->id;
    	$tests = $class->tests
        ->loadCount('questions')
        ->load(['grades' => function($query) use($user) {
            $query->where('user_id', $user);
          }]);
       $class->load(['grades' => function($query) use($user) {
       	  $query->where('user_id', $user);
       }]);


      return view('main.grade.index', compact('tests', 'class'));
    } 

    public function view_test_grades(Klass $class, \App\Test $test) {

      $test->load('klass');
      $students = $class->student_profiles->load(['user.grades' => function($query) use($test){
        $query->where('test_id', $test->id);
      }]);

      return view('test.grades', compact('test', 'students'));
    }

    public function view_class_grades(Klass $class) {
      $students = $class->student_profiles->load('user.grades');

      return view('klass.grades', compact('class', 'students'));
    }


}
