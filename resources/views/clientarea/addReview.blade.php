@extends('front.master')
@section('content')
	<!-- Breadcrumb -->
	@include('front.breadcrumb')
	<!-- BreadCrumb -->
       
        <!-- blog-details-area start -->
        <section class="blog-details-area ptb-140">
            <div class="container">
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 col">
                        <aside class="right-sidebar">
                           
                            @include('clientarea.menu')
                        
                        </aside>
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <div class="blog-details-wrap">
                            <div class="col-md-12">
                                <div class="contact-wrap form-style">
                                    
                                        <center>
                                        @if(Session::has('message'))
                                                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                                        @endif
                                        </center>
                                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                                            <center>
                                                <img src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="{{$Product->name}}" >
                                            </center>
                                        </div>
                                        <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                                                <div class="free-quote bg-dark h-100">
                                                    <h4 class="my-4 heading  text-center">Add Your Review For: {{$Product->name}}</h4>
                                                    <form method="post" action="{{url('/clientarea/add_Review')}}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="product_id" value="{{$Product->id}}">
                                                        <div class="form-group">
                                                        <input type="hidden" class="form-control btn-block" value="{{$User->name}}" id="fq_name" name="name" placeholder="Juliet Wangui">
                                                            <input type="hidden" class="form-control btn-block" value="{{$User->email}}" id="fq_name" name="email" placeholder="julietwangui@domain.com">
                                                            <input type="hidden" class="form-control btn-block" value="{{$User->mobile}}" id="fq_name" name="mobile" placeholder="0723014032">
                                                            <input type="hidden" class="form-control btn-block" value="{{$User->address}}" id="fq_name" name="address" placeholder="P.O Box 00100-6813, Nairobi Kenya">
                                                            <input type="hidden" class="form-control btn-block" value="{{$User->location}}" id="fq_name" name="location" placeholder="e.g Nairobi">
                                                            <textarea name="content" style="height:100px;" placeholder="Write your Review Here" class="form-control btn-block"></textarea>
                                                        </div>
                                                        <div class="form-group required">
                                                            <div class="col-md-6">
                                                            <label class="control-label">Rating</label>
                                                            <div class="rates"><span>Bad</span>
                                                                <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                                <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                                <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                                <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                                <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                                                            <span>Good</span></div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary text-white py-2 px-4 btn-block" value="submit">  
                                                        </div>
                                                        <div class="text-success text-center Results" ></div>
                                                    </form>
                                                </div>
                                        </div>
                                </div>
                            </div>
                    <!-- <div class="col-md-">
                        <blockquote>
                                   Changing your email destroys the current session Data
                        </blockquote>
                    </div> -->
                         </div>
                           
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- blog-details-area end -->
    @endsection