<?php

?>

<!-- HEADING-BANNER START -->
<div class="heading-banner-area overlay-bg" style="background: rgba(0, 0, 0, 0) url('assets/img/bg/{{$banner->image}}') no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>Shop</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->
<!-- PRODUCT-AREA START -->
<div class="product-area pt-80 pb-80 product-style-2">
    <div class="container">
        <!-- Shop-Content End -->
        <div class="shop-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-option mb-30 clearfix">
                        <!-- Categories start -->
                        <div class="dropdown floatleft">
                            <button class="option-btn" >
                            Categories
                            </button>
                            <div class="dropdown-menu dropdown-width" >
                                <!-- Widget-Categories start -->
                                <aside class="widget widget-categories">
                                    <div class="widget-title">
                                        <h4>Categories</h4>
                                    </div>
                                    <div id="cat-treeview"  class="widget-info product-cat boxscrol2">
                                        <ul>
                                            @foreach ($categories as $category )
                                                <li><span>{{$category->name}}</span>
                                                    <ul>
                                                        <li><a href="#">T-Shirts</a></li>
                                                        <li><a href="#">Striped Shirts</a></li>
                                                        <li><a href="#">Half Shirts</a></li>
                                                        <li><a href="#">Formal Shirts</a></li>
                                                        <li><a href="#">Bilazers</a></li>
                                                    </ul>
                                                </li>           
                                            @endforeach
    
     
                                        </ul>
                                    </div>
                                </aside>
                                <!-- Widget-categories end -->
                            </div>
                        </div>	
                        <!-- Categories end -->
                        <!-- Price start -->
                        <div class="dropdown floatleft">
                            <button class="option-btn" >
                            Price
                            </button>
                            <div class="dropdown-menu dropdown-width" >
                                <!-- Shop-Filter start -->
                                <aside class="widget shop-filter">
                                    <div class="widget-title">
                                        <h4>Price</h4>
                                    </div>
                                    <div class="widget-info">
                                        <div class="price_filter">
                                            <form action='/' class="price_slider_amount">
                                                
                                                <input type="text" id="amount" name="price"  placeholder="Add Your Price" /> 
                                                <input type="submit" value='Rechercher'>
                                            </form>
                                            <div id="slider-range"></div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- Shop-Filter end -->
                            </div>
                        </div>	
                        <!-- Price end -->
                        <!-- Color start -->
                        <div class="dropdown floatleft">
                            <button class="option-btn">
                            Color
                            </button>
                            <div class="dropdown-menu dropdown-width" >
                                <!-- Widget-Color start -->
                                <aside class="widget widget-color">
                                    <div class="widget-title">
                                        <h4>Color</h4>
                                    </div>
                                    <div class="widget-info color-filter clearfix">
                                        <ul>
                                            <li><a href="#"><span class="color color-1"></span>LightSalmon<span class="count">12</span></a></li>
                                            <li><a href="#"><span class="color color-2"></span>Dark Salmon<span class="count">20</span></a></li>
                                            <li><a href="#"><span class="color color-3"></span>Tomato<span class="count">59</span></a></li>
                                            <li><a class="active" href="#"><span class="color color-4"></span>Deep Sky Blue<span class="count">45</span></a></li>
                                            <li><a href="#"><span class="color color-5"></span>Electric Purple<span class="count">78</span></a></li>
                                            <li><a href="#"><span class="color color-6"></span>Atlantis<span class="count">10</span></a></li>
                                            <li><a href="#"><span class="color color-7"></span>Deep Lilac<span class="count">15</span></a></li>
                                        </ul>
                                    </div>
                                </aside>
                                <!-- Widget-Color end -->
                            </div>
                        </div>
                        <!-- Color end -->
                        <!-- Size start -->
                        <div class="dropdown floatleft">
                            <button class="option-btn">
                            Size
                            </button>
                            <div class="dropdown-menu dropdown-width" >
                                <!-- Widget-Size start -->
                                <aside class="widget widget-size">
                                    <div class="widget-title">
                                        <h4>Size</h4>
                                    </div>
                                    <div class="widget-info size-filter clearfix">
                                        <ul>
                                            <li><a href="#">M</a></li>
                                            <li><a class="active" href="#">S</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">SL</a></li>
                                            <li><a href="#">XL</a></li>
                                        </ul>
                                    </div>
                                </aside>
                                <!-- Widget-Size end -->
                            </div>
                        </div>	
                        <!-- Size end -->								
                        <div class="showing text-end">
                            <p class="mb-0 d-none d-md-block">Showing 01-09 of 17 Results</p>
                        </div>
                    </div>						
                </div>	
                <div class="col-md-12">
                    <div class="row">

                        @foreach ($products as $product)
                                                    <!-- Single-product start -->
                        <div class="col-xl-3 col-md-4">
                            <div class="single-product">
                                <div class="product-img">
                                    <span class="pro-label new-label">new</span>
                                    <span class="pro-price-2">$ {{$product->price}}</span>
                                    <a href="single-product.html"><img src={{asset("assets/img/product/".$product->image)}} alt="" /></a>
                                </div>
                                <div class="product-info clearfix text-center">
                                    <div class="fix">
                                        <h4 class="post-title"><a href="#">{{$product->title}}</a></h4>
                                    </div>
                                    <div class="fix">
                                        <span class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                        </span>
                                    </div>
                                    <div class="product-action clearfix">
                                        <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                        <a href="#" data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                        <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                        <a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single-product end -->
                        @endforeach



                    </div>
                </div>
                <div class="col-md-12">
                    {{$products->links()}}
                </div>
            </div>
        </div>
        <!-- Shop-Content End -->
    </div>
</div>
<!-- PRODUCT-AREA END -->

