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
    });
  </script>

@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Users </h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">View All Users</h6>
    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Add New User <i class="fas user-plus"></i></a>
  </div>
  <div class="card-body">

    @include('layouts.messages')

    <div class="table-responsive">
      <table class="table" id="dataTable">
        <thead>
          <tr>
            <th>Name</th>
            <th>E-mail</th>
            <th>User Type</th>
            <th>Mobile #</th>
            <th>Date Added</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
           
            <tr>
              <td>{{ $user->full_name }}</td>
              <td>{{ $user->email }} </td>
              <td>
                @if ($user->is_admin)
                 <span class="badge badge-pill badge-success">admin</span>
                @else
                 <span class="badge badge-pill badge-primary">staff</span>
                @endif

              </td>
              <td>{{ $user->mobile ? $user->mobile : 'N/A'}}</td>
              <td>@datetime($user->created_at)</td>
              <td>
                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-primary btn-sm btn-circle">
                  <i class="fas fa-angle-right text-white"></i>
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
