@extends('layouts.app')

@section('content')
  @php
    $icons = [
      'edit' => 'fas fa-pen text-primary mr-2',
      'add' => 'fas fa-plus text-success mr-2',
      'delete' => 'fas fa-trash-alt text-danger mr-2',
      'activate' => 'fas fa-check text-success'
    ]
  @endphp

  <div class="d-flex justify-content-between align-items-center flex-wrap">
    <h1 class="mb-4">Activity Log <small>({{ $activities->total() }} results)</small></h1>     
    @if ($activities->count() > 0)
      <form action="{{ route('activities.destroy') }}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-primary btn-sm rounded" type="submit">
          Clear All
        </button>
      </form>
    @endif
  </div>
 
  @forelse ($activities as $activity)
  
  <div class="card mt-2">
   
    <div class="card-body d-flex justify-content-between align-items-center ">
      <div>
       
        <i class="{{ $icons[$activity->action] ?? 'fas fa-star text-warning' }}" title="notification marked as read"></i>

        {!! $activity->activity !!}    
      </div>
      <div>
        {{ $activity->created_at->diffForHumans() }}</div>
    </div>
    
  </div>
  
  @empty

    <div class="jumbotron text-center">No Activities</div>

  @endforelse

   
  <div class="mt-3 d-flex justify-content-center">{{ $activities->links() }}</div>


  
@endsection