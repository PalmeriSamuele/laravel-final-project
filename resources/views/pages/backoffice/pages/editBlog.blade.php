@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <form class="d-flex flex-column col-lg-5 col-12 m-auto gap-2 mt-3" action="/update/blog/{{$blog->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Titre</label>
        <input class="rounded border" type="text" name="title" id="" placeholder="Titre" value="{{old('title',$blog->title)}}">
        <label for="image">Image</label>
        <input type="file" class="btn btn-secondary rounded" name="image" id="">
        <label for="category_blogs_id">Categorie</label>
        <select class="p-2" name="category_blogs_id" id="">
            <option value="{{$blog->category_blogs->id}}">{{$blog->category_blogs->name}}</option>
            @foreach ($categories as $category)
                @if( $blog->category_blogs->id != $category->id )
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
            @endforeach

        </select>
        <label for="text">Texte</label>
        <textarea class='rounded' name="text" id="" cols="30" rows="10" placeholder="Inserer du texte">{{old('text',$blog->text)}}</textarea>
        <input  class='col-3 btn btn-success rounded' type="submit" value="modifié">
    </form>
@endsection