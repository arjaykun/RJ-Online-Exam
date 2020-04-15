@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Users </h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">View Users</a>
  </div>
  <div class="card-body">

    @include('layouts.messages')

    <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
        @csrf
        @method('PUT')

        @include('user.form')

        <button class="btn btn-primary float-right">Save Changes</button>
    </form>
  </div>
</div>

@endsection
