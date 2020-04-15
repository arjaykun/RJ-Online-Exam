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
					@foreach ($classes as $class)
						<div class="col-md-4">
							 <div class="card shadow mb-4" style="height: 250px">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                  	{{ $class->section }}
                  </h6>
                </div>
                <div class="card-body">
                	<h6>
                		{{ $class->subject_full }}
                	</h6>
                	<small>
                		<strong>Instructor</strong> {{ $class->user->full_name }} <br>
                		<strong>Date Created: </strong> @datetime($class->created_at)
                	</small>
                </div>

                <div class="card-footer">
                	<div class="d-flex justify-content-end">
                		<a href="{{ route('dashboard', ['class' => $class]) }}" class="btn btn-primary">
                			PROCEED <i class="fas fa-arrow-circle-right "></i>
                		</a>
                	</div>
                </div>
              </div>
						</div>		
					@endforeach			
       </div>

    </body>
</html>
