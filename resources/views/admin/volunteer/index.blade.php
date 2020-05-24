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
                    @foreach($volunteers as $volunteer)
                        <li>{{$volunteer->id}}</li>
                        <li>{{$volunteer->name}}</li>
                        <li>{{$volunteer->dob}}</li>
                        <li>{{$volunteer->nrc}}</li>
                        <li>{{$volunteer->address}}</li>
                        <li>{{$volunteer->ph_no}}</li>
                        <li>{{$volunteer->center->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection