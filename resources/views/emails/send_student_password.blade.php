@component('mail::message')
# Good Day, Mr. {{ $student->full_name }}

Your account have been successfully created.<br>
Your Password is " **{{ $default_password }}** "

#### Good luck in your journey to success!

Login here <{{ url('/') }}>

{{ config('app.name') }}
@endcomponent
