@extends('layout')

@section('data')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('img/hero_3.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <h1>Volunteer Info</h1>
                            <p data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate beatae quisquam perspiciatis adipisci ipsam quam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
        <form action="/search" method="post" >
        {{csrf_field()}}
            <div class="row align-items-center">
                <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                    <input type="hidden" class="form-control" placeholder="Find Person" name="centerid" value="{{$id}}">
                </div>
                <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                    <div class="wrap-icon">
                        <span class="icon icon-room"></span>
                        <input type="text" class="form-control" placeholder="Search with Name" name="searchWithName">
                    </div>
                </div>
                <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                    <div class="wrap-icon">
                        <span class="icon icon-room"></span>
                        <input type="text" class="form-control" placeholder="Search with NRC" name="searchWithNrc">
                    </div>
                </div>
                <div class="col-lg-12 col-xl-3 ml-auto">
                    <button class="btn text-white btn-primary" type="submit" id="search" name="search">Search</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">                    
                <h2 class="text-center text-info">
                    
                </h2>
            </div>
            <div class="col-md-12">
                <table class="table table-responsive-md">
                    <thead>
                        <tr class="btn-primary disabled text-white">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">DOB</th>
                            <th scope="col">NRC</th>
                            <th scope="col">Address</th>
                            <th scope="col">Ph Number</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($volunteers as $volunteer)
                        <tr>
                            <th scope="row">{{$volunteer->id}}</th>
                            <td>{{$volunteer->name}}</td>
                            <td>{{$volunteer->dob}}</td>
                            <td>{{$volunteer->nrc}}</td>
                            <td>{{$volunteer->address}}</td>
                            <td>{{$volunteer->ph_no}}</td>
                        <tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>   
@endsection