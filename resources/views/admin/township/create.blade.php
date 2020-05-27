@extends('layouts.app')
@section('content')

	<section class="content-header">
        <h1>
            Create Townships
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Townships</li><li class="active">Create</li>
        </ol>
    </section>

	<div class="container">
		<form action="/township" method="post">
			@csrf
  			<div class="row">
    			<div class="col-md-12">
					<div class="form-group">
						@error('name')
							<div class="alert alert-danger alert-dismissable">
								<i class="fa fa-ban"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<b>Alert!</b> {{ $message }}.
							</div>
						@enderror
						<label>Township Name</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Township Name" required>
					</div>
				</div>
                <div class="col-md-12">
                    <div class="form-group">
						<label>Cities</label>
						<select class="form-control" name="city_id"><br>
							@foreach($cities as $value)
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
