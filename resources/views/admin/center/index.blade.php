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
                    @foreach($centers as $center)
                        <li>{{$center->id}}</li>
                        <li>{{$center->name}}</li>
                        <li>{{$center->township->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection