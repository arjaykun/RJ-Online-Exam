<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klass;
use App\Test;

class StudentTestController extends Controller
{
    public function index(KLass $class) {

      $user = auth()->user()->id;
    	$tests = $class->tests
        ->loadCount('questions')
        ->load(['grades' => function($query) use($user) {
            $query->where('user_id', $user);
          }]);


    	return view('main.test.index', compact('class', 'tests'));
    }

    public function show(KLass $class, Test $test) {
      $this->authorize('take_test', $test);
    	$test->load('questions.choices');
    	
    	return view('main.test.take-test', compact('test'));
    }

    public function assessment(KLass $class, Test $test, \App\Grade $grade) {
        return view('main.test.assessment', compact('test', 'grade'));
    }

    public function submit_test(KLass $class, Test $test) {
      $this->authorize('take_test', $test);
      $data = request()->answers;
        

      $choices = \App\Choice::findMany($data)->where('correct', 1);
      

      $correct = $choices->count();
      $items = count($data);
      
      $res = round( ($correct/$items) * 50 + 50, 2);
  

      $grade = auth()->user()->grades()->create([
        'test_id' => $test->id,
        'score' => $correct,
        'grade' => $res,
      ]);

      return redirect()
                ->route('grade_assessment', ['class' => $class->id, 'test' => $test->id, 'grade' => $grade->id]);

    }
}
