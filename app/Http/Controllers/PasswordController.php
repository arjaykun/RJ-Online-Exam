<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

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
