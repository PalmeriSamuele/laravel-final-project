@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <form class="d-flex flex-column col-4 m-auto gap-2 justify-content-center mt-3" action="/update/product/{{$product->id}}" method="post" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
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
       <input type="submit" class="btn btn-success" value="ajouter">
    </form>
@endsection