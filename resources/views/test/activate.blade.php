@extends('layouts.app')


@section('extra_styles')

  <link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css " rel="stylesheet">
@endsection

@section('extra_scripts')
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
  <script>
    $('#datepicker').datetimepicker({ 
      uiLibrary: 'bootstrap4',
      footer: true, 
      modal: true, 
      format: 'yyyy-mm-dd HH:MM'  
    });
  </script>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Classes <i class="fas fa-arrow-right"></i> Tests  <i class="fas fa-arrow-right"></i> Activation </h1>
</div>

<div class="card position-relative">
 <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">{{ ucwords($test->title) }} ({{ $test->time }} <mins class=""></mins>)</h6>
    <div class="d-flex">

       <a href="{{ route('tests.show', ['class' => $class->id, 'test'=> $test->id]) }}" class="btn btn-sm btn-primary btn-circle mr-2"><i class="fas fa-arrow-left"> </i></a>

    
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('update_test', ['class' => $class->id,'test' => $test->id]) }}" method="post">
      @csrf
      @method('PUT')

      <div class="form-group">

         <label for="datepicker">End Date (year-month-day hour:minute)</label>
        <input id="datepicker" width="100%" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline') ?? now()->addDays(1)->format('Y-m-d h:i') }}" />
          <div class="text-danger">@error('deadline') {{ $message }} @enderror </div>

        <button class="float-right btn btn-primary mt-4">Activate</button>

      </div>
       
    </form>
  

       
  </div>

    
</div>

@endsection
