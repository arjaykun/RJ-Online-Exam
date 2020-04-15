@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Classes <i class="fas fa-arrow-right"></i> Tests </h1>
</div>


<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">{{ strtoupper($class->section) }} - {{ ucwords($class->subject_description) }} ( {{ strtoupper($class->subject_code) }} )</h6>
    <div class="d-flex">
      <a href="{{ $class->edit_path() }}" class="btn btn-sm btn-primary btn-circle mr-2"><i class="fas fa-edit"> </i></a>
      
      <a class="btn btn-danger btn-circle btn-sm" href="#" data-toggle="modal" data-target="#confirmationModal">
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </div>
  <div class="card-body">
    
    @include('layouts.messages')

    <div class="d-flex justify-content-between align-items-center mb-2">
      <h3>Tests</h3>
      <a href="{{ route('tests.create', ['class' => $class->id] ) }}" class="btn btn-primary">Create New Test</a>
    </div>
    
    @if ($class->tests->count() > 0)
      <ul class="list-group">
        @foreach ($class->tests as $test)
          <a href="{{ route('tests.show', ['class' => $class->id, 'test' => $test->id]) }}" class="text-dark">
             <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
               <span>{{ $test->title }} </span>
               <div>
                  @if ($test->active)
                  active
                    <span class="btn btn-sm btn-success ml-2 btn-circle"><i class="fas fa-check"></i></span> 
                  @else
                  inactive
                    <span class="btn btn-sm btn-danger ml-2 btn-circle"><i class="fas fa-times"></i></span> 
                  @endif
               </div>
             </li>
          </a>
        @endforeach
        
      </ul>
    @else
      <div class="jumbotron text-center">
        No Data Available. 
      </div>  
    @endif
    

  </div>
</div>



@include('modals.confirmation', ['action' => $class->delete_path(), 'title' => 'class'])


@endsection
