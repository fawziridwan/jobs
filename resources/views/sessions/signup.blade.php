@extends('layouts.application')
@section('content')
	<div class="container">
		<div class="col m6 col m offset3">
			<h3 class=""> Register</h3>
		</div>

		<div class="row">
	    	{!! Form::open(['route' => 'signup.store', 'class' => 'col s12', 'role' => 'form']) !!}
			{{ csrf_field() }}
			<div class="row">
				<div class="input-field col s12">
				  <i class="material-icons prefix">email</i>
					{!! Form::text('email', null,array('class' => 'validate','id'=>'icon_prefix','name'=>'email')) !!}
					{!! Form::label('email', 'Email') !!}
				<div class="text-danger">{!! $errors->first('email')!!}</div>
				</div>
				<div class="input-field col s6">
				  <i class="material-icons prefix">account_circle</i>
					{!! Form::text('first_name', null,array('class' => 'validate','id'=>'icon_prefix','name'=>'first_name')) !!}
			  		{!! Form::label('first_name', 'First Name') !!}
			  		<div class="text-danger">{!! $errors->first('first_name')!!}</div>
				</div>
				<div class="input-field col s6">
				  <i class="material-icons prefix">account_circle</i>
					{!! Form::text('last_name', null,array('class' => 'validate','id'=>'icon_prefix','name'=>'last_name')) !!}
			  		{!! Form::label('last_name', 'Last Name') !!}
			  		<div class="text-danger">{!! $errors->first('last_name')!!}</div>
				</div>
				<div class="input-field col s6">
				  <i class="material-icons prefix">lock</i>
					{!! Form::password('password', null,array('class' => 'validate','id'=>'icon_prefix','name'=>'password')) !!}
					{!! Form::label('password', 'Password') !!}
					<div class="text-danger">{!! $errors->first('password')!!}</div>
				</div>
				<div class="input-field col s6">
				<i class="material-icons prefix">lock</i>
				  {!! Form::password('password_confirmation', null,array('class' => 'validate','id'=>'icon_prefix','name'=>'password_confirmation')) !!}
					{!! Form::label('password_confirmation', 'Password Confirmation') !!}
					<div class="text-danger">{!! $errors->first('password_confirmation')!!}</div>
				</div>

			  	{!! Form::submit('Register', array('class' => 'btn waves-effect waves-light pull-right')) !!}
				
			</div>
		  </div>
	</div>
	{!! Form::close() !!}
@stop