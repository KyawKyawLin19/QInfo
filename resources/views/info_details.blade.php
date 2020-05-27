@extends('layout')

@section('data')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('img/hero_7.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <h1>Country Detail</h1>
                            <p data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate beatae quisquam perspiciatis adipisci ipsam quam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">{{$country}}</h2>
            <p class="color-black-opacity-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <p class="color-black-opacity-5"> {{$date}}</p>
          </div>
        </div>

        <div class="row align-items-stretch">
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <p class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-hotel"></span></span>
              <span class="caption mb-2 d-block">NewConfirmed</span>
              <span class="number">{{$newConfirmed}}</span>
            </p>
          </div>
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <p class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-microphone"></span></span>
              <span class="caption mb-2 d-block">TotalConfirmed</span>
              <span class="number">{{$totalConfirmed}}</span>
            </p>
          </div>
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <p class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-flower"></span></span>
              <span class="caption mb-2 d-block">NewDeaths</span>
              <span class="number">{{$newDeaths}}</span>
            </p>
          </div>
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <p class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-restaurant"></span></span>
              <span class="caption mb-2 d-block">TotalDeaths</span>
              <span class="number">{{$totalDeaths}}</span>
            </p>
          </div>
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <p class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-cutlery"></span></span>
              <span class="caption mb-2 d-block">NewRecovered</span>
              <span class="number">{{$newRecovered}}</span>
            </p>
          </div>
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <p class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-bike"></span></span>
              <span class="caption mb-2 d-block">TotalRecovered</span>
              <span class="number">{{$totalRecovered}}</span>
            </p>
          </div>
        </div>  
      </div>
    </div>
@endsection