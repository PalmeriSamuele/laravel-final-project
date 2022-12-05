@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    @include('pages.backoffice.partials.homeCarousel')

    <h2>About section</h2>
    <form classs='d-flex flex-column col-lg-5 col-12 m-auto gap-2 mt-3' action="/backoffice/update/about"  method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="file" name="image"  class='btn btn-secondary' id="">
        <textarea name="content" id="" cols="30" rows="10">{{old('content',$about->content)}}</textarea>
        <input type="submit" value="modifié">

    </form>
@endsection