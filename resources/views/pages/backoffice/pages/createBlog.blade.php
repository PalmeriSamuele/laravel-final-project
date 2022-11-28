@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <form class="d-flex flex-column col-lg-5 col-12 m-auto gap-2 mt-3" action="/store/blog" method="post" enctype="multipart/form-data">
        @csrf
        <input class="rounded border" type="text" name="title" id="" placeholder="Titre" value="{{old('title')}}">
        <input type="file" class="btn btn-secondary rounded" name="image" id="">
        <select class="p-2" name="category_blogs_id" id="">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

        </select>
        <textarea class='rounded' name="text" id="" cols="30" rows="10" placeholder="Inserer du texte">{{old('text')}}</textarea>
        <input  class='col-3 btn btn-success rounded' type="submit" value="ajouté">
    </form>
@endsection