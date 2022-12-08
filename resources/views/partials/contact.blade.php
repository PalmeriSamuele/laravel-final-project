<!-- HEADING-BANNER START -->
<div class=" overlay-bg" style="background: rgba(0, 0, 0, 0) url('assets/img/bg/{{$banner->image}}') no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>Contact Us</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->
<!-- contact-us-AREA START -->
<div class="contact-us-area  pt-80 pb-80">
    <div class="container">	
        <div class="contact-us customer-login bg-white">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="contact-details">
                        <h4 class="title-1 title-border text-uppercase mb-30">contact details</h4>
                        <ul>
                            <li>
                                <i class="zmdi zmdi-pin"></i>
                                <span>{{$contact->adress}}</span>
                                <span>{{$contact->city}}, {{$contact->country}}</span>
                            </li>
                            <li>
                                <i class="zmdi zmdi-phone"></i>
                                <span>{{$contact->phone}}</span>
                               
                            </li>
                            <li>
                                <i class="zmdi zmdi-email"></i>
                                <span>{{$contact->email}}</span>
                            
                            </li>
                        </ul>
                    </div>
                    <div class="send-message mt-60">
                        <form action="{{route('message')}}" method="post">
                            @csrf
                            <h4 class="title-1 title-border text-uppercase mb-30">send message</h4>
                            <input type="text" name="name" placeholder="Your name here..." />
                            <input type="text" name="email" placeholder="Your email here..." />
                            <textarea class="custom-textarea" name="message" placeholder="Your comment here..."></textarea>
                            <button class="button-one submit-button mt-20" data-text="submit message" type="submit">submit message</button>
                            <p class="form-message"></p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 mt-xs-30">
                    <div class="map-area">
                        <div id="googleMap" style="width:100%;height:600px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT-US-AREA END -->