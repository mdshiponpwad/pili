<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Image;

class BannerController extends Controller
{
    public function index()
    {
        $banars = Banner::with('get_category','get_category')->get();
        $categories= Category::select('id','cat_name_en','cat_name_bn')->get();
        return view('layouts.backend.banar.banar_list',[
            'banars'=>$banars,
            'categories'=>$categories
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|unique:banners',
            'sub_title_en' => 'required',
            'sub_title_bn' => 'required',
            'image' => 'required',
            'image_bn' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'=> $validator->messages()->all()
            ]);
        }elseif($request->file('image') != null){
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('image'));
            $upload_path = public_path()."/images/";

            $image1 = $request->file('image_bn');
            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $img1 = Image::make($request->file('image_bn'));
            $upload_path1 = public_path()."/images/";

            if($new_name){
                $data = Banner::create([
                    'image'=>$new_name,
                    'banner_image'=>$new_name1,
                    'category_id'=>$request->category_en_id,
                    'sub_title_en'=>$request->sub_title_en,
                    'sub_title_bn'=>$request->sub_title_bn
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    $img1->save($upload_path1.$new_name1);
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }
        }
        else{
            return response()->json([
                'message'=>'success'
            ],500);
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        $banner = Banner::where('image',$request->slug)->first();

        if( $request->file('image') != null && $request->file('image_bn') == null){

            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('image'));
            $upload_path = public_path()."/images/";


            \File::delete(public_path('images/' . $banner->image));

            if($new_name)
            {
                $data = Banner::where('image',$request->slug)->update([
                    'image'=>$new_name,
                    'sub_title_en'=>$request->sub_title_en,
                    'sub_title_bn'=>$request->sub_title_bn
                ]);
                if($data){
                    $img->save($upload_path.$new_name);

                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }

        }elseif($request->file('image') == null && $request->file('image_bn') != null){

            $image = $request->file('image_bn');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('image_bn'));
            $upload_path = public_path()."/images/";


            \File::delete(public_path('images/' . $banner->banner_image));

            if($new_name)
            {
                $data = Banner::where('image',$request->slug)->update([
                    'banner_image'=>$new_name,
                    'sub_title_en'=>$request->sub_title_en,
                    'sub_title_bn'=>$request->sub_title_bn
                ]);
                if($data){
                    $img->save($upload_path.$new_name);

                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }

        }elseif($request->file('image') != null && $request->file('image_bn') != null){

            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('image'));
            $upload_path = public_path()."/images/";

            $image1 = $request->file('image_bn');
            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $img1 = Image::make($request->file('image_bn'));
            $upload_path1 = public_path()."/images/";


            \File::delete(public_path('images/' . $banner->banner_image));

            if($new_name)
            {
                $data = Banner::where('image',$request->slug)->update([
                    'image'=>$new_name,
                    'banner_image'=>$new_name1,
                    'sub_title_en'=>$request->sub_title_en,
                    'sub_title_bn'=>$request->sub_title_bn
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    $img1->save($upload_path1.$new_name1);

                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }

        }elseif($request->file('image') == null && $request->file('image_bn') == null){
            $data = Banner::where('slug',$request->slug)->update([
                'sub_title_en'=>$request->sub_title_en,
                'sub_title_bn'=>$request->sub_title_bn
            ]);

            return response()->json([
                'message'=>'success'
            ],200);

        }else{
            Alert::error('Opps...', 'Please fillup all field');
            return response()->json([
                'message'=>'success'
            ],200);
        }
    }


    public function destroy(Request $request)
    {
        $data = Banner::find($request->id);
        $data->delete();

        \File::delete(public_path('images/' . $request->image));
        return response()->json([
            'message'=>'success'
        ],200);
    }
}
