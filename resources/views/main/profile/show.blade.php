@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">User Profile </h1>
</div>

<div class="card position-relative">
   <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">View Profile Information</h6>
  </div>
  <div class="card-body">
    @if(session('profile_updated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('profile_updated') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif(session('password_changed'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congrats! </strong> {!! session('password_changed') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <h4>
      {{ $user->full_name_2 }}
       @if ($user->is_admin || $user->is_superadmin)
          <span class="badge badge-pill badge-success ml-2">admin</span>
        @elseif($user->is_student)
         <span class="badge badge-pill badge-primary ml-2">student</span>
        @else
          <span class="badge badge-pill badge-info ml-2">staff</span>
        @endif 
    </h4>
    <hr>
     <p>
      E-mail: {{ $user->email }} <br>
      Student I.D.: {{ $user->student_profile->student_id }} <br>
      Course: {{ $user->student_profile->course->course }} <br>
      Mobile #: {{ $user->mobile ?? 'N/A' }} <br>
      Password: ************* <a href="{{ route('student-edit-password', ['class' => $class->id]) }}" class=""><i class="fas fa-edit" title="edit password"></i> </a>
    </p>
    <div class="alert alert-warning">
      Note: Contact your instructor or the admin to edit your profile. Plus Ultra!
    </div>
  </div>
</div>

@endsection
