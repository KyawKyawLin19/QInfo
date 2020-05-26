@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cities List
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cities</li><li class="active">List</li>
        </ol>
    </section>

    <div class="container">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <button class="btn btn-primary"><a href="{{url('city/create')}}" class="text-white"><i class="fa fa-plus-square"></i> Add New City</a></button>
                        <button class="btn btn-info"><a href="{{ url('excel/city') }}" class="text-white"><i class="fa fa-download"></i> Generate Excel</a></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    @foreach($cities as $city)
                        <tr>
                            <td>{{$city->id}}.</td>
                            <td>
                                <span class="badge bg-blue">{{$city->name}}</span>
                            </td>
                            <td>
                                <button type="submit">
                                    <a href="{{url("/city/$city->id/edit")}}" class="text-warning"><i class="fa fa-edit"></i></a>
                                </button>
                            </td>
                            <td>
                                <form method="POST" action="/city/{{$city->id}}">
                                {{ method_field("DELETE") }}
                                {{ csrf_field() }}
                                <button type="submit" class="text-danger"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody></table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $cities->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection