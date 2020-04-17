@if (auth()->user()->is_student)
  <!-- Nav Item - Alerts -->
  <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-bell fa-fw"></i>
      <!-- Counter - Alerts -->
     
      @if (auth()->user()->unreadNotifications->count() > 0)
       <span class="badge badge-danger badge-counter">
        {{ auth()->user()->unreadNotifications->count() }}+
      </span>
      @endif

    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
      <h6 class="dropdown-header d-flex justify-content-between align-items-center">
        <div>Notifications</div>
        @if (auth()->user()->unreadNotifications->count() > 0)
        <div>
          <a href="{{ route('read_notification') }}" class="bg-secondary p-1 rounded text-white">Mark all as read <i class="fas fa-eye"></i></a>
        </div>
        @endif
      </h6>
      @if (auth()->user()->unreadNotifications->count() > 0)
         @foreach (auth()->user()->unreadNotifications->take(5) as $notification)
          <a class="dropdown-item d-flex align-items-center" 

              @if($notification->type == "App\Notifications\TestActivatedNotification" ) href="{{ route('student_tests.index', ['class' => $notification->data['class'] ]) }}" 
              @endif

          >
          <div class="mr-3">
            <div class="icon-circle bg-primary">
              <i class="fas fa-file-alt text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500">{{ $notification->created_at->diffForHumans() }}</div>
            <span class="font-weight-bold">{{ $notification->data['message'] }}</span>
          </div>
        </a>
        @endforeach
        

      @else 

        <div class="dropdown-item text-center">No Notifications</div>
      @endif

      <a class="dropdown-item text-center small text-gray-500" href="{{ route('notifications.index', ['class' => $class->id]) }}">Show All Notifications</a>
    </div>
  </li>

@else


<!-- Nav Item - Alerts -->
<li class="nav-item dropdown no-arrow mx-1">
  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bell fa-fw"></i>
    <!-- Counter - Alerts -->
   
    @if (auth()->user()->unreadNotifications->count() > 0)
     <span class="badge badge-danger badge-counter">
      {{ auth()->user()->unreadNotifications->count() }}+
    </span>
    @endif

  </a>
  <!-- Dropdown - Alerts -->
  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header d-flex justify-content-between align-items-center">
      <div>Notifications</div>
      @if (auth()->user()->unreadNotifications->count() > 0)
      <div>
        <a href="{{ route('read_notification') }}" class="bg-secondary p-1 rounded text-white">Mark all as read <i class="fas fa-eye"></i></a>
      </div>
      @endif
    </h6>
    @if (auth()->user()->unreadNotifications->count() > 0)
       @foreach (auth()->user()->unreadNotifications->take(5) as $notification)
        <a class="dropdown-item d-flex align-items-center" 

            @if($notification->type == "App\Notifications\TestDoneNotification" ) href="{{ route('test_grades', ['class'=> 1, 'test' => $notification->data['test'] ]) }}" 
            @endif

        >
        <div class="mr-3">
          <div class="icon-circle bg-primary">
            <i class="fas fa-file-alt text-white"></i>
          </div>
        </div>
        <div>
          <div class="small text-gray-500">{{ $notification->created_at->diffForHumans() }}</div>
          <span class="font-weight-bold">{{ $notification->data['message'] }}</span>
        </div>
      </a>
      @endforeach
      

    @else 

      <div class="dropdown-item text-center">No Notifications</div>
    @endif

    <a class="dropdown-item text-center small text-gray-500" href="{{ route('notifications.admin_index') }}">Show All Notifications</a>
  </div>
</li>

@endif