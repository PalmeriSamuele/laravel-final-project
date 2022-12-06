<!-- HEADING-BANNER START -->
<div class="heading-banner-area overlay-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>Single Product</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Single Product</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->
<!-- PRODUCT-AREA START -->
<div class="product-area single-pro-area pt-80 pb-80 product-style-2">
    <div class="container">	
        <div class="row shop-list single-pro-info no-sidebar">
            <!-- Single-product start -->
            <div class="col-lg-12">
                <div class="single-product clearfix">
                    <!-- Single-pro-slider Big-photo start -->
                    <div class="single-pro-slider single-big-photo view-lightbox slider-for">
                        <div>
                            <img src={{asset("assets/img/product/single/" . $product->image)}} alt="" />

                        </div>
                    </div>	
                    <!-- Single-pro-slider Big-photo end -->								
                    <div class="product-info">
                        <div class="fix">
                            <h4 class="post-title floatleft">{{$product->title}}</h4>
                        </div>
                        <div class="fix mb-20">
                            <span class="pro-price">$ {{$product->price}}</span>
                        </div>
                        <div class="product-description">
                            <p>{{$product->desc}}</p>
                        </div>
                        <!-- Size start -->
                        <div class="size-filter single-pro-size mb-35 clearfix">
                            <ul>
                                <li><span class="color-title text-capitalize">size</span></li>
                                <li><a href="#">{{$product->size}}</a></li>
                            </ul>
                        </div>
                        <!-- Size end -->
                        <div class="d-felx gap-2">
                            <div class="col-1">
                                <input disabled type="text" value="1" name="qtybutton" class="">
                            </div>
                            <div class="product-action m-0 d-flex gap-3 align-items-center col-">
                                <form action="/product/cart/store/{{$product->id}}" method="post" class="col-1">
                                    @csrf
                                    <button type="submit" class="col-12" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus mt-2"></i></button>
                                </form>  

                            </div>
                        </div>
                        <!-- Single-pro-slider Small-photo start -->
                        <div class="single-pro-slider single-sml-photo slider-nav">
                            @foreach ($sideimages as $image )
                            <div>
                                <img src={{asset("assets/img/product/sideimage/" . $image->image)}} alt="" />
                            </div>
                            @endforeach

                        </div>
                        <!-- Single-pro-slider Small-photo end -->
                    </div>
                </div>
            </div>
            <!-- Single-product end -->
        </div>
        <!-- single-product-tab start -->
        <div class="single-pro-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="single-pro-tab-menu">
                        <!-- Nav tabs -->
                        <ul class="nav d-block">
                            <li><a href="#description" data-bs-toggle="tab">Description</a></li>
                            <li><a class="active" href="#reviews"  data-bs-toggle="tab">Reviews</a></li>
                            <li><a href="#information" data-bs-toggle="tab">Information</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane" id="description">
                            <div class="pro-tab-info pro-description">
                                <h3 class="tab-title title-border mb-30">dummy Product name</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                            </div>
                        </div>
                        <div class="tab-pane active" id="reviews">
                            <div class="pro-tab-info pro-reviews">
                                <div class="customer-review mb-60">
                                    <h3 class="tab-title title-border mb-30">Customer review</h3>
                                    <div>
                                        @foreach ($reviews as $review )
                                            <div>
                                                <div class="pro-reviewer">
                                                    <img src={{ asset('assets/img/user/' . $review->user->image )}} alt="" />
                                                </div>
                                                <div class="pro-reviewer-comment">
                                                    <div class="fix">
                                                        <div class="floatleft mbl-center">
                                                            <h5 class="text-uppercase mb-0"><strong>{{$review->user->name}}</strong></h5>
                                                            <p class="reply-date">{{$review->created_at}}</p>
                                                        </div>
                                                        <div class="comment-reply floatright d-flex gap-1">
                                                            {{-- <a href="#"><i class="zmdi zmdi-mail-reply"></i></a> --}}
                                                            <form action="/delete/review/{{$review->id}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"> X </button>
                            
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">{{$review->content}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="leave-review">
                                    <h3 class="tab-title title-border mb-30">Leave your review</h3>
                                    
                                    <div class="reply-box">
                                        <form action="/product/store/review/{{$product->id}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Your name here..." value={{Auth::user()->name}} name="name" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" value={{Auth::user()->email}} placeholder="Your email here..." name="email" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="custom-textarea" name="content" placeholder="Your review here..." ></textarea>
                                                    <button type="submit" data-text="submit review" class="button-one submit-button mt-20">submit review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>		
                        </div>
                        <div class="tab-pane" id="information">
                            <div class="pro-tab-info pro-information">
                                <h3 class="tab-title title-border mb-30">Product information</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                            </div>											
                        </div>
                        
                    </div>									
                </div>
            </div>
        </div>
        <!-- single-product-tab end -->
    </div>
</div>
<!-- PRODUCT-AREA END -->