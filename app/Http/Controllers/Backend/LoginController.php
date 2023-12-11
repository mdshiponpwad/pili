<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;
class LoginController extends Controller
{
    public function index()
    {
        return view('layouts.backend.auth.login');
    }

    public function get_user()
    {
        $users = User::all();
        return view('layouts.backend.user.user_list',[
            'users'=>$users
        ]);
    }


    public function create()
    {
        return view('layouts.backend.auth.register');
    }

    public function store(Request $request)
    {
        if(Session::get('lang') == "bangla"){
            $data = $request->validate([
                'name'  =>  'required',
                'email'  =>  'required',
                'phn'  =>  'required',
                'password'  =>  'required|min:8',
                'address'  =>  'required'
            ]);

            $user = User::create([
                'name_bn' => $request['name'],
                'email' => $request['email'],
                'address_bn' => $request['address'],
                'phn_bn' => $request['phn'],
                'password' => Hash::make($request['password']),
                'verified' => 1,
                'verification_token'=> Str::random(32),
            ]);
            // Mail::send('layouts.Mail.userVerification',$user,function($msg) use($user){
            //     $msg->from('ideatech.engineear@gmail.com','E-Commerce');
            //     $msg->to($user['email']);
            //     $msg->subject('Please verify your account.');
            // });
        }elseif(Session::get('lang') == "english"){
            $data = $request->validate([
                'name'  =>  'required',
                'email'  =>  'required',
                'phn'  =>  'required',
                'password'  =>  'required|min:8',
                'address'  =>  'required'
            ]);
            $user = User::create([
                'name_en' => $request['name'],
                'email' => $request['email'],
                'address_en' => $request['address'],
                'phn_en' => $request['phn'],
                'password' => Hash::make($request['password']),
                'verified' => 1,
                'verification_token'=> Str::random(32),
            ]);
            // Mail::send('layouts.Mail.userVerification',$user,function($msg) use($user){
            //     $msg->from('ideatech.engineear@gmail.com','E-Commerce');
            //     $msg->to($user['email']);
            //     $msg->subject('Please verify your account.');
            // });
        }


        return response()->json([
            'msg'=>"success"
        ],200);
    }

    public function login(Request $request)
    {
        if(Session::get('lang') == 'bangla'){
            if (Auth::attempt([
                'email'=>$request->email,
                'password'=>$request->password,
                'verified'=>1,
                'role'=>'admin'
            ])) {
                return response()->json([
                    'msg'=>"success"
                ],200);
            }elseif(Auth::attempt([
                'email'=>$request->email,
                'password'=>$request->password,
                'verified'=>1,
                'role'=>'user'
            ])) {
                return response()->json([
                    'msg'=>"success"
                ],200);
            }else{
                return response()->json([
                    'msg'=>"error"
                ],500);
            }
        }elseif(Session::get('lang') == 'english'){
            if (Auth::attempt([
                'email'=>$request->email,
                'password'=>$request->password,
                'verified'=>1,
                'role'=>'admin'
            ])) {
                return response()->json([
                    'msg'=>"success test"
                ],200);
            }elseif(Auth::attempt([
                'email'=>$request->email,
                'password'=>$request->password,
                'verified'=>1,
                'role'=>'user'
            ])) {
                return response()->json([
                    'msg'=>"success"
                ],200);
            }else{
                return response()->json([
                    'msg'=>"error"
                ],500);
            }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(Auth::check()){
            Auth::logout();
            // $request->session()->flush();
            return redirect()->route('login');
        }
    }
}
