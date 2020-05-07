<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Events\ActivityDoneEvent;

class PasswordController extends Controller
{
     public function change_password($id) {
        $user = User::find($id);

        $this->authorize('update', $user);

        return view('user.change-password', ['user' => $user]);
    }


    public function update_password($id) {

        $user = User::find($id);

        $this->authorize('update', $user);

        $data = request()->validate([
            'password' => 'required|min:6|confirmed'
        ]);
        
        $user->update([
            'password' =>  Hash::make($data['password']),
        ]);

        event( new ActivityDoneEvent('update', "updated the password of ". ($user->is_student ? 'student' : 'user') . ", <a href='". ($user->is_student ? $user->student_path() : $user->user_path() ) ."'>{$user->full_name}</a>"));

        if ($user->is_student) {
        	  return redirect()
                ->route('students.show', ['student' => $id])
                ->with('password_changed', 'You have successfully changed the student password');
        } 

        return redirect()
                ->route('users.show', ['user' => $id])
                ->with('password_changed', 'You have successfully changed the user password');

    }
}
