@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    @include('pages.backoffice.partials.homeCarousel')
    <section>
        <h2>About section</h2>
        <form class='d-flex flex-column col-lg-5 col-12 m-auto gap-2 mt-3' action="/backoffice/update/about"  method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="file" name="image"  class='btn btn-secondary' id="">
            <textarea name="content" id="" cols="30" rows="10">{{old('content',$about->content)}}</textarea>
            <input type="submit" value="modifié">
    
        </form>
    </section>
    <section class="col-lg-5 mt-4">
        <h2>Contact section</h2>
        <form action="/contact/updateform" method="post" class="d-flex flex-column gap-2">
            @csrf
            @method('PUT')
            <label for="">Email </label>
            <input type="text" name="email" id="" value={{ old('email', $contact->email)}}>
            <label for="">Phone </label>
            <input type="text" name="phone" id=""value={{ old('phone', $contact->phone)}}>
            <label for="">Nom du pays </label>
            <input type="text" name="country" id="" value={{ old('country', $contact->country)}}>
            <label for="">Nom de la ville </label>
            <input type="text" name="city" id="" value={{ old('city', $contact->city)}}>
            <textarea name="adress" id="" cols="30" rows="10">{{ old('adress', $contact->adress)}}</textarea>
            <button type="submit" class="btn btn-success">modifier</button>
        </form>
    </section>

@endsection