@extends('front.master')
@section('content')
 <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Compare Products  <?php $CompareItems = Cart::instance('wishlist')->content(); $CountCompare = count($CompareItems) ?> </h3>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/cart/compare')}}">Compare Products</a></li>
                    </ul>
                </div>
            </div>
        </section>  
        <!--================End Categories Banner Area =================-->
        @if($CountCompare == 0)
        <!--================Shopping Cart Area =================-->
       
       
        <section class="emty_cart_area p_100">
            <div class="container">
                <div class="emty_cart_inner">
                    <i class="icon-handbag icons"></i>
                    <h3>Your Compare List is Empty</h3>
                    <h4>back to <a href="{{url('/classifieds')}}">shopping</a></h4>
                </div>
            </div>
        </section>
        @else
      
        <!--================Product Compare Area =================-->
        <section class="product_compare_area">
            <div class="container">
                <div class="compare_table">
                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    @foreach($CompareItems as $CartItem)
                                    <?php 
                                    $Products = DB::table('product')->where('id',$CartItem->id)->get();
                                    ?>
                                    @foreach($Products as $Product)
                                    <th scope="col">{{$Product->name}}</th>
                                    @endforeach
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><span>Summary</span></th>
                                    @foreach($CompareItems as $CartItem)
                                    <?php 
                                    $Products = DB::table('product')->where('id',$CartItem->id)->get();
                                    ?>
                                    @foreach($Products as $Product)
                                    <!-- Product i -->
                                    <td>
                                        <img width="200" src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="">
                                        <h3><span>Price</span>KES {{$Product->price}}</h3>
                                        <ul>
                                            <li class="p_icon"><a href="#"><i class="fa fa-plus"></i></a></li>
                                            <li><a class="add_cart_btn" href="{{url('cart/addCarts')}}/{{$Product->id}}">Buy Now</a></li>
                                            <li class="p_icon"><a title="Remove Item" href="{{url('/cart/destroyCompare/')}}/{{$CartItem->rowId}}"><i class="fa fa-trash"></i></a></li>
                                        </ul>
                                    </td>
                                    <!-- </Product One -->
                                    @endforeach
                                    @endforeach
                                    
                                <tr>
                                    <th scope="col"><span>Specifications</span></th>
                                    @foreach($CompareItems as $CartItem)
                                    <?php 
                                    $Products = DB::table('product')->where('id',$CartItem->id)->get();
                                    ?>
                                    @foreach($Products as $Product)
                                    <td>
                                        <h6>{!!html_entity_decode($Product->content)!!}</h6>
                                    </td>
                                    @endforeach
                                    @endforeach
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                    <a class="add_cart_btn continue" href="{{url('/')}}">continue shopping</a>
                </div>
            </div>
        </section>
        <!--================End Product Compare Area =================-->
        @endif
       
   
       
@endsection