@extends('layouts.application')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col m6 offset-m3">
				<div class="card-panel green-light">
					@include('administrator.form')
				</div>
			</div>
		</div>
	</div>
@stop