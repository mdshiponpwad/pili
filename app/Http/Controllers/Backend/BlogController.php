<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Image;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('layouts.backend.blog.blog_list',[
            'blogs'=>$blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title_en' => 'required',
            'title_bn' => 'required'

        ]);


        if ($validator->fails()) {
            return response()->json([
                'errors'=> $validator->messages()->all()
            ],422);
        }else{

            if ($request->file('cover') !=null) {
                $image = $request->file('cover');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($request->file('cover'));
                $upload_path = public_path()."/images/";

                $data = Blog::create([
                    'title_en'=>$request->title_en,
                    'title_bn'=>$request->title_bn,
                    'image'=>$new_name,
                    'description_en'=>$request->description_en,
                    'description_bn'=>$request->description_bn
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }else{
                $data = Blog::create([
                    'title_en'=>$request->title_en,
                    'title_bn'=>$request->title_bn,
                    'description_en'=>$request->description_en,
                    'description_bn'=>$request->description_bn
                ]);
                if($data){
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }
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
        $blog = Blog::where('id',$id)->first();
        return view('layouts.backend.blog.blog-edit',[
            'blog'=>$blog
        ]);
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
        $blog = Blog::where('id',$request->id)->first();
        if ($request->file('cover') != null) {
            $image = $request->file('cover');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('cover'));
            $upload_path = public_path()."/images/";

            $data = Blog::where('id',$request->id)->update([
                'title_en'=>$request->title_en,
                'title_bn'=>$request->title_bn,
                'image'=>$new_name,
                'description_en'=>$request->description_en,
                'description_bn'=>$request->description_bn
            ]);
            if($data){
                $img->save($upload_path.$new_name);
                return response()->json([
                    'message'=>'success'
                ],200);
            }
        }else{
            $data = Blog::where('id',$request->id)->update([
                'title_en'=>$request->title_en,
                'title_bn'=>$request->title_bn,
                'description_en'=>$request->description_en,
                'description_bn'=>$request->description_bn
            ]);
            if($data){
                return response()->json([
                    'message'=>'success'
                ],200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Blog::where('id',$request->id)->delete();
        return response()->json([
            'message'=>'success'
        ],200);
    }

}
