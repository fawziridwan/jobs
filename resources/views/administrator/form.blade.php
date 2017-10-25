@foreach ($uservalue as $value)
	@if ($value->userdetail != null)
		{!! Form::open(['route' => ['admin.update', $value->id], 'method'=>'put', 'role' => 'form']) !!}
		<div class="container">
			<div class="row">
			    <div class="input-field col m6">
			        <input id="first_name" name="first_name" type="text" value="{!! $value->first_name !!}">
			        <label for="first_name">First Name</label>
			        <p class="red-text">{{$errors->first('first_name')}}</p>
			    </div>
			    <div class="input-field col m6">
			        <input id="last_name" name="last_name" type="text" value="{!! $value->last_name !!}">
			        <label for="last_name">Last Name</label>
			        <p class="red-text">{{$errors->first('last_name')}}</p>                                    
			    </div> 
			</div>
			<div class="row">
			    <div class="input-field col m12">
			            <input type="text" id="placeof_birth" name="placeof_birth" class="datepicker" value="{!! $value->userdetail->placeof_birth !!}">
			            <label for="placeof_birth">Place Of Birth</label>
			    </div>
			</div>
			<div class="row col m12">
			    <label for="gender">Gender</label>
			    <p>
			        <input class="with-gap" name="gender" type="radio" id="test1" value="Male" 
			            @if($value->userdetail->gender == "Male")
			                {!! "checked" !!}
			            @endif
			        />
			        <label for="test1">Male</label>
			    </p>
			    <p>
			        <input class="with-gap" name="gender" type="radio" id="test3" value="Female" 
			            @if($value->userdetail->gender == "Female")
			                {!! "checked" !!}
			            @endif
			        />
			        <label for="test3">Female</label>
			    </p>
			</div>
			<div class="row">
			    <div class="input-field col m12">
			        <input type="text" id="phone_number" name="phone_number" class="validate" value="{!! $value->userdetail->phone_number !!}">
			        <label for="phone_number">Phone Number</label>
			    </div>
			</div>

			{!! link_to(url()->previous(), "Back", ['class' => 'btn orange waves-effect waves-light']) !!}

			<button class="btn waves-effect waves-light" type="submit">Submit
			        <i class="material-icons right">send</i>
			</button>			
		</div>			
		{!! Form::close() !!}
	@endif
@endforeach