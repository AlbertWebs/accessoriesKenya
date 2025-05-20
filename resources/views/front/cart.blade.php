<a href="{{url('/')}}/cart">
    <span class="position-relative">
       <i class="ion-bag"></i>
       <span class="badge badge-light cb1">{{ Cart::count()}}</span>
    </span>
 </a>
 <div class="small-cart">
    @foreach ($CartItems as $CartItem)
      <?php  $ProductsForCart = DB::table('product')->where('id', $CartItem->id)->get(); ?>
       @foreach ($ProductsForCart as $product)
       <div class="small-cart-item">
          <div class="single-item">
             <div class="image">
             <a href="{{url('/product')}}/{{$product->slung}}">
             <img src="{{url('/')}}/uploads/product/{{$product->image_one}}" class="img-fluid" alt="Accessories Kenya">
                </a>
                <span class="badge badge-primary cb2">{{$CartItem->qty}}x</span>
             </div>
             <div class="cart-content">
                <p class="cart-name"><a href="{{url('/product')}}/{{$product->slung}}">{{$product->name}}</a>
                </p>
             <p class="cart-quantity">KES {{$product->price}}</p>
                <p class="cart-color">Category: <span><?php $ProCat = DB::table('category')->where('id',$product->cat)->get(); ?>  @foreach ($ProCat as $ProCat) {{$ProCat->cat}} @endforeach</span></p>
             </div>
          <a onClick="return confirm('Remove {{$product->name}} from your cart')" href="{{url('/')}}/cart/destroy/{{$CartItem->rowId}}" class="remove-icon"><i class="ion-close-round"></i></a>
          </div>
       </div>
       @endforeach
    @endforeach
    
    <div class="cart-table">
       <table class="table m-0">
          <tbody>
             <tr>
                <td class="text-left">Subtotal:</td>
                <td class="text-right"><span>KES {{ Cart::subtotal() }}</span></td>
             </tr>
             <tr>
                <td class="text-left">Shipping:</td>
                <td class="text-right"><span>400.00</span></td>
             </tr>
            
             <tr>
                <td class="text-left">Total:</td>
                <td class="text-right"><span>{{ Cart::total() }}</span></td>
             </tr>
          </tbody>
       </table>
       <div class="cart-buttons pt-5">
          <a href="{{url('/cart/checkout')}}" class="btn btn-primary btn-block rounded">Checkout</a>
       </div>
    </div>
 </div>