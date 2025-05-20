@extends('front.master')
@section('content')
@foreach($SiteSettings as $Settings)
        <!-- Begin Li's Breadcrumb Area -->
        <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->     
            <!-- Begin Contact Main Page Area -->
            <div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
                <div class="container mb-60">
                    <div style="">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d249.30100549775818!2d36.8278346!3d-1.2842642!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x677ac7d99a0ff352!2sAmani+Vehicle+Sounds+%26+Accessories!5e0!3m2!1sen!2ske!4v1557146026043!5m2!1sen!2ske" width="100%" height="800" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                            <div class="contact-page-side-content">
                                <h3 class="contact-page-title">Why Choose Us</h3>
                                <p class="contact-page-message mb-25">{!!html_entity_decode($Settings->welcome)!!}</p>
                                
                                <div class="single-contact-block">
                                    <h4><i class="fa fa-phone"></i> Contacts</h4>
                                    <p>Mobile: {{$Settings->mobile}}</p>
                                    <p>Hotline: {{$Settings->mobile_one}}</p>
                                    <p><i class="fa fa-map-marker"></i> {{$Settings->location}}</p>
                                    <p><i class="fa fa-envelope-o"></i> {{$Settings->email}}</p>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                            <div class="contact-form-content pt-sm-55 pt-xs-55">
                                <h3 class="contact-page-title">Write Us a Message</h3>
                                <div class="contact-form">
                                    <form  id="contact-foram" method="POST" action="{{url('/submitMessage')}}"> 
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Your Name <span class="required">*</span></label>
                                            <input type="text" name="name" id="customername" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Your Email <span class="required">*</span></label>
                                            <input type="email" name="email" id="customerEmail" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" name="subject" id="contactSubject">
                                        </div>
                                        <div class="form-group mb-30">
                                            <label>Your Message</label>
                                            <textarea name="message" id="contactMessage" ></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" value="submit" id="submit" class="li-btn-3" name="submit">send</button>
                                        </div>
                                        {!! app('captcha')->render(); !!}
                                        <div class="form-group" style="display: none;">
                                            <label for="faxonly">Fax Only
                                               <input type="checkbox" name="faxonly" id="faxonly" />
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Main Page Area End Here -->
@endforeach
@endsection