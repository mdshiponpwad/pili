<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Session;
class CartController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        if(auth()->user() != null){
            $product = Product::where('id',$request->id)->first();
            $attr = ProductAttribute::where('product_id',$request->id)
            ->where('sale_price_en',$request->price)
            ->orWhere('sale_price_bn',$request->price)
            ->first();

                if ($attr->qty_en >0) {
                    $data = Cart::create([
                        'product_id'=> $request->id,
                        'user_id'=> auth()->user()->id,
                        'qty'=>$request->qty,
                        'weight_en'=>$attr->weight_en,
                        'price'=>$attr->sale_price_en,
                        'total'=>$request->qty * $request->price,
                        'profit'=>($request->qty * $request->price)-($request->qty * $attr->pur_price_en)
                    ]);

                    if ($data) {
                        // WishList::where('product_id',$request->id)->delete();
                        // $count = WishList::select('id')->where('user_id',Auth::user()->id ?? '')->count();
                        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
                        $cart = Cart::latest()
                        ->where('user_id',auth()->user()->id ?? '')
                        ->with('get_product','get_product.get_product_avatars')
                        ->get();
                        $attributes= ProductAttribute::with('get_product')->get();
                        return view('layouts.frontend.cart.headerCartPortion',[
                            'cart'=>$cart,
                            'count1'=>$count1,
                            'attributes'=>$attributes
                        ]);
                    }
                }else{
                    return response()->json([
                        'stockOut'=>'stock out'
                    ],404);
                }
            
        }else{
            return response()->json([
                'guest'=>'guest'
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
