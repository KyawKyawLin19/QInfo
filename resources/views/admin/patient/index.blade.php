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
                    @foreach($patients as $patient)
                        <li>{{$patient->id}}</li>
                        <li>{{$patient->p_name}}</li>
                        <li>{{$patient->dob}}</li>
                        <li>{{$patient->nrc}}</li>
                        <li>{{$patient->address}}</li>
                        <li>{{$patient->ph_no}}</li>
                        <li>{{$patient->center->name}}</li>
                        <li>{{$patient->room_no}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection