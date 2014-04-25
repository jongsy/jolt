@extends('layouts.master')

@section('content')

{{ Form::open(array('url' => 'login')) }}
	<h1>Login</h1>

	<!-- if there are login errors, show them here -->
	<p>
		{{ $errors->first('email') }}
		{{ $errors->first('password') }}
	</p>

	<div class="form-group">
		{{ Form::text('email', Input::old('email'), array('placeholder' => 'email', 'class' => 'form-control login-field')) }}
	</div>
	<div class="form-group">
		{{ Form::password('password', array('class' => 'form-control login-field', 'placeholder' => 'password')) }}
	</div>

	{{ Form::submit('Submit!', ['class' => 'btn btn-primary btn-lg btn-block']) }}
	{{ Form::close() }}

@stop

