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
                        @if($Invoice->isEmpty())
                                
                                    <center><h2>You Dont Have Any Invoices </h2></center>
                                
                        @else
                                <section id="cart_items">
                                        
                                            
                                            <div class="table-responsive cart_info">
                                                    <table class="table table-condensed">
                                                            <thead>
                                                                <tr class="cart_menu text-center">

                                                                    <td class="description">Amount</td>
                                                                    
                                                          
                                                                    <td class="price">Status</td>
                                                                                                                           
                                                                
                                                                
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($Invoice as $order)
                                                            
                                                              
                                                                    <tr>
                                                                            

                                                                        
                                                                            <td class="cart_price text-center">
                                                                                <p>KES {{$order->amount}}</p>
                                                                                
                                                                            </td>
                                                                            <td class="cart_price text-center">
                                                                                <p>
                                                                              
                                                                                    @if($order->status == '0')
                                                                                        <!-- Pay Now -->
                                                                                        <center><a class="fa fa-smile-o alert-danger btn btn-primary" href="{{url('/clientarea/invoice')}}/{{$order->number}}"><span class=""></span> Pay Now </a></center>
                                                                                    @else
                                                                                    

                                                                                        <center><a class="fa fa-check alert-success btn btn-primary" href="#"><span ></span> Paid </a></center>
                                                                                 
                                                                                    @endif

                                                                                </p>
                                                                                
                                                                            </td>
                                                                            
                                                                            
                                                                        
                                                                    </tr>
                                                                
                                                            @endforeach
                                                                
                                                            </tbody>
                                                    </table>
                                                    
                                            </div>
                                       <!-- pagination -->
                                       <nav aria-label="Page navigation example" class="pagination_area">
                                            <?php echo $Invoice; ?>
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