<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
// use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Image;
use App\Models\ContactUs;

class SettingController extends Controller
{
    public function index()
    {
        $data = auth()->user();
        $setting = Setting::first();
        return view('layouts.backend.settings.setup',[
            'data'=>$data,
            'setting'=>$setting,
        ]);
    }

    public function store(Request $request){

        $SettingId = Setting::select('id')->first();

        if($SettingId == null){
            $validator = Validator::make($request->all(), [
                'logo' => 'required',
                'title_en' =>'required',
                'contact_en' =>'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors'=> 'error'
                ],500);
            }elseif($request->file('logo') != null){
                $logo = $request->file('logo');
                $new_name = rand() . '.' . $logo->getClientOriginalExtension();
                $img = Image::make($request->file('logo'));
                $upload_path = public_path()."/images/";

                if($new_name){
                    $data = Setting::create([
                        'title_en'=>$request->title_en,
                        'title_bn'=>$request->title_bn,
                        'logo'=>$new_name,
                        'description_en'=>$request->des_en,
                        'description_bn'=>$request->des_bn,
                        'email'=>$request->email,
                        'address_en'=>$request->address_en,
                        'address_bn'=>$request->address_bn,
                        'contact_en'=>$request->contact_en,
                        'contact_bn'=>$request->contact_bn,
                        'fb_link'=>$request->fb_link,
                        'twitt_link'=>$request->twitt_link,
                        'tube_link'=>$request->tube_link,
                        'insta_link'=>$request->insta_link
                    ]);
                    if($data){
                        $img->save($upload_path.$new_name);
                        return response()->json([
                            'message'=>'success'
                        ],200);
                    }
                }
            }
            else{
                Alert::error('Opps...','Data entry wrong.');
                return response()->json([
                    'message'=>'success'
                ],500);
            }

        }else{
            $setting = Setting::where('id',$request->id)->first();
            if($request->file('logo') != null){

                $logo = $request->file('logo');
                $new_name = rand() . '.' . $logo->getClientOriginalExtension();
                $img = Image::make($request->file('logo'));
                $upload_path = public_path()."/images/";

                \File::delete(public_path('images/' . $setting->logo));
                if($new_name)
                {
                    $data = Setting::where('id',$request->id)->update([
                        'title_en'=>$request->title_en,
                        'title_bn'=>$request->title_bn,
                        'logo'=>$new_name,
                        'description_en'=>$request->des_en,
                        'description_bn'=>$request->des_bn,
                        'email'=>$request->email,
                        'address_en'=>$request->address_en,
                        'address_bn'=>$request->address_bn,
                        'contact_en'=>$request->contact_en,
                        'contact_bn'=>$request->contact_bn,
                        'fb_link'=>$request->fb_link,
                        'twitt_link'=>$request->twitt_link,
                        'tube_link'=>$request->tube_link,
                        'insta_link'=>$request->insta_link
                    ]);

                    if($data){
                        $img->save($upload_path.$new_name);

                        return response()->json([
                            'message'=>'success'
                        ],200);
                    }
                }

            }else{
                $data = Setting::where('id',$request->id)->update([
                    'title_en'=>$request->title_en,
                    'title_bn'=>$request->title_bn,
                    'description_en'=>$request->des_en,
                    'description_bn'=>$request->des_bn,
                    'email'=>$request->email,
                    'address_en'=>$request->address_en,
                    'address_bn'=>$request->address_bn,
                    'contact_en'=>$request->contact_en,
                    'contact_bn'=>$request->contact_bn,
                    'fb_link'=>$request->fb_link,
                    'twitt_link'=>$request->twitt_link,
                    'tube_link'=>$request->tube_link,
                    'insta_link'=>$request->insta_link
                ]);

                return response()->json([
                    'message'=>'success'
                ],200);

            }

        }
    }

    public function message()
    {
        $data = auth()->user();
        $messages = ContactUs::latest()->get();
        return view('layouts.backend.message.message_list',[
            'data'=>$data,
            'messages'=>$messages,
        ]);
    }

    public function message_delete(Request $request)
    {
        $messages = ContactUs::where('id',$request->id)->delete();
        return response()->json([
            'msg'=>'success'
        ],200);
    }

}
