<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Image;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('layouts.backend.client.client_list',[
            'clients'=>$clients
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
        if ($request->file('left_cover') && $request->file('right_cover')) {
            $image = $request->file('left_cover');
            $left_new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('left_cover'));
            $upload_path = public_path()."/images/";
            
            $image = $request->file('right_cover');
            $right_new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img1 = Image::make($request->file('right_cover'));
            $upload_path1 = public_path()."/images/";
            
            // dd($request->all());

            $data = Client::create([
                'left_name_en'=>$request->left_name_en,
                'left_name_bn'=>$request->left_name_bn,
                'left_desig_en'=>$request->left_desig_en,
                'left_desig_bn'=>$request->left_desig_bn,
                'left_company_en'=>$request->left_company_en,
                'left_company_bn'=>$request->left_company_bn,
                'left_cover'=>$left_new_name,
                'left_description_en'=>$request->left_description_e,
                'left_description_bn'=>$request->left_description_b,
                'right_name_en'=>$request->right_name_en,
                'right_name_bn'=>$request->right_name_bn,
                'right_desig_en'=>$request->right_desig_en,
                'right_desig_bn'=>$request->right_desig_bn,
                'right_company_en'=>$request->right_company_en,
                'right_company_bn'=>$request->right_company_bn,
                'right_cover'=>$right_new_name,
                'right_des_en'=>$request->right_description_e,
                'right_des_bn'=>$request->right_description_b
            ]);
            if($data){
                $img->save($upload_path.$left_new_name);
                $img1->save($upload_path1.$right_new_name);
                return response()->json([
                    'message'=>'success'
                ],200);
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
        $client = Client::where('id',$id)->first();
        return view('layouts.backend.client.client-edit',[
            'client'=>$client
        ]);
    }

    
    public function update(Request $request)
    {
        $client = Client::where('id',$request->id)->first();
        if ($request->file('left_cover') && $request->file('right_cover')) {
            $image = $request->file('left_cover');
            $left_new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('left_cover'));
            $upload_path = public_path()."/images/";
            
            $image = $request->file('right_cover');
            $right_new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('right_cover'));
            $upload_path = public_path()."/images/";

            $data = Client::where('id',$request->id)->update([
                'left_name_en'=>$request->left_name_en,
                'left_name_bn'=>$request->left_name_bn,
                'left_desig_en'=>$request->left_desig_en,
                'left_desig_bn'=>$request->left_desig_bn,
                'left_company_en'=>$request->left_company_en,
                'left_company_bn'=>$request->left_company_bn,
                'left_cover'=>$left_new_name,
                'left_description_en'=>$request->left_description_e,
                'left_description_bn'=>$request->left_description_b,
                'right_name_en'=>$request->right_name_en,
                'right_name_bn'=>$request->right_name_bn,
                'right_desig_en'=>$request->right_desig_en,
                'right_desig_bn'=>$request->right_desig_bn,
                'right_company_en'=>$request->right_company_en,
                'right_company_bn'=>$request->right_company_bn,
                'right_cover'=>$right_new_name,
                'right_des_en'=>$request->right_description_e,
                'right_des_bn'=>$request->right_description_b
            ]);
            if($data){
                $img->save($upload_path.$new_name);
                return response()->json([
                    'message'=>'success'
                ],200);
            }
        }else{
            // dd($request->all());
            $data = Client::where('id',$request->id)->update([
                'left_name_en'=>$request->left_name_en,
                'left_name_bn'=>$request->left_name_bn,
                'left_desig_en'=>$request->left_desig_en,
                'left_desig_bn'=>$request->left_desig_bn,
                'left_company_en'=>$request->left_company_en,
                'left_company_bn'=>$request->left_company_bn,
                'left_description_en'=>$request->left_description_en,
                'left_description_bn'=>$request->left_description_bn,
                'right_name_en'=>$request->right_name_en,
                'right_name_bn'=>$request->right_name_bn,
                'right_desig_en'=>$request->right_desig_en,
                'right_desig_bn'=>$request->right_desig_bn,
                'right_company_en'=>$request->right_company_en,
                'right_company_bn'=>$request->right_company_bn,
                'right_des_en'=>$request->right_description_en,
                'right_des_bn'=>$request->right_description_bn
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
        Client::where('id',$request->id)->delete();
        return response()->json([
            'message'=>'success'
        ],200);
    }
}
