@extends('front.master')
@section('content') 
  <!-- Begin Amani`s Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Special Offers</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Amani`s Breadcrumb Area End Here -->
            <!-- Begin Amani`s Content Wraper Area -->
            

            <!--  -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                          
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
                                                @foreach($Products as $product)
                                                <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image centererd">
                                                            <a href="{{url('/')}}/product/{{$product->slung}}">
                                                                <img src="{{url('/')}}/uploads/product/{{$product->offer_banner}}" alt="{{$product->name}}">
                                                            </a>
                                                            <!-- <span class="sticker">New</span> -->
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <?php $Category = DB::table('category')->where('id',$product->cat)->get(); ?>
                                                                        <!--  -->
                                                                        @foreach($Category as $Cat)
                                                                        <?php $final = preg_replace('#[ -]+#', '-', $Cat->cat);?>
                                                                        <a href="{{url('/products')}}/{{$final}}">
                                                                            @foreach($Category as $cat){{$cat->cat}}@endforeach
                                                                        </a>
                                                                        @endforeach
                                                                        <!--  -->
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <ul class="rating">
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name" href="{{url('/')}}/product/{{$product->slung}}">{{$product->name}}</a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">KES {{$product->price}}</span>
                                                                    @if($product->offer == 1)
                                                                    @if($product->price_raw == null)

                                                                    @else
                                                                    <del><span class="new-price">KES {{$product->price_raw}}</span></del>
                                                                    @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart "><a href="{{url('cart/addCart')}}/{{$product->id}}">Buy Now</a></li>
                                                                    
                                                                    <li>
                                                                        <a href="{{url('/')}}/product/{{$product->slung}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#view-modal"  id="getProduct" data-url="{{ route('dynamicModal',['id'=>$product->id])}}">
                                                                        <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                      <!-- Process Wishlist -->
                                                                      @if(Auth::user())
                                                                        <a class="links-details" href="{{url('/cart/addWishlist/')}}/{{$product->id}}/{{Auth::user()->id}}"><i class="fa fa-heart-o"></i></a>
                                                                        @else
                                                                        <?php 
                                                                            // get ip Address
                                                                            $ip = Request::ip();
                                                                        ?>
                                                                        <a class="links-details" href="{{url('/cart/addWishlist/')}}/{{$product->id}}/{{$ip}}"><i class="fa fa-heart-o"></i></a>
                                                                      @endif
                                                                        <!-- Process Wishlist -->
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <p>Page: {{$Products->currentPage()}} of {{$Products->lastPage()}}</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                               <?php echo $Products; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            @include('front.brands')
@endsection

