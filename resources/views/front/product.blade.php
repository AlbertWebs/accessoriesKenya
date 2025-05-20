@extends('front.master-product')
@section('content')
@foreach($Products as $Product)
    <!-- product tab start -->
    <nav class="breadcrumb-section bg-white pt-5 pb-6rem">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <?php $Product_Category = DB::table('category')->where('id',$Product->cat)->get() ?>
                        <?php $Product_Category = DB::table('category')->where('id',$Product->cat)->get() ?>
                        
                        @foreach ($Product_Category as $product_category)
                        <li class="breadcrumb-item"><a href="{{url('/products')}}/{{$product_category->slung}}">{{$product_category->cat}}</a></li>
                        @endforeach
                        <li class="breadcrumb-item active" aria-current="page">{{$Product->name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- bread crumb end -->
    <!-- single-product start -->
    <section class="product-single style1 pb-6rem">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto col-lg-5 mb-5 mb-lg-0">
                    <div class="product-sync-init mb-20">
                        <div class="single-product">
                            <div class="product-thumb">
                            <img src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="{{$Product->name}}">
                            </div>
                        </div>
                        <!-- single-product end -->
                        <div class="single-product">
                            <div class="product-thumb">
                                <img src="{{url('/')}}/uploads/product/{{$Product->image_two}}" alt="{{$Product->name}}">
                            </div>
                        </div>
                        <!-- single-product end -->
                        <div class="single-product">
                            <div class="product-thumb">
                                <img src="{{url('/')}}/uploads/product/{{$Product->image_three}}" alt="{{$Product->name}}">
                            </div>
                        </div>
                        <!-- single-product end -->
                        <div class="single-product">
                            <div class="product-thumb">
                                <img src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="{{$Product->name}}">
                            </div>
                        </div>
                        <!-- single-product end -->
                    </div>

                    <div class="product-sync-nav">
                        <div class="single-product">
                            <div class="product-thumb">
                                <a href="javascript:void(0)">
                                    <img src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="{{$Product->name}}">
                                </a>
                            </div>
                        </div>
                        <!-- single-product end -->
                        <div class="single-product">
                            <div class="product-thumb">
                                <a href="javascript:void(0)"> <img src="{{url('/')}}/uploads/product/{{$Product->image_two}}" alt="{{$Product->name}}"></a>
                            </div>
                        </div>
                        <!-- single-product end -->
                        <div class="single-product">
                            <div class="product-thumb">
                                <a href="javascript:void(0)"> <img src="{{url('/')}}/uploads/product/{{$Product->image_three}}" alt="{{$Product->name}}"></a>
                            </div>
                        </div>
                        <!-- single-product end -->
                        <div class="single-product">
                            <div class="product-thumb">
                                <a href="javascript:void(0)"><img src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="{{$Product->name}}"></a>
                            </div>
                        </div>
                        <!-- single-product end -->
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-md-0">
                    <div class="modal-product-info">
                        <div class="product-head">
                            <h2 class="title">{{$Product->name}}</h2>
                            <h4 class="sub-title">Reference: {{$Product->code}}</h4>
                            @if($Product->stock == 'Out of Stock')
                            <h4 class="sub-title">Stock: <span style="color:#ff0000; font-weight:700"> {{$Product->stock}}</span></h4>
                            @else
                            <h4 class="sub-title">Stock: {{$Product->stock}}</h4>
                            @endif
                            <div class="star-content">
                                <span class="star-on"><i class="fas fa-star"></i> </span>
                                <span class="star-on"><i class="fas fa-star"></i> </span>
                                <span class="star-on"><i class="fas fa-star"></i> </span>
                                <span class="star-on"><i class="fas fa-star"></i> </span> 
                                <span class="star-on"><i class="fas fa-star"></i> </span>
                                <a href="#reviews" id="write-comment"><span class="ml-2"><i class="far fa-comment-dots"></i></span> Read reviews <span>(<?php $Review = DB::table('reviews')->where('product_id',$Product->id)->get(); $CountReview = count($Review); echo $CountReview; ?>)</span></a>
                                @if(Auth::user())
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><span class="edite"><i class="far fa-edit"></i></span> Write a review</a>
                                @endif
                                <div class="product-discount">
                                    @if($Product->offer == 1)
                                    <span class="regular-price"> <del>KES {{$Product->price_raw}}</del> {{$Product->price}}</span>
                                    <?php 
                                        $Pr = $Product->price_raw;
                                        $P = $Product->price;
                                        $r = 100 - ($P*100)/$Pr;
                                        // Decimal Places
                                        $rround = ceil($r);
                                    ?>
                                       <span class="badge badge-dark">Save {{$rround}}%</span>
                                    @else
                                       <span class="regular-price"> KES {{$Product->price}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="product-body">
                            <p>{!!html_entity_decode($Product->meta)!!}</p>
                        </div>
                        
                        <div class="product-footer">
                            <form action="{{url('cart/addCart/')}}/{{$Product->id}}" method="POST" class="cart-quantity">
                                {{ csrf_field() }}
                                <div class="product-count style d-flex flex-column flex-sm-row mt-5 mb-5 pt-3">
                                    <div class="count d-flex">
                                        <input type="number" min="1" max="100" step="1" name="qty" value="1">
                                        {{-- <div class="button-group">
                                            <button class="count-btn increament"><i class="fas fa-chevron-up"></i></button>
                                            <button class="count-btn decreament"><i class="fas fa-chevron-down"></i></button>
                                        </div> --}}
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary rounded mt-5 mt-sm-0">
                                        <span class="mr-2"><i class="ion-android-add"></i></span>
                                        Add to cart
                                    </button>
                                    </div>
                                </div>
                            </form>
                            <div class="addto-whish-list">
                                <a href="{{url('/products')}}/{{$product_category->slung}}"><i class="fa fa-check"></i> All In {{$product_category->cat}} </a>
                                <a href="{{url('/products')}}/brand/{{$Product->brand}}"><i class="fa fa-check"></i>  All In {{$Product->brand}} </a>
                            </div>
                            <div class="pro-social-links mt-4">
                                <ul class="d-flex align-items-center">
                                    <li class="share">Share</li>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}/product/{{$Product->slung}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    {{-- <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li> --}}
                                </ul>
                            </div>

                            <div class="block-reassurance">
                                <ul class="d-sm-flex">
                                    <li class="media mb-4 pb-2 mb-sm-0 pb-sm-0">
                                        <img class="mr-3" src="{{asset('theme/assets/img/icon/10.png')}}" alt="icon">
                                        <div class="media-body">
                                            <span>Free Shipping <br> Within CBD</span>
                                        </div>
                                    </li>
                                    <li class="media mb-4 pb-2 mb-sm-0 pb-sm-0">
                                        <img class="mr-3" src="{{asset('theme/assets/img/icon/11.png')}}" alt="icon">
                                        <div class="media-body">
                                            <span>Easy Returns</span>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="mr-3" src="{{asset('theme/assets/img/icon/12.png')}}" alt="icon">
                                        <div class="media-body">
                                            <span>Lowest Price <br> Guarantee</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- single-product end -->
    <div class="product-tab bg-light py-6rem">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 rounded-0" id="reviews">
                        <div class="card-body">
                            <nav class="product-tab-menu style1 border-bottom cbb1 mb-4rem pr-0">
                                <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Product Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews (<?php $Review = DB::table('reviews')->where('product_id',$Product->id)->where('status','1')->get(); $countReview=count($Review); echo $countReview; ?>)</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="tab-content" id="pills-tabContent">
                                <!-- first tab-pane -->
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="product-description">
                                        {!!html_entity_decode($Product->content)!!}
                                    </div>
                                </div>
                                <!-- second tab-pane -->
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="studio-thumb">
                                        <a href="#"><img src="{{url('/')}}/uploads/categories/{{$product_category->image}}" alt="studio-thumb"></a>
                                        <h6 class="mb-2">Category:<small>{{$product_category->cat}}</small>
                                        <h6 class="mb-2">Brand <small>{{$Product->brand}}</small> </h6>
                                        <h6 class="mb-2">Reference <small>{{$Product->code}}</small> </h6>
                                        <h6>In stock <small>{{$Product->stocks}} Items</small> </h6>
                               
                                    </div>
                                   
                                </div>
                                <!-- third tab-pane -->
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <center>
                                        @if(Session::has('message'))
                                                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                                        @endif
                                    </center>
                                    @foreach($Review as $review)
                                    <div class="grade-content">
                                        <span class="grade">Grade </span>
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <h6 class="sub-title">{{$review->name}}</h6>
                                        <p>{{$review->created_at}}</p>
                                        <h4 class="title">{{$review->title}}</h4>
                                        <p>{!!html_entity_decode($review->content)!!}</p>
                                       
                                    </div>
                                    
                                    @endforeach
                                    @if(Auth::user())
                                    <a href="#" class="btn btn-dark3 mt-15" data-toggle="modal" data-target="#exampleModalCenter">Write your review !</a>
                                    @else 
                                    <a href="#" onclick="return confirm('You Have to Login To Write a Review')" class="btn btn-dark3 mt-15"  data-target="#exampleModalCenter">Write your review !</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product tab end -->
    <!-- product tab repetation start -->
    <div class="product-tab bg-white pt-6rem">
        <div class="container">
            <div class="product-tab-nav border-bottom cbb1 mb-3rem">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title pb-4 pb-md-4 position-relative">
                            <h2 class="title">You might also like</h2>
                            <p class="text">Related products</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product-tab-nav end -->
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-init style">
                        <?php $RelatedProducts = DB::table('product')->where('cat',$Product->cat)->get(); ?>
                        @foreach ($RelatedProducts as $Item)
                        <div class="slider-item">
                            <div class="single-product position-relative">
                                {{-- <span class="badge badge-primary cb3">Ex-uk</span> --}}
                                <div class="product-thumbnail position-relative">
                                    <a href="{{url('/')}}/product/{{$Item->slung}}">
                                        <img class="first-img" src="{{url('/')}}/uploads/product/{{$Item->image_one}}" alt="{{$Item->name}}">
                                        
                                        <img class="second-img" src="{{url('/')}}/uploads/product/{{$Item->image_two}}" alt="{{$Item->name}}">
                                    </a>
                                    <!-- product links -->
                                    <ul class="product-links d-flex justify-content-center">
                                      
                                        <li>
                                           <a id="getProduct" href="#" data-toggle="modal" data-target="#quick-view" data-url="{{ route('dynamicModal',['id'=>$Item->id])}}">
                                              <span data-toggle="tooltip" data-placement="bottom" title="Quick view">
                                                 <i class="ion-ios-search-strong"></i>
                                              </span>
                                           </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-desc pt-2rem position-relative text-center">
                                <h3 class="title"><a href="{{url('/')}}/product/{{$Item->slung}}">{{$Item->name}}</a></h3>
                                    <div class="star-rating">
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                        <span class="ion-ios-star"></span>
                                    </div>
                                  <h6 class="product-price">KES {{$Item->price}}</h6>
                                  <button id="getCart" class="pro-btn" data-toggle="modal" data-target="#add-to-cart" data-url="{{ route('dynamicCartModal',['id'=>$Item->id])}}">add to cart <i
                                     class="ion-bag"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- slider-item end -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product tab repetation end -->


    {{--  --}}
    @if(Auth::user())
    <!-- third modal -->
    <div class="modal fade show style4" id="exampleModalCenter" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header d-block">
                    <h5 class="modal-title bg-dark text-white">Write your review</h5>
                </div>
              
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="modal-thumb">
                                <img src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="modal-thumb">
                                <h3 class="title">{{$Product->name}}</h3>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4 mt-md-0">
                            <div class="modal-form">
                                <h3 class="title">Write your review</h3>
                                {{-- <div class="star-content my-0 pb-3">
                                    <span class="quality mr-2">Quality</span>
                                    <span class="star-on"><i class="fas fa-star"></i> </span>
                                    <span class="star-on"><i class="fas fa-star"></i> </span>
                                    <span class="star-on"><i class="fas fa-star"></i> </span>
                                    <span class="star-on"><i class="fas fa-star"></i> </span>
                                    <span class="star-on"><i class="fas fa-star"></i> </span>
                                </div> --}}
                              
                                <form method="post" action="{{url('/clientarea/add_Review')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="title" for="text-filed113">Title for your review <sup class="required">*</sup></label>
                                        <input type="text" name="title" class="form-control" id="text-filed113">
                                    </div>
                                    <input type="hidden" name="product_id" value="{{$Product->id}}">
                                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                    <div class="form-group">
                                        <label for="text-filed21">Your review <sup class="required">*</sup></label>
                                        <textarea class="form-control" name="content" id="text-filed21" rows="3"></textarea>
                                        <label for="text-filed21">Your Rating out of 5 <sup class="required">*</sup></label>
                                        <input  name="rating" value="5" type="number" class="form-control" id="text-filed031">
                                    </div>
                                    <div class="form-group">
                                        <label for="text-filed031">Your name <sup class="required">*</sup></label>
                                        <input readonly name="name" value="{{Auth::user()->name}}" type="text" class="form-control" id="text-filed031">
                                    </div>
                                
                                <div class="form-group mt-3">
                                    <span class="required"><sup>*</sup> Required fields</span>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-dark3">Send</button>
                                        <span class="d-inline-block mx-2 or">or </span>
                                        <button type="button" class="btn btn-dark3" data-dismiss="modal">cancel</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modals end -->
    @endif
    {{--  --}}
@endforeach
@endsection

