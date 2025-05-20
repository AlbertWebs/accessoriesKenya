<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Message;
use App\Models\Notifications;
use App\Models\Privacy;
use App\Models\Quote;
use Vinkla\Instagram\Instagram;
use App\Models\ReplyMessage;
use App\Models\ServiceRequest;
use App\Models\Services;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\RFP;
use App\Models\Term;
use App\Models\Product;
use App\Models\Delivery;
use App\Models\User;
use App\Models\Testimonial;
use App\Models\Portfolio;
use Session;
use App\Models\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenGraph;
use SEOMeta;
use Twitter;

class HomeController extends Controller
{


    public function index1()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle(' ' . $Settings->sitename . ' - ' . $Settings->intro . '');
            SEOMeta::setDescription('Accessories Kenya, Printers in Nairobi, Photocopy Machines, Desktops In Kenya' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . 'Printers in Nairobi, Photocopy Machines, Desktops In Kenya, Laptops in Nairobi, Ex-UK Laptops');
            OpenGraph::setUrl('' . $Settings->url . '');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');

            $About = DB::table('about')->get();
            $Slider = DB::table('slider')->paginate(1);
            $Clients = 
            $Blog = DB::table('blog')->paginate(2);
            $Portfolio = DB::table('portfolio')->get();
            $Services = Services::all();
            $Testimonial =DB:: table('testimonial')->paginate(12);
            
            $Video = DB::table('videos')->paginate(1);
            $SiteSettings = DB::table('sitesettings')->get();
            $page_name = 'Home1';
            $page_title = 'Home Page';
           
            $keywords = 'Printers, Photocopies, External Hard Disks, Laptops';
            
            
            return view('front.index', compact('Blog', 'keywords', 'Video', 'About', 'SiteSettings', 'page_title', 'Testimonial', 'Slider', 'Services', 'Portfolio', 'page_name'));
        }
    }


    public function contact()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Contact Us | ' . $Settings->sitename . ' Photocopy Machines');
            SEOMeta::setDescription('Accessories Kenya, Contact Photocopy Machines saller ');
            SEOMeta::setCanonical('' . $Settings->url . 'contact-us');

            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/contact-us');
            OpenGraph::addProperty('type', 'website');

            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Contact';
            $page_title = 'Contact Us';
            $SiteSettings = DB::table('sitesettings')->get();
            $keywords = 'Desktops, Laptops';
            return view('front.contact', compact('page_title', 'SiteSettings', 'page_name','keywords'));
        }
    }


    

    public function about()
    {
        $SEOSettings = DB::table('seosettings')->get();
        
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('About Us | ' . $Settings->sitename . 'External Hard Disks ');
            SEOMeta::setDescription('Accessories Kenya' . 'Trancend External Hard Disks');
            SEOMeta::setCanonical('' . $Settings->url . 'about-us');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/about-us');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $Admin = Admin::all();
            $About = DB::table('about')->get();
            $SiteSettings = DB::table('sitesettings')->get();
            $Services = DB::table('services')->inRandomOrder()->paginate(2);
            $page_title = 'About Us';
            $Testimonial = DB::table('testimonial')->inRandomOrder()->paginate(3);
            $page_name = 'About';
            $keywords = 'Flash Disk Drives';
            return view('front.about', compact('keywords','Testimonial', 'page_title', 'page_name', 'Services', 'SiteSettings', 'About', 'Admin'));
        }
    }

    public function terms()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Terms and Conditions | ' . $Settings->sitename . '  ');
            SEOMeta::setDescription('Accessories Kenya Systems' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'terms-and-conditions');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/terms');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Terms';
            $Term = Term::all();
            $page_title = 'Terms Of Service';
            $keywords = 'Accessories Kenya';
            return view('front.terms', compact('page_title', 'Term', 'page_name','keywords'));
        }
    }

    public function delivery()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Terms Of Delivery | ' . $Settings->sitename . '  ');
            SEOMeta::setDescription('Accessories Kenya Systems' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'delivery');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/terms');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Terms';
            $Term = Delivery::all();
            $page_title = 'Terms Of Delivery';
            $keywords = 'Accessories Kenya';
            return view('front.delivery', compact('page_title', 'Term', 'page_name','keywords'));
        }
    }

    

    public function privacy()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Privacy Policy | ' . $Settings->sitename . '  ');
            SEOMeta::setDescription('Accessories Kenya Privacy Policies' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'privacy-policy');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/privacy-policy');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Terms';
            $Privacy = Privacy::all();
            $page_title = 'Privacy Policy';
            $keywords = 'Accessories Kenya';
            return view('front.privacy', compact('page_title', 'Privacy', 'page_name','keywords'));
        }
    }

    public function shipping()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Shipping Policy | ' . $Settings->sitename . '  ');
            SEOMeta::setDescription('Accessories Kenya Privacy Policies' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'privacy');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/privacy');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Terms';
            $Privacy = Privacy::all();
            $page_title = 'Privacy Policy';
            $keywords = 'Accessories Kenya';
            return view('front.privacy', compact('page_title', 'Privacy', 'page_name','keywords'));
        }
    }

    

    public function copyright()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Copyright Statement | ' . $Settings->sitename . '  ');
            SEOMeta::setDescription('Accessories Kenya Copyrights' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'copyright');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/copyright');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Terms';
            $Copyright = DB::table('copyright')->get();
            $page_title = 'Copyright Statement';
            $keywords = 'Accessories Kenya';
            return view('front.copyright', compact('page_title', 'keywords','Copyright', 'page_name'));
        }
    }

    public function services()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Our Services | ' . $Settings->sitename . ' Equilizers in Kenya, Boschmann Equilizer, Active Subwoofers, Amplifiers in kenya ');
            SEOMeta::setDescription('Vehicle Sound systems Installation, Car Alarm Installation, Car Screen Installation' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'services');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/services');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Services';
            $Services = Services::all();
            $page_title = 'Our Services';
            $keywords = 'Vehicle sound systems installation, car sound systems installaton Services';
            return view('front.services', compact('Services', 'page_title', 'page_name','keywords'));
        }
    }

    public function subscribe(Request $request)
    {
        $FindMail = DB::table('subscribers')->where('email', $request->email)->get();
        $Countmails = count($FindMail);
        if ($Countmails == 0) {
            $email = $request->email;
            $Subscriber = new Subscriber;
            $Subscriber->email = $email;
            $Subscriber->save();
            $results = "You have successfully subscribed to our news letters";
            ReplyMessage::notification($email);
            return $results;
            
        } else {
            $results =  "You are already in our subscribers list thank you for staying with us";
            
            return $results;
            
        }


    }
    public function request_quote()
    {
        $page_title = 'Request Quote';
        $SiteSettings = DB::table('sitesettings')->get();
        return view('front.request_quote', compact('page_title', 'SiteSettings'));
    }
    public function servicerequest($id)
    {
        $page_title = 'Order Service';
        $Pricings = DB::table('pricing')->where('id', $id)->get();
        return view('front.servicerequest', compact('page_title', 'Pricings'));
    }

    public function service_request(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $id = $request->id;
        $service = $request->service;
        $price = $request->price;
        $content = $request->content;
        $budget = $request->budget;

        $ServiceRequest = new ServiceRequest;
        $ServiceRequest->name = $name;
        $ServiceRequest->email = $email;
        $ServiceRequest->serviceID = $id;
        $ServiceRequest->service = $service;
        $ServiceRequest->content = $content;
        $ServiceRequest->price = $price;
        $ServiceRequest->budget = $budget;
        $ServiceRequest->save();
        ReplyMessage::mailrequest($name, $email, $service, $price, $content, $budget);
        return "Your Request Has Been Received,If we dont respond within an hour kindly contact us through our contact form,call us or use the live chat";
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $isExists = \App\Models\User::where('email', $email)->first();
        //Create The Logics To return AJAX
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }

    public function getQuote(Request $request)
    {
    
        $name = $request->name;
        $email = $request->email;
        $phone = $request->mobile;
        $subject = "Quote Request";
        $content = $request->message;
        $Quote = new Quote;
        $Quote->name = $name;
       
        $Quote->email = $email;
        $Quote->mobile = $phone;
        $Quote->content = $content;
        $Quote->save();
        //Add Notification
       
        $Notifications = new Notifications;
        $Notifications->type = 'Quote';
        $Notifications->content = 'You have a new Quote Request';
        $Notifications->save();
        $theMessage = "Hi admin, This is a Quote Request From, $name with email: $email and Phone Number: $phone the message is: $content ";
        ReplyMessage::mailNotificaton($name, $email, $subject, $theMessage);
        Session::flash('message', "Your Quote Has Been Posted");
        return Redirect::back();

    }

    public function searchsite(Request $request)
    {
        Session::forget('Category');
        $keywords = '';
        $category = $request->category;
        $search = $request->search;
        if($category == '0'){
            $Products = DB::table('product')->where('name', 'like', '%' . $request->search . '%')->paginate(100);
            $page_name = $request->search;
            $page_title = $request->search;
            $search_results = $search;
            $search_results_category = 'All Categories';
            $SEOSettings = DB::table('seosettings')->get();
            foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Our Products | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Pioneer Car Speakers, Sony Car Speakers, Kenwood Car speakers, Kenwood speakers, Sony Speakers' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'searchsite/'.$search_results_category.'');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/products/grid');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            
            return view('front.products', compact('page_title','keywords', 'Products', 'page_name', 'search_results', 'search_results_category'));
            }
        }else{
            $Products = DB::table('product')->where('cat',$category)->where('name', 'like', '%' . $request->search . '%')->paginate(100);
            $page_name = $request->search;
            $page_title = $request->search;
            $search_results = $search;
            $search_results_category = $category;
            $SEOSettings = DB::table('seosettings')->get();
            foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Our Products | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Pioneer Car Speakers, Sony Car Speakers, Kenwood Car speakers, Kenwood speakers, Sony Speakers' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'searchsite/'.$search_results_category.'');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/products/grid');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            }
            return view('front.products', compact('page_title','keywords', 'Products', 'page_name', 'search_results', 'search_results_category'));
        }
        
    }
    

    public function grid(){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Our Products | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Pioneer Car Speakers, Sony Car Speakers, Kenwood Car speakers, Kenwood speakers, Sony Speakers' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'products/grid');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/products/grid');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Products';
            $search_results ='';
            $search_results_category = '';
            $page_title = 'Products';
            $Products = DB::table('product')->inRandomOrder()->paginate(15);
            $keywords = 'Sony Car Tweeters, Sony Car Ampifires, Kenwood Car Speakers, Kenwood Car Subwoofers, Sony car Subwoofers';
            return view('front.grid', compact('keywords','page_title', 'Products', 'page_name', 'search_results', 'search_results_category'));
        }
        
    }
 
    
    public function specialoffers(){ 
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Special Offers | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Pioneer Car Speakers, Sony Car Speakers, Kenwood Car speakers, Kenwood speakers, Sony Speakers' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'special-offers');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/special-offers');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Products';
            $Copyright = DB::table('copyright')->get();
            $page_title = 'Products';
            $search_results ='';
            $search_results_category = '';
            $Products = DB::table('product')->where('offer','1')->OrderBy('id','DESC')->paginate(20);
            $keywords = 'Sony Car Tweeters, Sony Car Ampifires, Kenwood Car Speakers, Kenwood Car Subwoofers, Sony car Subwoofers';
            return view('front.special-offers', compact('keywords','page_title', 'Products', 'page_name', 'search_results', 'search_results_category'));
        }
        
    }
    public function products(){ 
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Products | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Accessories Kenya Photocopy and Printers, Ex-Uk Laptops, Desktop Computers, Smartphones');
            SEOMeta::setCanonical('' . $Settings->url . 'products');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . 'products');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Products';
            $Copyright = DB::table('copyright')->get();
            $page_title = 'Products';
            $search_results ='';
            $search_results_category = '';
            $Products = DB::table('product')->OrderBy('id','DESC')->paginate(30);
            $keywords = 'Accessories Kenya Photocopy and Printers, Ex-Uk Laptops, Desktop Computers, Smartphones';
            return view('front.products', compact('keywords','page_title', 'Products', 'page_name', 'search_results', 'search_results_category'));
        }
        
    }

    public function portfolio(){ 
       
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Our Work | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Pioneer Car Speakers, Sony Car Speakers, Kenwood Car speakers, Kenwood speakers, Sony Speakers' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'our-portfolio');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/products');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Products';
            $Copyright = DB::table('copyright')->get();
            $page_title = 'Portfolio';
            $search_results ='';
            $search_results_category = '';
            $Products = DB::table('portfolio')->OrderBy('id','DESC')->paginate(18);
            $keywords = 'Accessories Kenya Photocopy and Printers, Ex-Uk Laptops, Desktop Computers, Smartphones';
            return view('front.portfolio', compact('keywords','page_title', 'Products', 'page_name', 'search_results', 'search_results_category'));
        }
        
    }

    


    public function product($title){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        $Products = DB::table('product')->where('slung',$title)->get();
        foreach ($Products as $key => $value) {
            foreach ($SEOSettings as $Settings) {
                SEOMeta::setTitle(' '.$value->name.' | ' . $Settings->sitename .'');
                SEOMeta::setDescription(' '.$value->name.' in kenya ,'.$value->name.' in Nairobi, Cheap '.$value->name.' in Nairobi  ');
                SEOMeta::setCanonical('' . $Settings->url . 'product/'.$title.'');
                OpenGraph::setDescription('' . $Settings->welcome . '');
                OpenGraph::setTitle(' '.$value->name.' | ' . $Settings->sitename .'');
                OpenGraph::setUrl('' . $Settings->url . 'product/'.$title.'');
                OpenGraph::addProperty('type', 'website');
                Twitter::setTitle('' . $Settings->sitename . '' );
                Twitter::setSite('' . $Settings->twitter . '');
                $page_name = 'details';
                $Copyright = DB::table('copyright')->get();
                $page_title = $title;
                $Products = DB::table('product')->where('slung',$title)->get();
                $keywords = $title;
                return view('front.product', compact('keywords','page_title', 'Products', 'page_name'));
            }
        }
        
        
    }

    public function loadModal($id){
        
       $user = Product::find($id);
       $csfr = csrf_field();
       $url = url('/');
       
       if($user->stock == 'Out of Stock')
       {
           $OurStock = 'Out of Stock';
           $color = 'color:#FF0000;';
           $Font = 'font-weight:700;';
       }else{
            $OurStock = 'In Stock';
            $color = 'color:#00FF00;';
            $Font = 'font-weight:700;';
       }
       
       
       if($user->offer == 1){
          $ProcessedPrice = '<span class="product-price text-center"><del>'.$user->price_raw.'</del> <span class="new-price">KES '.$user->price.'</span> </span>';
       }else{
          $ProcessedPrice = '<span class="product-price text-center"> <span class="new-price">KES '.$user->price.'</span> </span>';
       }
  
       $htmlFormated = 
       "
       <div class='modal-body'>
        <div class='row'>
            <div class='col-md-8 mx-auto col-lg-5 mb-5 mb-lg-0'>
                <div class='product-sync-init mb-20'>
                    <div class='single-product'>
                    <div class='product-thumb'>
                        <img src='$url/uploads/product/$user->image_one' alt='$user->name'>
                    </div>
                    </div>
                  
                </div>

                
            </div>
            <div class='col-lg-7 mt-5 mt-md-0'>
                <div class='modal-product-info'>
                    <div class='product-head'>
                    <h2 class='title'>$user->name</h2>
                    <h4 class='sub-title'>REF: $user->code</h4>

                    
                    <h4 style='$color $Font'>Stock: $OurStock</h4>

                    </div>
                    <div class='product-body'>
                    $ProcessedPrice
                    <p>$user->meta</p>
                    
                    </div>
                   
                    <div class='product-footer'>
                    <div class='product-count style d-flex flex-column flex-sm-row mt-5 mb-5 pt-3'>
                        
                        <div class='count d-flex'>
                            <input type='number' readonly min='1' max='10' step='1' value='1'>
                        </div>
                        <div>
                            <a href='$url/cart/addToTheCart/$user->id' class='btn btn-primary rounded mt-5 mt-sm-0'>
                                <span class='mr-2'><i class='ion-android-add'></i></span>
                                Buy Now
                            </a>
                        </div>
                    </div>
                    
                    
                    </div>
                </div>
            </div>
        </div>
        </div>
       ";
       return $htmlFormated;

       //return view('front.modal',['data'=>$user]);

    }

    

    public function fullPackages(){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Products | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Pioneer Car Speakers, Sony Car Speakers, Kenwood Car speakers, Kenwood speakers, Sony Speakers' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'products');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/products');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'Products';
            $Copyright = DB::table('copyright')->get();
            $page_title = 'Products';
            $search_results ='';
            $search_results_category = ''; 
            $Products = DB::table('product')->where('full','1')->inRandomOrder()->paginate(15);
            $keywords = 'Sony Car Tweeters, Sony Car Ampifires, Kenwood Car Speakers, Kenwood Car Subwoofers, Sony car Subwoofers';
            return view('front.productsFull', compact('keywords','page_title', 'Products', 'page_name', 'search_results', 'search_results_category'));
        }
        
    }


    public function fullPackage($title){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle(' '.$title.' | ' . $Settings->sitename .'');
            SEOMeta::setDescription('kenwood Speakers in kenya, Sony Speakers in kenya, '.$title.' ' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'product/'.$title.'');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/product/'.$title.'');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'details';
            $Copyright = DB::table('copyright')->get();
            $page_title = $title;
            $Products = DB::table('product')->where('name',$title)->get();
            $keywords = $title;
            return view('front.product', compact('keywords','page_title', 'Products', 'page_name'));
        }
        
    }

    
    
    public function code($code){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle(' '.$code.' | ' . $Settings->sitename .'');
            SEOMeta::setDescription('kenwood Speakers in kenya, Sony Speakers in kenya, '.$code.' ' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . ''.$code.'');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/'.$code.'');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = 'details';
            $Copyright = DB::table('copyright')->get();
            $page_title = $code;
            $Products = DB::table('product')->where('code',$code)->get();
            $keywords = $code;
            return view('front.product', compact('keywords','page_title', 'Products', 'page_name'));
        }
        
    }

    

    public function commingsoon()
    {
        $page_title = 'We will be Back Shortly';
        $page_name = 'We will be Back Shortly';
        return view('front.commingsoon', compact('page_title', 'page_name'));
    }
    public function submitMessage(Request $request) 
    {
       

        if ($request->faxonly) {
            Session::flash('message', "Your Message Has Been Sent");
            return Redirect::back();
        }else{
            $email = $request->email;
            $name = $request->name;
            $phone = $request->phone;
            $message = $request->message;
            $subject = $request->subject;
    
        
     
            $Message = new Message;
            $Message->name = $name;
            $Message->email = $email;
            $Message->mobile = $phone;
            $Message->subject = $subject;
            $Message->content = $message;
            
             //Send Mail Notification
            //  ReplyMessage::mailNotificaton($name, $email, $subject, $message);


            $Message->save();
            $Notifications = new Notifications;
            $Notifications->type = 'Message';
            $Notifications->content = 'You have a new Message';
            $Notifications->save();
            
            Session::flash('message', "Your Message Has Been Sent");
            return Redirect::back();
        }
        
        
    }

    public function quote()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Request Quote | ' . $Settings->sitename . ' - ' . $Settings->intro . ' ');
            SEOMeta::setDescription('' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'quote');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/quote');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_title = 'Get Quote';
            $page_name = 'Get a Quote';
            return view('front.quote', compact('page_title', 'page_name'));
        }
    }
    public function who()
    {
        $SEOSettings = DB::table('seosettings')->get();
        $page_name = 'What we do';
        $Action = DB::table('actions')->get();
        $page_title = 'What we do';
        $page_titleSEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('What we do | ' . $Settings->sitename . ' - ' . $Settings->intro . ' ');
            SEOMeta::setDescription('' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '' . $page_title . '');

            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/who');
            OpenGraph::addProperty('type', 'website');

            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');

            return view('front.who', compact('page_title', 'page_name','Action'));
        }
    }

    public function version(){
  
        return view('version',compact('page_title','page_name'));
    }

    public function rfp(){
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Submit RFP | ' . $Settings->sitename . ' - ' . $Settings->intro . ' ');
            SEOMeta::setDescription('' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . 'rfp');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/rfp');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_title = 'Submit RFP';
            $page_name = 'Submit RFP';
            return view('front.rfp', compact('page_title', 'page_name'));
        }
    }

    public function post_rfp(Request $request){
        // Get Form Data
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $phone = $request->phone;
        $message = $request->message;

        // Upload
        $path = 'uploads/RFP';
        if(isset($request->file)){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $rfp_file = $filename;
        }else{
            $rfp_file = $request->logo_cheat;
        }

        // Save
        $RFP = new RFP;
        $RFP->fname = $fname;
        $RFP->lname = $lname;
        $RFP->email = $email;
        $RFP->phone = $phone;
        $RFP->message =  $message;
        $RFP->file = $rfp_file;
        // Email Stagepass
        ReplyMessage::sendrfp($fname,$email,$phone,$message,$phone);

        // Redirect
        Session::flash('message', "Your Info Has Been Received");
        return Redirect::back();
    }

    public function gallery(){
        $SEOSettings = DB::table('seosettings')->get();
        $page_name = 'Gallery';
        $page_title = 'Gallery';
        $Gallery = DB::table('gallery')->paginate(12);
        $page_titleSEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Gallery | ' . $Settings->sitename . ' - ' . $Settings->intro . ' ');
            SEOMeta::setDescription('' . $Settings->welcome . '');
            SEOMeta::setCanonical('gallery' . $Settings->url . '/' . $page_title . '');

            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/gallery');
            OpenGraph::addProperty('type', 'website');

            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');

            return view('front.gallery', compact('page_title', 'page_name','Gallery'));
        } 
    }
    
    public function brand($title){
        Session::forget('Category'); 
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle(' '.$title.' Accessories in Kenya | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Accessories Kenya Brands');
            SEOMeta::setCanonical('' . $Settings->url . 'products/brand/'.$title.'');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/product/brand/');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename . '' );
            Twitter::setSite('' . $Settings->twitter . '');
            $page_name = $title;
        
            $page_title = 'Products';
            $search_results ='';
            $search_results_category = '';
            $Products = DB::table('product')->where('brand',$title)->paginate(24);
            $keywords = ''.$title.' Accessories in Kenya';
            return view('front.productss', compact('keywords','page_title', 'Products', 'page_name','search_results','search_results_category'));
    }
}
            public function cat($title){
                Session::forget('Category');
                $Category = DB::table('category')->where('cat',$title)->get();
                $page_name = $title;
                    foreach ($Category as $key => $value) {
                        $SEOSettings = DB::table('seosettings')->get();
                        foreach ($SEOSettings as $Settings) {
                            SEOMeta::setTitle(' '.$page_name.' | ' . $Settings->sitename .'');
                            SEOMeta::setDescription(''.$title.'' . $Settings->welcome . '');
                            SEOMeta::setCanonical('' . $Settings->url . 'product/cat/'.$title.'');
                            OpenGraph::setDescription('' . $Settings->welcome . '');
                            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
                            OpenGraph::setUrl('' . $Settings->url . '/product/cat/');
                            OpenGraph::addProperty('type', 'website');
                            Twitter::setTitle('' . $Settings->sitename . '' );
                            Twitter::setSite('' . $Settings->twitter . '');
                            // Set Session Here
                            Session::put('Category', $title);
                            // End Session Here
                            $page_name = $title;
                        
                            $page_title = 'Products';
                            $search_results ='';
                            $search_results_category = '';
                            $keywords = $title;
                            $Products = DB::table('product')->where('cat',$value->id)->paginate(12);
                            return view('front.products', compact('keywords','page_title', 'Products', 'page_name','search_results','search_results_category'));
                    }
                }


               
            }

            public function productss($title){
          
                Session::forget('Category');
                $Category = DB::table('category')->where('slung',$title)->get();
                $page_name = $title;
                    foreach ($Category as $key => $value) {
                        $page_name = $value->cat;
                        $SEOSettings = DB::table('seosettings')->get();
                        foreach ($SEOSettings as $Settings) {
                            SEOMeta::setTitle(' '.$page_name.' | '.$page_name.' in kenya, '.$page_name.' in Nairobi, Cheap '.$page_name.' in Nairobi | ' . $Settings->sitename .'');
                            SEOMeta::setDescription(''.$title.'' . $Settings->welcome . '');
                            SEOMeta::setCanonical('' . $Settings->url . 'products/'.$title.'');
                            OpenGraph::setDescription(' '.$page_name.' | ' . $Settings->sitename .'');
                            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
                            OpenGraph::setUrl('' . $Settings->url . 'products/'.$title.'');
                            OpenGraph::addProperty('type', 'website');
                            Twitter::setTitle('' . $Settings->sitename . '' );
                            Twitter::setSite('' . $Settings->twitter . '');
                            // Set Session Here
                            Session::put('Category', $title);
                            // End Session Here
                            $page_name = $title;
                        
                            $page_title = $value->cat;
                            $page_name = $page_title;
                            $search_results ='';
                            $search_results_category = '';
                            $keywords = $title;
                            $Products = DB::table('product')->where('cat',$value->id)->paginate(24);
                            return view('front.products-cat', compact('keywords','page_title', 'Products','Category', 'page_name','search_results','search_results_category'));
                    }
                }


               
            }

            

            public function catt($titlee){
                $title = str_replace("-", " ", $titlee);
                Session::forget('Category');
                // UnSetting a Session
                $Category = DB::table('category')->where('cat',$title)->get();
                    foreach ($Category as $key => $value) {
                        $SEOSettings = DB::table('seosettings')->get();
                        foreach ($SEOSettings as $Settings) {
                            SEOMeta::setTitle(' '.$title.' | ' . $Settings->sitename .'');
                            SEOMeta::setDescription(''.$title.'' . $Settings->welcome . '');
                            SEOMeta::setCanonical('' . $Settings->url . 'product/cat/'.$title.'');
                            OpenGraph::setDescription('' . $Settings->welcome . '');
                            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
                            OpenGraph::setUrl('' . $Settings->url . '/product/cat/');
                            OpenGraph::addProperty('type', 'website');
                            Twitter::setTitle('' . $Settings->sitename . '' );
                            Twitter::setSite('' . $Settings->twitter . '');
                            // Set Session Here
                            Session::put('Category', $title);
                            // End Session Here
                            $page_name = $title;
                        
                            
                            $page_title = 'Products';
                            $search_results ='';
                            $search_results_category = '';
                            $keywords = $title;
                            $Products = DB::table('product')->where('cat',$value->id)->paginate(12);
                            return view('front.products', compact('keywords','page_title', 'Products', 'page_name','search_results','search_results_category'));
                    }
                }


               
            }
            

            public function search(Request $request)
            {
            if($request->search == null or $request->search == ''){
                $output = '';
                return Response($output);
            }else
                $url = url('/product/');
                if($request->ajax())
                {
                $output="";
                $products=DB::table('product')->where('name','LIKE','%'.$request->search."%")->paginate(10);
                if($products)
                {
                foreach ($products as $key => $product) {
                $output.='<tr>'.
                
                '<td><a href="'.$url.'/'.$product->slung.'"><b>'.$product->name.'</b></a></td>'.
                '<td>'.$product->meta.'</td>'.
                '<td><a href="'.$url.'/'.$product->slung.'"><b>'.$product->price.'/=</b></a></td>'.
                '</tr>';
                }
                return Response($output);
                    }
                    }
            }
            


        
            
        
}