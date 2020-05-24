@extends('layouts.app')
@section('content')
	<div class="container">
		@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
		@endif
		<form action="/patient" method="post">
			{{csrf_field()}}
  			<div class="row">
    			<div class="col-md-6">
					<div class="form-group">
						<label>Patient Name</label>
						<input type="text" name="p_name" class="form-control" value="{{ old('p_name') }}" required>
					</div>
					<div class="form-group">
						<label>Date Of Birth</label>
						<input type="text" name="dob" class="form-control" value="{{ old('dob') }}" required>
					</div>
					<div class="form-group">
						<label>NRC</label>
						<input type="text" name="nrc" class="form-control" value="{{ old('nrc') }}" required>
					</div>	
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Ph No</label>
						<input type="text" name="ph_no" class="form-control" value="{{ old('ph_no') }}" required>
					</div>
					<div class="form-group">
						<label>Centers</label>
						<select class="form-control" name="center_id">
							@foreach($centers as $value)
								<option value="{{$value->id}}">{{$value->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Room No</label>
						<input type="text" name="room_no" class="form-control" value="{{ old('room_no') }}" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection
