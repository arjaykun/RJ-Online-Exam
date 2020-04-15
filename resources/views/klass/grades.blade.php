@extends('layouts.app')

@section('extra_styles')
  <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('extra_scripts')
  <!-- Page level plugins -->
  <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>


  <script defer>
   // Call the dataTables jQuery plugin
    $(document).ready(function() {
      $('#dataTable').DataTable(); 
    });
  </script>

@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Classes <i class="fas fa-arrow-right"></i> Grades  </h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">Grades of {{ $class->section }}</h6>
    <div>
       <a href="{{ route('classes.index')}} " class="btn btn-primary btn-sm rounded">Back to Class</a>
        <a href="#" class="btn btn-danger btn-sm rounded">Print to PDF <i class="fas fa-file-pdf ml-1"> </i></a>
    </div>
  </div>
  <div class="card-body">

    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered">
      <thead>

        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Test Taken</th>
          <th>Avg. of Taken Test</th>
          <th>Final Grade</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($students as $student)
          <tr>
            <td>{{ $student->user->full_name_2 }}</td>
            <td>{{ $student->user->email }}</td>
            <td>{{ $student->user->grades->count() }}</td>
            <td>{{ $student->user->grades->avg('grade') ?? 0}}%</td>
            <td>{{ round($student->user->grades->sum('grade')/ $class->tests->count(), 2) }}%</td>
          </tr>         
        @endforeach       
      </tbody>
    </table>
    </div>
  </div>
</div>


@include('modals.confirmation', ['action' => '', 'title' => 'student in the class'])

@endsection



