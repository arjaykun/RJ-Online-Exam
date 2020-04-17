@section('extra_styles')

  <link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css " rel="stylesheet">
@endsection

@section('extra_scripts')
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
  <script>
        $('#datepicker').datepicker({ 
        	uiLibrary: 'bootstrap4',
        	footer: true, 
        	modal: true, 
        	format: 'yyyy-mm-dd'  
        });
    </script>
@endsection

<div class="form-group row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <label for="section">Section</label>
    <input type="text" class="form-control form-control @error('section') is-invalid @enderror " id="section" placeholder="Enter Section" autocomplete="off" name="section" value="{{ old('section') ?? $class->section }}">
    <div class="text-danger">@error('section') {{ $message }} @enderror </div>
  </div>


 <div class="col-sm-6 mb-3 mb-sm-0">
    <label for="code">Subject Code</label>
   <input type="text" class="form-control form-control @error('subject_code') is-invalid @enderror " id="code" placeholder="Enter Subject Code" autocomplete="off" name="subject_code"  value="{{ old('subject_code') ?? $class->subject_code }}">
   <div class="text-danger">@error('subject_code') {{ $message }} @enderror </div>
</div>
  
</div>


<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">

		 <label for="desc">Subject Description</label>
		 <input type="text" class="form-control form-control @error('subject_description') is-invalid @enderror " id="desc" placeholder="Enter Section" autocomplete="off" name="subject_description"  value="{{ old('subject_description') ??  $class->subject_description }}">
		 <div class="text-danger">@error('subject_description') {{ $message }} @enderror </div>
	
	</div>

 <div class="col-sm-6 mb-3 mb-sm-0">
 	 <label for="datepicker">End Date (year-month-day)</label>
    <input id="datepicker" width="100%" class="form-control" name="end_date" value="{{ now()->addMonths(1)->format('Y-m-d') }}" />
	</div>
</div>

