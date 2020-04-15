@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">User Profile </h1>
</div>

<div class="card position-relative">
   <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">View Profile Information</h6>
    <div class="d-flex justify-content-center align-items-center flex-wrap">
       <a href="/profile/edit" class="btn btn-primary btn-sm" title="edit profile">
        Edit Profile <i class="fas fa-pen"> </i></a>
      </a>
    </div>
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
      Mobile #: {{ $user->mobile ?? 'N/A' }} <br>
      Password: ************* <a href="{{ route('edit-password') }}" class=""><i class="fas fa-edit" title="edit password"></i> </a>
    </p>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header">  
    <h6 class="m-0 font-weight-bold text-primary">Classes</h6>
  </div>
  <div class="card-body">
     @if ($user->klasses->count() > 0)
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr class="bg-primary text-white">
              <th>Section</th>
              <th>Subject</th>
              <th>Students Count</th>
              <th>Tests Count</th>
              <th>Date Created</th>
            </tr>
          </thead>
          <tbody>          
            @foreach ($user->klasses as $class)
            <tr>
              <td>{{ $class->section }}</td>
              <td>{{ $class->subject_full }}</td>
              <td><span class="badge badge-pill badge-primary">
              {{ $class->student_profiles_count }}</span></td>
              <td><span class="badge badge-pill badge-dark">
              {{ $class->tests_count }}</span></td>
              <td>@datetime($class->created_at)</td>
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
