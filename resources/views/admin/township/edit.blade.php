@extends('layouts.app')
@section('content')

	<section class="content-header">
        <h1>
			Edit Townships Info 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Townships</li><li class="active">Edit</li>
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
		<form action="/township/{{$township->id}}" method="post">
			{{ method_field("PATCH") }}
			{{ csrf_field() }}
  			<div class="row">
    			<div class="col-md-12">
					<div class="form-group">
						<label>Township Name</label>
						<input type="text" name="name" class="form-control" value="{{ $township->name }}" required>
					</div>
				</div>
                <div class="col-md-12">
                    <div class="form-group">
						<label>Cities</label>
						<select class="form-control" name="city_id">
							@foreach($cities as $value)
								<option value="{{$value->id}}"{{$township->city->id == $value->id? "selected" : ""}}>
        							{{$value->name}}</option>
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
