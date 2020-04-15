<div class="form-group">
  <label for="desc">Title</label>
 <input type="text" class="form-control form-control @error('title') is-invalid @enderror " id="desc" placeholder="Enter Test Title" autocomplete="off" name="title"  value="{{ old('title') ??  $test->title }}">
 <div class="text-danger">@error('title') {{ $message }} @enderror </div>
</div>

