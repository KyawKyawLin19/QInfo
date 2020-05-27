@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Volunteers List
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Volunteers</li><li class="active">List</li>
        </ol>
    </section>

    <div class="container">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>Alert!</b> {{ session('success') }}.
                </div>
            @endif
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <button class="btn btn-primary"><a href="{{url('volunteer/create')}}" class="text-white"><i class="fa fa-plus-square"></i> Add New Volunteer</a></button>
                        <button class="btn btn-info"><a href="{{ url('excel/volunteer') }}" class="text-white"><i class="fa fa-download"></i> Generate Excel</a></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-responsive table-bordered">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Date Of Birth</th>
                            <th>NRC</th>
                            <th>Address</th>
                            <th>Phno</th>
                            <th>Center Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    @foreach($volunteers as $volunteer)
                        <tr>
                            <td>{{$volunteer->id}}.</td>
                            <td>{{$volunteer->name}}</td>
                            <td>
                                <span class="badge bg-blue">{{$volunteer->dob}}</span>
                            </td>
                            <td><span class="badge bg-red">{{$volunteer->nrc}}</span></td>
                            <td>{{$volunteer->address}}</td>
                            <td>{{$volunteer->ph_no}}</td>
                            <td><span class="badge bg-navy">{{$volunteer->center->name}}</span></td>
                            <td>
                                <button type="submit">
                                    <a href="{{url("/volunteer/$volunteer->id/edit")}}" class="text-warning"><i class="fa fa-edit"></i></a>
                                </button>
                            </td>
                            <td><form method="POST" action="/volunteer/{{$volunteer->id}}">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}<button type="submit" class="text-danger"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                    @endforeach
                    </tbody></table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $volunteers->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection