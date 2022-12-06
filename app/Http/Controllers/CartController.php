<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function store($id){
      
        $user_id = Auth::user()->id;
        User::find($user_id)->products()->attach($id);
        return redirect()->back();
    }

    public function destroy($id){
        $user_id = Auth::user()->id;
        $rowtodelete = DB::table('product_user')->where('product_id',$id)->where('user_id',$user_id)->first();
        // dd(User::find($user_id)->products()->where('id',1));
      
        User::find($user_id)->products()->newPivotStatement()->where('id',  $rowtodelete->id)->delete();
        return redirect()->back();
    }
}
