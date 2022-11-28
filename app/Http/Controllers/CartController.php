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
        User::find($user_id)->products()->detach($id);
        return redirect()->back();
    }
}
