<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
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
        $categories = Categorie::all();
        return view('pages.backoffice.pages.createProduct',compact('categories'));
    }
  
    public function store( Request $request){

        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'size' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $product = new Product();
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->image = $request->file('image')->hashName();
        $product->categorie_id = $request->categories_id;
        $product->isFavorite = 0;
        // have to do the images for the products
        // $image_input = $request->file('image');
        // $filename    = $image_input->getClientOriginalName();

        $image = Image::make($request->file('image'))->resize(270,270);
    
        $image->save('assets/img/product/'.$request->file('image')->hashName());
        $product->save();
        return redirect()->back()->with('success','Produit ajouté');

    }
    public function edit($id){
        $product = Product::find($id);
        $categories = Categorie::all();
        return view('pages.backoffice.pages.editProduct',compact('product','categories'));
    }

    public function update( Request $request, $id){
        
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'price' => 'required|digits_between:0,10000',
            'size' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $product = Product::find($id);
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->size = $request->size;
        if($request->isFavorite == '1'){
            Product::query()->update(['isFavorite' => 0]);
            $product->isFavorite = 1;
        }else{
            $product->isFavorite = 0;
        }
        
        $product->categorie_id = $request->categories_id;

        unlink(public_path('assets/img/product/' . $product->image));
        $image = Image::make($request->file('image'))->resize(270,270);
        $image->save('assets/img/product/'.$request->file('image')->hashName());

        $product->image = $request->file('image')->hashName();
        $product->save();
        return redirect()->back()->with('success','Produit modifié');;

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
