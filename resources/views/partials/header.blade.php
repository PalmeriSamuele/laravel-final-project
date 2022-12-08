<!-- HEADER-AREA START -->
<header id="sticky-menu" class="header header-2">
    <div class="header-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-4 col-7">
                    <div class="logo text-md-center">
                        <a href="/"><img src={{asset("assets/img/logo/logo.png")}} alt="" /></a>
                    </div>
                </div>
                <div class="col-md-4 col-5">
                    <div class="mini-cart text-end">
                        <ul>
                            <li>
                                <a class="cart-icon" href="#">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                    @auth
                                        <span>{{Auth::user()->products->count()}}</span>
                                    @endauth
                                    
                                </a>
                                <div class="mini-cart-brief text-left">
                                    <div class="cart-items">
                                        @auth
                                            <p class="mb-0">You have <span>{{Auth::user()->products->count()}} items</span> in your shopping bag</p>

                                        @endauth
                                    </div>
                                    <?php
                                        $sum = 0;
                                        $quantity = 1;

                                    ?>
                                    <div class="all-cart-product clearfix">
                                        @auth
                                        <?php
                                            $_cart = Auth::user()->products->sortBy('id')->toArray();
                                        ?>
                                            @for ($i = 0; $i < count($_cart); $i++  )
                                
                                                <?php
                                                    
                                                    $product = $_cart[$i];
                                                    $current_id = $product['id'];
                                                    $sum+=$product['price'];
                                                    ?>
                                                @if ($i+1 != count($_cart) && $current_id == $_cart[$i+1]['id'] )
                                                    <?php 
                                                        $quantity += 1; 
                                                    ?>
                                                @else
                                                    <?php 
                                            
                                                        $current_id = $product['id'];
                                                        
                                                    ?>
                                                    <div class="single-cart clearfix">
                                                        <div class="cart-photo">
                                                            <a href="#"><img src={{asset("assets/img/product/". $product['image'])}} alt="" /></a>
                                                        </div>
                                                        <div class="cart-info">
                                                            <h5><a href="#">{{$product['title']}}</a></h5>
                                                            <p class="mb-0">Price : $ {{$product['price']}}</p>
                                                            <p class="mb-0">Qty : {{$quantity}} </p>
                                                            <form action="/product/cart/delete/{{$product['id']}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <span class="cart-delete"><button type="submit"><i class="zmdi zmdi-close"></i></button></span>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <?php $quantity = 1; ?>
                                                @endif
            
                                            @endfor
                                        @endauth

             

                                    </div>
                                    <div class="cart-totals">
                                        <h5 class="mb-0">Total :<span class="floatright">  {{$sum}}$</span></h5>
                                    </div>
                                    <div class="cart-bottom  clearfix">
                                        <a href="/cart" class="button-one floatleft text-uppercase" data-text="View cart">View cart</a>
                                        <a href="/checkout" class="button-one floatright text-uppercase" data-text="Check out">Check out</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MAIN-MENU START -->
    <div class="menu-toggle menu-toggle-2 hamburger hamburger--emphatic d-none d-md-block">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    <div class="main-menu  d-none d-md-block">
<nav>
            <ul>
                <li><a href="/">home</a>
                </li>
                {{-- <li><a href="/shop">products</a>
                    <div class="mega-menu menu-scroll">
                        <div class="table">
                            <div class="table-cell">
                                <div class="half-width">
                                    <ul>
                                        <li class="menu-title">best brands</li>
                                        <li><a href="#">henning koppel</a></li>
                                        <li><a href="#">jehs + Laub</a></li>
                                        <li><a href="#">vicke lindstrand</a></li>
                                        <li><a href="#">don chadwick</a></li>
                                        <li><a href="#">akiko kuwahata</a></li>
                                        <li><a href="#">barbro berlin</a></li>
                                        <li><a href="#">cecilia hall</a></li>
                                        <li><a href="#">don chadwick</a></li>
                                    </ul>
                                </div>
                                <div class="half-width">
                                    <ul>
                                        <li class="menu-title">popular brands</li>
                                        <li><a href="#">akiko kuwahata</a></li>
                                        <li><a href="#">barbro berlin</a></li>
                                        <li><a href="#">cecilia hall</a></li>
                                        <li><a href="#">don chadwick</a></li>
                                        <li><a href="#">henning koppel</a></li>
                                        <li><a href="#">jehs + Laub</a></li>
                                        <li><a href="#">vicke lindstrand</a></li>
                                        <li><a href="#">don chadwick</a></li>
                                    </ul>
                                </div>
                                <div class="full-width">
                                    <div class="mega-menu-img">
                                        <a href="/single-product"><img src="img/megamenu/1.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="pb-80"></div>
                            </div>
                        </div>
                    </div>
                </li> --}}
                
               
                <li><a href="/shop-list">lookbook</a></li>
                <li><a href="/blog">blog</a></li>
                {{-- <li><a href="#">pages</a>
                    <div class="sub-menu menu-scroll">
                        <ul>
                            <li class="menu-title">Page's</li>
                            <li><a href="/shop">Shop</a></li>
                            <li><a href="/shop-sidebar">Shop Sidebar</a></li>
                            <li><a href="/shop-grid-right-sidebar">Shop Right Sidebar</a></li>
                            <li><a href="/shop-list">Shop List</a></li>
                            <li><a href="/shop-list-right-sidebar">Shop List right sidebar</a></li>
                            <li><a href="/single-product">Single Product</a></li>
                            <li><a href="/single-product-sidebar">Single Product Sidebar</a></li>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li><a href="/wishlist">Wishlist</a></li>
                            <li><a href="/checkout">Checkout</a></li>
                            <li><a href="/order">Order</a></li>
                            <li><a href="/login">login / Registration</a></li>
                            <li><a href="/my-account">My Account</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li><a href="/single-blog">Single Blog</a></li>
                            <li><a href="/single-blog-sidebar">Single Blog Sidebar</a></li>
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                </li> --}}
                <li><a href="/about">about us</a></li>
                <li><a href="/contact">contact</a></li>
                @auth

                <form method="POST" action="{{ route('logout') }}" class="d-flex justify-content-center">
                    @csrf
    
                    <button type="submit" class="btn btn-danger rounded ">
                        {{ __('Log Out') }}
                    </button>
                </form>
                @endauth
            </ul>
        </nav>
    </div>
    <!-- MAIN-MENU END -->
</header>
<!-- HEADER-AREA END -->
<!-- Mobile-menu start -->
<div class="mobile-menu-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 d-block d-md-none">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li><a href="/">home</a>
                                <ul>
                                    <li><a href="/">Home Version 1</a></li>
                                    <li><a href="/">Home Version 2</a></li>
                                </ul>
                            </li>
                            <li><a href="/shop">products</a></li>
                            <li><a href="/shop-sidebar">accesories</a></li>
                            <li><a href="/shop-list">lookbook</a></li>
                            <li><a href="/blog">blog</a></li>
                            <li><a href="#">pages</a>
                                <ul>
                                    <li><a href="/shop">Shop</a></li>
                                    <li><a href="/shop-sidebar">Shop Sidebar</a></li>
                                    <li><a href="/shop-list">Shop List</a></li>
                                    <li><a href="/product">Single Product</a></li>
                                    <li><a href="/single-product-sidebar">Single Product Sidebar</a></li>
                                    <li><a href="/cart">Shopping Cart</a></li>
                                    <li><a href="/wishlist">Wishlist</a></li>
                                    <li><a href="/checkout">Checkout</a></li>
                                    <li><a href="/order">Order</a></li>
                                    <li><a href="/login">login / Registration</a></li>
                                    <li><a href="/my-account">My Account</a></li>
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="/blog">Blog</a></li>
                                    <li><a href="/single-blog">Single Blog</a></li>
                                    <li><a href="/single-blog-sidebar">Single Blog Sidebar</a></li>
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/contact">Contact</a></li>
     
                                </ul>
                            </li>
                            <li><a href="/about">about us</a></li>
                            <li><a href="/contact">contact</a></li>
      
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile-menu end -->



{{-- <!-- QUICKVIEW PRODUCT -->
<div id="quickview-wrapper ">
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="#" src="img/product/quickview-photo.jpg"/>
                                </div>
                            </div><!-- .product-images -->

                            <div class="product-info">
                                <h1>Aenean eu tristique</h1>
                                <div class="price-box-3">
                                    <hr />
                                    <div class="s-price-box">
                                        <span class="new-price">$160.00</span>
                                        <span class="old-price">$190.00</span>
                                    </div>
                                    <hr />
                                </div>
                                <a href="shop.html" class="see-all">See all features</a>
                                <div class="quick-add-to-cart">
                                    <form method="post" class="cart">
    
                                        <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                <div class="quick-desc">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons">
                                            <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="zmdi zmdi-google-plus"></i></a></li>
                                            <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="zmdi zmdi-twitter"></i></a></li>
                                            <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="zmdi zmdi-facebook"></i></a></li>
                                            <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
    </div>
    <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->	 --}}