@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">Change Password - {{ $user->full_name }}</h6>
  </div>
  <div class="card-body">

    <form action="{{ route('user-update-password', ['user' => $user->id ]) }}" method="POST">
        @csrf
        @method('PUT')



        <div class="form-group">
          <label for="password">New Password</label>
          <input type="password" class="form-control form-control @error('password') is-invalid @enderror " id="password" placeholder="Enter Password" autocomplete="off" name="password" value="">
          <div class="text-danger">@error('password') {{ $message }} @enderror </div>
        </div>


        <div class="form-group">
           <label for="password_confirmation">Confirm New Password</label>
           <input type="password" class="form-control form-control" id="password_confirmation" placeholder="Enter Password Again" autocomplete="off" name="password_confirmation">
        </div>
 
        <button class="btn btn-primary float-right" type="submit">Save Changes</button>
    </form>
  </div>
</div>

@endsection
