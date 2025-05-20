@extends('front.master')
@section('content')
<style>
  a{
      color:#66139B;
  }
</style>
            
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
            @if($CartItems->isEmpty())
            <section class="emty_cart_area p_100">
                <div class="container">
                    <div class="emty_cart_inner">
                        <i class="icon-handbag icons"></i>
                        <center>
                        <h3>Your Wishlist is Empty</h3>
                        <h4>back to <a href="{{url('/classifieds')}}">shopping</a></h4>
                        </center>
                    </div>
                </div>
            </section>
              <!--/#cart_items-->
            @else
            <?php 
               if(Auth::user()){
                $User = Auth::user()->id;
               }else{
                $User = Request::ip();
               }
              
            ?>
            <!--Shopping Cart Area Strat-->
            <div class="Shopping-cart-area pt-60 pb-60">
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
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($CartItems as $CartItem)
                                        <?php 
                                                        $Products = DB::table('product')->where('id',$CartItem->product_id)->get();
                                        ?>
                                        @foreach($Products as $Product)
                                            <tr>
                                                <td class="li-product-remove"><a href="{{url('/')}}/cart/removewishlist/{{$CartItem->product_id}}/{{$User}}"><i class="fa fa-times"></i></a></td>
                                                <td class="li-product-thumbnail"><a href="{{url('')}}/classifieds/{{$Product->code}}"><img width="100" src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="{{$Product->name}}"></a></td>
                                                <td class="li-product-name"><a href="{{url('')}}/classifieds/{{$Product->code}}">{{$Product->name}}</a><br><br><a href="{{url('/')}}/cart/addCart/{{$CartItem->product_id}}">Add To Cart <i class="fa fa-shopping-cart"></i></a></td>
                                                <td class="li-product-price"><span class="amount">kes {{$Product->price}}</span></td>
                                                
                                            </tr>
                                        @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                

                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
            @endif
@endsection