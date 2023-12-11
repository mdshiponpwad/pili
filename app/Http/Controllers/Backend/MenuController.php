<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::all();
        return view('layouts.backend.menu.menu_list',[
            'menus'=>$menus
        ]);
    }


    public function status(Request $request)
    {
        $menu = Menu::where('id',$request->id)->first();

        if ($menu->status == 0) {
            Menu::where('id',$request->id)->update([
                'status'=>1
            ]);

            return response()->json([
                'msg'=>'success'
            ],200);
        }else{
            Menu::where('id',$request->id)->update([
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
            'menu_en' => 'required|unique:"menus"',
        ]);


        if ($validator->fails()) {
            return redirect()->back();
        }else{
            $datas = $request->all();
            foreach($datas['menu_en'] as $key => $value){
                Menu::create([
                    'menu_en'=>$datas['menu_en'][$key],
                    'menu_bn'=>$datas['menu_bn'][$key],
                    'slug_en'=>$datas['menu_en'][$key],
                    'slug_bn'=>$datas['menu_bn'][$key],
                    'link'=>$datas['link'][$key]
                ]);
            }
            return redirect()->back();
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
    public function update(Request $request)
    {
        Menu::where('id',$request->id)->update([
            'menu_en'=>$request->menu_en,
            'menu_bn'=>$request->menu_bn,
            'link'=>$request->link,
        ]);

        return response()->json([
            'msg'=>'success'
        ],200);
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
