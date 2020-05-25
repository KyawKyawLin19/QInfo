@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Centers List
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Centers</li><li class="active">List</li>
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
                        <button class="btn btn-primary"><a href="{{url('center/create')}}" class="text-white"><i class="fa fa-plus-square"></i> Add New Center</a></button>
                        <button class="btn btn-info"><i class="fa fa-download"></i> Generate PDF</button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Township</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    @foreach($centers as $center)
                        <tr>
                            <td>{{$center->id}}.</td>
                            <td>
                                <span class="badge bg-blue">{{$center->name}}</span>
                            </td>
                            <td><span class="badge bg-navy">{{$center->township->name}}</span></td>
                            <td>
                                <button type="submit">
                                    <a href="{{url("/center/$center->id/edit")}}" class="text-warning"><i class="fa fa-edit"></i></a>
                                </button>
                            </td>
                            <td><form method="POST" action="/center/{{$center->id}}">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}<button type="submit" class="text-danger"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                    @endforeach
                    </tbody></table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $centers->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>


   
@endsection