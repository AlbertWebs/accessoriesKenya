@extends('front.master')
@section('content')

     <!-- bread crumb start -->
     <nav class="breadcrumb-section bg-white pt-5 pb-6rem">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{Auth::user()->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- bread crumb end -->
    <!-- my-account start -->
    <div class="my-account pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title">Your account</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <a href="{{url('/clientarea/profile')}}">
                        <div class="card text-center">
                            <div class="card-body">
                                <span class="icon">
                            <i class="ion-ios-contact"></i>
                        </span>
                                <h4 class="sub-title">
                                    Information
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
               
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <a href="{{url('/clientarea/orders')}}">
                        <div class="card text-center">
                            <div class="card-body">
                                <span class="icon">
                            <i class="ion-android-calendar"></i>
                        </span>
                                <h4 class="sub-title">
                                    Order history and details
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-12">
                    <div class="log-out-btn text-center">
                        <a href="{{url('/clientarea/logout')}}" class="btn btn-dark3 my-5">log out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my-account end -->

@endsection