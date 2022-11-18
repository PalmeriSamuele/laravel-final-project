<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function create(){
        return view('pages.backoffice.pages.createProduct');
    }
  
    public function store( Request $request){

        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'size' => 'required',
            'image' => 'required|image',
        ]);
        $product = new Product();
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->image = $request->file('image')->hashName();
        
        // have to do the images for the products

        $product->save();
        return redirect()->back();

    }
    public function update( Request $request, $id){
        $product = Product::find($id);
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->size = $request->size;

        $product->save();
        return redirect()->back();

    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }

    public function show($id){
        $product = Product::find($id);
        return view('pages.single-product',compact('product'));
    }

}
