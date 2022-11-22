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
@endsection