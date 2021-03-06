@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Classes</h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Class</h6>
  </div>
  <div class="card-body">

    @include('layouts.messages')


    <form action="{{ route('classes.update', ['class' => $class->id ]) }}" method="post">
      @method('PUT')
      @csrf
      @include('klass.form')

      <button class="btn btn-primary float-right">Save Changes</button>

    </form>
  </div>
</div>

@endsection
