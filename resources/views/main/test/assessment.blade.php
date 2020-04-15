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
<body class="bg-secondary ">

	<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
		<div class="card text-center">
      <div class="card-body">
        <h1><i class="fas fa-registered fa-1x"></i> RJ-Online Exam</h1>
        <hr>
        <h3>Congratulations for finishing the test, {{ $test->title }}, in {{ $test->klass->subject_full }}.</h3>
        <h4>You've got {{ $grade->score }} correct answers out of {{ $test->questions->count() }} items. You're total grade is <strong>{{ $grade->grade }}%</strong>.</h4>
      </div>
        
    </div>
	
	</div>
</body>
</html>

