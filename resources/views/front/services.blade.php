@extends('front.master')
@section('content')
<?php $Banner = DB::table('banners')->where('name','PageOne')->get(); ?>
@foreach($Banner as $Ban)
 <!-- bredcrumb and page title block start  -->
 <section class="categories_banner_area" style="background: url('{{url('/')}}/uploads/banners/{{$Ban->image}}') no-repeat scroll center center;">
      <div class="container">
          <div class="c_banner_inner">
              <h3>Our Services</h3>
              <ul>
                  <li><a href="{{url('/')}}">Home</a></li>
                  
                  <li class="current"><a href="{{url('/our-services')}}">Our Services</a></li>
              </ul>
          </div>
      </div>
  </section>
  <!-- bredcrumb and page title block end  -->
  @endforeach
  @foreach($Services as $service)
              @if($service->id % 2 == 0)
              <div class="container text-center">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="c_product_item">
                          <div style="padding:40px" class="row">
                              <div class="col-lg-4 col-md-6">
                                  <div class="c_product_img">
                                      <img class="img-fluid" src="{{url('/')}}/uploads/services/{{$service->image_one}}" alt="Amani Vehicle Sounds">
                                  </div>
                              </div>
                              <div class="col-lg-8 col-md-6">
                                  <div class="c_product_text">
                                      <h3>{{$service->title}}</h3>
                                      <p>{!!html_entity_decode($service->content)!!}</p>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
              @else
              <div class="container text-center">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="c_product_item">
                          <div style="padding:40px" class="row"> 
                              
                              <div class="col-lg-8 col-md-6">
                                  <div class="c_product_text">
                                      <h3>{{$service->title}}</h3>
                                      <p>{!!html_entity_decode($service->content)!!}</p>
                                  </div>
                              </div>

                              <div class="col-lg-4 col-md-6">
                                  <div class="c_product_img">
                                      <img class="img-fluid" src="{{url('/')}}/uploads/services/{{$service->image_one}}" alt="Amani Vehicle Sounds">
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
              @endif
  @endforeach

<!-- Request Quote -->
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <div class= "newslatter">
          
              <h2 class="tf">Looking for Installation Services?</h2>
              
              <div style="padding:20px; text-align: center;">
                 <center><a style="color:#ffffff; background-color:#66139B; border:#66139B" href="#" class="btn btn-large btn-primary text-center"><span class="fa fa-envelope"></span> Get Quote</a></center>
              </div>
            
          </div>
        </div>
      </div>
      
    </div>
<!-- Request Quote -->
       
@endsection