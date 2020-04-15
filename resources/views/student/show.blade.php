@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Students </h1>
</div>

<div class="card position-relative">
   <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">View Student Information</h6>
    <div class="d-flex justify-content-center align-items-center flex-wrap">
       <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm btn-circle"><i class="fas fa-arrow-left"></i></a>
       <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="ml-1 btn btn-info btn-sm btn-circle"><i class="fas fa-edit"></i></a>
        <a class="btn btn-danger btn-circle btn-sm ml-1" href="#" data-toggle="modal" data-target="#confirmationModal">
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </div>
  <div class="card-body">

    @include('layouts.messages')
    
    <h3>{{ $student->full_name_2 }} </h3>
    <hr>
    Student I.D.: {{ $student->student_profile->student_id }} <br>
    E-mail: {{ $student->email }} <br>
    Mobile #: {{ $student->mobile }} <br>
    Course: {{ $student->student_profile->course->course }} ( {{ $student->student_profile->course->course_code }} ) <br>
    Account Creation Date: @datetime($student->created_at) <br>
    Password: 
    <span class="ml-2"><a href="{{ route('user-change-password', ['user' => $student->id]) }}" class="btn btn-secondary btn-sm rounded">Change Password <i class="fas fa-edit"></i> </a></span>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header">  
    <h6 class="m-0 font-weight-bold text-primary">Enrolled Classes</h6>
  </div>
  <div class="card-body">
     @if ($student->student_profile->klasses->count() > 0)
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr class="bg-primary text-white">
              <th>Section</th>
              <th>Subject</th>
              <th>Instructor</th>
              <th>Enrollment Date</th>
            </tr>
          </thead>
          <tbody>          
            @foreach ($student->student_profile->klasses as $class)
            <tr>
              <td>{{ $class->section }}</td>
              <td>{{ $class->subject_code }}</td>
              <td>{{ $class->user->full_name }}</td>
              <td>@datetime($class->pivot->created_at)</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
     
    @else 
      <div class="alert alert-secondary text-center">
        No Data
      </div>
    @endif
  </div>
</div>

@include('modals.confirmation', ['action' => '', 'title' => 'student'])



@endsection
