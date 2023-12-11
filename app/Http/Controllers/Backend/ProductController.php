<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Cart;
// use App\Models\ProductAvatar;
// use App\Models\Orders;
// use App\Models\OrderDetails;
// use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user();
        $products = Product::latest()->with('get_category')->get();
        $categories = Category::all();
        return view('layouts.backend.product.product_list',[
            'data'=>$data,
            'categories'=>$categories,
            'products'=>$products
        ]);
    }


    public function sales()
    {
        $data = auth()->user();
        $carts = Cart::latest()->get();
        $categories = Category::all();
        return view('layouts.backend.sales.sales_list',[
            'data'=>$data,
            'categories'=>$categories,
            'carts'=>$carts
        ]);
    }

    public function sales_delete(Request $request)
    {
        Cart::where('id',$request->id)->delete();

        return response()->json([
            'msg'=>'success'
        ],200);
    }


    // public function table_search(Request $request)
    // {
    //     if ($request->search == 'daily') {
    //         $sales = OrderDetails::latest()->where('created_at','>=',Carbon::today())->whereNotNull('product_id')->with('get_orders','get_product')->get();
    //     }elseif($request->search == 'weekly'){
    //         $sales = OrderDetails::latest()->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])->whereNotNull('product_id')->with('get_orders','get_product')->get();

    //     }elseif($request->search == 'monthly'){
    //         $sales = OrderDetails::latest()->whereBetween('created_at', [Carbon::now()->subMonth()->format("Y-m-d H:i:s"), Carbon::now()])->whereNotNull('product_id')->with('get_orders','get_product')->get();

    //     }elseif($request->search == 'yearly'){
    //         $sales = OrderDetails::latest()->whereBetween('created_at', [Carbon::now()->subYear()->format("Y-m-d H:i:s"), Carbon::now()])->whereNotNull('product_id')->with('get_orders','get_product')->get();

    //     }

    //     $data = auth()->user();
    //     $order_status = OrderDetails::whereNull('product_id')->distinct('order_id')->first();
    //     $count = Orders::where('delivery_status','pending')->count();
    //     $count_refund = Orders::where('delivery_status','refund')->count();
    //     return view('layouts.backend.sales.sales_history',[
    //         'data'=>$data,
    //         'sales'=>$sales,
    //         'count'=>$count,
    //         'count_refund'=>$count_refund,
    //         'order_status'=>$order_status
    //     ]);
    // }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category_en_id' => 'required',
            'product_name_en' => 'required|unique:products',
            'product_name_bn' => 'required|unique:products',
            'product_code_en' => 'required',
            'product_code_bn' => 'required',
            'color_en' => 'required',
            'color_bn' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'=>"faild"
            ],500);
        }else{
            Product::create([
                'category_id'=>$request->category_en_id,
                'product_name_en'=>$request->product_name_en,
                'slug_en'=> Str::slug($request->product_name_en),
                'product_code_en'=>$request->product_code_en,
                'color_en'=>$request->color_en,
                'description_en'=>$request->description_en,
                'product_name_bn'=>$request->product_name_bn,
                'slug_bn'=> Str::slug($request->product_name_bn),
                'product_code_bn'=>$request->product_code_bn,
                'color_bn'=>$request->color_bn,
                'description_bn'=>$request->description_bn
            ]);

            // return response()->json([
            //     'msg'=>"success"
            // ],200);
            $products = Product::latest()->with('get_category','get_product_avatars')->get();
            return view('layouts.backend.product.product_tbl',[
                'products'=>$products
            ]);
        }
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function product_status(Request $request)
    // {
    //     $data = Product::where('id',$request->id)->first();
    //     if ($data->status == 0) {
    //        $data->update([
    //            'status'=>1
    //        ]);
    //         toast('Product active successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

    //         return redirect()->back();
    //     }elseif($data->status == 1){
    //         $data->update([
    //             'status'=>0
    //         ]);
    //         toast('Product deactive successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

    //         return redirect()->back();
    //     }

    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($slug)
    // {
    //     $data = auth()->user();
    //     $product = Product::where('slug',$slug)->with([
    //         'get_brand',
    //         'get_category',
    //         'get_child_category',
    //         'get_child_child_category',
    //     ])->first();
    //     $brands = Brand::select('id','brand_name')->get();
    //     $sub_child_categories = SubChildCategory::select('id','sub_child_name')->get();
    //     $attribute_values = AttributeValue::select('id','attribute_id','value')->with('get_attribute')->get();
    //     return view('layouts.backend.product.product_edit',[
    //         'data'=>$data,
    //         'product'=>$product,
    //         'brands'=>$brands,
    //         'sub_child_categories'=>$sub_child_categories,
    //         'attribute_values'=>$attribute_values
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request)
    {
        Product::where('slug_en',$request->slug_en)->update([
            'category_id'=>$request->category_en_id,
            'product_name_en'=>$request->product_name_en,
            'slug_en'=> Str::slug($request->product_name_en),
            'product_code_en'=>$request->product_code_en,
            'color_en'=>$request->color_en,
            'description_en'=>$request->description_en,
            'product_name_bn'=>$request->product_name_bn,
            'slug_bn'=> Str::slug($request->product_name_bn),
            'product_code_bn'=>$request->product_code_bn,
            'color_bn'=>$request->color_bn,
            'description_bn'=>$request->description_bn
        ]);

        $products = Product::latest()->with('get_category','get_product_avatars')->get();
        return view('layouts.backend.product.product_tbl',[
            'products'=>$products
        ]);
    }

    // public function flash_update(Request $request)
    // {
    //     $flash_status = Product::where('flash_status',1)->first();
    //     if ($request->flash_timing != null && !$flash_status) {
    //         Product::where('position','flash sale')->update([
    //             'flash_timing'=>$request->flash_timing,
    //             'flash_status'=>1
    //         ]);
    //         toast('Product flash sale timing running successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

    //         return response()->json([
    //             'msg'=>'success'
    //         ]);
    //     }elseif($request->flash_timing != null && $flash_status){
    //         Product::where('position','flash sale')
    //             ->whereNull('flash_timing')
    //             ->whereNull('flash_status')
    //             ->update([
    //             'flash_timing'=>$request->flash_timing,
    //             'flash_status'=>0
    //         ]);
    //         Alert::warning('Warning','Product already in flash sale.Try again later.');
    //         return response()->json([
    //             'msg'=>'success'
    //         ]);
    //     }else{
    //         Product::where([
    //             'position'=>'flash sale',
    //             'flash_status'=>1,
    //         ])->update([
    //             'flash_timing'=>null,
    //             'flash_status'=>null,
    //             'position'=>null
    //         ]);

    //         Product::where([
    //             'position'=>'flash sale',
    //             'flash_status'=>0,
    //         ])->update([
    //             'flash_status'=>1
    //         ]);

    //         return response()->json([
    //             'msg'=>'success'
    //         ]);
    //     }

    // }

    // public function destroy($id)
    // {
    //     Product::find($id)->delete();

    //     toast('Product deleted successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

    //     return redirect()->back();
    // }
}
