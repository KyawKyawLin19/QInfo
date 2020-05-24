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
                    @foreach($townships as $township)
                        <li>{{$township->id}}</li>
                        <li>{{$township->name}}</li>
                        <li>{{$township->city->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection