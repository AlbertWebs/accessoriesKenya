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
            <!-- pagination -->
            <nav aria-label="Page navigation example" class="pagination_area">
                <?php echo $Payments; ?>
            </nav>
        <!-- pagination -->
        </section>
        <!-- blog-details-area end -->
    @endsection