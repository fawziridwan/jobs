@extends('layouts.application')
@section('content')
<main>
      <div class="section"></div>

		<div class="container" style="text-align:center;">
			<div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

			<div class="row">
		    	{!! Form::open(['route' => 'login.store', 'class' => 'col s12', 'role' => 'form']) !!}
					{{ csrf_field() }}

					<div class="row">
						<div class="input-field col s12">
					<i class="fa fa-envelope fa-lg pull-left"> Email</i>
							{!! Form::text('email', null,array('class' => 'validate','id'=>'icon_prefix','name'=>'email'),'required') !!}
							{{--  {!! Form::label('email', 'E-Mail', array('class'=>'pull-right')) !!}  --}}
						</div>
						<div class="input-field col s12">
						  <i class="fa fa-lock fa-lg pull-left"> Password</i>
						  {!! Form::password('password', null,array('class' => 'validate','id'=>'icon_prefix','name'=>'password'),'required') !!}
						  {{--  {!! Form::label('password', 'Password') !!}  --}}
						</div>
						<div class="row">
   						  {!! Form::submit('Login', array('class' => 'col s12 btn btn-large waves-effect indigo')) !!}
						</div>					
					</div>

			    {!! Form::close() !!}
			  </div>
			</div>
		</div>
</main>	
@stop