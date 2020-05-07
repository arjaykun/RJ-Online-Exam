<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Events\ActivityDoneEvent;

class UserController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$this->authorize('view', User::class);

		$users = User::active()->staffs()->get();

		return view('user.index', ['users' => $users]);
	}

	public function create() {
		$this->authorize('create', User::class);

		$user = new User();
	

		return view('user.create', ['user' => $user ]);
	}

	public function store() {
		$data = $this->validatedData();
		if($data['password'] === null) {
			  $unhasedPassword = '123456';
        $data['password'] = Hash::make($unhasedPassword);
		} else {
			$data['password'] = Hash::make($data['password']);
		}
		
		$data['is_staff'] = 1;
		$user = User::create($data);

		event( new ActivityDoneEvent('add', "added new user, <a href='{$user->user_path()}'>{$user->full_name}</a>"));

		return back()->with('user_added', 'You have successfully created a user. View it <a href="'.$user->user_path() .'">here</a>');
	}

	public function show(User $user) {
		$this->authorize('view', User::class);

		$user->load('klasses'); 
		$user->klasses->loadCount('student_profiles', 'tests');


		return view('user.show', ['user' => $user]);		
	}

	public function edit(User $user) {
		$this->authorize('update', $user);

		return view('user.edit', ['user' => $user ]);
	}

	public function update(User $user) {
		$this->authorize('update', $user);
		$user->update($this->validatedData($user->id));

		event( new ActivityDoneEvent('edit', "updated user, <a href='{$user->user_path()}'>{$user->full_name}</a>"));

		return back()->with('user_updated', 'You have successfully updated a user. View it <a href="'.$user->user_path() .'">here</a>');
	}

	public function destroy(User $user) {
		$this->authorize('delete', $user);
		$user->delete();

		event( new ActivityDoneEvent('delete', "deleted user, {$user->full_name}"));

		return redirect()
						->route('users.index')
						->with('user_deleted', 'You have successfully deleted a user.');
	}




	public function validatedData($id = 0) {
		 return $data = request()->validate([
          'first_name' => 'required|regex:/^[A-Za-z- ]+$/',
          'middle_name' => 'nullable|regex:/^[A-Za-z- ]+$/',
          'last_name' => 'required|regex:/^[A-Za-z- ]+$/',
          'email' => 'required|email|unique:users,email,' . $id,
          'mobile' => 'nullable|regex:/^[0-9]{11}$/',
          'password' => 'nullable|string|min:6|confirmed',
      ]);
	}

}
