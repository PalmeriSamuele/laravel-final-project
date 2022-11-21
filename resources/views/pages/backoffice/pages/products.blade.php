@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <div class="d-flex gap-3 flex-wrap">
    @foreach ($products as $product )
        <!-- Single-product start -->
        <div class="single-product col-2 p-2">
            <div class="product-img">
                {{-- <span class="pro-label new-label">new</span> --}}
                <a href="single-product.html"><img src={{asset('assets/img/product/'. $product->image)}} alt="" /></a>
                <div class="product-action clearfix">
                    <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>										
                    <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                </div>
            </div>
            <div class="product-info clearfix">
                <div class="fix">
                    <h4 class="post-title floatleft"><a href="#">{{$product->title}}</a></h4>
                    <p class="floatright hidden-sm d-none d-md-block">{{$product->categorie->name}}</p>
                </div>
                <div class="fix">
                    <span class="pro-price floatleft">$ {{$product->price}}</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <form action="/delete/product/{{$product->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class='btn btn-danger rounded' value="supprimer">
                </form>
                <a href="/edit/product/{{$product->id}}" class="btn btn-secondary rounded">modifier</a>
            </div>
          
        </div>
        <!-- Single-product end -->
    @endforeach
    </div>
@endsection