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
		<form action="/receipe" method="post">
			{{csrf_field()}}
  			<div class="row">
  				<h1 class="text-red" style="font-family: 'Kaushan Script', cursive;">Add New Receipe</h1>
    			<div class="col-md-6">
					<div class="form-group">
						<label>Patient Name</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
					</div>
					<div class="form-group">
						<label>Date Of Birth</label>
						<input type="text" name="dob" class="form-control" value="{{ old('dob') }}" required>
					</div>
					<div class="form-group">
						<label>NRC</label>
						<input type="text" name="dob" class="form-control" value="{{ old('dob') }}" required>
					</div>
					<div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter description..."></textarea>
                    </div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>
@endsection
