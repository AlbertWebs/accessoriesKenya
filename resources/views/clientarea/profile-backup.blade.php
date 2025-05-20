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
                                
                                        

                                        <!-- SiteSettings -->
                                        <!--================Contact Area =================-->
                                        <section class="contact_area p_10">
                                                    <div class="container">
                                                        
                                                        <div class="contact_form_inner">
                                                            <h3>Your Details</h3>
                                                            <form class="contact_us_form row" action="{{url('/clientarea')}}/save" method="post" id="contactForm" novalidate="novalidate">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control btn-block" value="{{$User->name}}" id="fq_name" name="name" placeholder="Juliet Wangui">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control btn-block" value="{{$User->email}}" id="fq_name" name="email" placeholder="julietwangui@domain.com">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control btn-block" value="{{$User->mobile}}" id="fq_name" name="mobile" placeholder="0723014032">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control btn-block" value="{{$User->address}}" id="fq_name" name="address" placeholder="P.O Box 00100-6813, Nairobi Kenya">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control btn-block" value="{{$User->location}}" id="fq_name" name="location" placeholder="e.g Nairobi">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control btn-block" value="{{$User->town}}" id="fq_name" name="town" placeholder="e.g Rongai">
                                                                </div>

                                                                <div class="form-group col-lg-12">
                                                                    <button type="submit" value="submit" class="btn update_btn form-control">Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </section>
                                                <!--================End Contact Area =================-->
        
                                        <!-- SiteSettings -->
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