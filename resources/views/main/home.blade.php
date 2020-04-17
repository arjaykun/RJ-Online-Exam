<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RJ-Online Exam - HOME</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
			  <!-- Custom fonts for this template-->
			  <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

			  <!-- Styles -->
			  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
       
    </head>
    <body>
       <div class="d-flex justify-content-between container p-3 align-items-center">
       		<h4><i class="fas fa-registered"> </i> RJ-ONLINE EXAM</h4>
       		<form action="/logout" method="post" class="mr-4">
       			@csrf
       			<button class="btn btn-link text-dark">LOGOUT</button>
       		</form>
       </div>	
		
       <div class="container px-5 row mx-auto mt-5">
					@forelse ($classes as $class)
						<div class="col-md-4">
							 <div class="card shadow mb-4" style="height: 250px">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between align-items-center">
                  	<span>{{ $class->section }}</span>
                    @if ($class->end_date->greaterThanOrEqualTo($class->created_at))
                      <span class="text-xs"><i class="fas fa-circle text-success mr-2 fa-xs"></i>IN PROGRESS</span>
                    @else
                      <span class="text-xs"><i class="fas fa-circle text-danger mr-2 fa-xs"></i>ENDED</span>
                    @endif
                    
                  </h6>
                </div>
                <div class="card-body">
                	<h6>
                		{{ $class->subject_full }}
                	</h6>
                	<small>
                		<strong>Instructor:</strong> {{ $class->user->full_name }} <br>
                		<strong> Date: </strong>
                      from {{ $class->created_at->format('M d') }} 
                      to {{ $class->end_date->format('M d Y') }}
                    
                	</small>
                </div>

                <div class="card-footer">
                	<div class="d-flex justify-content-end">
                    @if ($class->end_date->greaterThanOrEqualTo($class->created_at))
                		<a href="{{ route('dashboard', ['class' => $class]) }}" class="btn btn-primary">
                			PROCEED <i class="fas fa-arrow-circle-right "></i>
                		</a>
                    @else
                      <button class="btn btn-secondary" disabled>
                         class ended
                      </button>
                    @endif
                	</div>
                </div>
              </div>
						</div>	
          @empty
            <div class="text-center jumbotron col-md-12">
              <h3>You have no enrolled  classes.</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil incidunt harum, aliquam nam voluptate labore velit dignissimos blanditiis accusantium dolorum sed. Vel ducimus esse tempore doloremque nostrum praesentium, recusandae dignissimos?</p>
            </div>	
					@endforelse		
       </div>

    </body>
</html>
