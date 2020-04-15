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

  @yield('extra_styles', '')

 

</head>
<body class="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       @include('layouts.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          @yield('content')


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white mt-5">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; RJ-Online Exam {{ now()->format('Y') }}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="{{ route('logout') }}" method="post">
            @csrf
          <button class="btn btn-primary">Logout</button>
          </form>
        </div>
      </div>
    </div>

  </div>
  {{-- End Page Wrapper --}}


 <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>

   <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
 
  @yield('extra_scripts', '')

</body>
</html>
