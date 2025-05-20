@extends('front.master')
@section('content')

            
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
            @if($CartItems->isEmpty()) 
            <section class="emty_cart_area p_100">
                <div class="container">
                    <div class="emty_cart_inner">
                        <i class="icon-handbag icons"></i>
                        <h3>Your Cart is Empty</h3>
                        <h4>back to <a href="{{url('/classifieds')}}">shopping</a></h4>
                    </div>
                </div>
            </section>
              <!--/#cart_items-->
            @else
            <!--Shopping Cart Area Strat-->
            <div class="Shopping-cart-area pt-60 pb-60" id="cartDemo">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                       
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove">remove</th>
                                                <th class="li-product-thumbnail">images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="li-product-price">Unit Price</th>
                                                <th class="li-product-quantity">Quantity</th>
                                                <th class="li-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($CartItems as $CartItem)
                                        <?php 
                                                        $Products = DB::table('product')->where('id',$CartItem->id)->get();
                                        ?>
                                        @foreach($Products as $Product)
                                            <tr>
                                                <td class="li-product-remove"><a href="{{url('/')}}/cart/destroy/{{$CartItem->rowId}}"><i class="fa fa-times"></i></a></td>
                                                <td class="li-product-thumbnail"><a href="{{url('')}}/classifieds/{{$Product->code}}"><img width="100" src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="{{$Product->name}}"></a></td>
                                                <td class="li-product-name"><a href="{{url('')}}/classifieds/{{$Product->code}}">{{$Product->name}}</a></td>
                                                <td class="li-product-price"><span class="amount">kes {{$Product->price}}</span></td>
                                                <td class="quantity">
                                                <form id="updateCartForm_{{$CartItem->rowId}}"  method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="rowID" id="rowID" value="{{$CartItem->rowId}}">
                                                    <label>Quantity</label>
                                                    <div class="cart-plus-minuas">
                                                        <input style="width:50px; height:50px; text-align:center;" id="qty_{{$CartItem->rowId}}"  name="qty" class="cart-plus-minus-box" value="{{$CartItem->qty}}" type="text">
                                                        <!-- <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div> -->
                                                    </div>
                                                </form>
                                                </td>
                                                <td class="product-subtotal"><span class="amount">kes {{$CartItem->total}}</span></td>
                                            </tr>
                                        @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <!-- <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                                <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                            </div>
                                            <div class="coupon2">
                                                <input class="button" name="update_cart" value="Update cart" type="submit">
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul>
                                                <li>Subtotal <span>KES {{Cart::subtotal()}}</span></li>
                                                <li>Shipping <span><a href="{{url('/delivery')}}">Fee May Apply</a></span></li>
                                                <li>Total <span>KES {{Cart::total()}}</span></li>
                                            </ul>
                                            <a href="{{url('/cart/checkout')}}">Proceed to checkout</a>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
            @endif
@endsection