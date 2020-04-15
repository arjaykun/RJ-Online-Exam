@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Classes <i class="fas fa-arrow-right"></i> Tests <i class="fas fa-arrow-right"></i> Questions </h1>
</div>

<div class="card position-relative">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="font-weight-bold text-primary">Create New Question</h6>
    <div><a href="{{ $test->path() }}" class="btn btn-primary btn-sm btn-circle"><i class="fas fa-arrow-left"> </i></a></div>
  </div>
  <div class="card-body">

    @include('layouts.messages')

    <form action="{{ route('questions.store', ['test' => $test->id]) }}" method="post">
      @csrf

      @include('question.form')

      <button class="btn btn-primary float-right mt-2">Add Question</button>

    </form>
  </div>
</div>

@endsection
