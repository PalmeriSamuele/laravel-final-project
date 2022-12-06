<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Review;
use App\Models\Sideimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Categorie::all();
        return view('pages.backoffice.pages.products',compact('products','categories'));
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
            'stock' => 'required|max:10000',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $product = new Product();
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->image = $request->file('image')->hashName();
        $product->categorie_id = $request->categories_id;
        $product->stock = $request->stock;
        $product->isFavorite = 0;
        // have to do the images for the products
        // $image_input = $request->file('image');
        // $filename    = $image_input->getClientOriginalName();

        $image = Image::make($request->file('image'))->resize(270,270);
    
        $image->save('assets/img/product/'.$request->file('image')->hashName());

        $image2 = Image::make($request->file('image'))->resize(370,450);
    
        $image2->save('assets/img/product/single/'.$request->file('image')->hashName());
        $product->save();
        return redirect()->back()->with('success','Produit ajouté');

    }
    public function edit($id){
        $product = Product::find($id);
        $categories = Categorie::all();
        $sideimages = Sideimage::all()
        ->where('product_id',$id);
        return view('pages.backoffice.pages.editProduct',compact('product','categories','sideimages'));
    }

    public function update( Request $request, $id){
        
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'price' => 'required|digits_between:0,10000',
            'size' => 'required',
            'stock' => 'required|max:10000',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $product = Product::find($id);
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->stock = $request->stock;
        if($request->isFavorite == '1'){
            Product::query()->update(['isFavorite' => 0]);
            $product->isFavorite = 1;
        }else{
            $product->isFavorite = 0;
        }
        
        $product->categorie_id = $request->categories_id;

        unlink(public_path('assets/img/product/' . $product->image));
        unlink(public_path('assets/img/product/single/' . $product->image));
        $image = Image::make($request->file('image'))->resize(270,270);
        $image->save('assets/img/product/'.$request->file('image')->hashName());
        // image single product
        $image2 = Image::make($request->file('image'))->resize(370,450);
    
        $image2->save('assets/img/product/single/'.$request->file('image')->hashName());
        $product->image = $request->file('image')->hashName();
        $product->save();
        return redirect()->back()->with('success','Produit modifié');;

    }

    public function destroy($id){
        $product = Product::find($id);
        unlink(public_path('assets/img/product/' . $product->image));
        unlink(public_path('assets/img/product/single/' . $product->image));
       
        $product->delete();
        
        return redirect()->back()->with('success','Produit supprimé');
    }

    public function show($id){
        $product = Product::find($id);
        $sideimages = Sideimage::all()->where('product_id',$id);
        $reviews = Review::where('product_id',$product->id)->get();
        
        
        return view('pages.single-product',compact('product','sideimages','reviews'));
    }

}
