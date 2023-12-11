<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('layouts.backend.dashboard');
    }

    public function page()
    {
        $pages = Page::all();
        return view('layouts.backend.pages.page_list',[
            'pages'=>$pages
        ]);
    }

    public function change_status(Request $request)
    {
        $page = Page::where('id',$request->id)->first();

        if ($page->status == null) {
            Page::where('id',$request->id)->update([
                'status'=>1
            ]);

            return response()->json([
                'msg'=>'success'
            ],200);
        }else{
            Page::where('id',$request->id)->update([
                'status'=>null
            ]);

            return response()->json([
                'msg'=>'success'
            ],401);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'required',
            'title_bn' => 'required'

        ]);


        if ($validator->fails()) {
            return response()->json([
                'errors'=> $validator->messages()->all()
            ],422);
        }else{

            $data = Page::create([
                'title_en'=>$request->title_en,
                'title_bn'=>$request->title_bn,
                'slug_en'=>Str::slug($request->title_en),
                'slug_bn'=>Str::slug($request->title_bn),
                'description_en'=>$request->description_en,
                'description_bn'=>$request->description_bn,
                'position'=>$request->position
            ]);
            if($data){
                return response()->json([
                    'message'=>'success'
                ],200);
            }
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_en' => 'required',
            'title_bn' => 'required'

        ]);


        if ($validator->fails()) {
            return response()->json([
                'errors'=> $validator->messages()->all()
            ],422);
        }else{
            Page::where('id',$request->id)->update([
                'title_en'=>$request->title_en,
                'title_bn'=>$request->title_bn,
                'slug_en'=>Str::slug($request->title_en),
                'slug_bn'=>Str::slug($request->title_bn),
                'description_en'=>$request->description_en,
                'description_bn'=>$request->description_bn,
                'position'=>$request->position
            ]);
            return response()->json([
                'message'=>'success'
            ],200);

        }
    }

    public function show($slug)
    {
        $page = Page::where('slug_en',$slug)->first();

        return view('layouts.backend.pages.page_edit',[
            'page'=>$page
        ]);
    }

    public function destroy(Request $request)
    {
        Page::where('id',$request->id)->delete();

        return response()->json([
            'msg'=>'success'
        ],200);
    }

}

