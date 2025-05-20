@extends('front.master')
@section('content')
@include('front.breadcrumb');
       
        <!-- blog-details-area start -->
        <section class="blog-details-area ptb-140">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-12 col"> 
                        <aside class="right-sidebar">
                           
                            @include('clientarea.menu')
                        
                        </aside>
                    </div>
                        <div class="col-md-10 col-xs-12">
                        @if($Order->isEmpty())
                                
                                    <center><h2>You Haven't made any purchases </h2></center>
                                
                        @else
                                <section id="cart_items">
                                        
                                            
                                            <div class="table-responsive cart_info">
                                                    <table class="table table-condensed">
                                                            <thead>
                                                                <tr class="cart_menu">
                                                                    <td class="description">Title</td>
                                                                    <td class="description">Description</td>
                                                          
                                                                    <td class="price">Status</td>
                                                                                                                           
                                                                
                                                                
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($Order as $order)
                                                            <?php $OrderProducts = DB::table('orders_products')->where('orders_id',$order->id)->get() ?>
                                                                @foreach($OrderProducts as $products)
                                                                    <tr>
                                                                            

                                                                            <td class="cart_price">
                                                                                <p>
                                                                                    <?php $Products = DB::table('product')->where('id',$products->products_id)->get(); ?>
                                                                                    @foreach($Products as $Pro)
                                                                                     {{$Pro->name}}<br>
                                                                                    @endforeach
                                                                                    {{$products->qty}}
                                                                                </p>
                                                                            </td>
                                                                        
                                                                            <td class="cart_price">
                                                                                <p>{{$products->total}}</p>
                                                                                
                                                                            </td>
                                                                            <td class="cart_price text-center">
                                                                                <p>
                                                                                <?php 
                                                                                    //  if($order->status == '1'){
                                                                                    //       echo "<center>Delivered</center>";
                                                                                    //  }else{
                                                                                    //        echo "<center>Pending..</center>";
                                                                                    //  }
                                                                                    echo $order->status;
                                                                                ?>
                                                                                @if($order->status == 'pending')

                                                                                @else
                                                                                @foreach($Products as $Pro)

                                                                                <center><a href="{{url('/clientarea/addReview')}}/{{$Pro->id}}"><span class="fa fa-pencil"></span> Review this Product</a></center>
                                                                                @endforeach
                                                                                @endif
                                                                                </p>
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        
                                                                    </tr>
                                                                @endforeach
                                                            @endforeach
                                                                
                                                            </tbody>
                                                    </table>
                                                    
                                            </div>
                                       
                                </section>
                        @endif

                        <?php $Payments = DB::table('mobile_payments')->where('user_id',Auth::user()->id)->get(); ?>

                        @if($Payments->isEmpty())
                             <center><h4>You have not made any payments</h4></center>
                        @else
                        <section id="cart_items">
                                        
                                            
                                            <div class="table-responsive cart_info">
                                            <center><h4>Payments</h4></center>
                                                    <table class="table table-condensed">
                                                            <thead>
                                                                <tr class="cart_menu">
                                                                    <td class="description">Date</td>
                                                                    <td class="description">Amount</td>
                                                          
                                                                    <td class="price">Status</td>
                                                                                                                           
                                                                
                                                                
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($Payments as $pay)
                                                            
                                                                    <tr>
                                                                            

                                                                            <td class="cart_price">
                                                                                <p>
                                                                                    {{$pay->lastUpdate}}
                                                                                </p>
                                                                            </td>
                                                                        
                                                                            <td class="cart_price">
                                                                                
                                                                              Amount:  {{$pay->TransAmount}}
                                                                            </td>
                                                                            <td class="cart_price text-center">
                                                                                @if($pay->status == 0)
                                                                                    <p class="text-center">Pending</p>
                                                                                @else
                                                                                     <p class="text-center">Confirmed</p>
                                                                                @endif
                                                                                
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
        <!-- blog-details-area end -->
    @endsection