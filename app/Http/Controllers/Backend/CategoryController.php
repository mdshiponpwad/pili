<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Image;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $cat = Category::whereNotNull('cat_name_en')->with('get_menu')->first();
        $menus = Menu::where('status',1)->get();
        return view('layouts.backend.category.categories',[
            'categories'=>$categories,
            'menus'=>$menus,
            'cat'=>$cat
        ]);
    }

    public function status(Request $request)
    {
        $cat = Category::where('id',$request->id)->first();

        if ($cat->status == 0) {
            Category::where('id',$request->id)->update([
                'status'=>1
            ]);

            return response()->json([
                'msg'=>'success'
            ],200);
        }else{
            Category::where('id',$request->id)->update([
                'status'=>0
            ]);

            return response()->json([
                'msg'=>'success'
            ],401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'menu_id' => 'required',
            'cat_name_bn' => 'required|unique:"categories"',
            'cat_name_en' => 'required|unique:"categories"'

        ]);


        if ($validator->fails()) {
            return response()->json([
                'errors'=> $validator->messages()->all()
            ],422);
        }else{

            if ($request->file('cover')) {
                $image = $request->file('cover');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($request->file('cover'));
                $upload_path = public_path()."/images/";

                $data = Category::create([
                    'menu_id'=>$request->menu_id,
                    'cat_name_bn'=>$request->cat_name_bn,
                    'cat_name_en'=>$request->cat_name_en,
                    'slug_bn'=>Str::slug($request->cat_name_bn),
                    'slug_en'=>Str::slug($request->cat_name_en),
                    'cover'=>$new_name,
                    'description_en'=>$request->description_en,
                    'description_bn'=>$request->description_bn,
                    'position'=>$request->position
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }else{
                $data = Category::create([
                    'menu_id'=>$request->menu_id,
                    'cat_name_bn'=>$request->cat_name_bn,
                    'cat_name_en'=>$request->cat_name_en,
                    'slug_bn'=>Str::slug($request->cat_name_bn),
                    'slug_en'=>Str::slug($request->cat_name_en),
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
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cat = Category::where('id',$id)->with('get_menu')->first();
        $menus = Menu::where('status',1)->get();
        return view('layouts.backend.category.edit_form',[
            'cat'=>$cat,
            'menus'=>$menus
        ]);
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
        $cat = Category::where('id',$request->id)->first();
        if($request->file('cover') != null && $request->cat_name_bn != null && $request->cat_name_en != null){

            $image = $request->file('cover');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('cover'));
            $upload_path = public_path()."/images/";
            \File::delete(public_path('images/' . $cat->cover));

            if($new_name){
                $data = $cat->update([
                    'cat_name_bn'=>$request->cat_name_bn,
                    'cat_name_en'=>$request->cat_name_en,
                    'slug_bn'=>Str::slug($request->cat_name_bn),
                    'slug_en'=>Str::slug($request->cat_name_en),
                    'cover'=>$new_name,
                    'description_en'=>$request->description_en,
                    'description_bn'=>$request->description_bn,
                    'position'=>$request->position
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }
        }elseif($request->file('cover') != null && $request->cat_name_en == $cat->cat_name_en && $request->cat_name_bn == $cat->cat_name_bn){

            $image = $request->file('cover');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('cover'));
            $upload_path = public_path()."/images/";
            \File::delete(public_path('images/' . $cat->cover));

            if($new_name){
                $data = $cat->update([
                    'cover'=>$new_name
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }
        }elseif($request->file('cover') == null){


            $data = $cat->update([
                'cat_name_bn'=>$request->cat_name_bn,
                'cat_name_en'=>$request->cat_name_en,
                'slug_bn'=>Str::slug($request->cat_name_bn),
                'slug_en'=>Str::slug($request->cat_name_en),
                'description_en'=>$request->description_en,
                'description_bn'=>$request->description_bn,
                'position'=>$request->position
            ]);

            return response()->json([
                'message'=>'success'
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
