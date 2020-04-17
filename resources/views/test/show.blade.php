@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Classes <i class="fas fa-arrow-right"></i> Tests</h1>
</div>

<div class="card position-relative">
 <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">{{ ucwords($test->title) }} ({{ $test->time }} mins.)</h6>
    <div class="d-flex">

       <a href="{{ $class->path() }}" class="btn btn-sm btn-primary btn-circle mr-2"><i class="fas fa-arrow-left"> </i></a>

      <a href="{{ route('tests.edit', ['class' =>  $class->id, 'test' => $test->id]) }}" class="btn btn-sm btn-info btn-circle mr-2"><i class="fas fa-edit"> </i></a>
      
      <a class="btn btn-danger btn-circle btn-sm" href="#" data-toggle="modal" data-target="#confirmationModal">
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </div>
  <div class="card-body">
    @include('layouts.messages')
    <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap">
      <h3>Questions</h3>
      <div class="d-flex align-items-center">
               
        @if ($test->active == 1)
       
           <button class="btn btn-danger mr-2" disabled>
             @datetime($test->deadline) -  {{ $test->deadline->diffForHumans() }}
           </button>

        @else
           <a href="{{ route('activate_test', ['class' => $class->id, 'test'=> $test->id]) }}" 
            class="btn btn-success mr-2" type="submit">Activate Test <i class="fas fa-key"> </i></a>
        @endif
        
        <a href="{{ route('test_grades', ['class' => $class->id, 'test'=> $test->id]) }}" class="btn btn-warning mr-2" >View Grades <i class="fas fa-percentage"></i></a>
       
         <a href="{{ route('questions.create', ['test' => $test->id]) }}" class="btn btn-primary">Create Question <i class="fas fa-plus"> </i></a>
      </div>
     
    </div>
  </div>

  <div class="card-footer">
    <div class="d-flex justify-content-between align-items-center flex-wrap"> 
      <div>
          @if ($test->created_at !== $test->updated_at)
           Date Updated: @datetime( $test->updated_at )
          @else
           Date Created: @datetime( $test->created_at )
          @endif
         
      </div>
      <div>
        Status: 
        @if ($test->active)
          <span class="btn btn-sm btn-success ml-2 btn-circle"><i class="fas fa-check"></i></span>
        @else
          <span class="btn btn-sm btn-danger ml-2 btn-circle"><i class="fas fa-times"></i></span>
        @endif
      </div>
    </div>
  </div>
    
</div>

@if ($test->questions->count() > 0)

  @foreach ($test->questions as $question)
    <div class="card mt-3">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div><strong>{{ $loop->iteration }}.</strong> {{ $question->question }}</div>
        <div class="d-flex align-items-center justify-content-end">
           <a href="{{ route('questions.edit', ['test' => $test->id, 'question' => $question->id]) }}" class="btn btn-sm btn-primary btn-circle mr-2"><i class="fas fa-edit"> </i></a>
           <form action="{{ route('questions.destroy', ['test' => $test->id, 'question' => $question->id]) }}" method="post">
             @csrf
             @method('delete')
             <button type="submit" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"> </i></button>
           </form>
           
        </div>
      </div>
      <div class="card-body">
        <ul class="list-group">
          @foreach ($question->choices as $choice)
           <li class="list-group-item list-group-item-action ">
            {{ $choice->choice }} 
            @if ($choice->correct)
              <div class="ml-3 btn btn-sm btn-circle btn-success float-right">
                <i class="fas fa-check"></i>
              </div>
            @endif
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  @endforeach

@else
<div class="card position-relative mt-3">
  <div class="card-body jumbotron">
  <h1 class="text-center"> No Question Available! <i class="fas fa-smiley"></i></h1>
  </div>
</div>
@endif


@include('modals.confirmation', ['action' => $test->delete_path(), 'title' => 'test'])

@endsection
