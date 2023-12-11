<?php

namespace App\Http\Controllers\Frontend;

use Session;
use App\Models\Ads;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
use App\Models\Order;
use App\Models\Banner;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\SiteMeta;
use App\Models\ContactUs;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\SocialActivites;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function bangla()
    {
        Session::forget('lang');
        Session::put('lang','bangla');
        return redirect()->back();
    }

    public function english()
    {
        Session::forget('lang');
        Session::put('lang','english');
        return redirect()->back();
    }

    public function index()
    {
        if (Session::get('lang') == null) {
            Session::put('lang','english');
        }
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $banars = Banner::with('get_category')->get();
        $client = Client::all();
        $metas = SiteMeta::where('page_name',1)->get();
        $title = SiteMeta::where('page_name',1)->first();
        $blogs = Blog::all();
        $ads = Ads::where('status',1)->get();
        $setting = Setting::latest()->first();
        $gallery = Gallery::latest()->get();
        $galleries = Gallery::latest()->limit(4)->get();
        $categories= Category::whereNotNull('position')->get();
        $menus = Menu::where('status',1)->get();
        $attributes= ProductAttribute::with('get_product')->get();
        $products = Product::select('id','product_name_en','product_name_bn')
        ->with('get_product_avatars','get_attribute')
        ->get();
        $pages = Page::where('status',1)->get();
        return view('layouts.frontend.home',[
            'banars'=>$banars,
            'categories'=>$categories,
            'attributes'=>$attributes,
            'products'=>$products,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'client'=>$client,
            'blogs'=>$blogs,
            'gallery'=>$gallery,
            'setting'=>$setting,
            'ads'=>$ads,
            'pages'=>$pages,
            'galleries'=>$galleries,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    public function category_details($slug)
    {
        $banars = Banner::with('get_category')->get();
        $metas = SiteMeta::where('page_name',2)->get();
        $title = SiteMeta::where('page_name',2)->first();
        $categories= Category::all();
        $menus = Menu::where('status',1)->get();
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cat= Category::where('slug_en',$slug)
        ->orWhere('slug_bn',$slug)
        ->first();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $ads = Ads::where('status',1)->get();
        $client = Client::all();
        $setting = Setting::latest()->first();
        $attributes= ProductAttribute::with('get_product')->get();
        $products = Product::where('category_id',$cat->id)
        ->with('get_attribute')->get();
        $pages = Page::where('status',1)->get();
        return view('layouts.frontend.category_details',[
            'banars'=>$banars,
            'categories'=>$categories,
            'menus'=>$menus,
            'cat'=>$cat,
            'count1'=>$count1,
            'cart'=>$cart,
            'attributes'=>$attributes,
            'products'=>$products,
            'client'=>$client,
            'setting'=>$setting,
            'ads'=>$ads,
            'pages'=>$pages,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    public function productByattr(Request $request)
    {
        $attribute = ProductAttribute::where($request->val,$request->weight)
            ->where('product_id',$request->id)->first();

        $attributes= ProductAttribute::with('get_product')->get();

        return view('layouts.frontend.product.product-by-attr',[
            'attribute'=>$attribute,
            'attributes'=>$attributes
        ]);
    }


    public function product_details($slug,$weight)
    {
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $categories= Category::whereNotNull('position')->get();
        $menus = Menu::where('status',1)->get();
        $attributes= ProductAttribute::with('get_product')->get();
        $p = Product::where('slug_en',$slug)
        ->orWhere('slug_bn',$slug)->first();
        $attribute = ProductAttribute::where('product_id',$p->id)->where('weight_en',$weight)->orWhere('weight_bn',$weight)
        ->whereHas('get_product',function($q) use($slug){
            $q->where('slug_en',$slug)
            ->orWhere('slug_bn',$slug);
        })->first();
        $client = Client::all();
        $ads = Ads::where('status',1)->get();
        $setting = Setting::latest()->first();
        $pages = Page::where('status',1)->get();
        $metas = SiteMeta::where('page_name',3)->get();
        $title = SiteMeta::where('page_name',3)->first();
        return view('layouts.frontend.product.product_details',[
            'categories'=>$categories,
            'attributes'=>$attributes,
            'attribute'=>$attribute,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'client'=>$client,
            'setting'=>$setting,
            'ads'=>$ads,
            'pages'=>$pages,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function all_products(Request $request)
    {
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $categories= Category::whereNotNull('position')->get();
        $menus = Menu::where('status',1)->get();
        $attributes= ProductAttribute::with('get_product')->get();
        $products = Product::with(
            'get_product_avatars',
            'get_attribute',
            'get_category'
        )->get();
        $client = Client::all();
        $setting = Setting::latest()->first();
        $pages = Page::where('status',1)->get();
        return view('layouts.frontend.product.all_products',[
            'categories'=>$categories,
            'attributes'=>$attributes,
            'products'=>$products,
            'menus'=>$menus,
            'setting'=>$setting,
            'count1'=>$count1,
            'cart'=>$cart,
            'client'=>$client,
            'pages'=>$pages
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $categories= Category::all();
        $menus = Menu::where('status',1)->get();
        $setting = Setting::latest()->first();
        $pages = Page::where('status',1)->get();
        $metas = SiteMeta::where('page_name',13)->get();
        $title = SiteMeta::where('page_name',13)->first();
        return view('layouts.frontend.profile.login',[
            'categorirs'=>$categories,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'setting'=>$setting,
            'pages'=>$pages,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    public function destroy(Request $request)
    {
        if(Auth::check()){
            Auth::logout();
            // $request->session()->flush();
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $ads = Ads::where('status',1)->get();
        $categories= Category::all();
        $menus = Menu::where('status',1)->get();
        $attributes= ProductAttribute::with('get_product')->get();
        $setting = Setting::latest()->first();
        $pages = Page::where('status',1)->get();
        return view('layouts.frontend.profile.profile',[
            'categorirs'=>$categories,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'attributes'=>$attributes,
            'setting'=>$setting,
            'ads'=>$ads,
            'pages'=>$pages
        ]);
    }

    public function details($slug)
    {
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $categories= Category::all();
        $menus = Menu::where('status',1)->get();
        $blog = Blog::where('title_en',$slug)->orWhere('title_bn',$slug)->first();
        $blogs = Blog::all();
        $setting = Setting::latest()->first();
        $ads = Ads::where('status',1)->get();
        $attributes= ProductAttribute::with('get_product')->get();
        $pages = Page::where('status',1)->get();
        $metas = SiteMeta::where('page_name',9)->get();
        $title = SiteMeta::where('page_name',9)->first();
        return view('layouts.frontend.blog.blog-details',[
            'blog'=>$blog,
            'blogs'=>$blogs,
            'categories'=>$categories,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'attributes'=>$attributes,
            'setting'=>$setting,
            'ads'=>$ads,
            'pages'=>$pages,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    public function list()
    {
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $categories= Category::all();
        $menus = Menu::where('status',1)->get();
        $blogs = Blog::all();
        $setting = Setting::latest()->first();
        $attributes= ProductAttribute::with('get_product')->get();
        $pages = Page::where('status',1)->get();
        $metas = SiteMeta::where('page_name',8)->get();
        $title = SiteMeta::where('page_name',8)->first();
        return view('layouts.frontend.blog.blog-list',[
            'blogs'=>$blogs,
            'categories'=>$categories,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'attributes'=>$attributes,
            'setting'=>$setting,
            'pages'=>$pages,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    public function social_details($slug)
    {
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $categories= Category::all();
        $ads = Ads::where('status',1)->get();
        $menus = Menu::where('status',1)->get();
        $social = SocialActivites::where('title_en',$slug)->orWhere('title_bn',$slug)->first();
        $socials = SocialActivites::all();
        $setting = Setting::latest()->first();
        $attributes= ProductAttribute::with('get_product')->get();
        $pages = Page::where('status',1)->get();
        $metas = SiteMeta::where('page_name',11)->get();
        $title = SiteMeta::where('page_name',11)->first();
        return view('layouts.frontend.social_activites.social_activites_details',[
            'social'=>$social,
            'socials'=>$socials,
            'categories'=>$categories,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'attributes'=>$attributes,
            'setting'=>$setting,
            'ads'=>$ads,
            'pages'=>$pages,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    public function social_list()
    {
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $categories= Category::all();
        $menus = Menu::where('status',1)->get();
        $socials = SocialActivites::all();
        $setting = Setting::latest()->first();
        $attributes= ProductAttribute::with('get_product')->get();
        $pages = Page::where('status',1)->get();
        $metas = SiteMeta::where('page_name',10)->get();
        $title = SiteMeta::where('page_name',10)->first();
        return view('layouts.frontend.social_activites.social_activites_list',[
            'socials'=>$socials,
            'categories'=>$categories,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'attributes'=>$attributes,
            'setting'=>$setting,
            'pages'=>$pages,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    public function gallery_list()
    {
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $setting = Setting::latest()->first();
        $categories= Category::all();
        $menus = Menu::where('status',1)->get();
        $gallery = Gallery::all();
        $attributes= ProductAttribute::with('get_product')->get();
        $pages = Page::where('status',1)->get();
        $metas = SiteMeta::where('page_name',4)->get();
        $title = SiteMeta::where('page_name',4)->first();
        return view('layouts.frontend.gallery.gallery_list',[
            'gallery'=>$gallery,
            'categories'=>$categories,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'attributes'=>$attributes,
            'setting'=>$setting,
            'pages'=>$pages,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    public function job_details($slug)
    {
        $metas = SiteMeta::where('page_name',5)->get();
        $title = SiteMeta::where('page_name',5)->first();
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $setting = Setting::latest()->first();
        $categories= Category::all();
        $menus = Menu::where('status',1)->get();
        $category = Category::where('slug_en',$slug)->orWhere('slug_bn',$slug)->first();
        $socials = SocialActivites::all();
        $ads = Ads::where('status',1)->get();
        $attributes= ProductAttribute::with('get_product')->get();
        $pages = Page::where('status',5)->get();
        return view('layouts.frontend.Job.job_details',[
            'category'=>$category,
            'socials'=>$socials,
            'categories'=>$categories,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'attributes'=>$attributes,
            'setting'=>$setting,
            'ads'=>$ads,
            'pages'=>$pages,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    public function contact_us(Request $request)
    {
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $setting = Setting::latest()->first();
        $categories= Category::all();
        $menus = Menu::where('status',1)->get();
        $socials = SocialActivites::all();
        $ads = Ads::where('status',1)->get();
        $attributes= ProductAttribute::with('get_product')->get();
        $pages = Page::where('status',1)->get();
        $metas = SiteMeta::where('page_name',12)->get();
        $title = SiteMeta::where('page_name',12)->first();
        return view('layouts.frontend.contact_us',[
            'socials'=>$socials,
            'categories'=>$categories,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'attributes'=>$attributes,
            'setting'=>$setting,
            'ads'=>$ads,
            'pages'=>$pages,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    public function contact_us_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }else{
            ContactUs::create([
                'name_en'=>$request->name_en,
                'name_bn'=>$request->name_bn,
                'email'=>$request->email,
                'phn_en'=>$request->phn_en,
                'phn_bn'=>$request->phn_bn,
                'subject_en'=>$request->subject_en,
                'subject_bn'=>$request->subject_bn,
                'msg_en'=>$request->msg_en,
                'msg_bn'=>$request->msg_bn
            ]);

            return redirect()->back();
        }
    }

    
    
    public function show_page($slug){
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $setting = Setting::latest()->first();
        $categories= Category::all();
        $menus = Menu::where('status',1)->get();
        $socials = SocialActivites::all();
        $ads = Ads::where('status',1)->get();
        $attributes= ProductAttribute::with('get_product')->get();
        $page = Page::where('slug_en',$slug)->orWhere('slug_bn',$slug)->first();
        $pages = Page::where('status',1)->get();
        return view('layouts.frontend.pages.page',[
            'socials'=>$socials,
            'categories'=>$categories,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'attributes'=>$attributes,
            'setting'=>$setting,
            'ads'=>$ads,
            'page'=>$page,
            'pages'=>$pages
        ]);
    }


    public function proceedCheckout(Request $request)
    {
        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
        $cart = Cart::latest()
        ->where('user_id',auth()->user()->id ?? '')
        ->with('get_product','get_product.get_product_avatars')
        ->get();
        $setting = Setting::latest()->first();
        $categories= Category::all();
        $menus = Menu::where('status',1)->get();
        $socials = SocialActivites::all();
        $ads = Ads::where('status',1)->get();
        $attributes= ProductAttribute::with('get_product')->get();
        $pages = Page::where('status',1)->get();
        $metas = SiteMeta::where('page_name',12)->get();
        $title = SiteMeta::where('page_name',12)->first();
        return view('layouts.frontend.checkout',[
            'socials'=>$socials,
            'categories'=>$categories,
            'menus'=>$menus,
            'count1'=>$count1,
            'cart'=>$cart,
            'attributes'=>$attributes,
            'setting'=>$setting,
            'ads'=>$ads,
            'pages'=>$pages,
            'metas'=>$metas,
            'title'=>$title
        ]);
    }

    public function order(Request $request){
      
              $validator = Validator::make($request->all(), [
            'phn_en'          => 'required',
            'address_en'      => 'required',
        ]);
       
        

        try {

            DB::transaction(function () use($request){

                $orderNo = auth()->id().time();

                User::find(auth()->id())->update([                    	
                    'phn_en'         => $request->phn_en,
                    'address_en'     => $request->address_en,
                ]);                
                      
                $order = Order::create([
                    'user_id'           => auth()->id(),
                    'order_no'          => $orderNo,
                    'total_quantity'    => $request->total_quantity,
                    'sub_total'         => $request->sub_total,
                    'shipping_cost'     => $request->shipping_cost,
                    'discount_amount'   => 0,
                    'paid_amount'       => 0,   
                    'status'            => 'Pending',

                ]);
                
                
                foreach ($request->product_id as $key => $product_id) {
                    
                    $orderDtail =  OrderDetail::create([
                        'order_id'      => $order->id,
                        'product_id'    => $product_id,	
                        'price'         => $request->product_price[$key],	
                        'quantity'      => $request->product_quantity[$key],
                    ]);
  
                }
               

                $carts = Cart::where('user_id', auth()->id())->get();

                foreach ($carts as $key => $cart) {
                    $cart->delete();
                }
            });


        } catch (\Throwable $th) {
            
            return redirect()->back();
        }

        return redirect()->route('all.products');
       
    }
}
