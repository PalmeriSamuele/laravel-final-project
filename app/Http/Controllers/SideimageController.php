<?php

namespace App\Http\Controllers;

use App\Models\Sideimage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SideimageController extends Controller
{
    public function store(Request $request , $id){
        $sideimage = new Sideimage();
        $sideimage->product_id = $id;
        $sideimage->image = $request->file('image')->hashName();

        $image = Image::make($request->file('image'))->resize(130,160);
    
        $image->save('assets/img/product/sideimage/'. $sideimage->image);
        $sideimage->save();

        return redirect()->back()->with('success','Image ajouté au produit');

    }

    public function destroy($id){
        $image = Sideimage::find($id);
        unlink(public_path('assets/img/product/sideimage/' . $image->image));

        $image->delete();

        return redirect()->back()->with('success','image effacé');
        
    }
}
