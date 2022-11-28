<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function update(Request $request,$id){
        $request->validate([
            'image' => 'required'
        ]);

        $banner = Banner::find($id);
        if(file_exists(public_path('assets/img/bg/' . $banner->image))){
            unlink(public_path('assets/img/bg/' . $banner->image));
        }
       
        $banner->image = $request->file('image')->hashName();
        $image = Image::make($request->file('image'))->resize(1920,300);
        $image->save('assets/img/bg/'. $banner->image);

        $banner->save();
        return redirect()->back()->with('success','Banniere modifié');

    }
}
