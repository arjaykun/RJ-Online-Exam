<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center"  href="/home">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-registered"></i>
  </div>
  <div class="sidebar-brand-text mx-3">RJ-ONLINE EXAM</div>
</a>
   

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="{{ route('dashboard', ['class' => $class]) }}">
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
  <a class="nav-link" href="{{ route('student_tests.index', ['class' => $class]) }}">
    <i class="fas fa-fw fa-book-open"></i>
    <span>Tests</span>
  </a>
</li>

 <li class="nav-item">
  <a class="nav-link" href="{{ route('student_grades.index', ['class' => $class]) }}">
    <i class="fas fa-fw fa-percentage"></i>
    <span>Grades</span>
  </a>
</li>


 <li class="nav-item">
  <a class="nav-link" href="#">
    <i class="fas fa-fw fa-microphone"></i>
    <span>Announcements</span>
  </a>
</li>
