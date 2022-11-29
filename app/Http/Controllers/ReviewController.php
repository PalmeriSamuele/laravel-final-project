<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $id){
        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->content = $request->content;
        $review->blog_id = $id;

        $review->save();

        return redirect()->back()->with('success','Avis ajouté');
    }

    public function destroy($id){
        $review = Review::find($id);
        $review->delete();
        return redirect()->back()->with('success', 'Votre  commentaire a ete suprrimé');
    }
}