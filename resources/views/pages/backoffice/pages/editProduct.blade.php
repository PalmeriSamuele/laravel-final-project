@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <form class="d-flex flex-column col-4 m-auto gap-2 justify-content-center mt-3" action="/update/product/{{$product->id}}" method="post" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        <div class="d-flex gap-3">
            <label for="">Marquer en favoris</label>
            @if($product->isFavorite)
                <input type="checkbox" name="isFavorite" value="1" checked>
            @else
                <input type="checkbox" name="isFavorite" value="1" >
            @endif
            
        </div>
   
        <input type="text" name="title" value="{{old('title',$product->title)}}">
        <textarea name="desc" cols="30" rows="10">{{old('desc',$product->desc)}}</textarea>
        <input type="number" name="price"  value={{old('price',$product->price)}}>
        <select name="size">
            <option value="{{$product->size}}">{{$product->size}}</option>

            <option value="XS">XS</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
        {{-- <input name="categories_id" type="text" list="categories" placeholder="Categorie" />
        <datalist id="categories">
            @foreach ($categories as $cat )
                <option value={{$cat->id}}>{{$cat->name}}</option>
            @endforeach
        </datalist> --}}
        <input type="number" max="10000" name="stock" id="" placeholder="Nombre de stock" value="{{ old('stock', $product->stock)}}">

        <select name="categories_id" id="" class="p-2">
            <option value={{$product->categorie->id}}>{{$product->categorie->name}}</option>

            @foreach ($categories as $cat )
                <option value={{$cat->id}}>{{$cat->name}}</option>
            @endforeach
        </select>

        <input type="file" name="image" class="btn btn-secondary">
        <img class='col-5' src="{{asset('assets/img/product/' . $product->image)}}" alt="">
       <input type="submit" class="btn btn-success" value="ajouter">
    </form>
    <div>
        <h4 class="mt-3 text-center">Ajouter des images supplementaires</h4>
        <div class="d-flex gap-3 justify-content-center  arrow-left-right mt-3 ">
            @foreach ($sideimages as $image )
                <!-- Single-product start -->
                <div class="border m-0">
                    <div class="m-0">
                        <div >
                           
                            <form action="/delete/sideimage/{{$image->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <input class="pro-label border-0 bg-danger" type="submit" value="delete">
                            </form>
                            
                        
                        </div>
                        <img class="m-0" src={{asset('assets/img/product/sideimage/'. $image->image)}} alt="" />
                    </div>
                </div>
                <!-- Single-product end -->
            @endforeach
    
        </div>
    
        <form action="/store/sideimage/{{$product->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" id="" class="btn btn-secondary rounded">
            <input type="submit" value="ajouté" class="btn btn-success rounded" >
        </form>
    </div>


@endsection