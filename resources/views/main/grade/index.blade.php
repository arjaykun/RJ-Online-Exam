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
            { "orderable": false, "targets": [4]}
          ]
      });
    });
  </script>

@endsection


@section('content')

  <h1>Grades</h1>

  <div class="card postion-relative">
    <div class="card-header text-primary">Grades</div>
    <div class="card-body">
      <div class="table-responsive">
         <table class="table table-striped table-bordered" id="dataTable">
           <thead>
             <tr>
               <th>#</th>
               <th>Title</th>
               <th>Items Count</th>
               <th>Score</th>
               <th>Date Created</th>
               <th>Grade</th>
             </tr>
           </thead>
           <tbody>
             @foreach ($tests as $test)
               <tr>
                <td>{{ $loop->iteration }}</td>
                 <td>{{ $test->title }}</td>
                 <td>{{ $test->questions_count }}</td>
                 <td>{{ $test->grades[0]->score ?? 'n/a' }}</td>
                 <td>{{ $test->created_at->format('m/d/Y') }}</td>
                 <td>{{ $test->grades[0]->grade ?? 'n/a'}}</td>
               </tr>
             @endforeach
             <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-right"><strong>TOTAL</strong></td>
              <td><strong>{{ $class->grades->avg('grade') }}%</strong></td>
             </tr>
           </tbody>
         </table>
      </div>
     
    </div>
  </div>
  
@endsection