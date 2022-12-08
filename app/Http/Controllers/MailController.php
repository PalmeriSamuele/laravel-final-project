<?php

namespace App\Http\Controllers;

use App\Mail\Message;
use App\Mail\Newsletter;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Mail as _mail;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{

    public function index(){
        $mails = _mail::where('isArchiver',0)->get();
        return view('pages.backoffice.pages.mails',compact('mails'));
    }
    // public function order(){

    //     Mail::to(Auth::user()->email)->send(new OrderShipped(Auth::user()));
    //     return redirect('/order');
       
    // }
    public function newsletter(Request $request){
        Mail::to($request->email)->send(new Newsletter());
        return redirect()->back()->with('success','Vous vous etes inscrit a la newsletter ! merci bg !');

    }
    public function message(Request $request){
        $mail = new _mail;
        $mail->name = $request->name;
        $mail->email = $request->email;
        $mail->message = $request->message;
        $mail->save();
        Mail::to('samuele2231@hotmail.com')->send(new Message($request->all()));
        return redirect()->back()->with('success','Merci pour votre commentaire !');

    }
    public function archive_get(){
        $mails = _mail::where('isArchiver',1)->get();
        return view('pages.backoffice.pages.archive',compact('mails'));
    }
    public function archive($id){
               
        $mail = _mail::find($id);
        $mail->isArchiver = 1;
        $mail->save();
        return redirect('/backoffice/archive');
    }
    public function mailbox($id){
               
        $mail = _mail::find($id);
        $mail->isArchiver = 0;
        $mail->save();
        return redirect('/backoffice/mails');
    }

    public function show($id){
       
        $mail = _mail::find($id);
        $mail->isOpen = 1;
        $mail->save();
        return view('pages.backoffice.pages.showmail',compact('mail'));
        
    }
    public function destroy($id){
        $mail = _mail::find($id);
        $mail->delete();
        return redirect()->back()->with('success, Mail supprimé');
    }
}
