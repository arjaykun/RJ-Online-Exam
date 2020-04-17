<div class="form-group row">
  <div class="col-sm-4 mb-3 mb-sm-0">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control form-control @error('first_name') is-invalid @enderror " id="first_name" placeholder="Enter First Name" autocomplete="off" name="first_name" value="{{ old('first_name') ?? $user->first_name }}">
    <div class="text-danger">@error('first_name') {{ $message }} @enderror </div>
  </div>


 <div class="col-sm-4 mb-3 mb-sm-0">
    <label for="middle_name">Middle Name (optional)</label>
   <input type="text" class="form-control form-control @error('middle_name') is-invalid @enderror " id="middle_name" placeholder="Enter Middle Name" autocomplete="off" name="middle_name"  value="{{ old('middle_name') ?? $user->middle_name }}">
   <div class="text-danger">@error('middle_name') {{ $message }} @enderror </div>
</div>

 <div class="col-sm-4 mb-3 mb-sm-0">
    <label for="last_name">Last Name</label>
   <input type="text" class="form-control form-control @error('last_name') is-invalid @enderror " id="last_name" placeholder="Enter Last Name" autocomplete="off" name="last_name"  value="{{ old('last_name') ?? $user->last_name }}">
   <div class="text-danger">@error('last_name') {{ $message }} @enderror </div>
	</div>
  
</div>

<div class="form-group row">
  <div class="col-sm-6 mb-6 mb-sm-0">
    <label for="email">E-mail</label>
    <input type="text" class="form-control form-control @error('email') is-invalid @enderror " id="email" placeholder="Enter E-mail" autocomplete="off" name="email" value="{{ old('email') ?? $user->email }}">
    <div class="text-danger">@error('email') {{ $message }} @enderror </div>
  </div>


 <div class="col-sm-6 mb-6 mb-sm-0">
	   <label for="mobile">Mobile # (optional)</label>
	   <input type="text" class="form-control form-control @error('mobile') is-invalid @enderror " id="mobile" placeholder="Enter Mobile #" autocomplete="off" name="mobile"  value="{{ old('mobile') ?? $user->mobile }}">
	   <div class="text-danger">@error('mobile') {{ $message }} @enderror </div>
	</div>

</div>
@if (empty($user->id))
  <div class="form-group row">
    <div class="col-sm-6 mb-6 mb-sm-0">
      <label for="password">Password (optional)</label>
      <input type="password" class="form-control form-control @error('password') is-invalid @enderror " id="password" placeholder="Enter Password" autocomplete="off" name="password" value="{{ old('password') ?? $user->password }}">
      <div class="text-danger">@error('password') {{ $message }} @enderror </div>
    </div>


   <div class="col-sm-6 mb-6 mb-sm-0">
       <label for="password_confirmation">Confirm Password (optional)</label>
       <input type="password" class="form-control form-control" id="password_confirmation" placeholder="Enter Password Again" autocomplete="off" name="password_confirmation">
    </div>

  </div>

<hr>  
<div class="alert alert-secondary">
  <i>If password is empty. The user's password will be a random one and will be e-mailed to the provided e-mail address.</i>
</div>
@endif



