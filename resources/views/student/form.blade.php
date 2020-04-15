<div class="form-group row">
  <div class="col-sm-4 mb-3 mb-sm-0">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control form-control @error('first_name') is-invalid @enderror " id="first_name" placeholder="Enter First Name" autocomplete="off" name="first_name" value="{{ old('first_name') ?? $student->first_name }}">
    <div class="text-danger">@error('first_name') {{ $message }} @enderror </div>
  </div>


 <div class="col-sm-4 mb-3 mb-sm-0">
    <label for="middle_name">Middle Name (optional)</label>
   <input type="text" class="form-control form-control @error('middle_name') is-invalid @enderror " id="middle_name" placeholder="Enter Middle Name" autocomplete="off" name="middle_name"  value="{{ old('middle_name') ?? $student->middle_name }}">
   <div class="text-danger">@error('middle_name') {{ $message }} @enderror </div>
</div>

 <div class="col-sm-4 mb-3 mb-sm-0">
    <label for="last_name">Last Name</label>
   <input type="text" class="form-control form-control @error('last_name') is-invalid @enderror " id="last_name" placeholder="Enter Last Name" autocomplete="off" name="last_name"  value="{{ old('last_name') ?? $student->last_name }}">
   <div class="text-danger">@error('last_name') {{ $message }} @enderror </div>
	</div>
  
</div>

<div class="form-group row">
  <div class="col-sm-6 mb-6 mb-sm-0">
    <label for="email">E-mail</label>
    <input type="text" class="form-control form-control @error('email') is-invalid @enderror " id="email" placeholder="Enter E-mail" autocomplete="off" name="email" value="{{ old('email') ?? $student->email }}">
    <div class="text-danger">@error('email') {{ $message }} @enderror </div>
  </div>


 <div class="col-sm-6 mb-6 mb-sm-0">
	   <label for="mobile">Mobile # (optional)</label>
	   <input type="text" class="form-control form-control @error('mobile') is-invalid @enderror " id="mobile" placeholder="Enter Mobile #" autocomplete="off" name="mobile"  value="{{ old('mobile') ?? $student->mobile }}">
	   <div class="text-danger">@error('mobile') {{ $message }} @enderror </div>
	</div>

</div>



<div class="form-group row">
  

  <div class="col-sm-6 mb-6 mb-sm-0">
   <label for="student_id">Student I.D.</label>
   <input type="text" class="form-control form-control @error('student_id') is-invalid @enderror " id="student_id" placeholder="Enter Student I.D." autocomplete="off" name="student_id"  value="{{ $student->student_profile->student_id ?? old('student_id')  }}">
   <div class="text-danger">@error('student_id') {{ $message }} @enderror </div>
  </div>


  <div class="col-sm-6 mb-6 mb-sm-0">
    <label for="course_id">Courses</label>
    <select class="form-control  @error('course_id') is-invalid @enderror " name="course_id">
      <option value="" disabled>Select Course</option>
      @foreach ($courses as $course)
        <option value="{{ $course->id }}" {{ $course->id == 0 ??$student->student_profile->course_id || old('course_id') == $course->id ? 'selected' : '' }}>
          {{ $course->course_code }} - {{ $course->course }}
        </option>
      @endforeach
    </select>
    <div class="text-danger">@error('course_id') {{ $message }} @enderror </div>
  </div>
  
</div>
