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
                        <?php $ClientId = Auth::user()->id; $Order= DB::table('orders')->where('user_id',$ClientId)->paginate(3); ?>
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
                                                                <?php $OrderProducts = DB::table('orders_products')->where('orders_id',$order->id)->paginate(3) ?>
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
                                            <!-- pagination -->
                                            <nav aria-label="Page navigation example" class="pagination_area">
                                                <?php echo $Order; ?>
                                            </nav>
                                       <!-- pagination -->
                                       <br><br>
                                </section>
                        @endif

                     
                            
                            
                            
                            
                            </div>
                        </div>
                    
                </div>
            </div>
        </section>
        <!-- blog-details-area end -->
    @endsection