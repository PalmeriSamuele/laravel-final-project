@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <div class="">
        <div class=" bg-secondary p-3">
            <div class="d-flex  gap-3 justify-content-center ">
                <a class='text-light' href="/products">Tous</a>

                @foreach ($categories as $category )
                    <a class='text-light' href="/backoffice/category/{{$category->id}}">{{$category->name}}</a>
                @endforeach
            </div>
 
        </div>
        <div class="d-flex gap-3 flex-wrap justify-content-around">
            @foreach ($products as $product )
                <!-- Single-product start -->
                <div class="single-product  p-2">
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
                            {{-- <p class="floatright hidden-sm d-none d-md-block">{{$product->categorie->name}}</p> --}}
                        </div>
                        <div class="fix">
                            <span class="pro-price floatleft">$ {{$product->price}}</span>
                        </div>
                    </div>
                    <div class="d-flex  justify-content-between gap-1">
                        <form action="/delete/product/{{$product->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class='bg-danger text-light rounded border-0' value="supprimer">
                        </form>
                        <a href="/edit/product/{{$product->id}}" class=" rounded border-0 p-1">modifier</a>
                    </div>
                
                </div>
                <!-- Single-product end -->
    
            @endforeach
        </div>
    </div>

@endsection