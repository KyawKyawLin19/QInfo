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
		<form action="/center" method="post">
			@csrf
  			<div class="row">
    			<div class="col-md-12">
					<div class="form-group">
						<label>Center Name</label><br>
						@error('name')
							<div class="alert alert-danger alert-dismissable">
								<i class="fa fa-ban"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<b>Alert!</b> {{ $message }}.
							</div>
						@enderror
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Center Name" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Address</label><br>
						@error('address')
							<div class="alert alert-danger alert-dismissable">
								<i class="fa fa-ban"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<b>Alert!</b> {{ $message }}.
							</div>
						@enderror
						<input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Enter Center Address" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Ph No</label><br>
						@error('ph_no')
							<div class="alert alert-danger alert-dismissable">
								<i class="fa fa-ban"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<b>Alert!</b> {{ $message }}.
							</div>
						@enderror
						<input type="text" name="ph_no" class="form-control" value="{{ old('ph_no') }}" placeholder="Enter Center Ph No" required>
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
