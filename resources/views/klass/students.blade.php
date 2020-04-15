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
              { "orderable": false, "targets": [2,3,5]}
            ]
      });

      $('.delete').click( function(e) {
        let id = e.target.id;

        $('#form').attr('action', '/admin/classes/{{ $class->id }}/students/' + id);
      
        $('#confirmationModal').modal('show');
      });

    
    });
  </script>

@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Classes <i class="fas fa-arrow-right"></i> Enroll Students </h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">Students Enrolled in {{ $class->title }}</h6>
     <a href="{{ route('enroll_student_to_class', ['class' => $class->id]) }}" class="btn btn-primary btn-sm">Enroll Students <i class="fas fa-user-plus ml-1"> </i></a>
  </div>
  <div class="card-body">

    @include('layouts.messages')

    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered">
      <thead>

        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Course</th>
          <th>Date Enrolled</th>
          <th></th>
        </tr>
      </thead>

      <tfoot>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Course</th>
          <th>Date Enrolled</th>
          <th></th>
        </tr>
      </tfoot>

      <tbody>
        @foreach ($class->student_profiles->sortBy('full_name') as $student)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ $student->user->student_path() }}">{{ $student->user->full_name }}</a></td>
            <td>{{ $student->user->email }}</td>
            <td>{{ $student->course->course_code }}</td>
            <td>@datetime($student->pivot->created_at)</td>
            <td>
              
              <a class="btn btn-danger btn-circle btn-sm delete" href="#"  id="{{ $student->id }}" data-toggle="tooltip" title="Remove Student">
                <i class="fas fa-user-minus" id="{{ $student->id }}"></i>
              </a>
             
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>


@include('modals.confirmation', ['action' => '', 'title' => 'student in the class'])

@endsection



