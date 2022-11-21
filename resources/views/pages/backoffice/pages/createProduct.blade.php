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
        <input type="file" name="image" class="btn btn-secondary">
       <input type="submit" class="btn btn-success" value="ajouter">
    </form>
@endsection