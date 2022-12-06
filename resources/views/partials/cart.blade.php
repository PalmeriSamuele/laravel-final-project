<!-- HEADING-BANNER START -->
<div class=" overlay-bg" style="background: rgba(0, 0, 0, 0) url('assets/img/bg/{{$banner->image}}') no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>Shopping Cart</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->
<!-- SHOPPING-CART-AREA START -->
<div class="shopping-cart-area  pt-80 pb-80">
    <div class="container">	
        <div class="row">
            <div class="col-lg-12">
                <div class="shopping-cart">
                    <!-- Nav tabs -->
                    <ul class="cart-page-menu nav row clearfix mb-30">
                        <li><a class="active" href="#shopping-cart" data-bs-toggle="tab">shopping cart</a></li>
                        <li><a>check out</a></li>
                        <li><a>order complete</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- shopping-cart start -->
                        <div class="tab-pane active" id="shopping-cart">
                           
                                <div class="shop-cart-table">
                                    <div class="table-content table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-modification">Apply modifications</th>
                                                    <th class="product-subtotal">Total</th>
                                                    <th class="product-remove">Remove</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                $sum = 0;
                                                $quantity = 1;
            
                                            ?>
                                            <tbody>
                                                @auth
                                            <?php  
                                            $_cart = Auth::user()->products->sortBy('id');
                                           ?>
                                           
                                            @for ($i = 0; $i < $_cart->count(); $i++  )
                                
                                                <?php
                                                    
                                                    $product = $_cart[$i];

                                                    echo $i;
                                                    $current_id = $product->id;
                                                    $sum+=$product->price;
                                                    ?>
                                                @if ($i+1 != $_cart->count() && $current_id == $_cart[$i+1]->id )
                                                    <?php 
                                                        $quantity += 1; 
                                                    ?>
                                                @else
                                                    <?php 
                                                        
                                                       
                                                        $current_id = $product->id;
                                                        
                                                    ?>
                                                <tr>
                                                    <td class="product-thumbnail  text-left">
                                                        <!-- Single-product start -->
                                                        <div class="single-product">
                                                            <div class="product-img">
                                                                <a href="single-product.html"><img src={{asset("assets/img/product/" . $product->image)}} alt="" /></a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h4 class="post-title"><a class="text-light-black" href="#">{{$product->title}}</a></h4>
                                                                <p class="mb-0">Color :  Black</p>
                                                                <p class="mb-0">Size :     {{$product->size}}</p>
                                                            </div>
                                                        </div>
                                                        <!-- Single-product end -->												
                                                    </td>
                                                    <td class="product-price">$ {{$product->price}}</td>
                                                    <td class="product-quantity">
                                                
                                                            <div>
                                                                <button disabled>{{$quantity}}</button>
                                                            </div>
                 
                                                    </td>
                                                    <td>
                                                        
                                                        <form action="/product/cart/store/{{$product->id}}" method="post" class="">
                                                            @csrf
                                                            <button type="submit" class="" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus mt-2"></i></button>
                                                        </form>  
        
                                                        
                                                    </td>
                                                    

                                                    <td class="product-subtotal">$ {{$product->price * $quantity}}</td>
                                                    <td class="product-remove">
                                                        <form action="/product/cart/delete/{{$product->id}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"><i class="zmdi zmdi-close"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                    <?php $quantity = 1; ?>
                                                @endif
            
                                            @endfor
                                        @endauth

                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="customer-login mt-30">
                                            <h4 class="title-1 title-border text-uppercase">coupon discount</h4>
                                            <p class="text-gray">Enter your coupon code if you have one!</p>
                                            
                                            <form action="/cart">
                                                @csrf
                                                <input type="text" placeholder="Enter your code here." name='input_code'>
                                                <button type="submit" data-text="apply coupon" class="button-one submit-button mt-15">apply coupon</button>

                                            </form>
                                        </div>
                                        <?php 
                                            if(isset($_GET['input_code'])) {
                                                if ($_GET['input_code'] == 'cactus') {
                                                    $discount = $sum * 0.25;
                                                }
                                            }
                                            else{
                                                $discount = 0;
                                            }
                                      
                                            
                                      
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="customer-login payment-details mt-30">
                                            <h4 class="title-1 title-border text-uppercase">payment details</h4>
                                            <table>
                                                <?php $tva = $sum * 0.21 ?>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left">Cart total</td>
                                                        <td class="text-end"> {{$sum}} $</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">Discount code</td>
                                                        <td class="text-end "> + {{$discount}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">Vat</td>
                                                        <td class="text-end"> + {{$tva}} $</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">Order Total</td>
                                                        <td class="text-end">{{$sum + $tva + $discount}} $ </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>		
                        </div>
                        <!-- shopping-cart end -->
                        <!-- check-out end -->
                    </div>
                    @if(isset($_GET['input_code']))
                        <a href={{'/checkout?_token=POOp9jPtjAWUN5nSte2XxEjoRymEOB8yspIp1QID&input_code='. $_GET['input_code'] }} type="submit" data-text="proceed-checkout" class="button-one submit-button mt-15">PROCEED CHECK OUT</a>
                    @else
                        <a href={{'/checkout'}} type="submit" data-text="proceed-checkout" class="button-one submit-button mt-15">PROCEED CHECK OUT</a>

                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SHOPPING-CART-AREA END -->