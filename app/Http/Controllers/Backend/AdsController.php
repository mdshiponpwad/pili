<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Image;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::all();
        return view('layouts.backend.ad.adManager',[
            'ads'=>$ads
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
            'link' => 'required',
            'cover' => 'required',
            'position' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'=> 'error'
            ],500);
        }else{
            $image = $request->file('cover');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('cover'));
            $upload_path = public_path()."/images/";

            if($new_name){
                $data = Ads::create([
                    'link'=>$request->link,
                    'image'=>$new_name,
                    'position'=>$request->position,
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
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
    public function change_status(Request $request)
    {
       $ad = Ads::where('id',$request->id)->first();

       if ($ad->status == 1) {
            Ads::where('id',$request->id)->update([
                'status'=>0
            ]);
            return response()->json([
                'message'=>'success'
            ],200);
       }else{
            Ads::where('id',$request->id)->update([
                'status'=>1
            ]);
            return response()->json([
                'message'=>'success'
            ],200);
       }
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
        // dd($request->all());
        $data = Ads::where('id',$request->id)->first();
        if ($data) {
            $validator = Validator::make($request->all(), [
                'link' => 'required',
                'position' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors'=> 'error'
                ],500);
            }else{
                if ($request->file('cover') != null) {
                    $image = $request->file('cover');
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $img = Image::make($request->file('cover'));
                    $upload_path = public_path()."/images/";

                    if($new_name){
                        $data = Ads::where('id',$request->id)->update([
                            'link'=>$request->link,
                            'image'=>$new_name,
                            'position'=>$request->position,
                        ]);
                        if($data){
                            $img->save($upload_path.$new_name);
                            return response()->json([
                                'message'=>'success'
                            ],200);
                        }
                    }
                }else{
                    $data = Ads::where('id',$request->id)->update([
                        'link'=>$request->link,
                        'position'=>$request->position,
                    ]);
                    if($data){
                        return response()->json([
                            'message'=>'success'
                        ],200);
                    }
                }
            }
        }else{
            return response()->json([
                'errors'=> 'error'
            ],500);
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
