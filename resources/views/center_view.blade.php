@extends('layout')

@section('data')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('img/hero_1.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h1>Camp Info</h1>
                <p data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate beatae quisquam perspiciatis adipisci ipsam quam.</p>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>





    <div class="container" style="margin:50px;">
        <div class="row">
        @foreach($data as $d)
            <div class="col-md-4">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">
        <h4>{{$d->name}}</h4>
        </div>
        <div class="card-body">
            <h6 class="card-title">Location : Yangon</h6>
            <h6 class="card-title">Contact : 0912345678</h6>
            <a href="/getPatients/{{$d->id}}" class="btn btn-info">Person</a>
            <a href="/getVolunteers/{{$d->id}}" class="btn btn-info">Volunter</a>
            <a href="/getHospital/{{$d->id}}" class="btn btn-info">Room</a>
        </div>
        </div>  
            </div>
        @endforeach
        </div>
    </div>


         
@endsection


