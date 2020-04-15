@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Classes</h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">Create New Class</h6>
     <a href="{{ route('classes.index') }}" class="btn btn-primary btn-sm">View Classes </a>
  </div>
  <div class="card-body">

    @include('layouts.messages')


    <form action="{{ route('classes.store') }}" method="post">
      @csrf
      @include('klass.form')

      <button class="btn btn-primary float-right">Add Class</button>

    </form>
  </div>
</div>

@endsection
