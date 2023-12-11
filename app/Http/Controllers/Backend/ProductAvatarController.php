<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductAvatar;
use App\Models\ProductsAttribute;
use Image;
use Illuminate\Support\Str;

class ProductAvatarController extends Controller
{
    public function index($id)
    {
        $avatars = ProductAvatar::where('attribute_id',$id)->with('get_attribute')->get();
        return view('layouts.backend.product.avatars',[
            'avatars'=>$avatars
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
            'front' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'=> $validator->messages()->all()
            ],500);
        }elseif($request->file('front') != null && $request->file('back') == null &&
        $request->file('left') == null && $request->file('right') == null)
        {
            $image = $request->file('front');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('front'));
            $upload_path = public_path()."/images/";

            if($new_name){
                $data = ProductAvatar::create([
                    'attribute_id'=>$request->attr_id,
                    'product_id'=>$request->product_id,
                    'front'=>$new_name
                ]);
                if($data){
                    $img->save($upload_path.$new_name);

                    // toast('Product image upload successfully','success')
                    // ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }
        }elseif($request->file('front') != null && $request->file('back') != null &&
        $request->file('left') != null && $request->file('right') != null)
        {
            $image = $request->file('front');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('front'));
            $upload_path = public_path()."/images/";

            $image2 = $request->file('back');
            $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
            $img2 = Image::make($request->file('back'));
            $upload_path2 = public_path()."/images/";

            $image3 = $request->file('left');
            $new_name3 = rand() . '.' . $image3->getClientOriginalExtension();
            $img3 = Image::make($request->file('left'));
            $upload_path3 = public_path()."/images/";

            $image4 = $request->file('right');
            $new_name4 = rand() . '.' . $image4->getClientOriginalExtension();
            $img4 = Image::make($request->file('right'));
            $upload_path4 = public_path()."/images/";

            if($new_name && $new_name2 && $new_name3 && $new_name4){
                $data = ProductAvatar::create([
                    'product_id'=>$request->product_id,
                    'attribute_id'=>$request->attr_id,
                    'front'=>$new_name,
                    'back'=>$new_name2,
                    'left'=>$new_name3,
                    'right'=>$new_name4
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    $img2->save($upload_path2.$new_name2);
                    $img3->save($upload_path3.$new_name3);
                    $img4->save($upload_path4.$new_name4);

                    // toast('Product image upload successfully','success')
                    // ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }
        }elseif($request->file('front') != null && $request->file('back') != null &&
        $request->file('left') != null && $request->file('right') == null)
        {
            $image = $request->file('front');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('front'));
            $upload_path = public_path()."/images/";

            $image2 = $request->file('back');
            $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
            $img2 = Image::make($request->file('back'));
            $upload_path2 = public_path()."/images/";

            $image3 = $request->file('left');
            $new_name3 = rand() . '.' . $image3->getClientOriginalExtension();
            $img3 = Image::make($request->file('left'));
            $upload_path3 = public_path()."/images/";

            if($new_name && $new_name2){
                $data = ProductAvatar::create([
                    'product_id'=>$request->product_id,
                    'attribute_id'=>$request->attr_id,
                    'front'=>$new_name,
                    'back'=>$new_name2,
                    'left'=>$new_name3,
                    'right'=>''
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    $img2->save($upload_path2.$new_name2);
                    $img3->save($upload_path3.$new_name3);

                    // toast('Product image upload successfully','success')
                    // ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }
        }elseif($request->file('front') != null && $request->file('back') != null &&
        $request->file('left') == null && $request->file('right') == null)
        {
            $image = $request->file('front');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('front'));
            $upload_path = public_path()."/images/";

            $image2 = $request->file('back');
            $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
            $img2 = Image::make($request->file('back'));
            $upload_path2 = public_path()."/images/";

            if($new_name && $new_name2){
                $data = ProductAvatar::create([
                    'product_id'=>$request->product_id,
                    'attribute_id'=>$request->attr_id,
                    'front'=>$new_name,
                    'back'=>$new_name2,
                    'left'=>'',
                    'right'=>''
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    $img2->save($upload_path2.$new_name2);

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
            ],404);
        }
    }


    public function show($slug)
    {
        $data = auth()->user();
        $data1 = Product::where('slug',$slug)->first();
        $avatars = ProductAvatar::where('product_id',$data1->id)->with('get_product')->get();
        return view('layouts.backend.product.avatars',[
            'avatars'=>$avatars,
            'data'=>$data
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {

        $avtr = ProductAvatar::where('id',$request->avtr_id)->first();

        if($request->file('front') != null && $request->file('back') != null &&
        $request->file('left') != null && $request->file('right') != null
        ){

            $image = $request->file('front');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('front'));
            $upload_path = public_path()."/images/";

            $image2 = $request->file('back');
            $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
            $img2 = Image::make($request->file('back'));
            $upload_path2 = public_path()."/images/";

            $image3 = $request->file('left');
            $new_name3 = rand() . '.' . $image3->getClientOriginalExtension();
            $img3 = Image::make($request->file('left'));
            $upload_path3 = public_path()."/images/";

            $image4 = $request->file('right');
            $new_name4 = rand() . '.' . $image4->getClientOriginalExtension();
            $img4 = Image::make($request->file('right'));
            $upload_path4 = public_path()."/images/";

            if($new_name && $new_name2 && $new_name3 && $new_name4)
            {
                $data = ProductAvatar::where('id',$request->avtr_id)->update([
                    'front'=>$new_name,
                    'back'=>$new_name2,
                    'left'=>$new_name3,
                    'right'=>$new_name4
                ]);
                if($data){
                    \File::delete(public_path('images/' . $avtr->front));
                    \File::delete(public_path('images/' . $avtr->back));
                    \File::delete(public_path('images/' . $avtr->left));
                    \File::delete(public_path('images/' . $avtr->right));

                    $img->save($upload_path.$new_name);
                    $img2->save($upload_path2.$new_name2);
                    $img3->save($upload_path3.$new_name3);
                    $img4->save($upload_path4.$new_name4);

                    // toast('Product image update successfully','success')
                    // ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }

        }elseif($request->file('front') != null && $request->file('back') == null &&
        $request->file('left') == null && $request->file('right') == null){
            $image = $request->file('front');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('front'));
            $upload_path = public_path()."/images/";

            if($new_name)
            {
                $data = ProductAvatar::where('id',$request->avtr_id)->update([
                    'front'=>$new_name
                ]);
                if($data){
                \File::delete(public_path('images/' . $avtr->front));

                    $img->save($upload_path.$new_name);

                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }
        } else{
            return response()->json([
                'message'=>'success'
            ],500);
        }
    }
    public function destroy($id)
    {
        //
    }
}
