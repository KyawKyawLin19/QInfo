@extends('layout')

@section('data')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('img/hero_6.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <h1>Covid19 Country</h1>
                            <p data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate beatae quisquam perspiciatis adipisci ipsam quam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
        <form action="/searchData" method="post" >
        {{csrf_field()}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-2">
                    <select class="form-control" name="searchWithCountry">
                        @foreach($countries as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <button class="btn text-white btn-primary" type="submit" id="search" name="search">Search</button>
                </div>
            </div>
        </div>
            
        </form>
    </div>

@endsection