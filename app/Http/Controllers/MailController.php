<?php

namespace App\Http\Controllers;

use App\Mail\Newsletter;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function order(Request $request){
        Mail::to($request->email)->send(new OrderShipped($request->all()));
        return redirect('/order');

    }
    public function newsletter(Request $request){
        Mail::to($request->email)->send(new Newsletter());
        return redirect()->back()->with('success','Vous vous etes inscrit a la newsletter ! merci bg !');

    }
}
