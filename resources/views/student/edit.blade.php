@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Students </h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="font-weight-bold text-primary">Update Student</h6>
    <div><a href="{{ route('students.index') }}" class="btn btn-primary btn-sm btn-circle"><i class="fas fa-arrow-left"> </i></a></div>
  </div>
  <div class="card-body">

    @include('layouts.messages')

    <form method="POST" action="{{ route('students.update', ['student' => $student->id]) }}">
        @csrf
        @method('PUT')

        @include('student.form')

        <button class="btn btn-primary float-right">Save Changes</button>
    </form>
  </div>
</div>

@endsection
