<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Klass;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TestActivatedNotification;
use App\Events\ActivityDoneEvent;

class TestActivationController extends Controller
{

    public function show(Klass $class, Test $test) {
       $this->authorize('activate-test', $test);
      return view('test.activate', compact('class', 'test'));
    }

    public function activate(Klass $class, Test $test) 
    {   
  
        $this->authorize('activate-test', $test);
        $data = request()->validate([
          'deadline' => 'required|date|after:+' . $test->time .' minutes',
        ]);

        $test->update($data);
        $notification = "The test, {$test->title}, in {$class->subject_full} ({$class->section}) is activated.";
       	
        // event( new \App\Events\TestActivatedEvent($test, $class->students));
        Notification::send($this->getUsersInClass($class), new TestActivatedNotification($test->id, $notification, $class->id));
        
         event( new ActivityDoneEvent('activate', "activated test, <a href='{$test->path()}'>{$test->title}</a> from {$test->created_at->format('M d, Y h:i a')} until {$test->deadline->format('M d, Y h:i a')}."));

        return redirect()
                    ->route('tests.show', ['class' => $class->id, 'test' => $test->id])
                    ->with("test_activated", "You have successfully activated the test {$test->title}.");
    }


    //get all users in the class
    public function getUsersInClass($class) {

       	return \App\User::whereHas('student_profile', function($query) use($class){
       			$query->whereHas('klasses', function($query) use($class){
       				$query->where('klass_id', $class->id);
       			});
       	})->get();
       	
    }
}
