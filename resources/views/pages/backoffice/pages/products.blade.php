@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <div class="d-flex">
    @foreach ($products as $product )
        <!-- Single-product start -->
        <div class="single-product">
            <div class="product-img">
                <span class="pro-label new-label">new</span>
                <a href="single-product.html"><img src={{asset('assets/img/product/'. $product->image)}} alt="" /></a>
                <div class="product-action clearfix">
                    <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>										
                    <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                </div>
            </div>
            <div class="product-info clearfix">
                <div class="fix">
                    <h4 class="post-title floatleft"><a href="#">{{$product->title}}</a></h4>
                    <p class="floatright hidden-sm d-none d-md-block">Furniture</p>
                </div>
                <div class="fix">
                    <span class="pro-price floatleft">$ {{$product->price}}</span>
                </div>
            </div>
            <form action="/delete/product/{{$product->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <input type="submit" value="supprimer">
            </form>
        </div>
        <!-- Single-product end -->
    @endforeach
    </div>
@endsection