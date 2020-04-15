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
              { "orderable": false, "targets": [3,4,6]}
            ]
      });
    });
  </script>

@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Students </h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">View All Students</h6>
    <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">Add New Student <i class="fas fa-plus"></i></a>
  </div>
  <div class="card-body">
    
    @include('layouts.messages')

    <div class="table-responsive">
      <table class="table" id="dataTable">
        <thead>
          <tr>
            <th>Student I.D.</th>
            <th>Name</th>
            <th>email</th>
            <th>Course</th>
            <th>Mobile #</th>
            <th>Date Added</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
           
            <tr>
              <td>{{ $student->student_profile->student_id }}</td>
              <td> {{ $student->full_name }}</td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->student_profile->course->course_code}}</td>
              <td>{{ $student->mobile ?? 'N/A' }}</td>
              <td>@datetime($student->created_at)</td>
              <td>
                <a href="{{ route('students.show', ['student' => $student->id]) }}" class="btn btn-primary btn-sm btn-circle" />
                  <i class="fas fa-angle-right"></i>
                </a>
             </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
  </div>
</div>

@endsection
