@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Users </h1>
</div>

<div class="card position-relative">
   <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">View User Information</h6>
    <div class="d-flex justify-content-center align-items-center flex-wrap">
       @can('view', 'App\User::class')
       <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm btn-circle"><i class="fas fa-arrow-left"></i></a>
       @endcan
       <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="ml-1 btn btn-info btn-sm btn-circle"><i class="fas fa-edit"></i></a>
        <a class="btn btn-danger btn-circle btn-sm ml-1" href="#" data-toggle="modal" data-target="#confirmationModal">
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </div>
  <div class="card-body">

    @include('layouts.messages')
    
    <h4>{{ $user->full_name_2 }} 
        @if ($user->is_admin)
          <span class="badge badge-pill badge-success">admin</span>
        @else
          <span class="badge badge-pill badge-primary">staff</span>
        @endif 
    </h4>
    <hr>
    <p>
      E-mail: {{ $user->email }} <br>
      Mobile #: {{ $user->mobile ?? 'N/A' }} <br>
      Password: <a href="{{ route('user-change-password', ['user' => $user->id]) }}" class="text-danger">Change Password <i class="fas fa-edit"></i> </a>
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
