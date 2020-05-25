@extends('layouts.app')
@section('content')

	<section class="content-header">
        <h1>
            Edit City Info
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cities</li><li class="active">Edit</li>
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
		<form action="/city" method="post">
			@csrf
  			<div class="row">
    			<div class="col-md-12">
					<div class="form-group">
						<label>City Name</label>
						<input type="text" name="name" class="form-control" value="{{ $city->name }}" required>
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
