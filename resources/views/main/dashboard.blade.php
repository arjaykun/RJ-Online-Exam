@extends('layouts.app')

@section('content')

	<h1>Hola! Student,  {{ auth()->user()->full_name	 }}</h1>
	
	<hr>

	<div class="row">
		<!-- Total Classes -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <h6 class="text-sm font-weight-bold text-warning text-uppercase mb-1">Available Tests</h6>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
            	{{ $class->tests_count	}}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-fw fa-list-alt fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- User created test -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <h6 class="text-sm font-weight-bold text-primary text-uppercase mb-1">Activated Tests</h6>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
            		{{ $class->activated_tests	}}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-fw fa-lock-open fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- User created test -->
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <h6 class="text-sm font-weight-bold text-success text-uppercase mb-1">Completed Tests</h6>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
            	{{ $class->completed_tests }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-fw fa-check-circle fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  

	</div>

	
@endsection