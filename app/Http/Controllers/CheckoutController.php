<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\orders;

use App\Models\User;

use App\Models\Invoice;

use App\Models\Subscriber;

use App\Models\Payment;

use Session;

use Hash;

use App\Models\ReplyMessage;

use App\Models\Http\Requests;
use OpenGraph;
use SEOMeta;
use Twitter;

class CheckoutController extends Controller
{

  
    public function index(){
        $keywords = '';
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Checkout  - ' . $Settings->sitename . ' ');
            SEOMeta::setDescription('Vehicle Sounds Systems in Kenya, Car Sound Systems in Kenya, Car alarm Systems in Kenya' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '');
            OpenGraph::addProperty('type', 'articles');
            Twitter::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            Twitter::setSite('' . $Settings->twitter . '');
        $page_title = 'Checkout';
        $CartItems = Cart::content();
        $SiteSettings = DB::table('sitesettings')->get();
        $page_name = 'Cobfirm'; 
        $keywords = '';
        
        if(Auth::check()){
            // return redirect()->route('cart/checkout/payment','CheckoutController@payment');
            return redirect()->action('CheckoutController@payment');
        }
        else{
            
            return view('checkout.index', compact('keywords','CartItems','page_title','SiteSettings','page_name'));
        }
    }
         
        //Perfom a check to ensure that the cart is not empty
    }

    public function checkout_confirm(){
        $keywords = '';
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Checkout  - ' . $Settings->sitename . ' ');
            SEOMeta::setDescription('Vehicle Sounds Systems in Kenya, Car Sound Systems in Kenya, Car alarm Systems in Kenya' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '');
            OpenGraph::addProperty('type', 'articles');
            Twitter::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            Twitter::setSite('' . $Settings->twitter . '');
        $page_title = 'Confirm';
        $page_name = 'Cobfirm';
        $CartItems = Cart::content();
        $SiteSettings = DB::table('sitesettings')->get();
        $email = Auth::user()->email;
        $User = DB::table('users')->where('email',$email)->get();
        return view('checkout.checkout_confirm', compact('keywords','CartItems','page_title','SiteSettings','page_name'));
        }
    }

    public function payment(){
        // Check For Empty Carts
        $cart = Cart::count();
       
        if($cart == 0){
            // Redirect To Cart
            return redirect()->action('CartController@index');
        }else{
            // $ip = \Request::ip();
            $ip = '154.76.108.131';

            $data = \Location::get($ip);
            // Get The Delivery Charge
            $AreaCode =  30;
            if($AreaCode == '30'){
                $Shipping = 300;
            }else{
                $Shipping = 400;
            }

            // Create an invoice, Mail and Register
            // Create Invoice
            $MPESA = DB::table('invoices')->orderBy('id','DESC')->Limit('1')->get();
            $count_mpesa = count($MPESA);
            if($count_mpesa == 0){
                $InvoiceNumber = 'A-KE001';
                $OrderNumberNumber = 'A-KE001';
            }else{
                foreach($MPESA as $mpesa){
                    $LastID = $mpesa->id;
                    $Next = $LastID+1;
                    $InvoiceNumber = "A-KE0".$Next;
                    $OrderNumberNumber = "A-KE10".$Next;
            
                    }
            }
            
            $TotalCart = Cart::total();
            $PrepeTotalCart = str_replace( ',', '', $TotalCart );
            $FormatTotalCart = round($PrepeTotalCart, 0);
            $ShippingFee = $Shipping;
            $TotalCost = $FormatTotalCart+$ShippingFee;

            $CheckInvoice = DB::table('invoices')->where('number',$InvoiceNumber)->where('status','0')->where('user_id',Auth::user()->id)->get();
            $CountCheckInvoice = count($CheckInvoice);
            if($CountCheckInvoice == 0){
                 // Record Invoice
                 $Invoice = new Invoice;
                 $Invoice->number = $InvoiceNumber;
                 $Invoice->shipping = $Shipping;
                 $Invoice->products = serialize(Cart::Content());
                 $Invoice->user_id = Auth::user()->id;
                 $Invoice->amount = $TotalCost;
                 $Invoice->save();
                 // Mail Invoice
                 $email = Auth::user()->email;
                 $name = Auth::user()->name;
                 ReplyMessage::mailclientinvoice($email,$name,$InvoiceNumber,$ShippingFee,$TotalCost);
           
            }else{
                // The Invoice already Exists
               
            }
            

            //Go to payments page     
            $keywords = '';
            $SEOSettings = DB::table('seosettings')->get();
            foreach ($SEOSettings as $Settings) {
                SEOMeta::setTitle('Choose Payment Methods  - ' . $Settings->sitename . ' ');
                SEOMeta::setDescription('Vehicle Sounds Systems in Kenya, Car Sound Systems in Kenya, Car alarm Systems in Kenya' . $Settings->welcome . '');
                SEOMeta::setCanonical('' . $Settings->url . '');
                OpenGraph::setDescription('' . $Settings->welcome . '');
                OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . ''); 
                OpenGraph::setUrl('' . $Settings->url . '');
                OpenGraph::addProperty('type', 'articles');
                Twitter::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
                Twitter::setSite('' . $Settings->twitter . '');
                $page_title = 'Select Payment Method';
                $page_name = 'Cobfirm';
                $CartItems = Cart::content();
                $SiteSettings = DB::table('sitesettings')->get();
                $email = Auth::user()->email;
                $User = DB::table('users')->where('email',$email)->get();
                return view('checkout.checkout_payment', compact('InvoiceNumber','OrderNumberNumber','keywords','Shipping','CartItems','page_title','SiteSettings','page_name'));
            }
        }
    }

    public function shipping_method(){
        $page_name = 'Cobfirm';
        $email = Auth::user()->email;
        $User = DB::table('users')->where('email',$email)->get();
        $page_title = 'Checkout';
        $CartItems = Cart::content();
        $SiteSettings = DB::table('sitesettings')->get();
        return view('checkout.shipping_method', compact('CartItems','page_title','SiteSettings','page_name'));
    }

    public function checkout_billing(){
        $keywords = '';
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Checkout  - ' . $Settings->sitename . ' ');
            SEOMeta::setDescription('Vehicle Sounds Systems in Kenya, Car Sound Systems in Kenya, Car alarm Systems in Kenya' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '');
            OpenGraph::addProperty('type', 'articles');
            Twitter::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            Twitter::setSite('' . $Settings->twitter . '');
        $page_name = 'Cobfirm';
        $page_title = 'Checkout';
        if(Auth::check()){
            $email = Auth::user()->email;
            $User = DB::table('users')->where('email',$email)->get();
            return view('checkout.checkout_billing', compact('keywords','CartItems','page_title','SiteSettings','page_name'));
        }
        else{
            
            return view('checkout.index', compact('keywords','CartItems','page_title','SiteSettings','page_name'));
        }
    }
    }

    public function placeOrder(Request $request){
            $ip = \Request::ip();
    
            $ip = '154.79.70.69';

            $data = \Location::get($ip);
        
            $AreaCode =  $data->areaCode;
            if($AreaCode == '30'){
                $Shipping = 300;
            }else{
                $Shipping = 400;
            }

            // Create an invoice, Mail and Register
            // Create Invoice
            $MPESA = DB::table('invoices')->orderBy('id','DESC')->Limit('1')->get();
            foreach($MPESA as $mpesa){
            $LastID = $mpesa->id;
            $Next = $LastID+1;
            $InvoiceNumber = "A-KE0".$Next; 
   
        
            $TotalCart = Cart::total();
            $PrepeTotalCart = str_replace( ',', '', $TotalCart );
            $FormatTotalCart = round($PrepeTotalCart, 0);
            $ShippingFee = $Shipping;
            $TotalCost = $FormatTotalCart+$ShippingFee;
            
            // Mail Invoice
            $email = Auth::user()->email;
            $name = Auth::user()->name;
            $Name = Auth::user()->name;
            

            $Name = Auth::user()->name;
            Orders::createOrder();
            //destroy cart
            
            $page_title = 'Thank you!';
            $name = Auth::user()->name;
            $email = Auth::user()->email;
            $phone = Auth::user()->mobile;
            $service = 'Order';
            $pricee = Cart::content();
            foreach ($pricee as $key => $value) {
                $price = $value->price;
            
            $budget = 'Order';
            $content = 'Order';
            // ReplyMessage::mailclient($email,$name,$InvoiceNumber,$ShippingFee,$TotalCost);
            // ReplyMessage::mailmerchantCOD($email,$name,$phone,$value->price,$value->name);
            ReplyMessage::mailmerchant($email,$name,$phone);
    
            Cart::destroy();
            /**Load The Thank You Page */
            $SEOSettings = DB::table('seosettings')->get();
            foreach($SEOSettings as $Settings){
            SEOMeta::setTitle('Thanks You For Your Order'.$Settings->sitename.' - Orders');
            SEOMeta::setDescription(''.$Settings->welcome.'');
            SEOMeta::setCanonical(''.$Settings->url.'/clientarea/thankyou');

            OpenGraph::setDescription(''.$Settings->welcome.''); 
            OpenGraph::setTitle(''.$Settings->sitename.' - '.$Settings->welcome.'');
            OpenGraph::setUrl(''.$Settings->url.'/clientarea/thanksyou');
            OpenGraph::addProperty('type', 'articles');
            
            
            Twitter::setTitle(''.$Settings->sitename.' - '.$Settings->welcome.'');
            Twitter::setSite(''.$Settings->twitter.'');
            $id = Auth::user()->id;
            $page_name = '';
            $page_title = '';
            $keywords = 'Accessories Kenya';
        
            $page_title = 'Thank You for your purchase';
            return view('clientarea.thankyou',compact('page_title','page_name','page_title','keywords'));

            /** Load The Thank You Page */
            }
    }
}
    }

    public function placeOrderGet(Request $request){
        $ip = \Request::ip();
  
        $ip = '154.79.70.69';

        $data = \Location::get($ip);
       
        $AreaCode =  $data->areaCode;
        if($AreaCode == '30'){
            $Shipping = 300;
        }else{
            $Shipping = 400;
        }

        // Create an invoice, Mail and Register
        // Create Invoice
        $MPESA = DB::table('invoices')->orderBy('id','DESC')->Limit('1')->get();
        $countMPESA = count($MPESA);
        if($countMPESA == 0){
            $LastID = 1;
            $Next = $LastID+1;
            $InvoiceNumber = "A-KE0".$Next;
            $OrderNumberNumber = "A-KE10".$Next;
        }else{
            foreach($MPESA as $mpesa){
                $LastID = $mpesa->id;
                $Next = $LastID+1;
                $InvoiceNumber = "A-KE0".$Next;
                $OrderNumberNumber = "A-KE10".$Next;
              } 
        }
       
        $TotalCart = Cart::total();
        $PrepeTotalCart = str_replace( ',', '', $TotalCart );
        $FormatTotalCart = round($PrepeTotalCart, 0);
        $ShippingFee = $Shipping;
        $TotalCost = $FormatTotalCart+$ShippingFee;


        $CheckInvoice = DB::table('invoices')->where('number',$InvoiceNumber)->where('user_id',Auth::user()->id)->get();
        $CountCheckInvoice = count($CheckInvoice);
        if($CountCheckInvoice == 0){
            // Proceed to placeorder

        }else{
            // Record Invoice
            $Invoice = new Invoice;
            $Invoice->number = $InvoiceNumber;
            $Invoice->shipping = $Shipping;
            $Invoice->products = serialize(Cart::Content());
            $Invoice->user_id = Auth::user()->id;
            $Invoice->amount = $TotalCost;
            $Invoice->save();

            
            // Mail Invoice
            $email = Auth::user()->email;
            $name = Auth::user()->name;
            // ReplyMessage::mailclientinvoice($email,$name,$InvoiceNumber,$ShippingFee,$TotalCost);
        }
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $phone = Auth::user()->mobile;
        ReplyMessage::mailmerchant($email,$name,$phone);
        
        //  Place Order
        Orders::createOrder();
        Cart::destroy();
        /**Load The Thank You Page */
        $SEOSettings = DB::table('seosettings')->get();
        foreach($SEOSettings as $Settings){
        SEOMeta::setTitle('Thanks You For Your Order - '.$Settings->sitename.' - Orders');
        SEOMeta::setDescription(''.$Settings->welcome.'');
        SEOMeta::setCanonical(''.$Settings->url.'/clientarea/thankyou');

        OpenGraph::setDescription(''.$Settings->welcome.''); 
        OpenGraph::setTitle(''.$Settings->sitename.' - '.$Settings->welcome.'');
        OpenGraph::setUrl(''.$Settings->url.'/clientarea/thanksyou');
        OpenGraph::addProperty('type', 'articles');
        
        
        Twitter::setTitle(''.$Settings->sitename.' - '.$Settings->welcome.'');
        Twitter::setSite(''.$Settings->twitter.'');
        $id = Auth::user()->id;
        $page_name = '';
        $page_title = '';
        $keywords = 'Accessories Kenya';
       
        $page_title = 'Your Order Number #'.$OrderNumberNumber.' Has Been Placed!';
        return view('clientarea.thankyou',compact('page_title','page_name','page_title','keywords','OrderNumberNumber'));

        /** Load The Thank You Page */
        }
    }

    public function placeOrderGetAjaxNow(Request $request){
        //  Place Order
        Orders::createOrder();
        Cart::destroy();
        /**Load The Thank You Page */
        $SEOSettings = DB::table('seosettings')->get();
        foreach($SEOSettings as $Settings){
        SEOMeta::setTitle('Thanks You For Your Order - '.$Settings->sitename.' - Orders');
        SEOMeta::setDescription(''.$Settings->welcome.'');
        SEOMeta::setCanonical(''.$Settings->url.'/clientarea/thankyou');

        OpenGraph::setDescription(''.$Settings->welcome.''); 
        OpenGraph::setTitle(''.$Settings->sitename.' - '.$Settings->welcome.'');
        OpenGraph::setUrl(''.$Settings->url.'/clientarea/thanksyou');
        OpenGraph::addProperty('type', 'articles');
        
        
        Twitter::setTitle(''.$Settings->sitename.' - '.$Settings->welcome.'');
        Twitter::setSite(''.$Settings->twitter.'');
        $id = Auth::user()->id;
        $page_name = '';
        $page_title = '';
        $keywords = 'Accessories Kenya';
       
        $page_title = 'Thank You for your purchase';
        return view('clientarea.thankyou',compact('page_title','page_name','page_title','keywords'));

        /** Load The Thank You Page */
        }
    }

    public function checkout_payment(Request $request){
        $keywords = '';
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Payments  - ' . $Settings->sitename . ' ');
            SEOMeta::setDescription('Vehicle Sounds Systems in Kenya, Car Sound Systems in Kenya, Car alarm Systems in Kenya' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '');
            OpenGraph::addProperty('type', 'articles');
            Twitter::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            Twitter::setSite('' . $Settings->twitter . '');
        $page_title = 'Checkout';
        $description = 
        //Insert to orders table
        $orders = new orders;
        $orders->user_id = Auth::user()->id;
        $orders->total = Cart::total();
        $orders->description = $description;
        $orders->save();
        $cartItems = Cart::content();
        $SiteSettings = DB::table('sitesettings')->get();
        return view('front.checkout_payment', compact('keywords','cartItems','SiteSettings','page_title'));
        }
    }

    public function formvalidate(Request $request)
   {
        $page_title = 'Checkout';
        $password_confirm = $request->password_confirm;
        $password_inSecured = $request->password;
        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;
        //Checking if Session is active
        if(Auth::check()){
            //redirect back to complete checkout
            $CartItems = Cart::content();
            return Redirect::back();
           
        }else{
             //check pasword matching
             if($password_inSecured == $password_confirm){
                //register new user
                $User = new User;
                $User->name = $name;
                $User->email = $email;
                $User->mobile = $mobile;
                $User->password = Hash::make($password_inSecured);
                $User->save();
                //Login the user
                
                $user = User::where('email','=',$email)->first();
                Auth::loginUsingId($user->id, TRUE);

                

                return Redirect::back();
             }else{
                Session::flash('message', "Passwords Did Not Match");
                return Redirect::back();
             }
          
        }

     } 
    public function create(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password_confirm = $request->password_confirm;
        $password = $request->password;
        
        $User = DB::table('users')->where('email',$email)->get();
        $Check = count($User);
        if($password == $password_confirm){
            if($Check == 0){
                // create user
                $password_inSecured = $request->password;
                //harshing password Here
                $password = Hash::make($password_inSecured);
                $User = new User;
                $User->name = $request->name;
                $User->email = $request->email;
                $User->location = $request->location;
                $User->mobile = $request->mobile;
                $User->town = $request->town;
                $User->password = $password;
                $User->save(); 
                
                if($request->newsletter == 'on'){
                    // Add to Mailling List
                    $email = $request->email;
                    $Subscriber = new Subscriber;
                    $Subscriber->email = $email;
                    $Subscriber->save();
                }
               

                // Notify Client
                ReplyMessage::messageClient($request->email,$request->name);


                $user = User::where('email','=',$email)->first();
                Auth::loginUsingId($user->id, TRUE);
                // Redirect
                return Redirect::back();
            }else{
                Session::flash('message_error', "That email is already in use by another person");
                return Redirect::back();
            }
        }else{
            Session::flash('message_error', "Password Did Not Match!");
            // Return with form Data
            return Redirect::back()->withInput($request->input());
        }
            
        
    }

    

    public function login(Request $request){
        
        $email = $request->email;
        $password = $request->password; 
        $userdata = array(
            'email'     => $email,
            'password'  => $password
        );
        // Authenticate
        if (Auth::attempt($userdata)) {

            $user = User::where('email','=',$email)->first();
            Auth::loginUsingId($user->id, TRUE);
            return Redirect::back();
            
    
        } else {        
    
            Session::flash('message_error', "Wrong Username Or Password");
            return Redirect::back();
    
        }

    }

    
    public function updateShipping(Request $request){
        $id = Auth::user()->id;
       

            
            $updateDetails = array(
                'name'=>$request->name,
                'town'=>$request->town,
                'location'=>$request->location,
                'mobile'=>$request->mobile,
 
             
            );
           
            DB::table('users')->where('id',$id)->update($updateDetails);

            Session::flash('message', "Your Infomation Has Been Updated!");
            return "Success";
    
    }
    public function save(Request $request){
        $id = Auth::user()->id;
       
        $CartItems = Cart::content();
        if($request->email == Auth::user()->email ){
            
            $updateDetails = array(
                'name'=>$request->name,
                'address'=>$request->address,
                'location'=>$request->location,
                'mobile'=>$request->phone,
                'town'=>$request->town,
            
            );
           
            DB::table('users')->where('id',$id)->update($updateDetails);

            $page_name ='Shipping Method';
            $page_title ='Confirm';
            $keywords='Accessories Kenya';

            return redirect()->action('CheckoutController@checkout_confirm');
        }else{
            $updateDetails = array(
                'name'=>$request->name,
                'email'=>$request->email,
                'address'=>$request->address,
                'location'=>$request->location,
                'mobile'=>$request->phone,
                'town'=>$request->town,
            
            );
            DB::table('users')->where('id',$id)->update($updateDetails);
            $page_name ='Shipping Method';
            $page_title ='Confirm';
            $keywords='Accessories Kenya';
            // return redirect()->route('cart/checkout/order','CheckoutController@checkout_confirm');
            return redirect()->action('CheckoutController@checkout_confirm',[$param]);
        }
    }

    public function c2b(){
        $mpesa= new \Safaricom\Mpesa\Mpesa();

        $b2bTransaction=$mpesa->c2b($ShortCode, $CommandID, $Amount, $Msisdn, $BillRefNumber );
    }

    public function stk(){
        $mpesa= new \Safaricom\Mpesa\Mpesa();
       
          $BusinessShortCode = "174379";
          $TransactionType = 'CustomerPayBillOnline';
          $Timestamp = date('YmdHis'); 
          $PartyA = '254723014032';
          $PhoneNumber = '254723014032';
          $CallbackURL = 'https://amanivehiclesounds.co.ke/payments/callback_url.php';
          $AccountReference = 'Designekta Studios';
          $TransactionDesc = 'Designekta Studios';
          $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
          $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
          $Amount = '1';
          $PartyB = '254723014032';
          $$Remarks = '';
 
        $stkPushSimulation=$mpesa->STKPushSimulation($BusinessShortCode, $LipaNaMpesaPasskey, $TransactionType, $Amount, $PartyA, $PartyB, $PhoneNumber, $CallBackURL, $AccountReference, $TransactionDesc, $Remarks);
    }
}