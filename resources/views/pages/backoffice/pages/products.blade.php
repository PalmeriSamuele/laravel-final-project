@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <div class="d-flex gap-3 flex-wrap">
    @foreach ($products as $product )
        <!-- Single-product start -->
        <div class="single-product col-2 p-2">
            <div class="product-img">
                @if ($product->isFavorite)
                    <div class="pro-label new-label">
                        <i class="fa-regular fa-star"></i>
                    </div>
                @endif
            
                <img src={{asset('assets/img/product/'. $product->image)}} alt="" />
         
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