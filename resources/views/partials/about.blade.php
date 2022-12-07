

<!-- HEADING-BANNER START -->
<div class=" overlay-bg" style="background: rgba(0, 0, 0, 0) url('assets/img/bg/{{$banner->image}}') no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>About Us</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->

    <!-- ABOUT-US-AREA START -->
<div class="about-us-area  pt-80 pb-80">
    <div class="container">	
        <div class="about-us bg-white">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-photo">
                        <img src={{asset("assets/img/about/" . $content->image)}} alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-brief bg-dark-white">
                        <h4 class="title-1 title-border text-uppercase mb-30">about hurst</h4>
                        <p>{{$content->content}}</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT-US-AREA END -->
<!-- TEAM-MEMBER-AREA END -->
<div class="team-member-area pb-80">
    <div class="container">
        <!-- Section-title start -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title-border">Team Member</h2>
                </div>
            </div>
        </div>
        <!-- Section-title end -->	
        <div class="team-member">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-member text-center bg-white mt-25">
                        <img src={{asset("assets/img/users/" . $boss->image)}} alt="" />
                        <h3 class="text-uppercase mt-20">{{$boss->name}}</h3>
                        <h4 class="text-uppercase text-gray">{{$boss->job->job}}</h4>
                        <p class="text-gray">There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.</p>
                        <div class="team-social">
                            <ul>
                                <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @foreach ($employee as $team )
                    <div class="col-lg-3 col-md-6">
                        <div class="single-member text-center bg-white mt-25">
                            <img src={{asset("assets/img/users/" . $team->image)}} alt="" />
                            <h3 class="text-uppercase mt-20">{{$team->name}}</h3>
                            <h4 class="text-uppercase text-gray">{{$team->job->job}}</h4>
                            <p class="text-gray">There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.</p>
                            <div class="team-social">
                                <ul>
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
<!-- TEAM-MEMBER-AREA END -->		
