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
      $('#dataTable').DataTable({
        "order": [],
         "columnDefs": [
            { "orderable": false, "targets": [1,2,3,4,5,7]}
          ]
      });
    });
  </script>

@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Classes</h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">View All Classes</h6>
    <a href="{{ route('classes.create') }}" class="btn btn-primary btn-sm">Create New Class <i class="fas fa-plus"></i></a>
  </div>
  <div class="card-body">

    @include('layouts.messages')
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered">
      <thead>

        <tr>
          <th>#</th>
          <th>Section</th>
          <th>Subject</th>
          <th>Students #</th>
          <th>Tests #</th>
          <th>Creation Date</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        @foreach ($classes as $class)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $class->section }}</td>
            <td>{{ $class->subject_full}}</td>
            <td><span class="badge badge-pill badge-primary">
              {{ $class->student_profiles_count }}</span></td>
            <td><span class="badge badge-pill badge-dark">
              {{ $class->tests_count }}</span></td>
            <td>@datetime($class->created_at)</td>
            <td>
              <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options
                  </button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                    <a class="dropdown-item py-2" href="{{ $class->path() }}">  <i class="fas fa-book-reader"></i> View Tests</a>

                     <a class="dropdown-item py-2" href="{{ route('enroll_student_to_class', ['class' => $class->id]) }}">  <i class="fas fa-user-plus"></i> Enroll Students</a>

                    <a class="dropdown-item py-2" href="{{ route('view_students', ['class' => $class->id]) }}">  <i class="fas fa-user-friends"></i> View Students</a>

                    <a class="dropdown-item py-2" href="{{ route('class_grades', ['class' => $class->id]) }}">  <i class="fas fa-percentage"></i> View Grades</a>

                  </div>
              </div>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>

@endsection



