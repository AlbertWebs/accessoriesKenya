<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class, 'index1']);
// New Routes

// All Products
Route::get('/products',[HomeController::class, 'products']);
//Products Category
Route::get('/products/{category}',[HomeController::class, 'productss']);
//Single Product
Route::get('/product/{name}',[HomeController::class, 'product']);
// Modal View
Route::get('dynamicModal/{id}',[
  'as'=>'dynamicModal',
  'uses'=> 'App\Http\Controllers\HomeController@loadModal'
]);

Route::get('dynamicCartModal/{id}',[
  'as'=>'dynamicCartModal',
  'uses'=> 'App\Http\Controllers\CartController@loadCartModal'
]);

Route::get('removecartmodal/{id}',[
  'as'=>'removecartmodal',
  'uses'=> 'App\Http\Controllers\CartController@removeCart'
]);


// * Products*/ 
Route::get('/classifieds',[HomeController::class, 'products']); 
Route::get('/our-products',[HomeController::class, 'products']); 
/** Single Product */
Route::get('/classifieds/{code}',[HomeController::class, 'code']);
// Full Packages
Route::get('/complete-vehicle-assessories',[HomeController::class, 'fullPackages']);
Route::get('/special-offers',[HomeController::class, 'specialoffers']);
Route::get('/complete-vehicle-assessories/{code}',[HomeController::class, 'fullPackage']);
/** Product Categories */ 
Route::get('/classifieds/shop/{cat}',[HomeController::class, 'catt']);
// *Products Brands*/
Route::get('/classifieds/brand/{brand}',[HomeController::class, 'brand']);
Route::get('/our-portfolio',[HomeController::class, 'portfolio']);
Route::get('/request-quote',[HomeController::class, 'request']);

// Other Routes
Route::get('/products',[HomeController::class, 'products']);
Route::get('/products/grid',[HomeController::class, 'grid']);
Route::get('/product/{title}',[HomeController::class, 'product']);
Route::get('/products/cat/{title}',[HomeController::class, 'cat']);
Route::get('/cat/{title}',[HomeController::class, 'cat']);
Route::get('/products/brand/{title}',[HomeController::class, 'brand']); 
Route::get('/shop/cat/{cat}',[HomeController::class, 'shop_cat']);
Route::get('/shop/{name}',[HomeController::class, 'product']);
Route::get('/contact',[HomeController::class, 'contact']);
Route::get('/contact-us',[HomeController::class, 'contact']);
Route::get('/services',[HomeController::class, 'services']);
Route::get('/our-services',[HomeController::class, 'services']);
Route::get('/service/{name}',[HomeController::class, 'service']); 
Route::get('/about',[HomeController::class, 'about']);
Route::get('/about-us',[HomeController::class, 'about']);
Route::get('/terms',[HomeController::class, 'terms']);
Route::get('/delivery',[HomeController::class, 'delivery']);
Route::get('/terms-and-conditions',[HomeController::class, 'terms']);
Route::get('/privacy',[HomeController::class, 'privacy']);
Route::get('/privacy-policy',[HomeController::class, 'privacy']);
Route::get('/shipping-policy',[HomeController::class, 'shipping']);

Route::get('/search',[HomeController::class, 'search']);
Route::get('/copyright',[HomeController::class, 'copyright']);
Route::get('/commingsoon',[HomeController::class, 'commingsoon']);
Route::post('/submitMessage',[HomeController::class, 'submitMessage']);  
Route::post('/till',[PaymentsConroller::class, 'till']);

Route::post('/getQuote',[HomeController::class, 'getQuote']); 

// Geo Location
Route::get('get-ip-details', function () {

	  $ip = '154.79.70.69';

    $data = \Location::get($ip);
    dd($data);
    echo $data->areaCode;
    
         

});


// Version Control
Route::get('/version_control', [HomeController::class, 'version']);

//Check If Mail Exists
Route::post('/checkemail',[HomeController::class, 'checkEmail']);
//Subscribers
Route::post('/subscribe',[HomeController::class, 'subscribe']);

//Search Site 
Route::post('/searchsite',[HomeController::class, 'searchsite']);

//BlogRoutes
Route::get('/blog',[BlogController::class, 'index']);
Route::get('/blog/videos',[BlogController::class, 'videos']);
Route::get('/blog/{title}',[BlogController::class, 'blog']);
Route::get('/blog/cat/{cat}',[BlogController::class, 'blogCat']);
Route::post('/blog/search',[BlogController::class, 'search_blog']);
Route::get('/blog/tag/{tag}',[BlogController::class, 'tag']);
Route::post('/blog/comment',[BlogController::class, 'add_comment']);


// Cart Routes
Route::get('/cart',[CartController::class, 'index']);
Route::get('/cart/wishlist',[CartController::class, 'wishlist']);
Route::get('/cart/removewishlist/{rowId}/{user}',[CartController::class, 'removeWishlist']);

Route::get('/cart/destroy/{rowId}',[CartController::class, 'destroy']);
Route::get('/cart/destroyCompare/{rowId}',[CartController::class, 'destroyCompare']); 
Route::get('cart/addItem/{id}',[CartController::class, 'addItem']);
Route::get('cart/addWishlist/{id}/{user}',[CartController::class, 'addWishlist']); 

Route::get('cart/addCart/{id}',[CartController::class, 'addCart']);
Route::get('cart/addCarts/{id}',[CartController::class, 'addCarts']);

Route::get('cart/addCompare/{id}',[CartController::class, 'addCompare']);
Route::post('cart/addCart/{id}',[CartController::class, 'addCartPost']);
Route::get('cart/addToTheCart/{id}',[CartController::class, 'addToTheCart']);

Route::post('url()->current()/cart/addToTheCart/{id}',[CartController::class, 'addToTheCart']);

Route::post('/cart/update', [CartController::class, 'update']);
Route::get('/cart/compare', [CartController::class, 'compare']);

Route::get('/cart/cartUpdated', [CartController::class, 'cartUpdated']);


Route::post('cart/checkout/updateShipping', [CheckoutController::class, 'updateShipping']);
// Checkout Routes
Route::get('cart/checkout',[CheckoutController::class, 'index']);
Route::get('cart/checkout/checkout_billing',[CheckoutController::class, 'checkout_billing']);
Route::get('cart/checkout/shipping_method',[CheckoutController::class, 'shipping_method']);
Route::get('cart/checkout/payment',[CheckoutController::class, 'payment']);
Route::get('cart/checkout/order',[CheckoutController::class, 'checkout_confirm']);
Route::post('cart/checkout/formvalidate', [CheckoutController::class, 'formvalidate']);
Route::post('cart/checkout/create-user', [CheckoutController::class, 'create']);
Route::post('cart/checkout/save-user-data', [CheckoutController::class, 'save']);

Route::post('cart/checkout/login', [CheckoutController::class, 'login']);
Route::post('cart/checkout/placeOrder', [CheckoutController::class, 'placeOrder']);
Route::get('cart/checkout/placeOrder', [CheckoutController::class, 'placeOrderGet']);
Route::get('cart/checkout/placeOrderNow', [CheckoutController::class, 'placeOrderGetAjaxNow']);

//Payment pages

Route::post('payments/veryfy/mpesa',[PaymentsConroller::class, 'verify']); //The Lipa na MPESA Page
Route::post('payments/veryfy/sitoki',[PaymentsConroller::class, 'stk']); //The Lipa na MPESA Page
Route::get('mpesa/confirm',[PaymentsConroller::class, 'confirm']);             //Rquired URL
Route::get('mpesa/validate',[PaymentsConroller::class, 'validation']);         //Rquired URL
Route::get('mpesa/register',[PaymentsConroller::class, 'register']);    


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
