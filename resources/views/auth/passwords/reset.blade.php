@extends('auth.layouts')

@section('content')
<div class="row px-2">
    <div class="offset-md-3 col-md-6 card-body my-5 ">
     <h4 class="text-center">Reset Password</h4>
     <hr>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
        </div>

        <div class="form-group">
            <label for="password-confirm" >{{ __('Confirm Password') }}</label>

        
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          
        </div>


        <button type="submit" class="btn btn-primary btn-block btn-user">
            {{ __('Reset Password') }}
        </button>
           
    </form>
 </div>
</div>
@endsection
