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

  <h1>Tests</h1>

  <div class="card postion-relative">
    <div class="card-header text-primary">Tests</div>
    <div class="card-body">
      <div class="table-responsive">
         <table class="table table-striped table-bordered" id="dataTable">
           <thead>
             <tr>
               <th>#</th>
               <th>Title</th>
               <th>Question Count</th>
               <th>Score</th>
               <th>Grade</th>
               <th>Date Created</th>
               <th></th>
             </tr>
           </thead>
           <tbody>
             @foreach ($tests as $test)
               <tr>
                <td>{{ $loop->iteration }}</td>
                 <td>{{ $test->title }}</td>
                 <td>{{ $test->questions_count }}</td>
                 <td>{{ $test->grades[0]->score ?? 'n/a' }}</td>
                 <td>{{ $test->grades[0]->grade ?? 'n/a'}}</td>
                 <td>{{ $test->created_at->format('m/d/Y') }}</td>
                 <td>
                  @if ($test->grades->contains('user_id', auth()->user()->id))
                     <button class="btn btn-success btn-sm rounded" disabled>Test Completed</button>
                  @elseif($test->active)
                    <a href="{{ route('student_tests.take', ['class' => $class->id ,'test' => $test]) }}" class="btn btn-primary btn-sm rounded" target="_blank">Take Test</a> 
                  @else 
                    <button class="btn btn-secondary btn-sm rounded" disabled>Not Activated</button>
                  @endif
                  
                </td>
               </tr>
             @endforeach
           </tbody>
         </table>
      </div>
     
    </div>
  </div>
  
@endsection