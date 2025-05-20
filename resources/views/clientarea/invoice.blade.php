@extends('front.master')
@section('content')
@include('front.breadcrumb')

       <br>
  <!--================Register Area =================-->
  <section class="register_area p_10">
            <div class="container">
                <div class="register_inner">
                    <div class="row">
                        @foreach($Invoice as $Inv)
                        <?php 
                            $CartItems = Cart::content();
                            $CartItemsTwo = unserialize($Inv->products);

                            
                            
                        ?>
                        <div class="col-lg-10" style="margin:0px auto;">
                            <div class="order_box_price">
                                <h2 class="reg_title text-center">Invoice-{{$invoicenumber}}</h2>
                                <div class="payment_list">
                                    <div class="price_single_cost">
                                        
                                        @foreach($CartItemsTwo as $CartItem)
                                        <?php 
                                            $Products = DB::table('product')->where('id',$CartItem->id)->get();
                                        ?>
                                        @foreach($Products as $Product)
                                            <h5> {{$Product->name}} <span>KES {{$CartItem->total}}</span></h5>
                                        @endforeach
                                            
                                        @endforeach

                                        <h5> Shipping <span>{{$Inv->shipping}} </span></h5>
                                        <!-- <h3><span class="normal_text">Order Total</span> <span style="color:#66139B">{{$CartItem->total}}</span></h3> -->
                                        <h3><span class="normal_text">Net Total</span> 
                                            <span style="color:#66139B">KES 
                                                <?php
                                                    $TotalCart = $Inv->amount;
                                                    $PrepeTotalCart = str_replace( ',', '', $TotalCart );
                                                    $FormatTotalCart = round($PrepeTotalCart, 0);
                                                    $ShippingFee = $Inv->shipping;
                                                    $TotalCost = $FormatTotalCart;
                                                    echo $TotalCost;
                                                ?>
                                            </span>
                                        </h3>
                                        
                                        </div>
                                    </div>
                                    <div id="accordion" role="tablist" class="price_method">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">
                                                    Lipa Na MPESA
                                                    </a>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                <!-- <p>All transactions are secure and encrypted. please view our  <a href="{{url('/privacy')}}">privacy policy.</a></p> -->
                                                    <ol style="color:#333333"> 
                                                        <li>Go to your MPESA menu</li>
                                                        <li>Select Lipa Na MPESA</li>
                                                        <li>Select PayBill</li>
                                                        <?php $SettingsTill = DB::table('sitesettings')->get(); ?>
                                                        @foreach($SettingsTill as $set)
                                                        <li>Enter the Business Number <strong>{{$set->till}}</strong> then OK</li>
                                                        @endforeach
                                                        <!-- Invoice Number -->
                                                        <li>Enter Account Number <strong>{{$invoicenumber}}</strong></li>
                                                        <!-- Invoice Number -->
                                                        <li>Enter Amount KSH 
                                                          <strong>
                                                          <?php
                                                              echo $TotalCost 
                                                          ?>
                                                          </strong>
                                                        </li>
                                                        <li>Then press ok to confirm</li>
                                                        
                                                        <li>Enter the transaction code below</li>
                                                        <li>Click verify to verify payment</li>
                                                        <form method="POST" action="#" id="verify">
                                                        <input type="hidden" name="invoice" value="{{$invoicenumber}}">
                                                          <input type="hidden" name="amount" value="{{$TotalCost}}">
                                                          {{ csrf_field() }}
                                                          <div class="col-md-6">
                                                              <div class="form-group">
                                                                  <label for="email">Enter Your MPESA Transaction Code <span>*</span></label>
                                                                  <input type="text" name="TransactionID" class="form-control" required placeholder="NJL4E9WJ96" id="email" autocomplete="off">
                                                              </div>
                                                            <div class="pull-left"><button id="veryfyID" class="payment-action" type="submit"> Veryfy Payment &nbsp;<i class="fa fa-arrow-right"></i> </button></div>
                                                          </div>
                                                        </form>

                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                
                                      
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingfour">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapsefour" role="button" aria-expanded="false" aria-controls="collapsefour">
                                                    paypal
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapsefour" class="collapse" role="tabpanel" aria-labelledby="headingfour" data-parent="#accordion">
                                            <p>*May include additional conversion fee*</p>
                                                <div class="card-body">
                                                    <!-- Shopping Cart -->
                                                    <form id="ShowPaypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                                      <input type="hidden" name="cmd" value="_cart">
                                                      <input type="hidden" name="upload" value="1">
                                                      <?php $SiteSettings = DB::table('sitesettings')->get(); ?>
                                                      @foreach($SiteSettings as $Sett)
                                                      <input type="hidden" name="business" value="{{$Sett->paypal}}">
                                                      @endforeach
                                                      <!-- Collect Data -->
                                                      <?php $Count = 1; ?>
                                                      @foreach($CartItems as $CartItem)
                                                      <?php 
                                                          $Products = DB::table('product')->where('id',$CartItem->id)->get();
                                                      ?>
                                                      @foreach($Products as $Product)
                                                      <?php 
                                                            $RawPrice = $Product->price;
                                                            $dollarPrice = dollar($Product->price);
                                                            $PaypalCont = 0.029;
                                                            $paypalCut = $PaypalCont*$dollarPrice;
                                                            $PaypalToatal = $paypalCut+$dollarPrice;
                                                            
                                                       ?>
                                                      <input type="hidden" name="item_name_{{$Count}}" value="{{$Product->name}}">
                                                      <input type="hidden" name="amount_{{$Count}}" value="<?php echo $PaypalToatal; ?>"><?php $PaypalToatal; ?>
                                                      <input type="hidden" name="quantity_{{$Count}}" value="{{$CartItem->qty}}">
                                                      <input type="hidden" name="shipping_{{$Count}}" value="<?php echo dollar($ShippingFee) ?>">
                                                      @endforeach
                                                      <?php $Count = $Count+1;  ?>
                                                      @endforeach
                                                      
                                                      <input type="hidden" name="cancel_return" id="cancel_return" value="{{url('/')}}/cart/checkout/payment" />
                                                      <button  style="cursor:pointer" type="submit"><img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppcmcvdam.png" alt="Pay with PayPal Credit or any major credit card" /></button>
                                                    </form>
                                                    <!-- Shopping Cart -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <a href="{{url('/')}}" class="btn subs_btn form-control"><i class="fa fa-home"></i> Homepage</a>
                                <br>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--================End Register Area =================-->
        <br>
    @endsection