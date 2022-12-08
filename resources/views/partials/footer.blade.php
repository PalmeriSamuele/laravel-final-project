<?php 
    use App\Models\Contact;
?>
<!-- FOOTER START -->
<footer>
    <!-- Footer-area start -->
    <div class="footer-area footer-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer">
                        <h3 class="footer-title  title-border">Contact Us</h3>
                        <ul class="footer-contact">
                            <?php 
                                $contact = Contact::first();    
                            ?>
                            <li><span>Address :</span>{{$contact->adress}},<br>{{$contact->city}}, {{$contact->country}}</li>
                            <li><span>Cell-Phone :</span>{{$contact->phone}}</li>
                            <li><span>Email :</span>{{$contact->email}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="single-footer">
                        <h3 class="footer-title  title-border">accounts</h3>
                        <ul class="footer-menu">
                            <li><a href="/my-account"><i class="zmdi zmdi-dot-circle"></i>My Account</a></li>
                            <li><a href="/wishlist"><i class="zmdi zmdi-dot-circle"></i>My Wishlist</a></li>
                            <li><a href="/cart"><i class="zmdi zmdi-dot-circle"></i>My Cart</a></li>
                            <li><a href="/login"><i class="zmdi zmdi-dot-circle"></i>Sign In</a></li>
                            <li><a href="/checkout"><i class="zmdi zmdi-dot-circle"></i>Check out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="single-footer">
                        <h3 class="footer-title  title-border">shipping</h3>
                        <ul class="footer-menu">
                            <li><a href="#"><i class="zmdi zmdi-dot-circle"></i>New Products</a></li>
                            <li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Top Sellers</a></li>
                            <li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Manufactirers</a></li>
                            <li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Suppliers</a></li>
                            <li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Specials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer newsletter-item">
                        <h3 class="footer-title  title-border">Email Newsletters</h3>
                        <div class="footer-subscribe">
                            <form action="{{route('newsletter')}}" method="post">
                                @csrf
                                <input name='email' type="text" placeholder="Enter your email address"/>
                                <button class="submit-button submit-btn-2 button-one" data-text="subscribe" type="submit" >subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-area end -->
    <!-- Copyright-area start -->
    <div class="copyright-area copyright-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <p class="mb-0">&copy; <a href="https://themeforest.net/user/codecarnival/portfolio" target="_blank">CodeCarnival </a> 2021. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment  text-md-end">
                        <a href="#"><img src="img/payment/1.png" alt="" /></a>
                        <a href="#"><img src="img/payment/2.png" alt="" /></a>
                        <a href="#"><img src="img/payment/3.png" alt="" /></a>
                        <a href="#"><img src="img/payment/4.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright-area start -->
</footer>
<!-- FOOTER END -->
