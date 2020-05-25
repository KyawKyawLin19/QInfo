@extends('layouts.app')
@section('content')

	<section class="content-header">
        <h1>
            Add New Center
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Centers</li><li class="active">Create</li>
        </ol>
    </section>

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
		<form action="/center" method="post">
			@csrf
  			<div class="row">
    			<div class="col-md-12">
					<div class="form-group">
						<label>Center Name</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Ph No</label>
						<input type="text" name="ph_no" class="form-control" value="{{ old('ph_no') }}" required>
					</div>
				</div>
                <div class="col-md-12">
                    <div class="form-group">
						<label>Townships</label>
						<select class="form-control" name="township_id">
							@foreach($townships as $value)
								<option value="{{$value->id}}">{{$value->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
                <div class="col-md-12">
                    <div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
                </div>	
			</div>
		</form>
	</div>
@endsection
