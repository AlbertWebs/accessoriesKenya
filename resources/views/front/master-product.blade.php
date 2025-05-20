<!DOCTYPE html>
<html lang="en">
<?php $SiteSettings = DB::table('sitesettings')->get();?>

@foreach($SiteSettings as $Settings)
 
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta http-equiv="X-UA-Compatible" content="ie=edge" />
   {{-- <meta name="keywords" content="{{$keywords}}"/> --}}
   {!! SEOMeta::generate() !!}
   <?php $ProductCount = 1; ?>
   @foreach($Products as $Product)
   <meta property="og:description" content="{{$Product->name}}">
   <meta property="og:image" content="{{url('/')}}/uploads/product/{{$Product->image_one}}" />
   <meta property="fb:app_id" content="350937289315471" />
    
   @if ($ProductCount == 1)
    @break
   @endif
   <?php $ProductCount = $ProductCount+1; echo $ProductCount; ?>
   @endforeach
   {!! OpenGraph::generate() !!}
   {!! Twitter::generate() !!}
   <meta name="twitter:card" content="summary_large_image" />
   <meta name="twitter:creator" content="@accessories254" />
   <!-- Favicon -->
   <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/uploads/logo/{{$Settings->favicon}}" />
   <style>
     .waitload{
        padding:50px;
        text-align:center;
        margin: 0 auto;
     }
     .waitload h3{
        text-align:center;
        margin:0px auto;
     }
   </style>
{{-- 
   <!--**********************************
        all css files
    *************************************-->

   <!--***************************************************
       fontawesome,bootstrap,plugins and main style css
     ***************************************************-->

   <!-- <link rel="stylesheet" href="assets/css/all.min.css" />
   <link rel="stylesheet" href="assets/css/ionicons.min.css" />
   <link rel="stylesheet" href="assets/css/simple-line-icons.css" />
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
   <link rel="stylesheet" href="assets/css/plugins.css" />
   <link rel="stylesheet" href="assets/css/style.css" /> -->

   <!-- Use the minified version files listed below for better performance and remove the files listed above -->

   <!--****************************
         Minified  css
    ****************************-->

   <!--***********************************************
       vendor min css,plugins min css,style min css
     ***********************************************--> --}}

   <link rel="stylesheet" href="{{asset('theme/assets/css/vendor/vendor.min.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/assets/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('theme/assets/css/style.min.css')}}" />
    {{--  --}}
<!--Start of Tawk.to Script-->
<script type="text/javascript">
   var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
   (function(){
   var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
   s1.async=true;
   s1.src='https://embed.tawk.to/5f84604e4704467e89f6baff/default';
   s1.charset='UTF-8';
   s1.setAttribute('crossorigin','*');
   s0.parentNode.insertBefore(s1,s0);
   })();
   </script>
   <!--End of Tawk.to Script-->
    {{--  --}}

    {{--  --}}
   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180748735-1"></script>
   <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'UA-180748735-1');
   </script>

    {{--  --}}

</head>

<body>
   <!-- offcanvas-overlay start -->
   <div class="offcanvas-overlay"></div>
   <!-- offcanvas-overlay end -->
   <!-- offcanvas-mobile-menu start -->
   <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
      <div class="border-bottom mb-4 pb-4 text-right">
         <button class="offcanvas-close">×</button>
      </div>

      <div class="offcanvas-head mb-4 pb-2">
         <div class="static-info py-3 px-2 text-center">
            <p class="text-dark">{{$Settings->location}}</p>
         </div>
      </div>
      <nav class="offcanvas-menu">
         <ul>
            <li><a href="#"><span class="menu-text">Home</span></a></li>
            <?php $AllCategories = DB::table('category')->limit(4)->get(); ?>
            @foreach ($AllCategories as $category)
              <li><a href="{{url('/')}}/products/{{$category->slung}}"><span class="menu-text">{{$category->cat}}</span></a></li> 
            @endforeach        
            
         </ul>
      </nav>
      <div class="offcanvas-social mt-30">
         <ul>
            <li>
               <a href="{{$Settings->facebook}}"><i class="icon-social-facebook"></i></a>
            </li>
            <li>
               <a href="{{$Settings->twitter}}"><i class="icon-social-twitter"></i></a>
            </li>
            <li>
               <a href="{{$Settings->instagram}}"><i class="icon-social-instagram"></i></a>
            </li>
            
            <li>
               <a href="{{$Settings->instagram}}"><i class="icon-social-instagram"></i></a>
            </li>
         </ul>
      </div>
   </div>
   <!-- offcanvas-mobile-menu end -->
   <!-- header start -->
   <header>


      <!-- header top start -->
      <div class="header-top border-bottom ht-nav-br-bottom bg-light py-10 d-none d-lg-block">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-6">
                  <div class="static-info">
                     <p class="text-dark"><i class="fa fa-map-marker"></i>  {{$Settings->location}}</p>
                  </div>
               </div>
               <div class="col-lg-6">
                  <nav class="header-top-nav">
                     <ul class="d-flex justify-content-end align-items-center">
                        @if(Auth::user())
                        <li>
                           <a href="#" id="dropdown1" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false">{{Auth::user()->name}} <i class="ion ion-ios-arrow-down"></i></a>
                           <span class="separator">|</span>
                           <ul class="topnav-submenu dropdown-menu" aria-labelledby="dropdown1">
                              <li><a href="{{url('/clientarea')}}">My account</a></li>
                              <li><a href="{{url('/cart')}}/checkout">Checkout</a></li>
                              <li><a href="{{url('/clientarea')}}/logout">Sign out</a></li>
                           </ul>
                        </li>
                        @else 
                        <li>
                           <a href="{{url('/clientarea')}}">My Account</a>
                           <span class="separator">|</span>
                        </li>
                        @endif
                        <li>
                           <a href="{{url('/about-us')}}">About Us </a>
                           <span class="separator">|</span>
                          
                        </li>
                        <li>
                           <a href="{{url('/contact-us')}}"><i class="fa fa-map-marker"></i> &nbsp; Find Us On Map </a>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <!-- header top end -->
      <!-- header-middle satrt -->
      <div class="header-middle py-3rem">
         <div class="container">
            <div class="row align-items-center d-lg-none">
               <div class="col-4">
                  <nav class="header-top-nav d-flex align-items-center">
                     <ul>
                        <li class="mr-4"> <a href="#" id="dropdown4" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false"><i class="ion-ios-contact"></i></a>
                           <ul class="topnav-submenu dropdown-menu" aria-labelledby="dropdown4">
                              <li><a href="{{url('/clientarea')}}">My account</a></li>
                              <li><a href="{{url('/cart')}}/checkout">Checkout</a></li>
                              <li><a href="{{url('/clientarea')}}/logout">Sign out</a></li>
                           </ul>
                        </li>
                     </ul>
                     <?php
                        $CartItems = Cart::content();
                     ?>
                     <div class="cart-block position-relative" id="cartDivs">
                        <a href="javascript: void(0)">
                           <span class="position-relative">
                              <i class="ion-bag"></i>
                              <span class="badge badge-light cb1">{{ Cart::count()}}</span>
                           </span>
                        </a>
                        <div class="small-cart">
                           @foreach ($CartItems as $CartItem)
                           <?php  $ProductsForCart = DB::table('product')->where('id', $CartItem->id)->get(); ?>
                              @foreach ($ProductsForCart as $product)
                              <div class="small-cart-item">
                                 <div class="single-item">
                                    <div class="image">
                                    <a href="{{url('/product')}}/{{$product->slung}}">
                                    <img src="{{url('/')}}/uploads/product/{{$product->image_one}}" class="img-fluid" alt="Accessories Kenya">
                                       </a>
                                       <span class="badge badge-primary cb2">{{$CartItem->qty}}x</span>
                                    </div>
                                    <div class="cart-content">
                                       <p class="cart-name"><a href="{{url('/product')}}/{{$product->slung}}">{{$product->name}}</a>
                                       </p>
                                    <p class="cart-quantity">KES {{$product->price}}</p>
                                       <p class="cart-color">Category: <span><?php $ProCat = DB::table('category')->where('id',$product->cat)->get(); ?>  @foreach ($ProCat as $ProCat) {{$ProCat->cat}} @endforeach</span></p>
                                    </div>
                                 <a onClick="return confirm('Remove {{$product->name}} from your cart')" href="{{url('/')}}/cart/destroy/{{$CartItem->rowId}}" class="remove-icon"><i class="ion-close-round"></i></a>
                                 </div>
                              </div>
                              @endforeach
                           @endforeach
                           
                           <div class="cart-table">
                              <table class="table m-0">
                                 <tbody>
                                    <tr>
                                       <td class="text-left">Subtotal:</td>
                                       <td class="text-right"><span>KES {{ Cart::subtotal() }}</span></td>
                                    </tr>
                                    <tr>
                                       <td class="text-left">Shipping:</td>
                                       <td class="text-right"><span>400.00</span></td>
                                    </tr>
                                   
                                    <tr>
                                       <td class="text-left">Total:</td>
                                       <td class="text-right"><span>{{ Cart::total() }}</span></td>
                                    </tr>
                                 </tbody>
                              </table>
                              <div class="cart-buttons pt-5">
                                 <a href="{{url('/cart/checkout')}}" class="btn btn-primary btn-block rounded">Checkout</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <div class="col-4 text-center">
                  <div class="logo mt-3 mb-2rem">
                  <a href="{{url('/')}}"><img style="max-width:120px" src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt="Accessories Kenya Logo"></a>
                  </div>
               </div>
               <!-- mobile-menu-toggle start -->
               <div class="col-4 text-right">
                  <div class="mobile-menu-toggle">
                     <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                        <svg viewBox="0 0 800 600">
                           <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                              id="top"></path>
                           <path d="M300,320 L540,320" id="middle"></path>
                           <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                              id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                        </svg>
                     </a>
                  </div>
               </div>
               <!-- mobile-menu-toggle end -->
            </div>
            <div class="row align-items-center">
               <div class="col-lg-3 d-none d-lg-block">
                  <div class="logo" style="margin-0px;">
                     <a href="{{url('/')}}"><img style="max-width:180px" src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt="Accessories Kenya Logo"></a>
                  </div>
               </div>
               <div class="col-lg-9">
                  <div
                     class="search-form-wrapper mb-2rem mb-lg-0 pl-lg-5 d-flex align-items-center justify-content-between">
                     <div class="search-form search-form-res">
                        <form action="{{url('/searchsite')}}" method="POST" class="form-inline position-relative">
                           {{csrf_field()}}
                           <input class="form-control border-blue" name="search" type="search"
                              placeholder="Search Product, Category or Brand">
                           <button class="btn bg-primary search-btn" type="submit"><i
                                 class="ion-ios-search-strong"></i></button>
                           <div style="display: none" class="search-form-select">
                              <select class="select" name="category">
                                 <option value="0">All categories</option>
                                 {{-- <?php $SearchCategories = DB::table('category')->get(); ?>
                                 @foreach ($SearchCategories as $searchcat)
                                 <option value="{{$searchcat->id}}">
                                    {{$searchcat->cat}}
                                 </option>
                                 @endforeach
                                  --}}
                                 
                              </select>
                           </div>
                        </form>
                     </div>
                     <!-- search-form end -->
                     <div class="media static-media d-none d-lg-flex">
                        <img class="mr-3" src="{{asset('theme/assets/img/icon/6.png')}}" alt="icon">
                        <div class="media-body">
                           <div class="phone">
                              <strong class="text-dark">Call us:</strong>
                              <a href="tel:{{$Settings->mobile}}" class="text-primary">{{$Settings->mobile}}</a>
                           </div>
                           <div class="email">
                              <a href="mailto:{{$Settings->email}}" class="text-dark">{{$Settings->email}}</a>
                           </div>
                        </div>
                     </div>
                     <!-- static-media end -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header-middle end -->
      <!-- header bottom start -->
      <nav id="sticky" class="header-bottom nav-style1 bg-primary d-none d-lg-block">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-12 d-flex flex-wrap align-items-center">
                  <ul class="main-menu d-flex">
                     <li class="active ml-0">
                        <a href="{{url('/')}}">Home <i class="ion-ios-home"></i></a>
                       
                     </li>
                     <?php $AllCategories = DB::table('category')->limit(5)->get(); ?>
                     @foreach ($AllCategories as $category)
                       <li class=" ml-0"><a href="{{url('/')}}/products/{{$category->slung}}">{{$category->cat}}</a></li> 
                     @endforeach 
                     
                  </ul>
                 
                  <div class="cart-block position-relative text-right ml-auto" id="cartDiv">
                     <a href="{{url('/')}}/cart">
                        <span class="position-relative">
                           <i class="ion-bag"></i>
                           <span class="badge badge-light cb1">{{ Cart::count() }}</span>
                        </span> {{ Cart::subtotal() }}
                     </a>
                     <div class="small-cart">
                        @foreach ($CartItems as $CartItem)
                        <?php  $ProductsForCart = DB::table('product')->where('id', $CartItem->id)->get(); ?>
                           @foreach ($ProductsForCart as $product)
                           <div class="small-cart-item">
                              <div class="single-item">
                                 <div class="image">
                                 <a href="{{url('/product')}}/{{$product->slung}}">
                                 <img src="{{url('/')}}/uploads/product/{{$product->image_one}}" class="img-fluid" alt="Accessories Kenya">
                                    </a>
                                    <span class="badge badge-primary cb2">{{$CartItem->qty}}x</span>
                                 </div>
                                 <div class="cart-content">
                                    <p class="cart-name"><a href="{{url('/product')}}/{{$product->slung}}">{{$product->name}}</a>
                                    </p>
                                 <p class="cart-quantity">KES {{$product->price}}</p>
                                    <p class="cart-color">Category: <span><?php $ProCat = DB::table('category')->where('id',$product->cat)->get(); ?>  @foreach ($ProCat as $ProCat) {{$ProCat->cat}} @endforeach</span></p>
                                 </div>
                              <button id="removeCart" class="remove-icon" data-toggle="modal" data-target="#remove-cart" data-url="{{ route('removecartmodal',['id'=>$CartItem->rowId])}}"><i class="ion-close-round"></i></button>
                              </div>
                           </div>
                           @endforeach
                        @endforeach
                        
                        <div class="cart-table">
                           <table class="table m-0">
                              <tbody>
                                 <tr>
                                    <td class="text-left">Subtotal:</td>
                                    <td class="text-right"><span>KES {{ Cart::subtotal() }}</span></td>
                                 </tr>
                                 <tr>
                                    <td class="text-left">Shipping:</td>
                                    <td class="text-right"><span>400.00</span></td>
                                 </tr>
                                
                                 <tr>
                                    <td class="text-left">Total:</td>
                                    <td class="text-right"><span>{{ Cart::total() }}</span></td>
                                 </tr>
                              </tbody>
                           </table>
                           <div class="cart-buttons pt-5">
                              <a href="{{url('/cart')}}" class="btn btn-primary btn-block rounded">Shopping Cart</a>
                              <a href="{{url('/cart/checkout')}}" class="btn btn-primary btn-block rounded">Checkout</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- cart block end -->
               </div>
            </div>
         </div>
      </nav>
      <!-- header bottom end -->
   </header>
   <!-- header end -->
   @yield('content')
   <!-- footer strat -->
   <footer>
      <!-- address start -->
      <div class="address py-6rem bg-white">
         <div class="container">
            <div class="row">
               <div class="col-12 col-sm-7 col-md-4 my-3">
                  <div class="address-widget">
                     <div class="media">
                        <span class="address-icon">
                           <i class="ion-ios-location-outline"></i>
                        </span>
                        <div class="media-body">
                           <h4 class="title">4710-4890 Moi Avenue , Popman House</h4>
                           <p class="text">Contact Info!</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-sm-5 col-md-4 my-3">
                  <div class="address-widget">
                     <div class="media">
                        <span class="address-icon">
                           <i class="ion-ios-email-outline"></i>
                        </span>
                        <div class="media-body">
                           <h4 class="title"><a style="text-transform: none;" href="mailto:info@accessories.co.ke">info@accessories.co.ke</a></h4>
                           <p class="text">Orders Support!</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-sm-6 col-md-4 my-3">
                  <div class="address-widget">
                     <div class="media">
                        <span class="address-icon">
                           <i class="ion-ios-telephone-outline"></i>
                        </span>
                        <div class="media-body">
                           <h4 class="title"><a href="tel:{{$Settings->mobile}}">{{$Settings->mobile}}</a></h4>
                           <p class="text">Our support line!</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- address end -->
      <!-- footer bottom start -->
      <div class="footer-bottom pb-5 bg-white">
         <div class="container">
            <div class="row">
               <div class="col-12 col-sm-6 col-lg-4 mb-5">
                  <div class="footer-widget">
                     <div class="border-bottom cbb1 mb-3rem">
                        <div class="section-title pb-4 pb-md-4 position-relative">
                           <h2 class="title">Information</h2>
                        </div>
                     </div>
                     <!-- footer-menu start -->
                     <ul class="footer-menu">
                        <li><a href="{{url('/delivery')}}">Delivery</a></li>
                        <li><a href="{{url('/about-us')}}">About us</a></li>
                        <li><a href="{{url('/contact-us')}}">Contact us</a></li>
                       
                     </ul>
                     <!-- footer-menu end -->
                  </div>
               </div>
            
               <div class="col-12 col-sm-6 col-lg-4 mb-5">
                  <div class="footer-widget">
                     <div class="border-bottom cbb1 mb-3rem">
                        <div class="section-title pb-4 pb-md-4 position-relative">
                           <h2 class="title">My Account</h2>
                        </div>
                     </div>
                     <!-- footer-menu start -->
                     <ul class="footer-menu">
                        <li><a href="{{url('/clientarea')}}">Personal info</a></li>
                        <li><a href="{{url('/clientarea')}}">Orders</a></li>
                        <li><a href="{{url('/clientarea')}}/profile">My Profile</a></li>
                     </ul>
                     <!-- footer-menu end -->
                  </div>


               </div>

               <div class="col-12 col-sm-6 col-lg-4 mb-5">
                  <div class="footer-widget">
                     <div class="border-bottom cbb1 mb-3rem">
                        <div class="section-title pb-4 pb-md-4 position-relative">
                           <h2 class="title">Useful Links</h2>
                        </div>
                     </div>
                     <!-- footer-menu start -->
                     <ul class="footer-menu">
                        <li><a href="{{url('/terms-and-conditions')}}">Terms &amp; Conditions</a></li>
                        <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                        <li><a href="{{url('/copyright')}}">Copyright</a></li>
                     </ul>
                     <!-- footer-menu end -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer bottom end -->
      <!-- coppy-right start -->
      <div class="coppy-right pt-2rem pb-2rem bg-light">
         <div class="container">
            <div class="row">
               <div class="col-12 col-md-8">
                  <div class="text-center text-md-left">
                     <p class="mb-3 mb-md-0">Copyright &copy; <a href="{{$Settings->url}}">Accessories Kenya</a>. All Rights
                        Reserved | Powered By <a href="https://designekta.com/">Designekta Studios</a> </p>
                  </div>
               </div>
               <div class="col-12 col-md-4">
                  <div class="text-center text-md-right">
                     <img src="{{asset('theme/assets/img/payment/1.png')}}" alt="img">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- coppy-right end -->
   </footer>
   <!-- footer end -->
   <!-- modals start -->
   <!-- Modal -->
   <!-- Quick View Modal modal -->
   <div class="modal fade style1" id="quick-view" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-inner-area row" id="dynamic-content">
                           
            </div> 
         </div>
      </div>
   </div>
   <!-- Compare modal -->
   <div class="modal fade style2" id="compare" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <h5 class="title"><i class="fa fa-check"></i> Product added to compare.</h5>
            </div>
         </div>
      </div>
   </div>
   <!-- Add To Cart modal -->
   <div class="modal fade style3" id="add-to-cart" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header justify-content-center bg-dark">
               <h5 class="modal-title" id="add-to-cartCenterTitle"> <span class="ion-checkmark-round"></span> Product
                  successfully added to your shopping cart</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-inner-area row" id="dynamic-cart-content">
                           
            </div> 
         </div>
      </div>
   </div>
   <!-- modals end -->
   <div class="modal fade style3" id="remove-cart" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header justify-content-center bg-dark">
               <h5 class="modal-title" id="add-to-cartCenterTitle"> <span class="ion-checkmark-round"></span> Cart Updated Successfully</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
   
            </div>
         </div>
      </div>
   </div>
   <!-- modals end -->

   


   <!--***********************
        all js files
     ***********************-->

   <!--******************************************************
        jquery,modernizr ,poppe,bootstrap,plugins and main js
     ******************************************************-->

   <!-- <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
   <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/js/plugins.js"></script>
   <script src="assets/js/main.js"></script> -->

   <!-- Use the minified version files listed below for better performance and remove the files listed above -->

   <!--***************************
         Minified  js
    ***************************-->

   <!--***********************************
        vendor,plugins and main js
     ***********************************-->

   <script src="{{asset('theme/assets/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('theme/assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('theme/assets/js/main.js')}}"></script>

      <!-- modal -->
      <script>
         $(document).ready(function(){
 
             $(document).on('click', '#getProduct', function(e){
               //   alert('')
                 e.preventDefault();
 
                 var url = $(this).data('url');
 
                 $('#dynamic-content').html('<div class="waitload"><h3>Loading......</h3></div>'); // leave it blank before ajax call
                 $('#modal-loader').show();      // load ajax loader
 
                 $.ajax({
                     url: url,
                     type: 'GET',
                     dataType: 'html'
                 })
                 .done(function(data){
               
                     console.log(data);  
                     
                     
                     $('#dynamic-content').html('');    
                     $('#dynamic-content').html(data); // load response 
                     $('#modal-loader').hide();        // hide ajax loader   
                 })
                 .fail(function(){
                     $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                     $('#modal-loader').hide();
                 });
 
             });
 
         });
 
         </script>
         <!-- modal -->
              <!-- modal -->
         <script>
            $(document).ready(function(){
   
               $(document).on('click', '#getCart', function(e){
                  //   alert('')
                  e.preventDefault();
   
                  var url = $(this).data('url');
                  $('.modal-title').html('');  
   
                  $('#dynamic-cart-content').html('<div class="waitload"><h3>Adding to Cart......</h3></div>'); // leave it blank before ajax call
                  $('#modal-loader').show();      // load ajax loader
   
                  $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                  })
                  .done(function(data){
                        $('.modal-title').html('<span class="ion-checkmark-round"></span> Product successfully added to your shopping cart');  
                        // Reload Cart Section
                        $( "#cartDiv" ).load(window.location.href + " #cartDiv" );
                        // UpdateMobileCart
                        $( "#cartDivs" ).load(window.location.href + " #cartDivs" );
                        console.log(data);  
                        $('#dynamic-cart-content').html('');    
                        $('#dynamic-cart-content').html(data); // load response 
                        $('#modal-loader').hide();        // hide ajax loader   
                  })
                  .fail(function(){
                        $('#dynamic-cart-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                        $('#modal-loader').hide();
                  });
   
               });
   
            });
         
         </script>
         <!-- modal -->
         <script>
            $(document).ready(function(){
   
               $(document).on('click', '#removeCart', function(e){
                  //   alert('')
                  e.preventDefault();
   
                  var url = $(this).data('url');
                  // Visibility Hidden
                  $('#remove-cart').css('visibility', 'hidden');
                  
   
                  $('#dynamic-remove-content').html('<div class="waitload"><h3>Updating Your Cart......</h3></div>'); // leave it blank before ajax call
                  $('#modal-loader').show();      // load ajax loader
   
                  $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                  })
                  .done(function(data){
                        // Reload Cart Section
                        $('.modal-title').html('<span class="ion-checkmark-round"></span> Shopping Cart Updated successfully');  
                        $('#remove-cart').css('visibility', 'visible');
                        $( "#cartDiv" ).load(window.location.href + " #cartDiv" );
                        // UpdateMobileCart
                        $( "#cartDivs" ).load(window.location.href + " #cartDivs" );
                        $( "#cart-box" ).load(window.location.href + " #cart-box" );
                        
                        console.log(data);  
                        $('#dynamic-remove-content').html('');    
                        // $('#dynamic-cart-content').html(data); // load response 
                        $('#modal-loader').hide();        // hide ajax loader   
                  })
                  .fail(function(){
                        $('#dynamic-cart-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                        $('#modal-loader').hide();
                  });
   
               });
   
            });
         
         </script>

<?php $CartItems = Cart::content(); ?>
<!-- Update Cart -->
@if($CartItems->isEmpty())

@else
@foreach($CartItems as $CartItem)
   <script type="text/javascript">
      $('#qty_{{$CartItem->rowId}}').change(function(){
      
               // Add preloader
               // e.preventDefault();
         
               $.ajax({
                  type: 'post',
                  url: '{{url('/')}}/cart/update',
                  data: $('#updateCartForm_{{$CartItem->rowId}}').serialize(),
               });
               //   
               done(function(data){
                  // Reload Cart Section
                  // $( "#cartDiv" ).load(window.location.href + " #cartDiv" );
                  // // UpdateMobileCart
                  // $( "#cartDivs" ).load(window.location.href + " #cartDivs" );
                  // $( "#cart-box" ).load(window.location.href + " #cart-box" );
               })
               // 
               .fail(function(){
                        alert('Oops Errror Occured');
               });     
      })
   </script>
@endforeach
@endif

{{-- Update User Info --}}
<script>
   $(document).ready(function(){

      $("#updateUserDataForm").submit(function(e) {
         
         $('#updateUserDataBtn').html('Please Wait....')
         e.preventDefault(); // avoid to execute the actual submit of the form.

      var form = $(this);
      var url = form.attr('action');

      $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
               alert('Info Updated')
               $('#updateUserDataBtn').html('Update Info')
               $( "#updateUserDataForm" ).load(window.location.href + " #updateUserDataForm" );
            }
         });


      });

   });

</script>
{{-- Update User Info --}}
         

</body>

@endforeach
</html>