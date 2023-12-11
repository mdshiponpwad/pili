<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteMeta;

class SiteMetaController extends Controller
{
    public function index()
    {
        $list = SiteMeta::all();
        return view('layouts.backend.site-meta.List',[
            'list'=>$list
        ]);
    }


    public function store(Request $request)
    {   
        // dd($request->all());
        SiteMeta::create([
            'page_name'=>$request->page_name,
            'title_en'=>$request->title_en,
            'title_bn'=>$request->title_bn,
            'meta_name_en'=>$request->meta_name_en,
            'meta_name_bn'=>$request->meta_name_bn,
            'meta_des_en'=>$request->meta_des_en,
            'meta_des_bn'=>$request->meta_des_bn
        ]);

        return response()->json([
            'msg'=>'success'
        ],200);

    }
    
    public function show($id)
    {
        $item = SiteMeta::find($id);
        return view('layouts.backend.site-meta.Edit',[
            'item'=>$item
        ]);
    }


    public function update(Request $request)
    {
        SiteMeta::find($request->id)->update([
            'page_name'=>$request->page_name,
            'title_en'=>$request->title_en,
            'title_bn'=>$request->title_bn,
            'meta_name_en'=>$request->meta_name_en,
            'meta_name_bn'=>$request->meta_name_bn,
            'meta_des_en'=>$request->meta_des_en,
            'meta_des_bn'=>$request->meta_des_bn
        ]);

        return response()->json([
            'msg'=>'success'
        ],200);
    }


    public function destroy(Request $request)
    {
        $data = SiteMeta::where('id',$request->id)->first();
        $data->delete();
        return response()->json([
            'message'=>'success'
        ],200);
    }
}