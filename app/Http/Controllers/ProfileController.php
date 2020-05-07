<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function profile() {
    	$user = auth()->user();
			$user->load('klasses'); 
			$user->klasses->loadCount('student_profiles', 'tests');

			return view('auth.profile', compact('user'));		
    }

    public function edit() {
    	$user = auth()->user();
    	return view('auth.edit', compact('user'));		
    }

    public function update(Request $request, $userId) {
        $user = \App\User::find($userId);
        
        $data = $request->validate([
           'first_name' => 'required|regex:/^[A-Za-z- ]+$/',
            'middle_name' => 'nullable|regex:/^[A-Za-z- ]+$/',
            'last_name' => 'required|regex:/^[A-Za-z- ]+$/',
            'email' => 'required|email|unique:users,email,' . $userId,
            'mobile' => 'nullable|regex:/^[0-9]{11}$/',
        ]);

        $user->update($data);

        return redirect('/profile')->with('profile_updated', 'You have successfully updated your profile');
    }

  
    public function edit_password() {
         
       return view('auth.edit_password');
    }

    public function change_password(Request $request, \App\User $user) {
        $data = $request->validate([
            'old_password' => 'required|password',
            'password' => 'required|min:6|confirmed'
        ]);
        
        $user->update([
            'password' =>  Hash::make($data['password']),
        ]);


        Auth::logoutOtherDevices($data['password']);

        return redirect('/profile')->with('password_changed', 'You have successfully changed your password');
    }

    //student
    public function student_profile(\App\Klass $class) {
        $user = auth()->user();
        $user->load('student_profile.course'); 

        return view('main.profile.show', compact('user', 'class'));       
    }

     public function student_edit_password(\App\Klass $class) {
         
       return view('auth.edit_password', compact('class'));
    }

     public function student_change_password(Request $request, \App\Klass $class, \App\User $user ) {
   
        $data = $request->validate([
            'old_password' => 'required|password',
            'password' => 'required|min:6|confirmed'
        ]);
        
        $user->update([
            'password' =>  Hash::make($data['password']),
        ]);


        Auth::logoutOtherDevices($data['password']);

        return redirect()->route('student_profile', ['class'=>$class->id])->with('password_changed', 'You have successfully changed your password');
    }


}
