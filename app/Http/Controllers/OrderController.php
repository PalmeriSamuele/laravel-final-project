<?php

namespace App\Http\Controllers;

use App\Mail\CancelOrder;
use App\Models\Order;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('pages.backoffice.pages.orders',compact('orders'));
    }

    public function destroy($id){
        $order = Order::find($id);
        Mail::to($order->user->email)->send(new CancelOrder($order));
        $order->delete();
        return redirect()->back()->with('success','Commande annulé');
    }
}
