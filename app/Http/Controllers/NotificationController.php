<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
		public function __construct() {
			$this->middleware('auth');
		}

		public function index(\App\Klass $class) {

			return view('main.notification.index', compact('class'));
		}

    public function read() {
    	auth()->user()->unreadNotifications->markAsRead();

    	return back();
    }

    public function destroy() {
    	auth()->user()->notifications()->delete();

    	return back();
    }
}
