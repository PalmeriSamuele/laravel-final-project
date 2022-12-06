@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <form class="d-flex flex-column col-4 m-auto gap-2 justify-content-center mt-3" action="/store/product" method="post" enctype='multipart/form-data'>
        @csrf
        <input type="text" name="title" placeholder="Nom du produit">
        <textarea name="desc" cols="30" rows="10"></textarea>
        <input type="number" name="price" placeholder="Prix">
        <select name="size">
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
        <input type="number" max="10000" name="stock" id="" placeholder="Nombre de stock">
        <select name="categories_id" id="" class="p-2">
            @foreach ($categories as $cat )
                <option value={{$cat->id}}>{{$cat->name}}</option>
            @endforeach
        </select>

        <input type="file" name="image" class="btn btn-secondary">
       <input type="submit" class="btn btn-success" value="ajouter">
    </form>
@endsection