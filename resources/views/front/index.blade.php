@extends('front.master')
@section('content')
<?php $SiteSettings = DB::table('sitesettings')->get();?>

@foreach($SiteSettings as $Settings)
<!-- main slider start -->
 <section class="bg-light position-relative">
    <div class="main-slider slick-dots-style slick-dots-align-center">
       <?php $Slider = DB::table('product')->where('slider','1')->get() ?>
       @foreach ($Slider as $slider)
       <div class="slider-item bg-img bg-img1" style="background-image: url('{{url('/')}}/uploads/product/{{$slider->image_three}}');">
         <div class="container">
            <div class="row align-items-center slider-height">
               <div class="col-12">
                  <div class="slider-content">
                     <h4 class="title animated" data-animation-in="fadeInDown">
                        DEALS JUST GOT BETTER
                     </h4>
                     <h2 style="max-width:500px" class="sub-title animated" data-animation-in="fadeInLeft" data-delay-in="1">
                        {{$slider->name}}
                     </h2>
                     <!--<h2 class="sub-title animated" data-animation-in="fadeInRight" data-delay-in="2">-->
                     <!--   Accessories Kenya-->
                     <!--</h2>-->
                     <p style="max-width:500px"  class="animated" data-animation-in="fadeInDown" data-delay-in="3">
                        {{$slider->meta}}
                     </p>
                  <a href="{{url('/')}}/cart/addCart/{{$slider->id}}" class="btn btn-primary rounded animated mt-5rem"
                        data-animation-in="zoomIn" data-delay-in="4">Buy now</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
       @endforeach
       <!-- slider-item end -->
     
    </div>
    <!-- slick-progress -->
    <div class="slick-progress">
       <span></span>
    </div>
    <!-- slick-progress end-->
 </section>
 <!-- main slider end -->
 <!-- staic media start -->
 <section class="static-media-section py-6rem bg-white">
    <div class="container">
       <div class="static-media-wrap">
          <div class="row">
             <div class="col-lg-3 col-sm-6 py-3">
                <div class="media static-media2">
                   <img class="align-self-center mr-3" src="{{asset('theme/assets/img/icon/2.png')}}" alt="icon">
                   <div class="media-body">
                      <h4 class="title text-capitalize text-dark">Free Shipping</h4>
                      <p class="text">On all orders within CBD</p>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-sm-6 py-3">
                <div class="media static-media2">
                   <img class="align-self-center mr-3" src="{{asset('theme/assets/img/icon/3.png')}}" alt="icon">
                   <div class="media-body">
                      <h4 class="title text-capitalize text-dark">Free Returns</h4>
                      <p class="text">Returns are free within 9 days</p>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-sm-6 py-3">
                <div class="media static-media2">
                   <img class="align-self-center mr-3" src="{{asset('theme/assets/img/icon/4.png')}}" alt="icon">
                   <div class="media-body">
                      <h4 class="title text-capitalize text-dark">100% Secure Payment</h4>
                      <p class="text">Your payment are safe with us.</p>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-sm-6 py-3">
                <div class="media static-media2">
                   <img class="align-self-center mr-3" src="{{asset('theme/assets/img/icon/5.png')}}" alt="icon">
                   <div class="media-body">
                      <h4 class="title text-capitalize text-dark">Support 24/7</h4>
                      <p class="text">Contact us 24 hours a day</p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- staic media end -->

 <!-- common banner  end -->
 <!-- product tab start -->
 <section class="product-tab bg-white pb-6rem">
    <div class="container">
       <div class="product-tab-nav border-bottom cbb1 mb-3rem">
          <div class="row align-items-end">
             <div class="col-sm-10 col-md-9 col-lg-5 col-xl-5">
                <div class="section-title pb-4 pb-md-4 position-relative">
                   <h2 class="title">New Arrivals</h2>
                   <p class="text">Offers valid for a limited time</p>
                </div>
             </div>
             <div class="col-sm-3 col-md-3 col-lg-7 col-xl-6">
                <nav class="product-tab-menu style pb-4 pb-md-4 text-right">
                   <div class="dropdown tab-dropdown text-right text-md-left pl-xl-4">
                      <button class="tab-dropdown-btn dropdown-toggle d-lg-none" type="button" id="mobile-tab"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      </button>
                      <div class="dropdown-menu tab-dropdown-menu" aria-labelledby="mobile-tab">
                         
                      </div>
                   </div>
                </nav>
             </div>
          </div>
       </div>
       <!-- product-tab-nav end -->
       <div class="row">
          <div class="col-12">
             <div class="tab-content" id="pills-tabContent">
               <?php $LatestProduct1 = DB::table('product')->orderBy('id','DESC')->limit(10)->get();  ?>
                <!-- first tab-pane -->
                <div class="tab-pane fade show active" id="pills-1" role="tabpanel"
                   aria-labelledby="#pills_1-tab">
                   <div class="product-slider-init style">
                      @foreach ($LatestProduct1 as $product1)
                      <div class="slider-item">
                        <div class="single-product position-relative">
                           @if($product1->conditions == 'New')
                           <span class="badge badge-success cb3">{{$product1->conditions}}</span>
                           @elseif($product1->conditions == 'Used') 
                              <span class="badge badge-warning cb3">{{$product1->conditions}}</span>
                           @else 
                              <span class="badge badge-primary cb3">{{$product1->conditions}}</span>
                           @endif
                           <div class="product-thumbnail position-relative">
                           <a href="{{url('/')}}/product/{{$product1->slung}}">
                                 <img class="first-img" src="{{url('/')}}/uploads/product/{{$product1->image_one}}" alt="{{$product1->name}}">
                                 <img class="second-img" src="{{url('/')}}/uploads/product/{{$product1->image_two}}" alt="{{$product1->name}}">
                              </a>
                              <!-- product links -->
                              <ul class="product-links d-flex justify-content-center">
                                 {{-- <li>
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
                                 </li> --}}
                                 <li>
                                    <a id="getProduct" href="#" data-toggle="modal" data-target="#quick-view" data-url="{{ route('dynamicModal',['id'=>$product1->id])}}">
                                       <span data-toggle="tooltip" data-placement="bottom" title="Quick view">
                                          <i class="ion-ios-search-strong"></i>
                                       </span>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <div class="product-desc pt-2rem position-relative text-center">
                           <h3 class="title"><a href="{{url('/')}}/product/{{$product1->slung}}">{{$product1->name}}
                                    </a></h3>
                              {{-- <div class="star-rating">
                                 <span class="ion-ios-star"></span>
                                 <span class="ion-ios-star"></span>
                                 <span class="ion-ios-star"></span>
                                 <span class="ion-ios-star"></span>
                                 <span class="ion-ios-star"></span>
                              </div> --}}
                              {{-- <h6 class="product-price">KES {{$product1->price}}</h6> --}}
                              {{--  --}}
                              @if($product1->offer == 1)
                              <h6 class="product-price"><del>KSH {{$product1->price_raw}}</del> <span class="text-danger ml-1">KSH {{$product1->price}}</span></h6>
                              {{-- <h6 class="product-price">KES {{$featured->price}}</h6> --}}
                              @else 
                              <h6 class="product-price"> <span class="text-danger ml-1">KSH {{$product1->price}}</span></h6>
                              @endif
                              {{--  --}}
                              <button id="getCart" class="pro-btn" data-toggle="modal" data-target="#add-to-cart" data-url="{{ route('dynamicCartModal',['id'=>$product1->id])}}">add to cart <i
                                    class="ion-bag"></i></button>
                           </div>
                        </div>
                     </div>
                      @endforeach
                      <!-- slider-item end -->
                   </div>
                </div>
               
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- product tab end -->
 <!-- Category Start -->
 <section class="galary-section bg-white pb-6rem">
    <div class="container">
       <div class="row">
          <div class="col-12">
             <div class="galary-init style1">
              
                <!-- slider-item end -->
                <div class="slider-item">
                   <?php $Category = DB::table('category')->where('id','1')->get(); ?>
                   @foreach ($Category as $item)
                   <div class="slider-list mb-3rem">
                    <div class="media style bg-lighten p-15 align-items-center">
                       <a href="{{url('/')}}/products/{{$item->slung}}" class="galary-thumb align-self-center mr-2rem"><img src="{{url('/')}}/uploads/categories/{{$item->image}}" alt="img"></a>
                       <div class="media-body">
                          <h3 class="title">
                             <a href="{{url('/')}}/products/{{$item->slung}}">{{$item->cat}}</a>
                          </h3>
                          <h6 class="sub-title"><?php $Product = DB::table('product')->where('cat',$item->id)->get(); echo count($Product) ?>Products </h6>
                        <a href="{{url('/')}}/products/{{$item->slung}}" class="view-more"> Shop Now <i
                                class="ion-android-arrow-dropright-circle"></i></a>
                       </div>
                    </div>
                 </div> 
                   @endforeach

                   <?php $Category = DB::table('category')->where('id','2')->get(); ?>
                   @foreach ($Category as $item)
                   <div class="slider-list">
                    <div class="media style bg-lighten p-15 align-items-center">
                       <a href="{{url('/')}}/products/{{$item->slung}}" class="galary-thumb align-self-center mr-2rem"><img src="{{url('/')}}/uploads/categories/{{$item->image}}" alt="img"></a>
                       <div class="media-body">
                          <h3 class="title">
                             <a href="{{url('/')}}/products/{{$item->slung}}">{{$item->cat}}</a>
                          </h3>
                          <h6 class="sub-title"><?php $Product = DB::table('product')->where('cat',$item->id)->get(); echo count($Product) ?>Products</h6>
                        <a href="{{url('/')}}/products/{{$item->slung}}" class="view-more"> Shop Now <i
                                class="ion-android-arrow-dropright-circle"></i></a>
                       </div>
                    </div>
                 </div> 
                   @endforeach
          
                   <!-- slider-list end -->
                </div>
                {{--  --}}
                 <!-- slider-item end -->
                 <div class="slider-item">
                     <?php $Category = DB::table('category')->where('id','3')->get(); ?>
                     @foreach ($Category as $item)
                     <div class="slider-list mb-3rem">
                        <div class="media style bg-lighten p-15 align-items-center">
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="galary-thumb align-self-center mr-2rem"><img src="{{url('/')}}/uploads/categories/{{$item->image}}" alt="img"></a>
                           <div class="media-body">
                              <h3 class="title">
                                 <a href="{{url('/')}}/products/{{$item->slung}}">{{$item->cat}}</a>
                              </h3>
                              <h6 class="sub-title"><?php $Product = DB::table('product')->where('cat',$item->id)->get(); echo count($Product) ?>Products </h6>
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="view-more"> Shop Now <i
                                    class="ion-android-arrow-dropright-circle"></i></a>
                           </div>
                        </div>
                     </div> 
                     @endforeach

                     <?php $Category = DB::table('category')->where('id','4')->get(); ?>
                     @foreach ($Category as $item)
                     <div class="slider-list">
                        <div class="media style bg-lighten p-15 align-items-center">
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="galary-thumb align-self-center mr-2rem"><img src="{{url('/')}}/uploads/categories/{{$item->image}}" alt="img"></a>
                           <div class="media-body">
                              <h3 class="title">
                                 <a href="{{url('/')}}/products/{{$item->slung}}">{{$item->cat}}</a>
                              </h3>
                              <h6 class="sub-title"><?php $Product = DB::table('product')->where('cat',$item->id)->get(); echo count($Product) ?>Products</h6>
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="view-more"> Shop Now <i
                                    class="ion-android-arrow-dropright-circle"></i></a>
                           </div>
                        </div>
                     </div> 
                     @endforeach
            
                     <!-- slider-list end -->
                 </div>

                  <!-- slider-item end -->
                  <div class="slider-item">
                     <?php $Category = DB::table('category')->where('id','5')->get(); ?>
                     @foreach ($Category as $item)
                     <div class="slider-list mb-3rem">
                        <div class="media style bg-lighten p-15 align-items-center">
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="galary-thumb align-self-center mr-2rem"><img src="{{url('/')}}/uploads/categories/{{$item->image}}" alt="img"></a>
                           <div class="media-body">
                              <h3 class="title">
                                 <a href="{{url('/')}}/products/{{$item->slung}}">{{$item->cat}}</a>
                              </h3>
                              <h6 class="sub-title"><?php $Product = DB::table('product')->where('cat',$item->id)->get(); echo count($Product) ?>Products </h6>
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="view-more"> Shop Now <i
                                    class="ion-android-arrow-dropright-circle"></i></a>
                           </div>
                        </div>
                     </div> 
                     @endforeach

                     <?php $Category = DB::table('category')->where('id','6')->get(); ?>
                     @foreach ($Category as $item)
                     <div class="slider-list">
                        <div class="media style bg-lighten p-15 align-items-center">
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="galary-thumb align-self-center mr-2rem"><img src="{{url('/')}}/uploads/categories/{{$item->image}}" alt="img"></a>
                           <div class="media-body">
                              <h3 class="title">
                                 <a href="{{url('/')}}/products/{{$item->slung}}">{{$item->cat}}</a>
                              </h3>
                              <h6 class="sub-title"><?php $Product = DB::table('product')->where('cat',$item->id)->get(); echo count($Product) ?>Products</h6>
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="view-more"> Shop Now <i
                                    class="ion-android-arrow-dropright-circle"></i></a>
                           </div>
                        </div>
                     </div> 
                     @endforeach
            
                     <!-- slider-list end -->
                 </div>

                  <!-- slider-item end -->
                  <div class="slider-item">
                     <?php $Category = DB::table('category')->where('id','7')->get(); ?>
                     @foreach ($Category as $item)
                     <div class="slider-list mb-3rem">
                        <div class="media style bg-lighten p-15 align-items-center">
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="galary-thumb align-self-center mr-2rem"><img src="{{url('/')}}/uploads/categories/{{$item->image}}" alt="img"></a>
                           <div class="media-body">
                              <h3 class="title">
                                 <a href="{{url('/')}}/products/{{$item->slung}}">{{$item->cat}}</a>
                              </h3>
                              <h6 class="sub-title"><?php $Product = DB::table('product')->where('cat',$item->id)->get(); echo count($Product) ?>Products </h6>
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="view-more"> Shop Now <i
                                    class="ion-android-arrow-dropright-circle"></i></a>
                           </div>
                        </div>
                     </div> 
                     @endforeach

                     <?php $Category = DB::table('category')->where('id','8')->get(); ?>
                     @foreach ($Category as $item)
                     <div class="slider-list">
                        <div class="media style bg-lighten p-15 align-items-center">
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="galary-thumb align-self-center mr-2rem"><img src="{{url('/')}}/uploads/categories/{{$item->image}}" alt="img"></a>
                           <div class="media-body">
                              <h3 class="title">
                                 <a href="{{url('/')}}/products/{{$item->slung}}">{{$item->cat}}</a>
                              </h3>
                              <h6 class="sub-title"><?php $Product = DB::table('product')->where('cat',$item->id)->get(); echo count($Product) ?>Products</h6>
                           <a href="{{url('/')}}/products/{{$item->slung}}" class="view-more"> Shop Now <i
                                    class="ion-android-arrow-dropright-circle"></i></a>
                           </div>
                        </div>
                     </div> 
                     @endforeach
            
                     <!-- slider-list end -->
                 </div>

                
               
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- galary sention end -->
  <!-- product tab start -->
  <section class="product-tab bg-white pb-6rem">
   <div class="container">
      <div class="product-tab-nav border-bottom cbb1 mb-3rem">
         <div class="row align-items-end">
            <div class="col-sm-10 col-md-9 col-lg-5 col-xl-5">
               <div class="section-title pb-4 pb-md-4 position-relative">
                  <h2 class="title">Featured Products</h2>
                  <p class="text">Offers valid while stocks last</p>
               </div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-7 col-xl-6">
               <nav class="product-tab-menu style pb-4 pb-md-4 text-right">
                  <div class="dropdown tab-dropdown text-right text-md-left pl-xl-4">
                     <button class="tab-dropdown-btn dropdown-toggle d-lg-none" type="button" id="mobile-tab"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     </button>
                     <div class="dropdown-menu tab-dropdown-menu" aria-labelledby="mobile-tab">
                        
                     </div>
                  </div>
               </nav>
            </div>
         </div>
      </div>
      <!-- product-tab-nav end -->
      <div class="row">
         <div class="col-12">
            <div class="tab-content" id="pills-tabContent">
              <?php $LatestProduct1 = DB::table('product')->where('featured','1')->orderBy('id','DESC')->limit(20)->get();  ?>
               <!-- first tab-pane -->
               <div class="tab-pane fade show active" id="pills-1" role="tabpanel"
                  aria-labelledby="#pills_1-tab">
                  <div class="product-slider-init style">
                     @foreach ($LatestProduct1 as $product1)
                     <div class="slider-item">
                       <div class="single-product position-relative">
                          @if($product1->conditions == 'New')
                          <span class="badge badge-success cb3">{{$product1->conditions}}</span>
                          @elseif($product1->conditions == 'Used') 
                             <span class="badge badge-warning cb3">{{$product1->conditions}}</span>
                          @else 
                             <span class="badge badge-primary cb3">{{$product1->conditions}}</span>
                          @endif
                          <div class="product-thumbnail position-relative">
                          <a href="{{url('/')}}/product/{{$product1->slung}}">
                                <img class="first-img" src="{{url('/')}}/uploads/product/{{$product1->image_one}}" alt="{{$product1->name}}">
                                <img class="second-img" src="{{url('/')}}/uploads/product/{{$product1->image_two}}" alt="{{$product1->name}}">
                             </a>
                             <!-- product links -->
                             <ul class="product-links d-flex justify-content-center">
                                {{-- <li>
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
                                </li> --}}
                                <li>
                                   <a id="getProduct" href="#" data-toggle="modal" data-target="#quick-view" data-url="{{ route('dynamicModal',['id'=>$product1->id])}}">
                                      <span data-toggle="tooltip" data-placement="bottom" title="Quick view">
                                         <i class="ion-ios-search-strong"></i>
                                      </span>
                                   </a>
                                </li>
                             </ul>
                          </div>
                          <div class="product-desc pt-2rem position-relative text-center">
                          <h3 class="title"><a href="{{url('/')}}/product/{{$product1->slung}}">{{$product1->name}}
                                   </a></h3>
                             {{-- <div class="star-rating">
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                                <span class="ion-ios-star"></span>
                             </div> --}}
                             {{-- <h6 class="product-price">KES {{$product1->price}}</h6> --}}
                             {{--  --}}
                             @if($product1->offer == 1)
                             <h6 class="product-price"><del>KSH {{$product1->price_raw}}</del> <span class="text-danger ml-1">KSH {{$product1->price}}</span></h6>
                             {{-- <h6 class="product-price">KES {{$featured->price}}</h6> --}}
                             @else 
                             <h6 class="product-price"> <span class="text-danger ml-1">KSH {{$product1->price}}</span></h6>
                             @endif
                             {{--  --}}
                             <button id="getCart" class="pro-btn" data-toggle="modal" data-target="#add-to-cart" data-url="{{ route('dynamicCartModal',['id'=>$product1->id])}}">add to cart <i
                                   class="ion-bag"></i></button>
                          </div>
                       </div>
                    </div>
                     @endforeach
                     <!-- slider-item end -->
                  </div>
               </div>
              
            </div>
         </div>
      </div>
   </div>
</section>
<!-- product tab end -->
<?php $Category = DB::table('category')->limit(12)->get(); ?>
@foreach ($Category as $cat)
    
<?php $Featured = DB::table('product')->where('cat',$cat->id)->inRandomOrder()->orderBy('id','ASC')->limit(12)->get(); $counter = count($Featured); ?>
 
@if($counter < 4)

@else
 <!-- product tab repetation start -->
 <section class="product-tab bg-white pb-6rem">
    <div class="container">
       <div class="product-tab-nav border-bottom cbb1 mb-3rem">
          <div class="row">
             <div class="col-12">
                <div class="section-title pb-4 pb-md-4 position-relative">
                  <a style="float: right;" href="{{url('/')}}/products/{{$cat->slung}}" class="btn btn-primary rounded animated">View All</a>
                   <h2 class="title">{{$cat->cat}}</h2>
                   <p class="text">Accessories Kenya HandPicked Products in {{$cat->cat}}</p>
                 
                </div>
             </div>
          </div>
       </div>
       <!-- product-tab-nav end -->
         <!-- product-tab-nav end -->
         <div class="tab-content" id="pills-tabContent">
            <!-- first tab-pane -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    
                    @foreach ($Featured as $featured)
                    <div class="col-6 col-sm-6 col-md-2 mb-5 grid-list">
                     <div class="single-product position-relative">
                        @if($featured->conditions == 'New')
                        <span class="badge badge-success cb3">{{$featured->conditions}}</span>
                        @elseif($featured->conditions == 'Used') 
                           <span class="badge badge-warning cb3">{{$featured->conditions}}</span>
                        @else 
                           <span class="badge badge-primary cb3">{{$featured->conditions}}</span>
                        @endif
                         <div class="product-thumbnail position-relative">
                             <a href="{{url('/')}}/product/{{$featured->slung}}">
                                 <img class="first-img" src="{{url('/')}}/uploads/product/{{$featured->image_one}}" alt="{{$featured->name}}">
                                 
                                 <img class="second-img" src="{{url('/')}}/uploads/product/{{$featured->image_two}}" alt="{{$featured->name}}">
                             </a>
                             <!-- product links -->
                             <ul class="product-links d-flex justify-content-center">
                                 {{-- <li>
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
                                 </li> --}}
                                 <li>
                                    <a id="getProduct" href="#" data-toggle="modal" data-target="#quick-view" data-url="{{ route('dynamicModal',['id'=>$featured->id])}}">
                                       <span data-toggle="tooltip" data-placement="bottom" title="Quick view">
                                          <i class="ion-ios-search-strong"></i>
                                       </span>
                                    </a>
                                 </li>
                             </ul>
                         </div>
                         <div class="product-desc pt-2rem position-relative text-center">
                         <h3 class="title"><a href="{{url('/')}}/product/{{$featured->slung}}">{{$featured->name}}</a></h3>
                             {{-- <div class="star-rating">
                                 <span class="ion-ios-star"></span>
                                 <span class="ion-ios-star"></span>
                                 <span class="ion-ios-star"></span>
                                 <span class="ion-ios-star"></span>
                                 <span class="ion-ios-star"></span>
                             </div> --}}
                           @if($featured->offer == 1)
                           <h6 class="product-price"><del>KSH {{$featured->price_raw}}</del> <span class="text-danger ml-1">KSH {{$featured->price}}</span></h6>
                           {{-- <h6 class="product-price">KES {{$featured->price}}</h6> --}}
                           @else 
                           <h6 class="product-price"> <span class="text-danger ml-1">KSH {{$featured->price}}</span></h6>
                           @endif
                           <button id="getCart" class="pro-btn" data-toggle="modal" data-target="#add-to-cart" data-url="{{ route('dynamicCartModal',['id'=>$featured->id])}}">add to cart <i
                              class="ion-bag"></i></button>
                         </div>
                     </div>
                    </div> 
                    @endforeach
                    
                </div>
                
            </div>
           
            </div>
         </div>
 </section>
 <!-- product tab repetation end -->
 @endif
 @endforeach
 <!-- common banner  start -->
 <div class="common-banner pb-5 mb-3 bg-white">
    <div class="container">
       <div class="row">
          <div class="col-md-4 mb-5">
             <div class="banner-thumb common-bthumb1">
                <a href="{{url('/')}}" class="zoom-in d-block overflow-hidden">
                   <img src="{{asset('theme/assets/img/banner/4.jpg')}}" alt="banner-thumb-naile">
                </a>
             </div>
          </div>
          <div class="col-md-4 mb-5">
             <div class="banner-thumb common-bthumb1">
                <a href="{{url('/')}}" class="zoom-in d-block overflow-hidden">
                   <img src="{{asset('theme/assets/img/banner/5.jpg')}}" alt="banner-thumb-naile">
                </a>
             </div>
          </div>
          <div class="col-md-4 mb-5">
             <div class="banner-thumb common-bthumb1">
                <a href="{{url('/')}}" class="zoom-in d-block overflow-hidden">
                   <img src="{{asset('theme/assets/img/banner/6.jpg')}}" alt="banner-thumb-naile">
                </a>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- common banner  end -->
 <!-- product category slider start  -->
 <section class="product-category mt-2 bg-white">
    <div class="container">
       <div class="row">
          <?php $SlideCategory = DB::table('category')->inRandomOrder()->limit(3)->get(); ?>
          @foreach ($SlideCategory as $slidercategory)
            <div class="col-12 col-lg-4 mb-6rem">
               <div class="product-tab-nav border-bottom cbb1 mb-3rem">
                  <div class="section-title pb-4 pb-md-4 position-relative">
                  <h2 class="title">{{$slidercategory->cat}}</h2>
                  </div>
               </div>
               <div class="product-ctry-init style">
                  
                  <div class="slider-item">
                     <?php $product = DB::table('product')->where('cat',$slidercategory->id)->limit(3)->orderBy('id','ASC')->get(); ?>
                     @foreach ($product as $pro)
                     <div class="media style2 category-list">
                        <a href="{{url('/product')}}/{{$pro->slung}}" class="category-thumb position-relative mr-4">
                           <img class="first-img img-smaller" src="{{url('/')}}/uploads/product/{{$pro->image_one}}" alt="{{$pro->name}}">
                           <img class="second-img img-smaller" src="{{url('/')}}/uploads/product/{{$pro->image_two}}" alt="{{$pro->name}}">
                        </a>
                        <div class="media-body pt-3">
                           <h3 class="title">
                           <a href="{{url('/product')}}/{{$pro->slung}}">{{$pro->name}}</a>
                           </h3>
                           <h6 class="sub-title">KES {{$pro->price}}</h6>
                        </div>
                     </div>
                     <!-- category-list end -->
                     @endforeach
                  </div>
                  <!-- slider-item end -->
                  <div class="slider-item">
                     <?php $product = DB::table('product')->where('cat',$slidercategory->id)->limit(3)->orderBy('id','DESC')->get(); ?>
                     @foreach ($product as $pro)
                     <div class="media style2 category-list">
                        <a href="{{url('/product')}}/{{$pro->slung}}" class="category-thumb position-relative mr-4">
                           <img class="first-img img-smaller" src="{{url('/')}}/uploads/product/{{$pro->image_one}}" alt="{{$pro->name}}">
                           <img class="second-img img-smaller" src="{{url('/')}}/uploads/product/{{$pro->image_two}}" alt="{{$pro->name}}">
                        </a>
                        <div class="media-body pt-3">
                           <h3 class="title">
                           <a href="{{url('/product')}}/{{$pro->slung}}">{{$pro->name}}</a>
                           </h3>
                           <h6 class="sub-title">KES {{$pro->price}}</h6>
                        </div>
                     </div>
                     <!-- category-list end -->
                     @endforeach
                  </div>
                  <!-- slider-item end -->
                  <div class="slider-item">
                     <?php $product = DB::table('product')->where('cat',$slidercategory->id)->limit(3)->inRandomOrder()->get(); ?>
                     @foreach ($product as $pro)
                     <div class="media style2 category-list">
                        <a href="{{url('/product')}}/{{$pro->slung}}" class="category-thumb position-relative mr-4">
                           <img class="first-img img-smaller" src="{{url('/')}}/uploads/product/{{$pro->image_one}}" alt="{{$pro->name}}">
                           <img class="second-img img-smaller" src="{{url('/')}}/uploads/product/{{$pro->image_two}}" alt="{{$pro->name}}">
                        </a>
                        <div class="media-body pt-3">
                           <h3 class="title">
                           <a href="{{url('/product')}}/{{$pro->slung}}">{{$pro->name}}</a>
                           </h3>
                           <h6 class="sub-title">KES {{$pro->price}}</h6>
                        </div>
                     </div>
                     <!-- category-list end -->
                     @endforeach
                  </div>
                  <!-- slider-item end -->
               </div>
            </div>
          @endforeach
         
      
       </div>
    </div>
 </section>
 <!-- product category slider end  -->
 <!-- brand slider start -->
 <?php $Brand = DB::table('brands')->get(); ?>
 <div class="brand-slider-section pb-6rem bg-white">
    <div class="container">
       <div class="row">
          <div class="col-12">
             <div class="brand-init style1">
                @foreach ($Brand as $item)
                  <div class="slider-item">
                     <div class="single-brand">
                        <a href="{{url('/')}}" class="brand-thumb">
                        <img src="{{url('/')}}/uploads/brands/{{$item->image}}" alt="{{$item->name}}">
                        </a>
                     </div>
                  </div> 
                @endforeach
               
              
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- brand slider end -->
 <!-- news letter section start -->
 <section class="news-letter-section bg-primary pt-3rem pb-2rem">
    <div class="container">
       <div class="row align-items-center justify-content-between">
          <div class="col-12 col-md-6 col-lg-auto mb-3">
             <div class="nletter-title">
                <h2 class="title">Sign Up For Our Products Update</h2>
                <p class="text">Be the First to Know. Sign up for our catalogues today !</p>
             </div>
          </div>
          <div class="col-12 col-md-6 col-lg-auto mb-3">
             <div class="nletter-form">
                <form class="form-inline position-relative"
                   action="#"
                   target="_blank" method="post">
                   <input class="form-control" type="text" placeholder="Your email address">
                   <button class="btn btn-dark nletter-btn" type="submit">Sign up</button>
                </form>
             </div>
          </div>
          <div class="col-12 col-md-6 col-lg-auto mb-3">
             <div class="social-network">
                <ul class="d-flex">
                   <li><a href="{{$Settings->facebook}}" target="_blank"><span
                            class="ion-social-facebook"></span></a></li>
                   <li><a href="{{$Settings->twitter}}" target="_blank"><span class="ion-social-twitter"></span></a>
                   </li>
                   <li><a href="{{$Settings->youtube}}" target="_blank"><span class="ion-social-youtube"></span></a>
                   </li>
                   {{-- <li><a href="https://plus.google.com/" target="_blank"><span class="ion-social-google"></span></a>
                   </li> --}}
                   <li class="mr-0"><a href="{{$Settings->instagram}}" target="_blank"><span
                            class="ion-social-instagram"></span></a></li>
                </ul>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- news letter section end -->
 @endforeach
@endsection