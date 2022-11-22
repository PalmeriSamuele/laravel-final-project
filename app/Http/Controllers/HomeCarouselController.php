<?php

namespace App\Http\Controllers;

use App\Models\HomeCarousel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeCarouselController extends Controller
{
    public function store(Request $request){
        $carousel = new HomeCarousel();
        $carousel->image = $request->file('image')->hashName();
        
        $image = Image::make($request->file('image'))->resize(1220,800);
        $image->save('assets/img/slider/slider-1/'.$request->file('image')->hashName());


        $carousel->save();
        return redirect('/backoffice')->with('success','Image ajouté dans le carousel');
    }

    public function destroy($id){
        unlink(public_path('assets/img/slider/slider-1/' . HomeCarousel::find($id)->image));

        $carousel = HomeCarousel::find($id);
        $carousel->delete();
        return redirect('/backoffice')->with('success','Image supprimé correctement');

    }
}
