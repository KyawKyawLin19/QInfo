@extends('layout')
@section('content')

    <div class="site-blocks-cover overlay" style="background-image: url({{asset('img/hero_1.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10">
            <div class="row justify-content-center mb-4">
              <div class="col-md-10 text-center">
                <h1 data-aos="fade-up">Find Nearby <span class="typed-words"></span></h1>
                <p data-aos="fade-up" class=" w-75 mx-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro provident corporis consequuntur et totam.</p>
              </div>
            </div>

            <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
                <div class="row align-items-center">
                  <div class="col-lg-12 col-xl-4 no-sm-border border-right">
                    <input type="text" class="form-control" placeholder="What are you looking for?" disabled>
                  </div>
                  <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                    <div class="wrap-icon">
                      <select class="form-control" name="city" id="city">
                        <option value="">
                            Select City
                        </option>

                        @foreach($cities as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>

                    </div>
                    
                  </div>
                  <div class="col-lg-12 col-xl-3">
                    <div class="select-wrap">
                      <!-- <span class="icon"><span class="icon-keyboard_arrow_down"></span></span> -->
                      <select class="form-control" name="township" id="township">
                        <option value="">
                            Select Township
                        </option>
                      </select>
                    </select>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <!-- <input type="submit" class="btn text-white btn-primary" value="Search"> -->
                    <button class="btn text-white btn-primary" type="submit" id="search" name="search">Search</button>
                  </div>
                </div>
              <!-- </form>   -->
            </div>
          </div>
        </div>
      </div>
    </div>  
@endsection 
