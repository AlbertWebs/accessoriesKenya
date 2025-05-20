@extends('front.master')
@section('content')

        <!-- blog-details-area start -->
        <section class="blog-details-area ptb-140">
            <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                  
                    <div class="col-md-12 col-xs-12">
                            @if($Orders->isEmpty())
                                <center><h2>Your Order History Is Empty</h2></center>
                            @else
                            <br><br>
                            <section id="cart_items">
                                  
                                        
                                        <div class="table-responsive cart_info">
                                                <table class="table table-condensed">
                                                        <thead style="font-weight:600">
                                                            <tr class="cart_menu">
                                                                
                                                                <td class="description">Order Description</td>
                                                                <td class="price">Total</td>
                                                                <td class="total">Status</td>
                                                            
                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($Orders as $orders)
                                                            <tr>
                                                                    <td class="cart_price">
                                                                    <?php $OrderProducts = DB::table('orders_products')->where('orders_id',$orders->id)->get(); ?>
                                                                    @foreach($OrderProducts as $details)
                                                                        <p>Product Name :<?php $products = DB::table('product')->where('id',$details->products_id)->get();  ?>
                                                                        @foreach($products as $theProducts)
                                                                           {{$theProducts->name}}
                                                                        @endforeach
                                                                           
                                                                        </p>
                                                                        <p>Quantity: {{$details->qty}}</p>
                                                                        <p>Date: {{$details->created_at}}</p>
                                                                    @endforeach
                                                                    </td>
                                                                
                                                                    <td class="cart_price">
                                                                    <p>Ksh {{$orders->total}}</p>
                                                                    </td>
                                                                    
                                                                    <td class="cart_price">
                                                                        <p class="">
                                                                        {{$orders->status}}
                                                                        </p>
                                                                    </td>
                                                                
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                </table>
                                        </div>
                                
                            </section>
                            
                            @endif
                    </div>
                  </div>
                   
                    
                </div>
            </div>
        </section>
        <div class="col-12">
            <div class="log-out-btn text-center">
                <a href="{{url('/clientarea')}}" class="btn btn-dark3 my-5">My Account</a>
            </div>
        </div>
        <!-- blog-details-area end -->
    @endsection