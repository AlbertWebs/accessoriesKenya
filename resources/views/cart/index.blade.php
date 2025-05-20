@extends('front.master')
@section('content')

    <!-- bread crumb start -->
    <nav class="breadcrumb-section bg-white pt-5 pb-6rem">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- bread crumb end -->
    @if($CartItems->isEmpty())


    @else 
    <!--cart-section satrt -->
    <section class="whish-list-section pb-6rem" id="cart-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title text-capitalize">Your cart items</h3>
                    <div class="table-responsive pt-4">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" scope="col">Product Image</th>
                                    <th class="text-center" scope="col">Product Name</th>
                                    <th class="text-center" scope="col">Stock Status</th>
                                    <th class="text-center" scope="col">Qty</th>
                                    <th class="text-center" scope="col">Unit Price</th>
                                    <th class="text-center" scope="col">action</th>
                                    {{-- <th class="text-center" scope="col">Update</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($CartItems as $CartItem)
                                <?php 
                                    $Products = DB::table('product')->where('id',$CartItem->id)->get();
                                ?>
                                @foreach($Products as $Product)
                                <tr>
                                    <th class="text-center" scope="row">
                                       <img src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="img">
                                    </th>
                                    <td class="text-center">
                                        <span class="whish-title">{{$Product->name}}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($Product->stock == 'In Stock')
                                        <span class="badge badge-primary cb4">In Stock</span>
                                        @else 
                                        <span class="badge badge-danger cb4">Out Of Stock</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form method="post" id="updateCartForm_{{$CartItem->rowId}}">
                                            <input type="hidden" name="rowID" id="rowID" value="{{$CartItem->rowId}}">
                                            {{csrf_field()}}
                                            <div class="product-count style">
                                                <div class="count d-flex justify-content-center">
                                                    <input id="qty_{{$CartItem->rowId}}" type="number" name="qty" min="1" max="100" step="1" value="{{$CartItem->qty}}">
                                                    <div class="button-group">
                                                        <button class="count-btn increment"><i class="fas fa-chevron-up"></i></button>
                                                        <button class="count-btn decrement"><i class="fas fa-chevron-down"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            {{-- <div class="text-center">
                                                <button href="#" class="btn btn-dark3">Update</button>
                                            </div> --}}
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <span class="product-price">
                                        KES {{$Product->price}}
                                      </span></td>

                                    <td class="text-center">
                                        <button id="removeCart" data-toggle="modal" data-target="#remove-cart" data-url="{{ route('removecartmodal',['id'=>$CartItem->rowId])}}"> <span class="trash"><i class="fas fa-trash-alt"></i> </span></button>
                                    </td>
                                    {{-- <td class="text-center">
                                        <button href="#" class="btn btn-dark3">buy now</button>
                                    </td> --}}
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        {{--  --}}
                        <div class="col-12">
                            <div class="sign-btn text-right">
                                <a href="{{url('/cart/checkout')}}" class="btn btn-dark3">Proceed To Checkout</a>
                            </div>
                        </div>
                        {{--  --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart-section end -->
@endif
@endsection