@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif   
            <div class="col-md-12">
                <ul>
                    @foreach($cities as $city)
                        <li>{{$city->id}}</li>
                        <li>{{$city->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection