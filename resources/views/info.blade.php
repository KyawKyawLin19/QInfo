@extends('layout')

@section('data')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('img/hero_3.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <h1>Quaratine Person Info</h1>
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
            <div class="col-lg-12 col-xl-2 no-sm-border border-right">
                <select class="form-control" name="searchWithCenter">
                        <option value="1">Myanmar</option>
                        <option value="2">Afghanistan</option>
                        <option value="3">Albania</option>
                </select>
            </div>
            <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <button class="btn text-white btn-primary" type="submit" id="search" name="search">Search</button>
                </div>
        </form>
    </div>

@endsection