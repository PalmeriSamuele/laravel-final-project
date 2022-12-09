<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function update(Request $request){
        $about = About::first();
        $about->content = $request->content;
        if($about->image){
            unlink(public_path('assets/img/about/' . $about->image));
            $about->image = $request->file('image')->hashName();
    
            $image = Image::make($request->file('image'))->resize(530,450);
        
            $image->save('assets/img/about/'.$about->image);
        }

        $about->save();
        return redirect()->back()->with('success','Le contenu de la page About a été modifié');
    }
}
