<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('pages.backoffice.pages.products',compact('products'));
    }

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
        // $image_input = $request->file('image');
        // $filename    = $image_input->getClientOriginalName();

        $image = Image::make($request->file('image'))->resize(270,270);
    
        $image->save('assets/img/product/'.$request->file('image')->hashName());
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

        unlink(public_path('assets/img/product/' . Product::find($id)->image));
        $product = Product::find($id);
        $product->delete();
        
        return redirect()->back()->with('success','Produit supprimé');
    }

    public function show($id){
        $product = Product::find($id);
        return view('pages.single-product',compact('product'));
    }

}
