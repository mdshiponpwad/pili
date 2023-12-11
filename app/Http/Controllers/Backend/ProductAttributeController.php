<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Session;
class ProductAttributeController extends Controller
{

    public function index()
    {
        $data = auth()->user();
        $attributes = ProductAttribute::latest()->with('get_product','get_product_avatar')->get();
        $products = Product::select('id','product_name_en','product_name_bn')->get();
        return view('layouts.backend.attribute.attribute_list',[
            'data'=>$data,
            'products'=>$products,
            'attributes'=>$attributes
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $product = ProductAttribute::where('product_id',$request->product_id)
        ->where('weight_bn',$request->weight_bn[0])
        ->where('weight_en',$request->weight_en[0])->first();
        if ($product) {
            Alert::warning('Product attribute already uploaded.','success');
            return redirect()->back();
        }else{
            $datas = $request->all();
            foreach ($datas['weight_en'] as $key => $value) {
                $pass= rand(100000, 999999);
                ProductAttribute::create([
                    'product_id'=>$datas['product_id'],
                    'weight_en'=>$datas['weight_en'][$key],
                    'sale_price_en'=>$datas['sale_price_en'][$key],
                    'pur_price_en'=>$datas['pur_price_en'][$key],
                    'qty_en'=>$datas['qty_en'][$key],
                    'stock_en'=>$datas['qty_en'][$key],
                    'weight_bn'=>$datas['weight_bn'][$key],
                    'sale_price_bn'=>$datas['sale_price_bn'][$key],
                    'sku_en'=>$pass,
                    'sku_bn'=>$pass
                ]);
            }
            return redirect()->back();
        }
    }



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
    public function update(Request $request)
    {
        if(Session::get('lang') == "english"){
            $validator = Validator::make($request->all(), [
                'weight' => 'required',
                'sale_price' => 'required',
                'pur_price' => 'required',
                'qty' => 'required'

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'msg'=>'error'
                ],500);
            }else{
                $data = ProductAttribute::where('id',$request->id)->first();
                $data->update([
                    'weight_en'=>$request->weight,
                    'sale_price_en'=> $request->sale_price,
                    'pur_price_en'=> $request->pur_price,
                    'qty_en'=> $request->qty,
                    'stock_en'=>$data->stock + $request->qty,
                ]);
                return response()->json([
                    'msg'=>'success'
                ],200);
            }
        }else{

            $data = ProductAttribute::where('id',$request->id)->first();
            $data->update([
                'weight_bn'=>$request->weight,
                'sale_price_bn'=> $request->sale_price
            ]);
            return response()->json([
                'msg'=>'success'
            ],200);

        }
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
