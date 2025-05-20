@extends('front.master')
@section('content')
<section class="check-out-section pt-6rem pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Personal Information
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">
                                <center>
                                @if(Session::has('message'))
                                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                                @endif
                                </center>
                            
                                <form action="{{url('/clientarea')}}/save" method="post" class="personal-information">
                                    {{csrf_field()}}
                                                                     

                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-md-3 col-form-label">Full Name</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control btn-block" value="{{$User->name}}" id="fq_name" name="name" placeholder="Juliet Wangui">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-md-3 col-form-label">Email</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control btn-block" value="{{$User->email}}" id="fq_name" name="email" placeholder="julietwangui@domain.com">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-md-3 col-form-label">Mobile</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control btn-block" value="{{$User->mobile}}" id="fq_name" name="mobile" placeholder="0723014032">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-md-3 col-form-label">Address</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control btn-block" value="{{$User->address}}" id="fq_name" name="address" placeholder="P.O Box 00100-6813, Nairobi Kenya">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-md-3 col-form-label">Location</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control btn-block" value="{{$User->location}}" id="fq_name" name="location" placeholder="e.g Nairobi">
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control btn-block" value="{{$User->town}}" id="fq_name" name="town" placeholder="e.g Rongai">
                               
                                 
                                  
                                    <div class="form-group row">
                                        <div class="col-md-3"></div>
                                      
                                        <div class="col-12">
                                            <div class="sign-btn text-center">
                                                <button type="submit" class="btn btn-dark3">Update</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <hr>
                                <div class="col-12">
                                    <div class="log-out-btn text-center">
                                        <a href="{{url('/clientarea')}}" class="btn btn-dark3 my-5">My Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection