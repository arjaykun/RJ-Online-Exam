@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Classes <i class="fas fa-arrow-right"></i> Enroll Students </h1>
</div>


<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">{{ $class->title }}</h6>
    <div class="d-flex">
      <a href="{{ $class->edit_path() }}" class="btn btn-sm btn-primary btn-circle mr-2"><i class="fas fa-edit" title="edit class"> </i></a>
      
      <a class="btn btn-danger btn-circle btn-sm" href="#" data-toggle="modal" data-target="#confirmationModal" title="delete class">
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </div>
  <div class="card-body">
    @include('layouts.messages')
    
    <form action="{{ route('search_student', ['class' => $class->id]) }}" method="POST">
      @csrf
      <div class="form-group">
      <label for="desc">Search for student:</label>
       <input type="text" class="form-control form-control @error('search') is-invalid @enderror " id="desc" placeholder="Search by student name or id..." autocomplete="off" name="search"  value="{{ old('search') ??  $class->search }}">
       <div class="text-danger">@error('search') {{ $message }} @enderror </div>
      </div>
       <div class="d-flex justify-content-end align-items-center flex-wrap">
        <a href="{{ route('view_students', ['class' => $class]) }}" class="btn btn-secondary">View Enrolled Students <i class="fas fa-user-friends"> </i></a>
         <button class="btn btn-primary ml-2">Search <i class="fas fa-search"> </i></button>
       </div>
       
    </form>
    

  </div>
</div>

<div class="card mt-2">
  <div class="card-body">
     @if ($students)
      <h5>Search Results: {{ $students->count()}}</h5>
       <ul class="list-group p-2">
          @foreach ($students as $student)
            <li class="list-group-item list-group-item-action">
              <div class="row">
                <div class="col-sm-3">{{ $student->full_name }}</div>
                <div class="col-sm-3">{{ $student->email }}</div>
                <div class="col-sm-2">{{ $student->student_profile->student_id }}</div>
                <div class="col-sm-2">{{ $student->student_profile->course->course_code }}</div>
                <div class="col-sm-2 text-center">
                  @if ($class->student_profiles->contains('id', $student->student_profile->id))
                    <div class="badge bg-success text-white">enrolled</div>
                  @else 
                    <form action="{{ route('enroll_student', ['class' => $class->id, 'student' => $student->id]) }}" method="post">
                      @csrf
                      <button class="btn btn-primary btn-sm btn-circle" type="submit"><i class="fas fa-plus"> </i></button>

                    </form>
                  @endif
                  
                  
                </div>
              </div>         
            </li>
          @endforeach
       </ul>
    @else 
      <div class="jumbotron text-center">
        No Search Data
      </div>
    @endif
  </div>
</div>



@include('modals.confirmation', ['action' => $class->delete_path(), 'title' => 'class'])

@endsection
