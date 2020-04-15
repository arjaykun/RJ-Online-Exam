@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<hr>
<div class="row">
	
  <!-- Total Classes -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <h6 class="text-sm font-weight-bold text-info text-uppercase mb-1">My Classes</h6>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $counts['classes'] }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-fw fa-school fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- User created test -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <h6 class="text-sm font-weight-bold text-danger text-uppercase mb-1">My Created Tests</h6>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $counts['tests'] }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-fw fa-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Total Students -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-secondary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <h6 class="text-sm font-weight-bold text-secondary text-uppercase mb-1">My Current Students</h6>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $counts['students'] }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-fw fa-user-graduate fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


   <!-- All classes count -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <h6 class="text-sm font-weight-bold text-primary text-uppercase mb-1">Total Classes Count</h6>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $counts['all_classes'] }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-fw fa-layer-group fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

   <!-- All tests count -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <h6 class="text-sm font-weight-bold text-warning text-uppercase mb-1">Total Tests Count</h6>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $counts['all_tests'] }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-fw fa-swatchbook fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Total Students -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-dark shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <h6 class="text-sm font-weight-bold text-dark text-uppercase mb-1">Total Registered Students</h6>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $counts['all_students'] }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>

@endsection
