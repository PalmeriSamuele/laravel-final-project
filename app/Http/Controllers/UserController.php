<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function update(Request $request){
        $request->validate([
            
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required|max:35',
                'adress' => 'required',
                'country' => 'required|max:40',
                'company' => 'max:100',
                'state' => 'max:40',
                'city' => 'max:40',
                'image' => 'image'

            
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->adress = $request->adress;
        $user->image = $request->file('image')->hashName();

        $image = Image::make($request->file('image'))->resize(270,270);
    
        $image->save('assets/img/users/'.$user->image);
        $user->save();

        return redirect()->back()->with('success','Vos informations ont été mit à jour');

    }
}
