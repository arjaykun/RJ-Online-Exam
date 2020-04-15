@extends('layouts.app')

@section('content')

	<h1>Hola! Student,  {{ auth()->user()->full_name	 }}</h1>
	
@endsection