@extends('layouts.app')
@section('content')

	<section class="content-header">
        <h1>
            Create Volunteers
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Volunteer</li><li class="active">Create</li>
        </ol>
    </section>

	<div class="container">
		<form action="/volunteer" method="post">
			{{csrf_field()}}
  			<div class="row">
    			<div class="col-md-6">
					<div class="form-group">
						@error('name')
							<div class="alert alert-danger alert-dismissable">
								<i class="fa fa-ban"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<b>Alert!</b> {{ $message }}.
							</div>
						@enderror
						<label>Volunteer Name</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Volunteer Name" required>
					</div>
					<div class="form-group">
						@error('dob')
							<div class="alert alert-danger alert-dismissable">
								<i class="fa fa-ban"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<b>Alert!</b> {{ $message }}.
							</div>
						@enderror
						<label>Date Of Birth</label>
						<input type="text" name="dob" class="form-control" value="{{ old('dob') }}" placeholder="Enter Date of Birth" required>
					</div>
					<div class="form-group">
						@error('nrc')
							<div class="alert alert-danger alert-dismissable">
								<i class="fa fa-ban"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<b>Alert!</b> {{ $message }}.
							</div>
						@enderror
						<label>NRC</label>
						<input type="text" name="nrc" class="form-control" value="{{ old('nrc') }}" placeholder="Enter NRC" required>
					</div>	
				</div>
				<div class="col-md-6">
					<div class="form-group">
						@error('address')
							<div class="alert alert-danger alert-dismissable">
								<i class="fa fa-ban"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<b>Alert!</b> {{ $message }}.
							</div>
						@enderror
						<label>Address</label>
						<input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Enter Address" required>
					</div>
					<div class="form-group">
						@error('ph_no')
							<div class="alert alert-danger alert-dismissable">
								<i class="fa fa-ban"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<b>Alert!</b> {{ $message }}.
							</div>
						@enderror
						<label>Ph No</label>
						<input type="text" name="ph_no" class="form-control" value="{{ old('ph_no') }}" placeholder="Ph No" required>
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
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection
