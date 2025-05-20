@extends('front.master-product')
@section('content')

  <!-- bread crumb start -->
  <nav class="breadcrumb-section bg-white pt-5 pb-6rem hide-mobile">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/')}}/products">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$page_title}}</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- bread crumb end -->
<!-- product tab start -->
<div class="product-tab bg-white pb-5" style="border-radius:10px">
    <div class="container">
        <div class="grid-nav-wraper bg-light mb-5">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <nav class="shop-grid-nav">
                        <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="ion-grid"></i></a>
                            </li>
                            <li class="nav-item mr-0">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="ion-android-menu"></i></a>
                            </li>
                            <li> <span class="total-products text-capitalize">There are <?php echo count($Products) ?> products.</span></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-md-6">
                    <div class="shop-grid-button d-flex align-items-center">
                        <span class="sort-by"> brand:</span>
                        <button class="btn-dropdown rounded d-flex justify-content-between" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    All Brands <span class="ion-android-arrow-dropdown"></span>
                </button>
                        <?php $Brands = DB::table('brands')->get(); ?>
                        <div class="dropdown-menu shop-grid-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($Brands as $brand)
                              <a class="dropdown-item" href="{{url('/')}}/products/brand/{{$brand->name}}">{{$brand->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-tab-nav end -->
        <div class="tab-content" id="pills-tabContent">
            <!-- first tab-pane -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    @foreach ($Products as $Product)
                    <div class="col-6 col-sm-6 col-md-2 mb-5 grid-list">
                        <div class="single-product position-relative">
                            @if($Product->conditions == 'New')
                            <span class="badge badge-success cb3">{{$Product->conditions}}</span>
                          @elseif($Product->conditions == 'Used') 
                            <span class="badge badge-warning cb3">{{$Product->conditions}}</span>
                          @else 
                            <span class="badge badge-primary cb3">{{$Product->conditions}}</span>
                          @endif
                            <div class="product-thumbnail position-relative">
                                <a href="{{url('/')}}/product/{{$Product->slung}}">
                                    <img class="first-img" src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="{{$Product->name}}">
                                    
                                    <img class="second-img" src="{{url('/')}}/uploads/product/{{$Product->image_two}}" alt="{{$Product->name}}">
                                </a>
                                <!-- product links -->
                                <ul class="product-links d-flex justify-content-center">
                                   
                                    <li>
                                       <a id="getProduct" href="#" data-toggle="modal" data-target="#quick-view" data-url="{{ route('dynamicModal',['id'=>$Product->id])}}">
                                          <span data-toggle="tooltip" data-placement="bottom" title="Quick view">
                                             <i class="ion-ios-search-strong"></i>
                                          </span>
                                       </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-desc pt-2rem position-relative text-center">
                            <h3 class="title"><a href="{{url('/')}}/product/{{$Product->slung}}">{{$Product->name}}</a></h3>
                                {{-- <div class="star-rating">
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                </div> --}}
                              {{-- <h6 class="product-price">KES {{$Product->price}}</h6> --}}
                               {{--  --}}
                               @if($Product->offer == 1)
                               <h6 class="product-price"><del>KSH {{$Product->price_raw}}</del> <span class="text-danger ml-1">KSH {{$Product->price}}</span></h6>
                               {{-- <h6 class="product-price">KES {{$featured->price}}</h6> --}}
                               @else 
                               <h6 class="product-price"> <span class="text-danger ml-1">KSH {{$Product->price}}</span></h6>
                               @endif
                              
                              <button id="getCart" class="pro-btn" data-toggle="modal" data-target="#add-to-cart" data-url="{{ route('dynamicCartModal',['id'=>$Product->id])}}">add to cart <i
                                 class="ion-bag"></i></button>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                </div>
                <nav class="pagination-section bg-light my-5">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-6 text-center text-sm-left  mb-3 mb-sm-0">
                            <p class="text">Showing {{$Products->firstItem()}}-{{$Products->lastItem()}} of {{$Products->total()}} item(s) </p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <?php echo $Products ?>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- second tab-pane -->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="grid-list-wrapper">
                    @foreach ($Products as $Product)
                    <div class="row grid-list1">
                        <div class="col-12 col-sm-4 col-md-5 col-lg-3 mb-5">
                            <div class="position-relative">
                                {{-- <span class="badge badge-primary cb3">New</span> --}}
                                <div class="product-thumbnail position-relative">
                                    <a href="{{url('/')}}/product/{{$Product->slung}}">
                                        <img class="first-img" src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="{{$Product->name}}">
                                        
                                        <img class="second-img" src="{{url('/')}}/uploads/product/{{$Product->image_two}}" alt="{{$Product->name}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 col-md-7 col-lg-6 mb-5">
                            <div class="product-desc">
                                <h3 class="title"><a href="{{url('/')}}/product/{{$Product->slung}}">{{$Product->name}}</a></h3>
                                <div class="star-rating">
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                    <span class="ion-ios-star"></span>
                                </div>
                            </div>
                            <ul class="product-list-des">
                                {!!html_entity_decode($Product->content)!!}
                            </ul>
                        </div>
                        <div class="col-12 col-sm-8 offset-sm-4 offset-md-5 offset-lg-0 col-lg-3 mb-5">
                            <div class="availability-list">
                                <p>Availability: <span>{{$Product->stocks}} In Stock</span></p>
                                <span class="price ">KES {{$Product->price}}</span>
                            </div>
                            <button id="getCart" class="btn btn-primary btn-add-to-cart rounded btn-sm mb-3 btn-sm btn-md-block" data-toggle="modal" data-target="#add-to-cart" data-url="{{ route('dynamicCartModal',['id'=>$Product->id])}}">add to cart  <i class="ion-bag"></i></button>
                          
                            {{-- <ul class="product-links d-flex justify-content-center">
                                <li>
                                    <a href="#">
                                        <span data-toggle="tooltip" data-placement="bottom" title="wishlist">
                                        <i class="ion-ios-heart-outline"></i>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#compare">
                                        <span data-toggle="tooltip" data-placement="bottom" title="Add to compare">
                                        <i class="ion-ios-loop"></i>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a id="getProduct" href="#" data-toggle="modal" data-target="#quick-view" data-url="{{ route('dynamicModal',['id'=>$Product->id])}}">
                                      <span data-toggle="tooltip" data-placement="bottom" title="Quick view">
                                         <i class="ion-ios-search-strong"></i>
                                      </span>
                                   </a>
                                </li>
                            </ul> --}}

                        </div>
                    </div>
                    @endforeach
                  
                    <nav class="pagination-section bg-light my-5">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-6 text-center text-sm-left  mb-3 mb-sm-0">
                                <p class="text">Showing {{$Products->firstItem()}}-{{$Products->lastItem()}} of {{$Products->total()}} item(s) </p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <?php echo $Products ?>
                            </div>
                        </div>
                    </nav>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- product tab end -->
@endsection