@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Classes <i class="fas fa-arrow-right"></i> Tests</h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">Update Test</h6>
     <a href="{{ route('tests.show', ['class' => $class->id, 'test' => $test->id]) }}" class="btn btn-primary btn-sm">Return Back</a>
  </div>
  <div class="card-body">

    @include('layouts.messages')

    <form action="{{ route('tests.update', ['class' => $class->id, 'test' => $test->id]) }}" method="post">
      @csrf
      @method('PUT')

      @include('test.form')

      <button class="btn btn-primary float-right">Save Changes</button>

    </form>
  </div>
</div>

@endsection
