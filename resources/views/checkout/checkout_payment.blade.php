@extends('front.master')
@section('content')
    <!-- check-out-section start -->
    <section class="check-out-section pt-6rem pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        1 Personal Information
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                     
                                <div class="card-body">
                                    <form id="updateUserDataForm" action="{{url('/')}}/cart/checkout/updateShipping" method="post" class="personal-information">
                                        {{csrf_field()}}
                                  
                                        <center>
                                            @if(Session::has('message'))
                                                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                                            @endif
                                        </center>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-md-3 col-form-label">Full
                                                Name</label>
                                            <div class="col-md-6">
                                               <input value="{{Auth::user()->name}}" name="name" type="text" class="form-control">
                                            </div>
                                        </div>
                                     
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-md-3 col-form-label">Email</label>
                                            <div class="col-md-6">
                                                <input type="email" name="email" readonly value="{{Auth::user()->email}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-md-3 col-form-label">Mobile</label>
                                            <div class="col-md-6">
                                                <input type="text" name="mobile"  value="{{Auth::user()->mobile}}" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-md-3 col-form-label">Address</label>
                                            <div class="col-md-6">
                                                <input type="text" name="address"  value="{{Auth::user()->address}}" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-md-3 col-form-label">Location</label>
                                            <div class="col-md-6">
                                                <input type="text" name="location"  value="{{Auth::user()->location}}" class="form-control">
                                            </div>
                                        </div>

                                       
                                        <div class="form-group row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="check-box-inner pt-0">
                                                    <div class="filter-check-box">
                                                        <input type="checkbox" id="20821">
                                                        <label for="20821">Sign up for our newsletter</label>
                                                        <p class="pl-25 mb-4">Be the First to Know. Sign up for
                                                            newsletter
                                                            today !</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="sign-btn text-right">
                                                    <button id="updateUserDataBtn" type="submit" class="btn btn-dark3">Update Info</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <span>2</span> Shipping Method
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <div class="delivery-options-list">
                                        <form>
                                            <div class="delivery-option">
                                                <div class="row">
                                                   <div class="col-12">
                                                       <div class="row align-items-center">
                                                        <div class="col-sm-1">
                                                            <div class="custom-radio">
                                                                <input type="radio" id="test3" name="radio-group">
                                                                <label id="pull-up" for="test3"> </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-11 delivery-option-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-sm-5 col-12">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-3">
                                                                            <img src="{{asset('theme/assets/img/icon/10.jpg')}}"
                                                                                alt="My carrier">
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <span class="carrier-name">Your
                                                                                carrier of choice</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <span class="carrier-delay">Next
                                                                        Day Delivery Outside Nairobi</span>
                                                                </div>
                                                                <div class="col-sm-3 col-12">
                                                                    <span class="carrier-price">Delivery Fee May Apply</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       </div>
                                                   </div>
                                                </div>
                                               </div>
                                               {{-- <div class="order-options">
                                                <div id="delivery">
                                                    <label>If you would like to add a comment
                                                        about your order, please write it in the field
                                                        below.</label>
                                                    <textarea class="form-control mt-2 mb-4"></textarea>
                                                    <button type="submit" class="btn btn-dark3">
                                                        Continue
                                                    </button>
                                                </div>
                                            </div> --}}
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <span>3</span> Available Payment options
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordion">
                                <div class="card-body pt-0">
                                    <div class="">
                                        {{--  --}}
                                        <div class="filter-check-box mb-4">
                                            <input type="checkbox" name="lipa" readonly checked="checked" id="20828">
                                            <label class="checkout" for="20828">Lipa Na M-PESA  ,  Pay by Bank(EFT)  &  Cash on Delivery</label>
                                        </div>
                                       
                                        <form method="POST" action="{{url('/cart/checkout/placeOrder')}}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-dark3 text-capitalize">
                                                Place Order Now
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ul class="list-group cart-summary rounded-0">
                        @foreach($CartItems as $CartItem)
                        <?php 
                                        $Products = DB::table('product')->where('id',$CartItem->id)->get();
                        ?>
                        @foreach($Products as $Product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <ul class="items">
                                <li>{{$CartItem->qty}} {{$Product->name}}</li>
                            </ul>
                            <ul class="amount">
                                <li>KES {{$Product->price}}</li>
                            </ul>
                        </li>
                        @endforeach
                        @endforeach

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <ul class="items">
                                <li>Subtotal</li>
                            </ul>
                            <ul class="amount">
                                <li>KES {{Cart::subtotal()}}</li>
                            </ul>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <ul class="items">
                                <li>Total</li>
                            </ul>
                            <ul class="amount">
                                <li>KES {{Cart::total()}}</li>
                            </ul>
                        </li>
                        
                        <li class="list-group-item text-center"> <a href="{{url('/')}}/cart" class="btn btn-dark3">Edit Your Cart</a></li>
                    </ul>

                    <div class="delivery-info mt-4">
                        <ul>
                            <li>
                                <img src="{{asset('theme/assets/img/icon/10.png')}}" alt="icon"> Delivery policy (Free Delivery Within Nairobi CBD)
                            </li>
                            <li>
                                <img src="{{asset('theme/assets/img/icon/11.png')}}" alt="icon"> Return policy (Free Return Within 7 Days)
                            </li>
                            <li>
                                <img src="{{asset('theme/assets/img/icon/12.png')}}" alt="icon"> Payment policy (Secured Payment Systems)
                            </li>
                        </ul>
                    </div>
                    {{-- <li class="list-group-item text-center"> <a href="{{url('/')}}/cart" class="btn btn-dark3">Place Your Order</a></li> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- check-out-section end -->
@endsection