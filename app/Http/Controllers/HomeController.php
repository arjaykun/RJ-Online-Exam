<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Student;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(['auth', 'student'])->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students_count = \App\User::whereHas('student_profile', function($query) {
            $query->whereHas('klasses', function($query) {
                $query->where('user_id', auth()->user()->id);
            });
        })->count();
        
    
        $counts = [     
            'classes' => auth()->user()->klasses->count(),
            'students' => $students_count,
            'all_students' => \App\StudentProfile::all()->count(),
            'tests' => auth()->user()->tests->count(),
            'all_tests' => \App\Test::all()->count(),
            'all_classes' => \App\Klass::all()->count(),
        ];

        
        return view('admin/home', compact('counts'));
    }

    public function welcome() {
        return view('welcome');
    }

    public function home() {
        $classes = auth()->user()->student_profile->klasses;
        $classes->load('user');

        return view('main.home', compact('classes'));
    }

    public function dashboard(\App\Klass $class) {
        return view('main.dashboard', compact('class'));
    }


}
