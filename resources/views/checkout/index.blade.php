@extends('front.master')
@section('content')
    <!-- bread crumb start -->
    <nav class="breadcrumb-section bg-white pt-5 pb-6rem">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Your account</li>
                  </ol>
              </div>
          </div>
      </div>
  </nav>
  <!-- bread crumb end -->
  <!-- my-account start -->
  <div class="my-account pb-6rem">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <h3 class="title"> Log in to your account</h3>
                  <form class="log-in-form" action="{{url('cart/checkout/login')}}" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group row">
                          <label for="staticEmail" class="col-md-3 col-form-label">Email</label>
                          <div class="col-md-6">
                              <input type="email" name="email" placeholder="Enter email" value="{{ old('email') }}" class="form-control" id="staticEmail" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputPassword" class="col-md-3 col-form-label">Password</label>
                          <div class="col-md-6">
                              <div class="input-group mb-2 mr-sm-2">
                                  <input type="password" name="password" placeholder="Password" class="form-control" id="inputPassword" required>
                                  <div class="input-group-prepend">
                                      <button type="button" class="input-group-text btn-dark3 show-password">show</button>
                                  </div>
                              </div>

                          </div>

                      </div>
                      <div class="form-group row pb-3 text-center">
                          <div class="col-md-6 offset-md-3">
                              <div class="login-form-links">
                                  <a href="{{url('/forgot-password')}}" class="for-get">Forgot your password?</a>
                                  <div class="sign-btn">
                                      <button type="submit" class="btn btn-dark3">Sign in</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row text-center">
                          <div class="col-12">
                              <div class="border-top">
                                  <a href="{{url('/register')}}" class="no-account">No account? Create one here</a>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- my-account end -->
@endsection