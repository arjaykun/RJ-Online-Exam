<div class="form-group">
  <label for="desc">Title</label>
 <input type="text" class="form-control form-control @error('title') is-invalid @enderror " id="desc" placeholder="Enter Test Title" autocomplete="off" name="title"  value="{{ old('title') ??  $test->title }}">
 <div class="text-danger">@error('title') {{ $message }} @enderror </div>
</div>

<div class="form-group">
  <label for="time">Test Time ( in minutes )</label>
 <input type="text" class="form-control form-control @error('time') is-invalid @enderror " id="time" placeholder="Enter Test time" autocomplete="off" name="time"  value="{{  $test->time ?? 60 }}">
 <div class="text-danger">@error('time') {{ $message }} @enderror </div>
</div>



