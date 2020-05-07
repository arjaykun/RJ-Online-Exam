 <!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>


    <div class="d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 text-lg">
        @if (auth()->user()->is_student)
          {{ $class->section }} - {{ $class->subject_full }}
        @endif
    </div>


  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    @include('layouts.notification')

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
          
        @if (auth()->user())
          {{ auth()->user()->full_name }} 
        @endif

        </span>
        
        
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" @if(auth()->user()->is_student) href="{{ route('student_profile', ['class' => $class->id]) }}" @else href="/profile" @endif>
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        @if (!auth()->user()->is_student)
          <a class="dropdown-item" href="{{ route('activities.index') }}">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Activity Log
          </a>
        @endif
        
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>

  </ul>

</nav>
<!-- End of Topbar -->