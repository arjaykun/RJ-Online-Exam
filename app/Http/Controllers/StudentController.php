<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Facades\App\Repositories\StudentRepository;
use App\Events\StudentCreated;
use App\User;
use App\StudentProfile;

class StudentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize('view', StudentProfile::class);

        $students = StudentRepository::all('last_name');


        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', StudentProfile::class);

        $student = new User();
        $courses = \App\Course::orderBy('course_code')->get();

        return view('student.create', compact('student', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {   
        $data = $this->validatedData(); 

        // $unhasedPassword = Str::random(6);
        $unhasedPassword = '123456';
        $data['user']['password'] = Hash::make($unhasedPassword);

        //create user as a student
        $user = User::create($data['user']);
        $user->student_profile()->create($data['student']);
      
        //send the password to the student email
        // event(new StudentCreated($student, $unhasedPassword));
        logger("An e-mail is sent to {$user->email} of his password {$unhasedPassword}");

        return back()
                ->with('student_added', 'You have successfully added a new student. View it <a href="'.$user->student_path() .'">here</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', StudentProfile::class);
        $student = StudentRepository::get($id);
     
        $student->load('student_profile.klasses','student_profile.course' );
    
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', StudentProfile::class);

        $student = StudentRepository::get($id);
 

        $courses = \App\Course::orderBy('course_code')->get();

        return view('student.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->authorize('update', StudentProfile::class);

        $student = StudentRepository::get($id);

        $data = $this->validatedData($id);

        $student->update($data['user']);
        $student->student_profile()->update($data['student']);

         return redirect()
                     ->route('students.show', ['student' => $student->id ])
                     ->with('student_updated', 'You have successfully updated this student.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $this->authorize('delete', StudentProfile::class);
        $student = StudentRepository::get($id);

        $student->student_profile()->delete();
        $student->delete();

          return redirect()
                     ->route('students.index')
                     ->with('student_deleted', 'You have successfully deleted a student.');
    }

  
    public function validatedData($student_id = 0) {
        $data = request()->validate([
            'student_id' => 'required',
            'first_name' => 'required|regex:/^[A-Za-z- ]+$/',
            'middle_name' => 'nullable|regex:/^[A-Za-z- ]+$/',
            'last_name' => 'required|regex:/^[A-Za-z- ]+$/',
            'email' => 'required|email|unique:users,email,' . $student_id,
            'mobile' => 'nullable|regex:/^[0-9]{11}$/',
            'course_id' => 'required',
        ]);

        return [
            'user' => [
                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'is_student' => 1, //make the user a student
            ],
            'student' => [
                'student_id' => $data['student_id'],
                'course_id' => $data['course_id'],
            ],
        ];

    }
}
