<section class="p-2 border border-2">
    <h3>Home carousel</h3>
    <div class="product-slider style-1 arrow-left-right">
        @foreach ($carousels as $carousel )
            <!-- Single-product start -->
            <div class="single-product">
                <div class="product-img">
                    <div >
                        @if($carousels->count() > 1)
                            <form action="/delete/carousel-item/{{$carousel->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <input class="pro-label border-0 bg-danger" type="submit" value="delete">
                            </form>
                        @endif
                    
                    </div>
                    <img src={{asset('assets/img/slider/slider-1/'. $carousel->image)}} alt="" />
                </div>
            </div>
            <!-- Single-product end -->
        @endforeach

    </div>

    <form action="/store/caroussel-item" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="" class="btn btn-secondary rounded">
        <input type="submit" value="ajouté" class="btn btn-success rounded" >
    </form>
</section>

