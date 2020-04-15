@extends('auth.layouts')

@section('content')
<div class="row px-2">
    <div class="offset-md-3 col-md-6 card-body my-5 ">
        <h4 class="text-center">Reset Password</h4>
        <hr>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email" >E-Mail Address</label>
                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-user">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
