<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="icct, project, onlinexam, exam,">
  <meta name="author" content="Ryle Jaylee Antonio">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>RJ-Online Exam</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
	<div class="container">
	
	<div class="jumbotron text-center">
		<h2><i class="fas fa-registered fa-1x"></i> RJ-Online Exam</h2>
		<p>
			{{ $test->klass->section }} - {{ $test->klass->subject_full }} 
			<hr>
			Prepared By: <strong> {{ $test->klass->user->full_name }} </strong> <br>
			{{ now()->format('M d, Y') }}
		</p>
	</div>
	
	<form method="post" action="{{ route('student_tests.submit',['class' => $test->klass_id, 'test' => $test->id]) }}">
	@csrf
	@foreach ($test->questions->shuffle() as $question)
		<div class="card mt-2">
			<div class="card-header">{{ $loop->iteration }}. {{ $question->question }}</div>
			<div class="card-body">
	
				<div class="text-danger">@error('answers.'.$question->id) You have not yet answered this question. @enderror </div>
				@foreach ($question->choices->shuffle() as $choice)
					
						<div class="form-check mb-1">
						  <label class="form-check-label">
						    <input type="radio" class="form-check-input" 
						    			required
						    			name="answers[{{ $question->id }}]" 
						    			value="{{$choice->id}}" 
									    @if (old('answers.'.$question->id) == $choice->id)
									    		checked
									    @endif
									    >
						    {{ $choice->choice }}

						  </label>
						</div>
				@endforeach	 
			</div>
		</div>
	@endforeach
	<small class="alert alert-warning p-2 text-center d-block my-2"><strong>Warning: </strong> Once submitted, you could not go back here again to change your answer. Please finalize your answers before you submit the test.</small>
	<button type="submit" class="btn btn-primary my-2 float-right">SUBMIT TEST</button>
	</form>
</div>
</body>
</html>

