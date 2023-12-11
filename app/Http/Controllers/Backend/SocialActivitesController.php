<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialActivites;
use Image;
use Illuminate\Support\Facades\Validator;
class SocialActivitesController extends Controller
{
    public function index()
    {
        $socials = SocialActivites::all();
        return view('layouts.backend.social_activites.social-activites-list',[
            'socials'=>$socials
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

                $data = SocialActivites::create([
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
                $data = SocialActivites::create([
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
        $social = SocialActivites::where('id',$id)->first();
        return view('layouts.backend.social_activites.social-activites-edit',[
            'social'=>$social
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
        $blog = SocialActivites::where('id',$request->id)->first();
        if ($request->file('cover') != null) {
            $image = $request->file('cover');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('cover'));
            $upload_path = public_path()."/images/";

            $data = SocialActivites::where('id',$request->id)->update([
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
            $data = SocialActivites::where('id',$request->id)->update([
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
        SocialActivites::where('id',$request->id)->delete();
        return response()->json([
            'message'=>'success'
        ],200);
    }
}
