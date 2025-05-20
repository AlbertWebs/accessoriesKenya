<!doctype html>
<html class="no-js" lang="zxx"> 
<?php $SiteSettings = DB::table('sitesettings')->get();?>

@foreach($SiteSettings as $Settings)
<!-- index288:448-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
   
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        <meta name="keywords" content="{{$keywords}}"/>
        <meta name="_token" content="{{ csrf_token() }}">
        <!-- SEO -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/uploads/logo/{{$Settings->favicon}}">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="{{asset('theme/css/material-design-iconic-font.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('theme/css/font-awesome.min.css')}}">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="{{asset('theme/css/fontawesome-stars.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('theme/css/meanmenu.css')}}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{asset('theme/css/owl.carousel.min.css')}}">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="{{asset('theme/css/slick.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('theme/css/animate.css')}}">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="{{asset('theme/css/jquery-ui.min.css')}}">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="{{asset('theme/css/venobox.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('theme/css/nice-select.css')}}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset('theme/css/magnific-popup.css')}}">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="{{asset('theme/css/helper.css')}}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('theme/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('theme/css/responsive.css')}}">
        <!-- Modernizr js -->
        <script src="{{asset('theme/js/vendor/modernizr-2.8.3.min.js')}}"></script>

        <!-- Preloader -->
        <!-- BOOTSTRAP CSS -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  -->

        <!-- Animate CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">

        <!--   COUSTOM CSS link  -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Preloader -->
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5ccd55492846b90c57acd37d/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
         <!--Floating WhatsApp css-->
        <link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
       <!--Jquery-->
        <!--Google-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141449503-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-141449503-1');
        </script>
        <!--</Google>-->

    </head>
    
    <body>
    <!--Div where the WhatsApp will be rendered-->  
    <div style="z-index:100000" id="WAButton"></div>  
    

    <!-- <a href="https://api.whatsapp.com/send?phone=15551234567">Send Message</a> -->
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area --> 
                            <div class="col-lg-6 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><i class="fa fa-phone"></i>  <span>&nbsp {{$Settings->mobile}}</span> <span>&nbsp {{$Settings->mobile_two}}</span> &nbsp <i class="fa fa-map-marker"></i>&nbsp  <span><a style="color:#000" href="{{url('/contact')}}"> <span>&nbsp {{$Settings->location}}</span> </a></span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-6 col-md-12">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li>
                                        @if(Auth::user())
                                            <div class="ht-setting-trigger"><span>Welcome back! {{Auth::user()->name}}</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    <li><a href="{{url('/clientarea')}}">My Account</a></li>
                                                    <li><a href="{{url('/clientarea/invoices')}}">My Invoices</a></li>
                                                    <li><a href="{{url('/clientarea/transactions')}}">Transactions</a></li>
                                                    <li><a href="{{url('/clientarea/profile')}}">My Profile</a></li>
                                                    
                                                    <li><a href="{{url('/clientarea/logout')}}">Log Out</a></li>
                                                </ul>
                                            </div>
                                        @else
                                        <div class="ht-setting-trigger"><span>My Account</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    <li><a href="{{url('clientarea/')}}">My Account</a></li>
                                                   
                                                </ul>
                                            </div>
                                        @endif
                                        </li>
                                        <!-- Setting Area End Here -->
                                        
                                        <li><span class="currency-selector-wrapper"><a style="color:#000;" href="{{url('/about-us')}}">About Us</a></span> </li>
                                        <li><span class="currency-selector-wrapper"><a style="color:#000;" href="{{url('/contact-us')}}">Help</a></span> </li>
                                        <li><span class="currency-selector-wrapper"><a title="Request Quote" style="color:#000;" href="{{url('/contact-us')}}">Need Installation?</a></span> </li>
                                    
                                        
                                       
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="{{url('/')}}">
                                        <img width="253" height="62"  src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form action="{{url('/searchsite')}}" method="POST" class="hm-searchbox">
                                    {{csrf_field()}}
                                    <select class="nice-select select-search-category" name="category">
                                    <?php $SearchCategory = DB::table('category')->get();?>
                                        <option value="0">All</option>
                                        @foreach($SearchCategory as $SearchCats)
                                        <option value="{{$SearchCats->id}}">{{$SearchCats->cat}}</option>                     
                                        @endforeach
                                    </select>
                                    <input type="text" autocomplete="off"  id="search" name="search"  placeholder="Enter your search key ...">
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                               
                                
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area --> 
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        @if(Auth::user())
                                        <?php $Wishlist = Wishlist::getUserWishlist(Auth::user()->id); ?>
                                        <li class="hm-wishlist">
                                            <a href="{{url('/')}}/cart/wishlist">
                                                <span class="cart-item-count wishlist-item-count">{{Wishlist::count(Auth::user()->id)}}</span>
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li>
                                        @else
                                        <!-- Begin Header Middle Wishlist Area -->
                                        <li class="hm-wishlist">
                                            <a href="{{url('/')}}/cart/wishlist">
                                                <?php $TheWishlist = DB::table('wishlists')->where('user_id',Request::ip())->get(); $count = count($TheWishlist); ?>
                                                <span class="cart-item-count wishlist-item-count">{{$count}}</span>
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li>
                                        @endif
                                        <?php
                                           $CartItems = Cart::content(); 
                                        ?>
                                        <!-- Header Middle Wishlist Area End Here -->
                                        <!-- Begin Header Mini Cart Area -->
                                        @if($CartItems->isEmpty())
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">KES {{ Cart::count() }}
                                                    <span class="cart-item-count">{{ Cart::count() }}</span>
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                             
                                                <p class="minicart-total text-center">Your Cart Is Empty</p>
                                                
                                            </div>
                                        </li>
                                        @else
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text"><small>KES {{ Cart::subtotal() }}</small>
                                                    <span class="cart-item-count">{{ Cart::count() }}</span>
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                <ul class="minicart-product-list">
                                                @foreach($CartItems as $CartItem)
                                                <?php
                                                $ProductsForCart = DB::table('product')->where('id', $CartItem->id)->get();
                                                ?>
                                                @foreach($ProductsForCart as $Product)
                                                    <li>
                                                        <a href="single-product.html" class="minicart-product-image">
                                                            <img src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="{{url('/')}}/product/{{$Product->slung}}">{{$Product->name}}</a></h6>
                                                            <span>KES{{$Product->price}} x {{$CartItem->qty}}</span>
                                                        </div>
                                                        <button onClick="window.location='{{url('/')}}/cart/destroy/{{$CartItem->rowId}}';" class="close" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                        
                                                    </li>
                                                @endforeach
                                                @endforeach
                                                </ul>
                                                <p class="minicart-total">SUBTOTAL: <span>KES{{Cart::subtotal()}}</span></p>
                                                <div class="minicart-button">
                                                    <a href="{{url('/cart')}}" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>View Full Cart</span>
                                                    </a>
                                                    <a href="{{url('/cart/checkout')}}" class="li-button li-button-fullwidth">
                                                        <span>Checkout</span>
                                                    </a>
                                                </div>
                                                
                                            </div>
                                        </li>
                                        @endif
                                        <!-- Header Mini Cart Area End Here -->
                                    </ul>
                                </div>
                                <!-- Header Middle Right Area End Here -->
                                 <!-- Livesearch Results -->
                                 <div style="background-image: url('{{url('/')}}/uploads/preloaders/preloader.gif');" class="text-center" id="loading-image">Loading.....</div>
                                <table class="table table-bordered table-hover" style="position:absolute; background-color:rgba(255,255,255,0.9); color:#000;  z-index: 10; text-overflow:visible;">
                                <thead>
                                <!-- <tr>

                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                </tr> -->
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                                <!-- Live seach Results -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom header-sticky d-none d-lg-block d-xl-block hide-me">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="hb-menu">
                                    <nav style="text-align:center;">
                                        <ul>
                                            <li><a href="{{url('/')}}"> Home <i class="fa fa-home" aria-hidden="true"></i></a></li>
                                            
                                            <li><a href="{{url('/about-us')}}">About Us </a></li>
                                            <li class="megamenu-static-holder"><a href="{{url('/our-products')}}">Our Products</a>
                                                <?php $Categories = DB::table('category')->limit(4)->inRandomOrder()->get() ?>
                                                <ul class="megamenu hb-megamenu" style="background-image: url('{{url('/')}}/uploads/categories/@foreach($Categories as $Catt){{$Catt->image}}@endforeach');">
                                                    @foreach($Categories as $cat)
                                                    <li><a href="#">{{$cat->cat}}</a>
                                                        <?php $Product = DB::table('product')->where('cat',$cat->id)->limit('7')->inRandomOrder()->get(); ?>
                                                        <ul>
                                                            @foreach($Product as $pro)
                                                            <li><a href="{{url('/product')}}/{{$pro->slung}}">{{$pro->name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @endforeach
                                                   
                                                </ul>
                                            </li>
                                            
                                            <li><a href="{{url('/our-services')}}"> Our Services</a></li>
                                            <li><a href="{{url('/our-portfolio')}}"> Our Portfolio</a></li>
                                          
                                            <li><a href="{{url('/contact-us')}}"> Contact Us <i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->
            @yield('content')
            <!-- Begin Footer Area -->
            <div class="footer">
                <!-- Begin Footer Static Top Area -->
                <div class="footer-static-top">
                    <div class="container">
                        <!-- Begin Footer Shipping Area -->
                        <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                            <div class="row">
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('theme/images/shipping-icon/1.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Affordable Delivery</h2>
                                            <p>And free returns. See checkout for delivery info.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('theme/images/shipping-icon/2.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Safe Payment</h2>
                                            <p>Pay with the world's most popular and secure payment methods.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('theme/images/shipping-icon/3.png')}}" alt="Amani Vehicle Sounds Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Shop with Confidence</h2>
                                            <p>Our Buyer Protection covers your purchase from click to delivery.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('theme/images/shipping-icon/4.png')}}" alt="Amani Vehicle Sounds Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>24/7 Help Center</h2>
                                            <p>Have a question? Call us or chat online.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                            </div>
                        </div>
                        <!-- Footer Shipping Area End Here -->
                    </div>
                </div>
                <!-- Footer Static Top Area End Here -->
                <!-- Begin Footer Static Middle Area -->
                <div class="footer-static-middle">
                    <div class="container">
                        <div class="footer-logo-wrap pt-50 pb-35">
                            <div class="row text-center">
                                <!-- Begin Footer Logo Area -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-logo">
                                        <img width="253" height="62"  src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt="Footer Logo">
                                        <p class="info">
                                            
                                        </p>
                                    </div>
                                    <ul class="des">
                                        <li>
                                            <span>Location: </span>
                                            {{$Settings->location}}
                                        </li>
                                        <li>
                                            <span>Phone: </span>
                                            <a href="#">{{$Settings->mobile}}</a>
                                            <a href="#">{{$Settings->mobile_one}}</a>
                                        </li>
                                        <li>
                                            <span>Email: </span>
                                            <a href="mailto://{{$Settings->email}}">{{$Settings->email}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Footer Logo Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Quick Links</h3>
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="{{url('/')}}">About Us</a></li>
                                            <li><a href="{{url('/our-products')}}">Products</a></li>
                                            <li><a href="{{url('/our-portfolio')}}">Our Portfolio</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Quick Info</h3>
                                        <ul>
                                            <li><a href="{{url('/clientarea')}}">My Account</a></li>
                                            <li><a href="{{url('/copyright')}}">Copyright</a></li>
                                            <li><a href="{{url('/delivery')}}">Delivery</a></li>
                                            <li><a href="{{url('/terms-and-conditions')}}">Terms & Conditions</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-4">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Follow Us</h3>
                                        <ul class="social-link text-center">
                                            <li class="twitter">
                                                <a href="{{$Settings->twitter}}" data-toggle="tooltip" target="_blank" title="Twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <!-- <li class="rss">
                                                <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="RSS">
                                                    <i class="fa fa-rss"></i>
                                                </a>
                                            </li> -->
                                            <li class="google-plus">
                                                <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                            <li class="facebook">
                                                <a href="{{$Settings->facebook}}" data-toggle="tooltip" target="_blank" title="Facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="youtube">
                                                <a href="{{$Settings->youtube}}" data-toggle="tooltip" target="_blank" title="Youtube">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a href="{{$Settings->instagram}}" data-toggle="tooltip" target="_blank" title="Instagram">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Begin Footer Newsletter Area -->
                                    <div class="footer-newsletter">
                                        <!-- <h4>Sign up to newsletter</h4> -->
                                        <br>
                                        <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank" novalidate>
                                           <div id="mc_embed_signup_scroll">
                                              <div id="mc-form" class="mc-form subscribe-form form-group" >
                                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email" />
                                                <button  class="btn" id="mc-submit">Subscribe</button>
                                              </div> 
                                           </div>
                                        </form>
                                    </div>
                                    <!-- Footer Newsletter Area End Here -->
                                </div>
                                <!-- Footer Block Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Middle Area End Here -->
                <!-- Begin Footer Static Bottom Area -->
                <div class="footer-static-bottom pt-55 pb-55">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Footer Links Area -->
                                <div class="footer-links">
                                    <!-- <ul>
                                    <?php $SearchCategory = DB::table('category')->inRandomOrder()->paginate(20);?>
                                        @foreach($SearchCategory as $SearchCats)
                                          <?php $final = preg_replace('#[ -]+#', '-', $SearchCats->cat);?>
                                          <li><a style="color:#66139B; padding:5px; font-weight:400;" href="{{url('/products')}}/{{$final}}">{{$SearchCats->cat}}</a></li>
                                        @endforeach
                                    </ul> -->
                                </div>
                                <!-- Footer Links Area End Here -->
                                <!-- Begin Footer Payment Area -->
                                <div class="copyright text-center">
                                    <a href="#">
                                        
                                        <img src="{{url('/')}}/uploads/logo/{{$Settings->till_image}}" alt="{{$Settings->sitename}} Payment Methods">
                                    
                                    </a>
                                </div>
                                <!-- Footer Payment Area End Here -->
                                <!-- Begin Copyright Area -->
                                <div class="copyright text-center pt-25">
                                    <span>Copyright &copy; <?php echo date('Y'); ?> <a style="color:#66139B; padding:5px; font-weight:400;" target="_blank" href="https://www.amanivehiclesounds.co.ke/copyright"><?php echo $Settings->sitename ?> </a> | Powered By <a style="color:#66139B; padding:5px; font-weight:400;" href="http://designekta.com">Designekta Studios</a></span>
                                </div>
                                <!-- Copyright Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Bottom Area End Here -->
            </div>
            <!-- Footer Area End Here -->
            

        <!-- Modal -->
        <div class="modal fade modal-wrapper" id="view-modal">
           <!--  -->
           <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area row" id="dynamic-content">
                           
                        </div> 
                    </div>
                </div>
            </div>
           <!--  -->

        </div>
          
           

        </div>
        <!-- Preloaders -->
        <!-- <div id="main-preloader" class="main-preloader semi-dark-background">
            <div class="main-preloader-inner center">

                <h1 class="preloader-percentage center">
                    <span class="preloader-percentage-text">0</span>
                    <span class="percentage">%</span>
                </h1>
                <div class="preloader-bar-outer">
                    <div class="preloader-bar"></div> 
                </div>

            </div>
        </div> -->
        <!-- P -->
        <!-- Preloaders -->
     
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="{{asset('theme/js/sPreloader.js')}}"></script>

        <script type="text/javascript">        
        $('body').jpreLoader({
            preMainSection:     '#main-preloader',
            prePerText:         '.preloader-percentage-text',
            preBar:             '.preloader-bar',
        });       
        </script>
        <!-- Preloades -->
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="{{asset('theme/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('theme/js/vendor/popper.min.js')}}"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
        <!-- Ajax Mail js -->
        <script src="{{asset('theme/js/ajax-mail.js')}}"></script>
        <!-- Meanmenu js -->
        <script src="{{asset('theme/js/jquery.meanmenu.min.js')}}"></script>
        <!-- Wow.min js -->
        <script src="{{asset('theme/js/wow.min.js')}}"></script>
        <!-- Slick Carousel js -->
        <script src="{{asset('theme/js/slick.min.js')}}"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{asset('theme/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific popup js -->
        <script src="{{asset('theme/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Isotope js -->
        <script src="{{asset('theme/js/isotope.pkgd.min.js')}}"></script>
        <!-- Imagesloaded js -->
        <script src="{{asset('theme/js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- Mixitup js -->
        <script src="{{asset('theme/js/jquery.mixitup.min.js')}}"></script>
        <!-- Countdown -->
        <script src="{{asset('theme/js/jquery.countdown.min.js')}}"></script>
        <!-- Counterup -->
        <script src="{{asset('theme/js/jquery.counterup.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{asset('theme/js/waypoints.min.js')}}"></script>
        <!-- Barrating -->
        <script src="{{asset('theme/js/jquery.barrating.min.js')}}"></script>
        <!-- Jquery-ui -->
        <script src="{{asset('theme/js/jquery-ui.min.js')}}"></script>
        <!-- Venobox -->
        <script src="{{asset('theme/js/venobox.min.js')}}"></script>
        <!-- Nice Select js -->
        <script src="{{asset('theme/js/jquery.nice-select.min.js')}}"></script>
        <!-- ScrollUp js -->
        <script src="{{asset('theme/js/scrollUp.min.js')}}"></script>
        <!-- Main/Activator js -->
        <script src="{{asset('theme/js/main.js')}}"></script>
        <!-- Notify js -->
        <script src="{{asset('theme/js/common_scripts_min.js')}}"></script>
        
        <!--Custom Scripts -->
        <script type="text/javascript">
        /** Client Logo */
        $(document).ready(function(){
                $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1000,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                    slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                    slidesToShow: 3
                    }
                }]
                });
            });
            /*------------------------ */
        </script>
        <script type="text/javascript">

        $(document).ready(function() {
        $('#loading-image').hide();
        $('#actionBtn1').attr("disabled",true);

        $('#termsCheckbox1').change(function() {
            $('#actionBtn1').attr('disabled', $('#termsCheckbox1:checked').length == 0);
        });

        });

        $(document).ready(function() {

        $('#actionBtn2').attr("disabled",true);

        $('#termsCheckbox2').change(function() {
            $('#actionBtn2').attr('disabled', $('#termsCheckbox2:checked').length == 0);
        });

        });



        </script>
        <script>
            $(function () {
              $('#loading-image').hide();
              $('#updateShippingForm').hide();
              $('#verify').on('submit', function (e) {
              $('#veryfyID').html('Checking......')
                e.preventDefault();

                $.ajax({

                  type: 'post',
                  url: '{{url('/')}}/payments/veryfy/mpesa',
                  data: $('#verify').serialize(),
                  success: function ($results) {
                    $('#CardNumber').val('')
                    if($results == 1){
                          alert('Verification Was Successfull')
                          $('#success-alert').html('The Purchase Was Successfull')
                          $('#veryfyID').html('Successfull')
                          //Submit The Order
                          window.open('{{url('/')}}/cart/checkout/placeOrder','_self')
                    }else{
                          alert('Error Verifying The Transaction')
                          $('#veryfyID').html('Error Verifying Transaction. Wrong Transaction Code or Amount <i style="font-size:20px;color:red" class="fa fa-frown-o"></i>')
                    }
                  }
                });

              });
              //StK hehe SITOKI
              $('#sitokii').on('submit', function (e) {
              $('#phoneNumber').prop('readonly', true);
              $('#sitokiID').html('Check your phone....')
                e.preventDefault();

                $.ajax({
                  type: 'post',
                  url: '{{url('/')}}/payments/veryfy/sitoki',
                  data: $('#sitoki').serialize(),
                  success: function ($results) {
                    $('#sitokiID').val('')
                    if($results == 1){

                          /* Check If Payment Has Been Received And Redirect*/

                          //Submit The Order
                          window.open('{{url('/')}}/cart/checkout/placeOrder','_self')
                          //Redirect The User To Thank You Page
                          window.open('{{url('/')}}/clientarea/thankyou','_self')
                    }else{

                          /* Return Message Here  */

                    }
                 }
                });

              });

        
            //   STK Initialize
            $('#sitoki').on('submit', function (e) {
           
              $('#phoneNumber').prop('readonly', true);
              $('#sitokiID').html('Initializing....')
              $('#sitokiID').html('')
              $('#sitokiID').html('Check your phone....')
              
                e.preventDefault();

                $.ajax({
                  type: 'post',
                  url: '{{url('/')}}/payments/stk',
                  data: $('#sitoki').serialize(),
                  success: function (results) {
                    $('#sitokiID').val('')
                   
         
                    if(results == 1){
                          //Tell The Visitor The Payment Has Been Received
                          alert('Done!')
                          $('#sitokiID').html(' Payment Successfull <i class="fa fa-check alert-success> </i>')
                          //Submit The Order
                          window.open('{{url('/')}}/cart/checkout/placeOrderNow','_self')
                          //Redirect The User To Thank You Page
                        //   window.open('{{url('/')}}/clientarea/thankyou','_self')
                    }else{

                          /* Return Message Here  */
                          alert('Error Processing Your Payment!')

                    }
                 }
                });

              });
            // STK INIT
              // Subscribe
            //   End Sitoki
              // Subscribe

              $('#subscribe-form').on('submit', function (e) {
                $('#subscribe-btn').html('Working..')
                  e.preventDefault();

                    $.ajax({

                      type: 'post',
                      url: '{{url('/')}}/subscribe',
                      data: $('#subscribe-form').serialize(),
                      success: function ($results) {
                        $('#email').val('')
                        $('#subscribe-btn').html('<i class="fa fa-check"></i>  Success')
                        
                      }
                    });

                });

            });
          </script>

          <!-- Live Search Scripts -->
          <script type="text/javascript">
            $('#search').on('keyup',function(){
                // Add preloader
                $('#loading-image').show();
                $value=$(this).val();
                $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data:{'search':$value},
                success:function(data){
                $('#loading-image').hide();
                $('tbody').html(data);
                }
                });
            })
          </script>
          <script type="text/javascript">
          $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
          </script>
          <!-- </Live Search Scripts -->


          <!-- Check Mail Exists -->
          <script type="text/javascript">
            function duplicateEmail(element){

                $('#mailChecking').html('Checking...........')
                var email = $(element).val();
                $.ajax({
                    type: "POST",
                    url: '{{url('checkemail')}}',
                    data: {
                            email:email,
                            "_token": "{{ csrf_token() }}",
                        },
                    dataType: "json",
                    success: function(res) {

                        if(res.exists){
                            // Exists
                            $('#mailChecking').hide();
                            $('#mailAvailable').hide();
                            $('#mailExists').html('The Email is already in use by another person')
                        }else{
                            // Available
                            $('#mailChecking').hide();
                            $('#mailExists').hide();

                        }
                    },
                    error: function (jqXHR, exception) {

                    }
                });
            }
          </script>
          <!-- </Check mail Exists -->
        <!-- </Custom Script -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
        
        <!--Floating WhatsApp javascript-->
        <script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>

        <script type="text/javascript">  
            $(function () {
                $('#WAButton').floatingWhatsApp({
                    phone: '+254704804354', //WhatsApp Business phone number
                    headerTitle: 'Chat with us on WhatsApp!', //Popup Title
                    popupMessage: 'Hello, how can we help you?', //Popup Message
                    showPopup: true, //Enables popup display
                    buttonImage: '<img src="{{url('/')}}/uploads/icon/whatsapp.svg" />', //Button Image
                    //headerColor: 'crimson', //Custom header color
                    //backgroundColor: 'crimson', //Custom background button color
                    position: "right" //Position: left | right

                });
            });
        </script>  
        <!-- modal -->
        <script>
        $(document).ready(function(){

            $(document).on('click', '#getProduct', function(e){

                e.preventDefault();

                var url = $(this).data('url');

                $('#dynamic-content').html('Fetching....'); // leave it blank before ajax call
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
        <?php $CartItems = Cart::content(); ?>
        <!-- Update Cart -->
        @if($CartItems->isEmpty())

        @else
        @foreach($CartItems as $CartItem)
        <script type="text/javascript">
            $('#qty_{{$CartItem->rowId}}').change(function(){
            
                // Add preloader
              

                    $.ajax({
                      type: 'post',
                      url: '{{url('/')}}/cart/update',
                      data: $('#updateCartForm_{{$CartItem->rowId}}').serialize(),
                      success: function (results) {
                        // reload the table
                        // $("#cartDemo").load(location.href + " #cartDemo");
                        // alert(results)
                        location.reload();
                      }
                    });
                
            })
        </script>
        @endforeach
        <!-- Update Cart -->
        @endif

        @if($page_title == 'Checkout')
        <!-- Notify -->
        @include('front.notify')
        <!-- Notify -->
        @endif

        <!--  -->
        <script type="text/javascript">
        $('#updateShippingBtn').click(function() {
          $('#updateShippingForm').slideToggle(1000)
        });
        </script>
        <!--  -->

    </body>

<!-- index380:283-->
@endforeach
</html>