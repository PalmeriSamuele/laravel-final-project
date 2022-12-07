<?php 
    use Carbon\Carbon;
    use Illuminate\Support\Str;
?>
<!-- Mobile-header-top Start -->
<div class="mobile-header-top d-block d-md-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- header-search-mobile start -->
                <div class="header-search-mobile">
                    <div class="table">
                        <div class="table-cell">
                            <ul>
                                <li><a class="search-open" href="#"><i class="zmdi zmdi-search"></i></a></li>
                                <li><a href="/login"><i class="zmdi zmdi-lock"></i></a></li>
                                <li><a href="my-account.html"><i class="zmdi zmdi-account"></i></a></li>
                                <li><a href="wishlist.html"><i class="zmdi zmdi-favorite"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- header-search-mobile start -->
            </div>
        </div>
    </div>
</div>
<!-- Mobile-header-top End -->




<!-- SLIDER-BANNER-AREA START -->
<section class="slider-banner-area clearfix">
    <!-- Sidebar-social-media start -->
    <div class="sidebar-social d-none d-md-block">
        <div class="table">
            <div class="table-cell">
                <ul>
                    <li><a href="#" target="_blank" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a></li>
                    <li><a href="#" target="_blank" title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>
                    <li><a href="#" target="_blank" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>
                    <li><a href="#" target="_blank" title="Linkedin"><i class="zmdi zmdi-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sidebar-social-media start -->
    <div class="banner-left floatleft">
        <!-- Slider-banner start -->
        <div class="slider-banner">
            <div class="single-banner banner-1">
                <a class="banner-thumb" href="#"><img src={{'assets/img/product/'. $new->image}} alt="" /></a>
                <span class="pro-label new-label">new</span>
                <span class="price">${{$new->price}}</span>
                <div class="banner-brief">
                    <h2 class="banner-title"><a href="#">{{$new->title}}</a></h2>
                    <p class="mb-0">Furniture</p>
                </div>
                <form action="/product/cart/store/{{$new->id}}" method="post">
                    @csrf
                    <input class="button-one font-16px border-0" type="submit" value="Buy now">
                </form>
                
            </div>
            <div class="single-banner banner-2">
                <a class="banner-thumb" href="#"><img src={{'assets/img/product/' . $favorite->image}} alt="" /></a>
                <div class="banner-brief">
                    <h2 class="banner-title"><a href="#">{{$favorite->title}}</a></h2>
                    <p class="hidden-md hidden-sm d-none d-md-block">{{$favorite->desc}}</p>
                    <form action="/product/cart/store/{{$favorite->id}}" method="post">
                        @csrf
                        <input class="button-one font-16px border-0" type="submit" value="Buy now">
                    </form>
                    
                </div>
            </div>
        </div>
        <!-- Slider-banner end -->
    </div>
    <div class="slider-right floatleft">
        <!-- Slider-area start -->
        <div class="slider-area">
            <div class="bend niceties preview-2">
                <div id="ensign-nivoslider" class="slides">
                    @foreach ($carousels as $carousel)
                        <img src='assets/img/slider/slider-1/{{$carousel->image}}' alt="" title="#slider-direction-1"  />

                    @endforeach
                </div>
                <!-- direction 1 -->
                <div id="slider-direction-1" class="t-cn slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lfl s-tb slider-1">
                        <div class="title-container s-tb-c title-compress">
                            <div class="layer-1">
                                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <h2 class="slider-title3 text-uppercase mb-0" >welcome to our</h2>
                                </div>
                                <div class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="1.5s">
                                    <h2 class="slider-title1 text-uppercase mb-0">furniture</h2>
                                </div>
                                <div class="wow fadeIn" data-wow-duration="2s" data-wow-delay="2.5s">
                                    <h3 class="slider-title2 text-uppercase" >gallery 2021</h3>
                                </div>
                                <div class="wow fadeIn" data-wow-duration="2.5s" data-wow-delay="3.5s">
                                    <a href="/shop-list" class="button-one style-2 text-uppercase mt-20" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- direction 2 -->
                <div id="slider-direction-2" class="slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lfl s-tb slider-1">
                        <div class="title-container s-tb-c title-compress">
                            <div class="layer-1">
                                <div class="wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <h2 class="slider-title3 text-uppercase mb-0" >welcome to our</h2>
                                </div>
                                <div class="wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                    <h2 class="slider-title1 text-uppercase">furniture</h2>
                                </div>
                                <div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0.5s">
                                    <p class="slider-pro-brief">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                                </div>
                                <div class="wow fadeInUpBig" data-wow-duration="2.5s" data-wow-delay="0.5s">
                                    <a href="/shop-list" class="button-one style-2 text-uppercase mt-20" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- direction 3 -->
                <div id="slider-direction-3" class="slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lfl s-tb slider-1">
                        <div class="title-container s-tb-c title-compress">
                            <div class="layer-1">
                                <div class="wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <h2 class="slider-title3 text-uppercase mb-0" >welcome to our</h2>
                                </div>
                                <div class="wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                    <h2 class="slider-title1 text-uppercase mb-0">furniture</h2>
                                </div>
                                <div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0.5s">
                                    <h3 class="slider-title2 text-uppercase" >gallery 2021</h3>
                                </div>
                                <div class="wow fadeInUpBig" data-wow-duration="2.5s" data-wow-delay="0.5s">
                                    <p class="slider-pro-brief">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                                </div>
                                <div class="wow fadeInUpBig" data-wow-duration="3s" data-wow-delay="0.5s">
                                    <a href="/shop-list" class="button-one style-2 text-uppercase mt-20" data-text="Shop now">Shop now</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider-area end -->
    </div>
    <!-- Sidebar-social-media start -->
    <div class="sidebar-account d-none d-md-block">
        <div class="table">
            <div class="table-cell">
                <ul>
                    <li><a class="search-open" href="#" title="Search"><i class="zmdi zmdi-search"></i></a></li>
                    <li><a href="#" title="Login"><i class="zmdi zmdi-lock"></i></a>
                        <div class="customer-login text-left">
                            <form action="{{route('login')}}">
                                <h4 class="title-1 title-border text-uppercase mb-30">Registered customers</h4>
                                <p class="text-gray">If you have an account with us, Please login!</p>
                                <input type="text" name="email" placeholder="Email here..." />
                                <input type="password" placeholder="Password" name='password'/>
                                <p><a class="text-gray" href="#">Forget your password?</a></p>
                                <button class="button-one submit-button mt-15" data-text="login" type="submit">login</button>
                            </form>
                        </div>
                    </li>
                    <li><a href="/my-account" title="My-Account"><i class="zmdi zmdi-account"></i></a></li>
                    <li><a href="/wishlist" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sidebar-social-media start -->
</section>
<!-- End Slider-section -->
<!-- sidebar-search Start -->
<div class="sidebar-search animated slideOutUp">
    <div class="table">
        <div class="table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 p-0">
                        <div class="search-form-wrap">
                            <button class="close-search"><i class="zmdi zmdi-close"></i></button>
                            <form action="#">
                                <input type="text" placeholder="Search here..." />
                                <button class="search-button" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- sidebar-search End -->
<!-- PRODUCT-AREA START -->
<div class="product-area pt-80 pb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title-border">Featured Products</h2>
                </div>

                <div class="product-slider style-1 arrow-left-right">
                    @foreach ($sliders as $slide )
                        <!-- Single-product start -->
                        <div class="single-product">
                            <div class="product-img">
                                <span class="pro-label new-label">new</span>
                                <a href="single-product.html"><img src={{asset('assets/img/product/'. $slide->image)}} alt="" /></a>
                                <div class="product-action  d-flex gap-3 align-items-center">
                                    <a href="#" class='d-flex align-items-center justify-content-center' data-bs-toggle="modal"  data-bs-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
                                    <form action="/product/cart/store/{{$slide->id}}" method="post" class="">
                                        @csrf
                                        <button type="submit" class="" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus mt-2"></i></button>
                                    </form>  

                                </div>
                            </div>
                            <div class="product-info clearfix">
                                <div class="fix">
                                    <h4 class="post-title floatleft"><a href="#">{{$slide->title}}</a></h4>
                                    <p class="floatright hidden-sm d-none d-md-block">{{$slide->categorie->name}}</p>
                                </div>
                                <div class="fix">
                                    <span class="pro-price floatleft">$ {{$slide->price}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Single-product end -->
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT-AREA END -->

<!-- PURCHASE-ONLINE-AREA START -->

<!-- PURCHASE-ONLINE-AREA END -->
<!-- BLGO-AREA START -->
<div class="blog-area pt-55">
    <div class="container">
        <!-- Section-title start -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title-border">From The Blog</h2>
                </div>
            </div>
        </div>
        <!-- Section-title end -->
        <div class="row">
            @foreach ($blogs as $blog )
                <!-- Single-blog start -->
                <div class="col-lg-6">
                    <div class="single-blog mt-30">
                        <div class="row">
                            <div class="col-xl-6 col-md-7">
                                <div class="blog-info">
                                    <div class="post-meta fix">
                                        <?php 
                                            
                                            $date = $blog->created_at->format('d');
                                            $monthName= $blog->created_at->format('F');
                                            $year = $blog->created_at->format('Y');
                            
                                        ?>
                                        <div class="post-date floatleft"><span class="text-dark-red">{{$date}}</span></div>
                                        <div class="post-year floatleft">
                                
                                            <p class="text-uppercase text-dark-red mb-0">{{$monthName}}, {{$year}}</p>
                                            <h4 class="post-title"><a href="#" tabindex="0">{{$blog->title}}</a></h4>
                                        </div>
                                    </div>
                                    <div class="like-share fix">
                                        <a href="#"><i class="zmdi zmdi-favorite"></i><span>{{$blog->likes}} Like</span></a>
                                        <a href="#"><i class="zmdi zmdi-comments"></i><span>{{ dd($blog->review())}} Comments</span></a>
                                        
                                    </div>
                                    <p>{{ Str::limit($blog->text,100,'...') }}</p>
                                    <a href="/blog/{{$blog->id}}" class="button-2 text-dark-red">Read more...</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-5">
                                <div class="blog-photo">
                                    <a href="#"><img src={{asset("assets/img/blog/" . $blog->image)}} alt="" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single-blog end -->
            @endforeach
        </div>
    </div>
</div>
<!-- BLGO-AREA END -->
<!-- SUBSCRIVE-AREA START -->
<div class="subscribe-area pt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="subscribe">
                    <form action="#">
                        <input type="text" placeholder="Enter your email address"/>
                        <button class="submit-button submit-btn-2 button-one" data-text="subscribe" type="submit" >subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SUBSCRIVE-AREA END -->
@include('partials.quickview')