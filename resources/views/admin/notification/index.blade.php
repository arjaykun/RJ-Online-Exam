@extends('layouts.app')

@section('content')

  <h1 class="mb-4">Notifications</h1>
  @if (auth()->user()->notifications->count() > 0)
    
    @foreach (auth()->user()->notifications as $notification)
    
    <div class="card mt-2">
      <a class="dropdown-item d-flex align-items-center" 

          @if($notification->type == "App\Notifications\TestActivatedNotification" ) href="{{route('test_grades', ['class'=> 1, 'test' => $notification->data['test'] ]) }}" @endif
      >
        <div class="card-body d-flex justify-content-between align-items-center ">
          <div>
            @if($notification->read_at) 
              <i class="fas fa-eye mr-2" title="notification marked as read"></i>
            @endif 
            {{ $notification->data['message'] }}    
          </div>
          <div>
            {{ $notification->created_at->diffForHumans() }}</div>
        </div>
      </a>
    </div>
    @endforeach

    <div class="my-2 d-flex justify-content-center align-items-center">
      <a href="{{ route('read_notification') }}" class="mx-2">Mark All as Read</a> | 
      <a href="{{ route('delete_notifications') }}" class="mx-2">Delete All</a>
    </div>   
  
  @else
    <div class="jumbotron text-center">
      No Notifications
    </div>
  @endif

  
@endsection