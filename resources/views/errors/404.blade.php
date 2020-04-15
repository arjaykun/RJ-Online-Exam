<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
   <div class="vh-100 d-flex justify-content-center align-items-center">

    <!-- 404 Error Text -->
    <div class="text-center">
      <div class="error mx-auto" data-text="404">404</div>
      <p class="lead text-gray-800 mb-5">Page Not Found</p>
      <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
      <a href="/">&larr; Back to Home</a>
    </div>

  </div>
  <!-- /.container-fluid -->

</body>
</html>
