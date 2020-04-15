<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Klass;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TestActivatedNotification;


class TestActivationController extends Controller
{
    public function activate(Klass $class, Test $test) 
    {   
        $this->authorize('activate-test', $test);
        $test->update(['active' => 1]);
        $notification = "The test, {$test->title}, is activated by your instructor. You could now take it.";
       	
        // event( new \App\Events\TestActivatedEvent($test, $class->students));
        Notification::send($this->getUsersInClass($class), new TestActivatedNotification($test->id, $notification));
        return redirect()
                    ->route('tests.show', ['class' => $class->id, 'test' => $test->id])
                    ->with("test_activated", "You have successfully activated the test {$test->title}.");
    }

    public function deactivate(Klass $class, Test $test) 
    {
        $this->authorize('activate-test', $test);
        $test->update(['active' => 0]);
        $notification = "The test, {$test->title}, has been deactivated.";
       	

         Notification::send($this->getUsersInClass($class), new TestActivatedNotification($test, $notification));
        return redirect()
                    ->route('tests.show', ['class' => $class->id, 'test' => $test->id])
                    ->with("test_deactivated", "You have successfully deactivated the test {$test->title}.");
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
