<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center"  href="/admin/dashboard">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-registered"></i>
  </div>
  <div class="sidebar-brand-text mx-3">RJ-ONLINE EXAM</div>
</a>
   

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="/admin/dashboard">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  MAIN MENU
</div>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClasses" aria-expanded="true" aria-controls="collapseClasses">
    <i class="fas fa-fw fa-school"></i>
    <span>Classess</span>
  </a>
  <div id="collapseClasses" class="collapse" aria-labelledby="headingClasses" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Class Management</h6>
      <a class="collapse-item" href="{{ route('classes.create') }}">Create Class</a>
      <a class="collapse-item" href="{{ route('classes.index') }}">View All Classess</a>
    </div>
  </div>
</li>



<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent" aria-expanded="true" aria-controls="collapseStudent">
    <i class="fas fa-fw fa-user-graduate"></i>
    <span>Students</span>
  </a>
  <div id="collapseStudent" class="collapse" aria-labelledby="headingTest" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Student Management</h6>
      <a class="collapse-item" href="{{ route('students.create') }}">Add Student</a>
      <a class="collapse-item" href="{{ route('students.index') }}">View All Students</a>
    </div>
  </div>
</li>


@if(auth()->user()->is_admin || auth()->user()->is_superadmin)

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
    <i class="fas fa-fw fa-users"></i>
    <span>Users</span>
  </a>
  <div id="collapseUser" class="collapse" aria-labelledby="headingQuestion" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">User Management</h6>
      <a class="collapse-item" href="{{ route('users.create') }}">Add User</a>
      <a class="collapse-item" href="{{ route('users.index') }}">View All Users</a>
    </div>
  </div>
</li>



  <!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuestion" aria-expanded="true" aria-controls="collapseQuestion">
    <i class="fas fa-fw fa-cog"></i>
    <span>Settings</span>
  </a>
  <div id="collapseQuestion" class="collapse" aria-labelledby="headingQuestion" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">User Management</h6>
      <a class="collapse-item" href="#">Add User</a>
      <a class="collapse-item" href="#">View All Users</a>
    </div>
  </div>
</li>

@endif