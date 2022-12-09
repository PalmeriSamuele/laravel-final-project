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
                            <input type="text" name="name" placeholder="Your name here..." value="{{Auth::user()->name}}"/>
                            <input type="text" name="email" placeholder="Your email here..." value="{{Auth::user()->email}}"/>
                            <textarea class="custom-textarea" name="message" placeholder="Your comment here..."></textarea>
                            <button class="button-one submit-button mt-20" data-text="submit message" type="submit">submit message</button>
                            <p class="form-message"></p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 mt-xs-30">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2518.693528172703!2d4.33863781092617!3d50.85535925801055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c38c275028d3%3A0xc7799151146ebf77!2sMolenGeek!5e0!3m2!1sfr!2sbe!4v1670574715808!5m2!1sfr!2sbe" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT-US-AREA END -->