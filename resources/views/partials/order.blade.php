<!-- HEADING-BANNER START -->
<div class="heading-banner-area overlay-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>order complete</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>order complete</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->
<!-- ORDER-AREA START -->
<div class="shopping-cart-area  pt-80 pb-80">
    <div class="container">	
        <div class="row">
            <div class="col-lg-12">
                <div class="shopping-cart">
                    <!-- Nav tabs -->
                    <ul class="cart-page-menu nav row clearfix mb-30">
                        <li><a>shopping cart</a></li>
                        <li><a>check out</a></li>
                        <li><a class="active">order complete</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- order-complete start -->
                        <div class="tab-pane active" id="order-complete">
                            <form action="#">
                                <div class="thank-recieve bg-white mb-30">
                                    <p>Thank you. Your order has been received.</p>
                                </div>
                                <div class="order-info bg-white text-center clearfix mb-30">
                                    <div class="single-order-info">
                                        <h4 class="title-1 text-uppercase text-light-black mb-0">order no</h4>
                                        <p class="text-uppercase text-light-black mb-0"><strong>m {{$code}}</strong></p>
                                    </div>
                                    <div class="single-order-info">
                                        <h4 class="title-1 text-uppercase text-light-black mb-0">Date</h4>
                                        <p class="text-uppercase text-light-black mb-0"><strong>{{now()}}</strong></p>
                                    </div>
                                    <div class="single-order-info">
                                        <h4 class="title-1 text-uppercase text-light-black mb-0">Total</h4>
                                        <p class="text-uppercase text-light-black mb-0"><strong>{{$_GET['total']}} $ </strong></p>
                                    </div>
                                    <div class="single-order-info">
                                        <h4 class="title-1 text-uppercase text-light-black mb-0">payment method</h4>
                                        <p class="text-uppercase text-light-black mb-0"><a href="#"><strong>check payment</strong></a></p>
                                    </div>
                                </div>
                                <div class="shop-cart-table check-out-wrap">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="our-order payment-details pr-20">
                                                <h4 class="title-1 title-border text-uppercase mb-30">our order</h4>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th><strong>Product</strong></th>
                                                            <th class="text-end"><strong>Total</strong></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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
                                                            <td>{{$product->title}}  x {{$quantity}}</td>
                                                            <td class="text-end"> {{$product->price * $quantity}} $</td>
                                                        </tr>


        
                                  
                                                            <?php $quantity = 1; ?>
                                                        @endif
                    
                                                    @endfor
                                                    <?php  
                                                        $tva = $sum *0.21; 
                                                        if(isset($_GET['input_code'])) {
                                                            if ($_GET['input_code'] == 'cactus') {
                                                                $discount = $sum * 0.25;
                                                            }
                                                           
                                                        } 
                                                        else{
                                                                $discount = 0;
                                                            }
                                                    ?>
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td class="text-end">{{$sum}} $</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping and Handing</td>
                                                        <td class="text-end">15.00 $</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Code</td>
                                                        <td class="text-end">+ {{$discount}} $</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Vat</td>
                                                        <td class="text-end">{{$tva}} $</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Order Total</td>
                                                        <td class="text-end">{{$sum + $tva + 15 + $discount}} $</td>
                                                    </tr>
                                                @endauth

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>										
                        </div>
                        <!-- order-complete end -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ORDER-AREA END -->