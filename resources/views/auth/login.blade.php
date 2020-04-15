@extends('auth.layouts')


@section('content')
<div class="card-body p-0">
   <!-- Nested Row within Card Body -->
  <div class="row">
    <div class="col-lg-6 d-none d-lg-block">
      
      <img src="{{ asset('blue.jpg') }}" alt="" / width="100%" height="100%">

    </div>
    <div class="col-lg-6">
      <div class="p-5">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">RJ-Online Exam</h1>
        </div>

        <form method="POST" action="{{ route('login') }}" class="user">
            @csrf

            <div class="form-group">

              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-user" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter e-mail address...">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
      
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror  form-control-user" name="password" required autocomplete="current-password" placeholder="Password...">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

          <div class="form-group">
            <div class="custom-control custom-checkbox small">
              <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="custom-control-label"  for="remember">Remember Me</label>
            </div>
          </div>


            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary btn-block btn-user">
                  {{ __('Login') }}
              </button>

          </div>

        </form>

        <hr>
        @if (Route::has('password.request'))
        <div class="text-center">
          <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
         @endif
       
      </div>
    </div>
  </div>
</div>

@endsection