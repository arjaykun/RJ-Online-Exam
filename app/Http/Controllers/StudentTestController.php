<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TestDoneNotification;
use App\Klass;
use App\Test;

class StudentTestController extends Controller
{
    public function index(KLass $class) {
      
      $this->authorize('launch_class', $class);
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

      $timer = \App\TestTimer::firstOrCreate([
          'user_id' => auth()->user()->id,
          'test_id' => $test->id,
        ], [
          'remaining_time' => $test->time ,
        ] 
      );


    	return view('main.test.take-test', compact('test', 'timer'));
    }

    public function assessment(KLass $class, Test $test, \App\Grade $grade) {
        return view('main.test.assessment', compact('test', 'grade'));
    }

    public function submit_test(KLass $class, Test $test) {
      $this->authorize('take_test', $test);
      $user = request()->user();
      $data = request()->answers;
       
      $choices = \App\Choice::findMany($data)->where('correct', 1);   

      $correct = $choices->count();
      $items = $test->questions->count();
      
      $res = round( ($correct/$items) * 50 + 50, 2);

      $grade = $user->grades()->create([
        'test_id' => $test->id,
        'score' => $correct,
        'grade' => $res,
      ]);

      //delete timer
      $test->timers->where('user_id', $user->id)->first()->delete();

      //send notification to instructor
      $message = "{$user->full_name} has completed {$test->title} with grade of {$grade->grade}%.";
      $class->user->notify( new TestDoneNotification($message, $test->id, $user->id));

      return redirect()
                ->route('grade_assessment', ['class' => $class->id, 'test' => $test->id, 'grade' => $grade->id]);

    }

    public function update_timer(KLass $class, Test $test){
        $timer = $test->timers->where('user_id', auth()->user()->id)->first();

        $timer->decrement('remaining_time');

        return 'success';
    }
}
