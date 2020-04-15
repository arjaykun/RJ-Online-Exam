@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
  </div>
  <div class="card-body">

    <form method="POST" action="{{ route('profile_update', ['user' => $user->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" class="form-control form-control @error('first_name') is-invalid @enderror " id="first_name" placeholder="Enter First Name" autocomplete="off" name="first_name" value="{{ old('first_name') ?? $user->first_name }}">
          <div class="text-danger">@error('first_name') {{ $message }} @enderror </div>
        </div>


       <div class="form-group">
          <label for="middle_name">Middle Name</label>
         <input type="text" class="form-control form-control @error('middle_name') is-invalid @enderror " id="middle_name" placeholder="Enter Middle Name" autocomplete="off" name="middle_name"  value="{{ old('middle_name') ?? $user->middle_name }}">
         <div class="text-danger">@error('middle_name') {{ $message }} @enderror </div>
      </div>

       <div class="form-group">
          <label for="last_name">Last Name</label>
         <input type="text" class="form-control form-control @error('last_name') is-invalid @enderror " id="last_name" placeholder="Enter Last Name" autocomplete="off" name="last_name"  value="{{ old('last_name') ?? $user->last_name }}">
         <div class="text-danger">@error('last_name') {{ $message }} @enderror </div>
        </div>

        <div class="form-group">
          <label for="email">E-mail</label>
         <input type="text" class="form-control form-control @error('email') is-invalid @enderror " id="email" placeholder="Enter Last Name" autocomplete="off" name="email"  value="{{ old('email') ?? $user->email }}">
         <div class="text-danger">@error('email') {{ $message }} @enderror </div>
        </div>


       <div class="form-group">
           <label for="mobile">Mobile #</label>
           <input type="text" class="form-control form-control @error('mobile') is-invalid @enderror " id="mobile" placeholder="Enter Mobile #" autocomplete="off" name="mobile"  value="{{ old('mobile') ?? $user->mobile }}">
           <div class="text-danger">@error('mobile') {{ $message }} @enderror </div>
        </div>

   
        <button class="btn btn-primary float-right">Save Changes</button>
    </form>
  </div>
</div>

@endsection
