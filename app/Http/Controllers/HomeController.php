<?php



namespace App\Http\Controllers;


use App\Models\Booking;	
use App\Models\SellerAward;	
use App\Models\SellerEducation;	
use App\Models\SellerExperience;
use Illuminate\Http\Request;

use Auth;

use Hash;

use App\Models\Category;

use App\Models\FlashDeal;

use App\Models\Brand;

use App\Models\Product;

use App\Models\PickupPoint;

use App\Models\CustomerPackage;

use App\Models\User;

use App\Models\Seller;

use App\Models\Shop;

use App\Models\Order;

use App\Models\BusinessSetting;

use App\Models\Coupon;

use Cookie;

use Illuminate\Support\Str;

use App\Mail\SecondEmailVerifyMailManager;

use App\Models\AffiliateConfig;
use App\Models\AffiliateUser;
use App\Models\Page;

use Mail;

use Illuminate\Auth\Events\PasswordReset;

use Cache;	
use Illuminate\Support\Facades\DB;	
use Stevebauman\Location\Facades\Location;

use App\Utility\CategoryUtility;



class HomeController extends Controller

{

    /**

     * Show the application frontend home.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $featured_categories = Cache::rememberForever('featured_categories', function () {

            return Category::where('featured', 1)->get();

        });



        $todays_deal_products = Cache::rememberForever('todays_deal_products', function () {

            return filter_products(Product::where('published', 1)->where('todays_deal', '1'))->get();

        });



        $newest_products = Cache::remember('newest_products', 3600, function () {

            return filter_products(Product::latest())->limit(12)->get();

        });



        return view('frontend.index', compact('featured_categories', 'todays_deal_products', 'newest_products'));

    }



    public function login()

    {

        if(Auth::check()){

            return redirect()->route('home');

        }

        return view('frontend.user_login');

    }



    public function registration(Request $request)

    {

        if(Auth::check()){

            return redirect()->route('home');

        }

        if($request->has('referral_code') && addon_is_activated('affiliate_system')) {

            try {

                $affiliate_validation_time = AffiliateConfig::where('type', 'validation_time')->first();

                $cookie_minute = 30 * 24;

                if($affiliate_validation_time) {

                    $cookie_minute = $affiliate_validation_time->value * 60;

                }



                Cookie::queue('referral_code', $request->referral_code, $cookie_minute);

                $referred_by_user = User::where('referral_code', $request->referral_code)->first();



                $affiliateController = new AffiliateController;

                $affiliateController->processAffiliateStats($referred_by_user->id, 1, 0, 0, 0);

            } catch (\Exception $e) {



            }

        }

        return view('frontend.user_registration');

    }



    public function cart_login(Request $request)

    {

        $user = null;

        if($request->get('phone') != null){

            $user = User::whereIn('user_type', ['customer', 'seller'])->where('phone', "+{$request['country_code']}{$request['phone']}")->first();

        }

        elseif($request->get('email') != null){

            $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->first();

        }



        if($user != null){

            if(Hash::check($request->password, $user->password)){

                if($request->has('remember')){

                    auth()->login($user, true);

                }

                else{

                    auth()->login($user, false);

                }

            }

            else {

                flash(translate('Invalid email or password!'))->warning();

            }

        }

        else{

            flash(translate('Invalid email or password!'))->warning();

        }

        return back();

    }



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        //$this->middleware('auth');

    }



    /**

     * Show the customer/seller dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function dashboard()

    {

        if(Auth::user()->user_type == 'seller'){

            return view('seller.dashboard');

        }

        elseif(Auth::user()->user_type == 'customer'){

            return view('frontend.user.customer.dashboard');

        }

        elseif(Auth::user()->user_type == 'delivery_boy'){

            return view('delivery_boys.frontend.dashboard');

        }

        else {

            abort(404);

        }

    }



    public function profile(Request $request)

    {

        if(Auth::user()->user_type == 'delivery_boy'){

            return view('delivery_boys.frontend.profile');

        }

        else{

            return view('frontend.user.profile');

        }

    }



    public function userProfileUpdate(Request $request)

    {

        if(env('DEMO_MODE') == 'On'){

            flash(translate('Sorry! the action is not permitted in demo '))->error();

            return back();

        }



        $user = Auth::user();

        $user->name = $request->name;

        $user->address = $request->address;

        $user->country = $request->country;

        $user->city = $request->city;

        $user->postal_code = $request->postal_code;

        $user->phone = $request->phone;



        if($request->new_password != null && ($request->new_password == $request->confirm_password)){

            $user->password = Hash::make($request->new_password);

        }



        $user->avatar_original = $request->photo;

        $user->save();



        flash(translate('Your Profile has been updated successfully!'))->success();

        return back();

    }



    public function flash_deal_details($slug)

    {

        $flash_deal = FlashDeal::where('slug', $slug)->first();

        if($flash_deal != null)

            return view('frontend.flash_deal_details', compact('flash_deal'));

        else {

            abort(404);

        }

    }



    public function load_featured_section(){

        return view('frontend.partials.featured_products_section');

    }



    public function load_best_selling_section(){

        return view('frontend.partials.best_selling_section');

    }



    public function load_auction_products_section(){

        if(!addon_is_activated('auction')){

            return;

        }

        return view('auction.frontend.auction_products_section');

    }



    public function load_home_categories_section(){

        return view('frontend.partials.home_categories_section');

    }



    public function load_best_sellers_section(){

        return view('frontend.partials.best_sellers_section');

    }
    	
    public function seller_booking($slug)	
    {	
        $seller = Shop::where('slug', $slug)->first();	
        if ($seller != null) {	
            $seller_services = $this->seller_services($slug);	
            $categories = $seller_services['categories'];	
            $producstList = $seller_services['producstList'];	
            $todays_deal_products = $seller_services['todays_deal_products'];	
            return view('frontend.booking', compact('seller','seller_services','categories','producstList','todays_deal_products'));	
        }	
        abort(404);	
    }	
    public function seller_booking_store(Request $request)	
    {	
        $booking = Booking::create([	
            'date_and_time' => $request->input('date_and_time'),	
            'shop_id' => $request->input('shop_id'),	
            'user_id' => Auth::user()->id,	
            'status' => 'pending'	
        ]);	
        session(['booking_id' => $booking->id]);	
        return redirect()->route('checkout.shipping_info');	
    }	


    public function trackOrder(Request $request)

    {

        if($request->has('order_code')){

            $order = Order::where('code', $request->order_code)->first();

            if($order != null){

                return view('frontend.track_order', compact('order'));

            }

        }

        return view('frontend.track_order');

    }



    public function product(Request $request, $slug)

    {
        $detailedProduct  = Product::with('reviews', 'brand', 'stocks', 'user', 'user.shop')->where('auction_product', 0)->where('slug', $slug)->where('approved', 1)->first();

        if($detailedProduct != null && $detailedProduct->published){
            if($request->has('product_referral_code') && addon_is_activated('affiliate_system')) {

                $affiliate_validation_time = AffiliateConfig::where('type', 'validation_time')->first();
                $cookie_minute = 30 * 24;
                if($affiliate_validation_time) {
                    $cookie_minute = $affiliate_validation_time->value * 60;
                }
                Cookie::queue('product_referral_code', $request->product_referral_code, $cookie_minute);
                Cookie::queue('referred_product_id', $detailedProduct->id, $cookie_minute);

                $referred_by_user = User::where('referral_code', $request->product_referral_code)->first();

                $affiliateController = new AffiliateController;
                $affiliateController->processAffiliateStats($referred_by_user->id, 1, 0, 0, 0);
            }
            //return redirect('all/services#pr' . $detailedProduct->id);
            if($detailedProduct->digital == 1){
                return view('frontend.digital_product_details', compact('detailedProduct'));
            }
            else {
                return view('frontend.product_details', compact('detailedProduct'));
            }
        }
        abort(404);
    }



    public function services_cat111(Request $request)

    {

        // return Category::with('products')->orderBy('id','desc')->get();

        // $producstList  = Product::with('brand','user','category')->where('auction_product', 0)->where('approved', 1)->get();



        // foreach($producstList as $k=>$v){

        //     if($v->category->parent_id == 0){

        //         $id = $v->category->id;

        //     }else{

        //         $id = $v->category->parent_id;

        //     }

        //     $producstList[$k]['main_category'] = Category::where('id', $id)->value('name');

        // }



        // return $producstList;

        // $productlist = [];



        //   return $category_ids = CategoryUtility::children_ids(12);

        // $category_ids[] = $category_id;



        $producstList1 = Category::select('id','parent_id','name')->where('level', 0)->orderBy('order_level', 'desc')->get();

        $producstList = [];

        foreach($producstList1 as $k=>$v){

            //  echo $v->id.'---'.$v->parent_id.'<br/>';



            $category_ids = CategoryUtility::children_ids($v->id);

            $producstList[$k]['products'] = Product::with('brand','category')->where('auction_product', 0)->where('approved', 1)->whereIn('category_id',$category_ids)->get();



            foreach($producstList[$k]['products'] as $a=>$b){



                // if($category_ids[0] === $b->category_id){

                $producstList[$k]['products'][0]['main_category'] = $v->name;

                // }

            }



        }





        // return $producstList;

        $categories = Category::where('level', 0)->orderBy('order_level', 'desc')->get();

        return view('frontend.cat_services', compact('categories','producstList'));





        // abort(404);

    }


    

    public function services_cat(Request $request)
    {
                // return Category::with('products')->orderBy('id','desc')->get();
               /* $producstList  = Product::with('brand','user','category')->where('auction_product', 0)->where('approved', 1)->get();
                foreach($producstList as $k=>$v){
                    if($v->category->parent_id == 0){
                        $id = $v->category->id;
                    }else{
                        $id = $v->category->parent_id;
                    }
                    $producstList[$k]['main_category'] = Category::where('id', $id)->value('name');
                }*/

                //$productlist = [];

                $dataCatIds = [];
                
                $categories = [];
                $catIds = Product::where('added_by', 'admin')->where('auction_product', 0)->where('approved', 1)->groupBy('category_id')->pluck('category_id')->toArray();
                
                
                /*=================*/
                $geParentIds = Category::whereIn('id',$catIds)->where('parent_id', '!=', 0)->groupBy('parent_id')->pluck('parent_id')->toArray();
                //return $geParentIds;
                
                //$whereInCat['catIds'] = $catIds;
                //$whereInCat['geParentIds'] = $geParentIds;
                $getParentCategory = Category::select('id','parent_id','name','icon','banner')
                        ->whereIn('id',$geParentIds)
                        ->orderBy('order_level', 'desc')->get();
                //return $getParentCategory;
                
                if(count($getParentCategory)){
                    foreach($getParentCategory as $k=>$v){
                        $subCategories = Category::with('categories')->whereIn('id',$catIds)->where('parent_id',$v->id)->get();
                        $getParentCategory[$k]['childrenCategories'] = $subCategories;

                        $resproducts = Product::with('brand','user','category')->where('added_by', 'admin')->where('auction_product', 0)->where('approved', 1)->where('category_id', $v->id)->orderBy('id', 'desc')->get();
                        $subCategoryIds = Category::with('categories')->whereIn('id',$catIds)->where('parent_id',$v->id)->pluck('id')->toArray();
                        $resSubCatproducts = Product::with('brand','user','category')->where('added_by', 'admin')->where('auction_product', 0)->where('approved', 1)->whereIn('category_id', $subCategoryIds)->orderBy('id', 'desc')->get();
                        if(count($resSubCatproducts)){
                            $resproducts = $resproducts->merge($resSubCatproducts);
                        }
                        
                        if (Auth::check() && addon_is_activated('affiliate_system') && (\App\Models\AffiliateOption::where('type', 'product_sharing')->first()->status || \App\Models\AffiliateOption::where('type', 'category_wise_affiliate')->first()->status) && Auth::user()->affiliate_user != null && Auth::user()->affiliate_user->status) {
                            if (Auth::check()) {
                                if (count($resproducts)) {
                                    if (Auth::user()->referral_code == null) {
                                        Auth::user()->referral_code = substr(Auth::user()->id . Str::random(10), 0, 10);
                                        Auth::user()->save();
                                    }
                                    $referral_code = Auth::user()->referral_code;

                                    $commissionArr = [];
                                    $category_wise_affiliate = \App\Models\AffiliateOption::where('type', 'category_wise_affiliate')->first();
                                    if ($category_wise_affiliate && !empty($category_wise_affiliate->details)) {
                                        $commissionArr = json_decode($category_wise_affiliate->details, true);
                                    }
                                    foreach ($resproducts as $key => $detailedProduct) {
                                        $resproducts[$key]->referral_code_url = \Illuminate\Support\Facades\URL::to('/product') . '/' . $detailedProduct->slug . "?product_referral_code=$referral_code";
                                        if (count($commissionArr)) {
                                            foreach ($commissionArr as $cKey => $commission) {
                                                if ($detailedProduct->category_id == $commission['category_id'] && $commission['commission'] > 0) {
                                                    if($commission['commission_type'] == 'amount'){
                                                        $resproducts[$key]->referral_commission = '₹' . $commission['commission'] . ' commission';
                                                    }else{
                                                        $resproducts[$key]->referral_commission = $commission['commission'] . '% commission';                                                        
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $getParentCategory[$k]['products'] = $resproducts;
                    }
                }
                $producstList = $getParentCategory;
                $categories = $getParentCategory;
                
                //return $getParentCategory;
                /*=================*/
                /*=================*/
                $todays_deal_products = Cache::rememberForever('todays_deal_products', function () {

                    //return filter_products(Product::with('brand', 'user', 'category')->where('added_by', 'admin')->where('published', 1)->where('todays_deal', '1'))->get();
                    return filter_products(Product::with('brand', 'user', 'category')->where('added_by', 'admin')->where('published', 1)->where('user_id',$shop->user_id)->where('todays_deal', '1'))->where('user_id',$shop->user_id)->get();
                });
                /*=================*/
                
                
                /*=================*/
                /*$producstList = Category::select('id','parent_id','name')
                        //->where('level', 0)
                        //->where('parent_id', '<=', 0)
                        ->where(function ($q) use ($catIds){
                            $q->whereIn('id',$catIds)->orWhereIn('parent_id',$catIds);
                        })
                        ->groupBy('id')
                        ->orderBy('order_level', 'desc')->get();
                        return $producstList;
                if(count($producstList)){
                    foreach($producstList as $k=>$v){
                      $resproducts = Product::with('brand','user','category')->where('auction_product', 0)->where('approved', 1)->where('category_id', $v->id)->get();
                       
                      if(count($resproducts)){
                          if($v->parent_id == 0){
                                $appendCat = $v;
                                $appendCat = Category::with('categories')->whereIn('id',$catIds)->where('parent_id',$v->id)->get();
                                $categories[$v->id]['childrenCategories'] = $appendCat;
                                //$dataCatIds[] = $v->id;
                          }else{
                                $appendCat = $v;
                                $appendCat['childrenCategories'] = Category::with('categories')->whereIn('id',$catIds)->where('id',$v->id)->get();
                                $categories[$v->id][] = $appendCat;
                                //$dataCatIds[] = $v->parent_id;  
                          }
                      }
                      $producstList[$k]['products'] = $resproducts;
                    }
                }
                 return $categories;*/


                
                /*$categories = Category::where('level', 0)
                        ->where(function ($q) use ($dataCatIds){
                            $q->whereIn('id',$dataCatIds)->orWhereIn('parent_id',$dataCatIds);
                        })
                        ->groupBy('id')
                        ->orderBy('order_level', 'desc')->get();
                        
                if(count($categories)){
                    foreach($categories as $k=>$v){
                        $categories[$k]['childrenCategories'] = Category::with('categories')->where('parent_id',$v->id)->get();
                    }
                }*/
                //return $categories;
                //return $categories;
                return view('frontend.cat_services', compact('categories','producstList','todays_deal_products'));


       // abort(404);
    }

    
    public function seller_services($slug)
    {
        $shop  = Shop::where('slug', $slug)->first();
        abort_if(empty($shop),403);
        if($shop!=null){
                // return Category::with('products')->orderBy('id','desc')->get();
               /* $producstList  = Product::with('brand','user','category')->where('auction_product', 0)->where('approved', 1)->get();
                foreach($producstList as $k=>$v){
                    if($v->category->parent_id == 0){
                        $id = $v->category->id;
                    }else{
                        $id = $v->category->parent_id;
                    }
                    $producstList[$k]['main_category'] = Category::where('id', $id)->value('name');
                }*/

                //$productlist = [];

                $dataCatIds = [];
                
                $categories = [];
                $catIds = Product::where('auction_product', 0)->where('approved', 1)->where('user_id',$shop->user_id)->groupBy('category_id')->pluck('category_id')->toArray();
                
                
                /*=================*/
                $geParentIds = Category::whereIn('id',$catIds)->where('parent_id', '!=', 0)->groupBy('parent_id')->pluck('parent_id')->toArray();
                //return $geParentIds;
                
                //$whereInCat['catIds'] = $catIds;
                //$whereInCat['geParentIds'] = $geParentIds;
                $getParentCategory = Category::select('id','parent_id','name','icon','banner')
                        ->whereIn('id',$geParentIds)
                        ->orderBy('order_level', 'desc')->get();
                //return $getParentCategory;
                
                if(count($getParentCategory)){
                    foreach($getParentCategory as $k=>$v){
                        $subCategories = Category::with('categories')->whereIn('id',$catIds)->where('parent_id',$v->id)->get();
                        $getParentCategory[$k]['childrenCategories'] = $subCategories;

                        $resproducts = Product::with('brand','user','category')->where('auction_product', 0)->where('approved', 1)->where('user_id',$shop->user_id)->where('category_id', $v->id)->orderBy('id', 'desc')->get();
                        $subCategoryIds = Category::with('categories')->whereIn('id',$catIds)->where('parent_id',$v->id)->pluck('id')->toArray();
                        $resSubCatproducts = Product::with('brand','user','category')->where('auction_product', 0)->where('approved', 1)->where('user_id',$shop->user_id)->whereIn('category_id', $subCategoryIds)->orderBy('id', 'desc')->get();
                        if(count($resSubCatproducts)){
                            $resproducts = $resproducts->merge($resSubCatproducts);
                        }
                        
                        if (Auth::check() && addon_is_activated('affiliate_system') && (\App\Models\AffiliateOption::where('type', 'product_sharing')->first()->status || \App\Models\AffiliateOption::where('type', 'category_wise_affiliate')->first()->status) && Auth::user()->affiliate_user != null && Auth::user()->affiliate_user->status) {
                            if (Auth::check()) {
                                if (count($resproducts)) {
                                    if (Auth::user()->referral_code == null) {
                                        Auth::user()->referral_code = substr(Auth::user()->id . Str::random(10), 0, 10);
                                        Auth::user()->save();
                                    }
                                    $referral_code = Auth::user()->referral_code;

                                    $commissionArr = [];
                                    $category_wise_affiliate = \App\Models\AffiliateOption::where('type', 'category_wise_affiliate')->first();
                                    if ($category_wise_affiliate && !empty($category_wise_affiliate->details)) {
                                        $commissionArr = json_decode($category_wise_affiliate->details, true);
                                    }
                                    foreach ($resproducts as $key => $detailedProduct) {
                                        $resproducts[$key]->referral_code_url = \Illuminate\Support\Facades\URL::to('/product') . '/' . $detailedProduct->slug . "?product_referral_code=$referral_code";
                                        if (count($commissionArr)) {
                                            foreach ($commissionArr as $cKey => $commission) {
                                                if ($detailedProduct->category_id == $commission['category_id'] && $commission['commission'] > 0) {
                                                    if($commission['commission_type'] == 'amount'){
                                                        $resproducts[$key]->referral_commission = 'â‚¹' . $commission['commission'] . ' commission';
                                                    }else{
                                                        $resproducts[$key]->referral_commission = $commission['commission'] . '% commission';                                                        
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $getParentCategory[$k]['products'] = $resproducts;
                    }
                }
                $producstList = $getParentCategory;
                $categories = $getParentCategory;
                
                //return $getParentCategory;
                /*=================*/
                /*=================*/
                $todays_deal_products = Cache::rememberForever('todays_deal_products', function () use ($shop) {

                    return filter_products(Product::with('brand', 'user', 'category')->where('published', 1)->where('user_id',$shop->user_id)->where('todays_deal', '1'))->where('user_id',$shop->user_id)->get();

                });
                /*=================*/
                
                
                /*=================*/
                /*$producstList = Category::select('id','parent_id','name')
                        //->where('level', 0)
                        //->where('parent_id', '<=', 0)
                        ->where(function ($q) use ($catIds){
                            $q->whereIn('id',$catIds)->orWhereIn('parent_id',$catIds);
                        })
                        ->groupBy('id')
                        ->orderBy('order_level', 'desc')->get();
                        return $producstList;
                if(count($producstList)){
                    foreach($producstList as $k=>$v){
                      $resproducts = Product::with('brand','user','category')->where('auction_product', 0)->where('approved', 1)->where('category_id', $v->id)->get();
                       
                      if(count($resproducts)){
                          if($v->parent_id == 0){
                                $appendCat = $v;
                                $appendCat = Category::with('categories')->whereIn('id',$catIds)->where('parent_id',$v->id)->get();
                                $categories[$v->id]['childrenCategories'] = $appendCat;
                                //$dataCatIds[] = $v->id;
                          }else{
                                $appendCat = $v;
                                $appendCat['childrenCategories'] = Category::with('categories')->whereIn('id',$catIds)->where('id',$v->id)->get();
                                $categories[$v->id][] = $appendCat;
                                //$dataCatIds[] = $v->parent_id;  
                          }
                      }
                      $producstList[$k]['products'] = $resproducts;
                    }
                }
                 return $categories;*/


                
                /*$categories = Category::where('level', 0)
                        ->where(function ($q) use ($dataCatIds){
                            $q->whereIn('id',$dataCatIds)->orWhereIn('parent_id',$dataCatIds);
                        })
                        ->groupBy('id')
                        ->orderBy('order_level', 'desc')->get();
                        
                if(count($categories)){
                    foreach($categories as $k=>$v){
                        $categories[$k]['childrenCategories'] = Category::with('categories')->where('parent_id',$v->id)->get();
                    }
                }*/
                //return $categories;
                //return $categories;
                return array('categories'=>$categories,'producstList'=>$producstList,'todays_deal_products'=>$todays_deal_products);

            }
       // abort(404);
    }

    public function shop($slug)	
    {	
        $shop  = Shop::where('slug', $slug)->first();	
        if($shop!=null){	
            $education = SellerEducation::where('user_id', $shop->user_id)->get();	
            $exps = SellerExperience::where('user_id', $shop->user_id)->get();	
            $awards = SellerAward::where('user_id', $shop->user_id)->get();	
            return view('new_frontend.seller_shop', compact('shop', 'education', 'exps', 'awards'));	
//            if ($shop->verification_status != 0){	
//                return view('new_frontend.seller_shop', compact('shop', 'education', 'exps', 'awards'));	
//            }	
//            else{	
//                return view('frontend.seller_shop_without_verification', compact('shop', 'education', 'exps', 'awards'));	
//            }	
        }	
        abort(404);	
    }


    public function filter_shop($slug, $type)

    {

        $shop  = Shop::where('slug', $slug)->first();

        if($shop!=null && $type != null){

            return view('frontend.seller_shop', compact('shop', 'type'));

        }

        abort(404);

    }



    public function all_categories(Request $request)

    {

        $categories = Category::where('level', 0)->orderBy('order_level', 'desc')->get();

        return view('frontend.all_category', compact('categories'));

    }



    public function all_brands(Request $request)

    {

        $categories = Category::all();

        return view('frontend.all_brand', compact('categories'));

    }



    public function home_settings(Request $request)

    {

        return view('home_settings.index');

    }



    public function top_10_settings(Request $request)

    {

        foreach (Category::all() as $key => $category) {

            if(is_array($request->top_categories) && in_array($category->id, $request->top_categories)){

                $category->top = 1;

                $category->save();

            }

            else{

                $category->top = 0;

                $category->save();

            }

        }



        foreach (Brand::all() as $key => $brand) {

            if(is_array($request->top_brands) && in_array($brand->id, $request->top_brands)){

                $brand->top = 1;

                $brand->save();

            }

            else{

                $brand->top = 0;

                $brand->save();

            }

        }



        flash(translate('Top 10 categories and brands have been updated successfully'))->success();

        return redirect()->route('home_settings.index');

    }



    public function variant_price(Request $request)

    {

        $product = Product::find($request->id);

        $str = '';

        $quantity = 0;

        $tax = 0;

        $max_limit = 0;



        if($request->has('color')){

            $str = $request['color'];

        }



        if(json_decode($product->choice_options) != null){

            foreach (json_decode($product->choice_options) as $key => $choice) {

                if($str != null){

                    $str .= '-'.str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);

                }

                else{

                    $str .= str_replace(' ', '', $request['attribute_id_'.$choice->attribute_id]);

                }

            }

        }



        $product_stock = $product->stocks->where('variant', $str)->first();



        $price = $product_stock->price;





        if($product->wholesale_product){

            $wholesalePrice = $product_stock->wholesalePrices->where('min_qty', '<=', $request->quantity)->where('max_qty', '>=', $request->quantity)->first();

            if($wholesalePrice){

                $price = $wholesalePrice->price;

            }

        }



        $quantity = $product_stock->qty;

        $max_limit = $product_stock->qty;



        if($quantity >= 1 && $product->min_qty <= $quantity){

            $in_stock = 1;

        }else{

            $in_stock = 0;

        }



        //Product Stock Visibility

        if($product->stock_visibility_state == 'text') {

            if($quantity >= 1 && $product->min_qty < $quantity){

                $quantity = translate('In Stock');

            }else{

                $quantity = translate('Out Of Stock');

            }

        }



        //discount calculation

        $discount_applicable = false;



        if ($product->discount_start_date == null) {

            $discount_applicable = true;

        }

        elseif (strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&

            strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date) {

            $discount_applicable = true;

        }



        if ($discount_applicable) {

            if($product->discount_type == 'percent'){

                $price -= ($price*$product->discount)/100;

            }

            elseif($product->discount_type == 'amount'){

                $price -= $product->discount;

            }

        }



        // taxes

        foreach ($product->taxes as $product_tax) {

            if($product_tax->tax_type == 'percent'){

                $tax += ($price * $product_tax->tax) / 100;

            }

            elseif($product_tax->tax_type == 'amount'){

                $tax += $product_tax->tax;

            }

        }



        $price += $tax;



        return array(

            'price' => single_price($price*$request->quantity),

            'quantity' => $quantity,

            'digital' => $product->digital,

            'variation' => $str,

            'max_limit' => $max_limit,

            'in_stock' => $in_stock

        );

    }



    public function sellerpolicy(){

        $page =  Page::where('type', 'seller_policy_page')->first();

        return view("frontend.policies.sellerpolicy", compact('page'));

    }



    public function returnpolicy(){

        $page =  Page::where('type', 'return_policy_page')->first();

        return view("frontend.policies.returnpolicy", compact('page'));

    }



    public function supportpolicy(){

        $page =  Page::where('type', 'support_policy_page')->first();

        return view("frontend.policies.supportpolicy", compact('page'));

    }



    public function terms(){

        $page =  Page::where('type', 'terms_conditions_page')->first();

        return view("frontend.policies.terms", compact('page'));

    }



    public function privacypolicy(){

        $page =  Page::where('type', 'privacy_policy_page')->first();

        return view("frontend.policies.privacypolicy", compact('page'));

    }



    public function get_pick_up_points(Request $request)

    {

        $pick_up_points = PickupPoint::all();

        return view('frontend.partials.pick_up_points', compact('pick_up_points'));

    }



    public function get_category_items(Request $request){

        $category = Category::findOrFail($request->id);

        return view('frontend.partials.category_elements', compact('category'));

    }



    public function premium_package_index()

    {

        $customer_packages = CustomerPackage::all();

        return view('frontend.user.customer_packages_lists', compact('customer_packages'));

    }





    // Ajax call

    public function new_verify(Request $request)

    {

        $email = $request->email;

        if(isUnique($email) == '0') {

            $response['status'] = 2;

            $response['message'] = 'Email already exists!';

            return json_encode($response);

        }



        $response = $this->send_email_change_verification_mail($request, $email);

        return json_encode($response);

    }





    // Form request

    public function update_email(Request $request)

    {

        $email = $request->email;

        if(isUnique($email)) {

            $this->send_email_change_verification_mail($request, $email);

            flash(translate('A verification mail has been sent to the mail you provided us with.'))->success();

            return back();

        }



        flash(translate('Email already exists!'))->warning();

        return back();

    }



    public function send_email_change_verification_mail($request, $email)

    {

        $response['status'] = 0;

        $response['message'] = 'Unknown';



        $verification_code = Str::random(32);



        $array['subject'] = 'Email Verification';

        $array['from'] = env('MAIL_FROM_ADDRESS');

        $array['content'] = 'Verify your account';

        $array['link'] = route('email_change.callback').'?new_email_verificiation_code='.$verification_code.'&email='.$email;

        $array['sender'] = Auth::user()->name;

        $array['details'] = "Email Second";



        $user = Auth::user();

        $user->new_email_verificiation_code = $verification_code;

        $user->save();



        try {

            Mail::to($email)->queue(new SecondEmailVerifyMailManager($array));



            $response['status'] = 1;

            $response['message'] = translate("Your verification mail has been Sent to your email.");



        } catch (\Exception $e) {

            // return $e->getMessage();

            $response['status'] = 0;

            $response['message'] = $e->getMessage();

        }



        return $response;

    }



    public function email_change_callback(Request $request){

        if($request->has('new_email_verificiation_code') && $request->has('email')) {

            $verification_code_of_url_param =  $request->input('new_email_verificiation_code');

            $user = User::where('new_email_verificiation_code', $verification_code_of_url_param)->first();



            if($user != null) {



                $user->email = $request->input('email');

                $user->new_email_verificiation_code = null;

                $user->save();



                auth()->login($user, true);



                flash(translate('Email Changed successfully'))->success();

                if($user->user_type == 'seller') {

                    return redirect()->route('seller.dashboard');

                }

                return redirect()->route('dashboard');

            }

        }



        flash(translate('Email was not verified. Please resend your mail!'))->error();

        return redirect()->route('dashboard');



    }



    public function reset_password_with_code(Request $request){

        if (($user = User::where('email', $request->email)->where('verification_code', $request->code)->first()) != null) {

            if($request->password == $request->password_confirmation){

                $user->password = Hash::make($request->password);

                $user->email_verified_at = date('Y-m-d h:m:s');

                $user->save();

                event(new PasswordReset($user));

                auth()->login($user, true);



                flash(translate('Password updated successfully'))->success();



                if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')

                {

                    return redirect()->route('admin.dashboard');

                }

                return redirect()->route('home');

            }

            else {

                flash("Password and confirm password didn't match")->warning();

                return redirect()->route('password.request');

            }

        }

        else {

            flash("Verification code mismatch")->error();

            return redirect()->route('password.request');

        }

    }





    public function all_flash_deals() {

        $today = strtotime(date('Y-m-d H:i:s'));



        $data['all_flash_deals'] = FlashDeal::where('status', 1)

            ->where('start_date', "<=", $today)

            ->where('end_date', ">", $today)

            ->orderBy('created_at', 'desc')

            ->get();



        return view("frontend.flash_deal.all_flash_deal_list", $data);

    }



    public function all_seller(Request $request) {

        $shops = Shop::whereIn('user_id', verified_sellers_id())

            ->paginate(15);



        return view('frontend.shop_listing', compact('shops'));

    }



    public function all_coupons(Request $request) {

        $coupons = Coupon::where('start_date', '<=', strtotime(date('d-m-Y')))->where('end_date', '>=', strtotime(date('d-m-Y')))->paginate(15);

        return view('frontend.coupons', compact('coupons'));

    }



    public function inhouse_products(Request $request) {	
        $products = filter_products(Product::where('added_by', 'admin'))->with('taxes')->paginate(12)->appends(request()->query());	
        return view('frontend.inhouse_products', compact('products'));	
    }	
public function nearby_seller(Request $request)	
    {	
        // $ip = "119.63.138.116";	
        $ip = $request->ip();	
        	
        $currentUserInfo = Location::get($ip);	
        $lat = $currentUserInfo->latitude;	
        $lon = $currentUserInfo->longitude;	
        //find distance against zip code.	
        $distanceQuery = Shop::select('*',	
            DB::raw("6371 * acos(cos(radians(" . $lat . "))	
            * cos(radians(delivery_pickup_latitude))	
            * cos(radians(delivery_pickup_longitude) - radians(" . $lon . "))	
            + sin(radians(" . $lat . "))	
            * sin(radians(delivery_pickup_latitude))) AS distance_in_km"));	
        $nearby_sellers = Shop::query()	
            ->fromSub($distanceQuery, 'shops')	
            // ->where('distance_in_km', '<', '30')	
            ->where('verification_status', 1)	
            ->orderBy('distance_in_km', 'ASC')	
            ->get();	
        return view('frontend.all_nearby_sellers', compact('nearby_sellers'));	
    }
    
    public function userUpdateApproved(Request $request)	
    {	
        if(Auth::user()->id == $request->id){	
            $affiliate_user = AffiliateUser::where('user_id',(int)$request->id)->first();	
            $affiliate_user->status = $request->status;	
            if($affiliate_user->save()){	
                return 1;	
            }	
            return 0;	
        } else {	
            	
            return 0;	
        }	
    }
}

