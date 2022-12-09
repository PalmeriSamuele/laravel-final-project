<?php 
    use Illuminate\Support\Str;
?>

<!-- HEADING-BANNER START -->
<div class="heading-banner-area overlay-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>Single-Blog</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Single-Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->
<!-- BLGO-AREA START -->
<div class="blog-area blog-2 blog-details-area  pt-80 pb-80">
    <div class="container">	
        <div class="blog">
            <div class="row">
                <?php 
                                                    
                    $date = $blog->created_at->format('d');
                    $monthName= $blog->created_at->format('F');
                    $year = $blog->created_at->format('Y');

                ?>
                <!-- Single-blog start -->
                <div class="col-lg-12">
                    <div class="single-blog mb-30">
                        <div class="blog-photo">
                            <a href="#"><img src={{ asset('assets/img/blog/single/' . $blog->image)}} alt="" /></a>
                            <div class="like-share fix">
                                <a href="#"><i class="zmdi zmdi-account"></i><span>{{$blog->user->name}}</span></a>
                                <a href="#"><i class="zmdi zmdi-favorite"></i><span>{{$blog->likes}} Like</span></a>
                                <a href="#"><i class="zmdi zmdi-comments"></i><span>{{$reviews->count()}} Comments</span></a>
                            </div>
                            <div class="post-date post-date-2 w-25">
                                <span class="text-dark-red">{{$date}}</span>
                                <span class="text-dark-red text-uppercase">{{$monthName}}</span>
                            </div>
                        </div>
                        <div class="blog-info blog-details-info">
                            <h4 class="post-title post-title-2"><a href="#">{{$blog->title}}</a></h4>
                            <p>{{$blog->text}}</p>
                            <div class="post-share-tag clearfix mt-40">
                                <div class="post-share floatleft">
                                    <span class="text-uppercase"><strong>Share</strong></span>
                                    <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                    <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                    <a href="#"><i class="zmdi zmdi-linkedin"></i></a>
                                    <a href="#"><i class="zmdi zmdi-vimeo"></i></a>
                                    <a href="#"><i class="zmdi zmdi-dribbble"></i></a>
                                    <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                </div>
                                <div class="post-share post-tag floatright">
                                    <span class="text-uppercase"><strong>tags</strong></span>
                                        @foreach ($blog->tags as $tag )
                                            <a href="">{{$tag->tag}}</a>
                                        @endforeach
                                </div>
                            </div>
                            <div class="pro-reviews mt-60">
                                <div class="customer-review mb-60">
                                    <h3 class="tab-title title-border mb-30">Customer comments</h3>
                                    <div>
                                        @foreach ($reviews as $review )
                                            <div>
                                                <div class="pro-reviewer">
                                                    <img src={{ asset('assets/img/users/' . $review->user->image )}} alt="" />
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
                                @auth
                                <div class="leave-review">
                                    <h3 class="tab-title title-border mb-30">Leave your review</h3>
                                    <div class="reply-box">
                                        <form action="/blog/store/review/{{$blog->id}}" method="post">
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
                                @endauth
                                
                            </div>										
                        </div>
                    </div>
                </div>
                <!-- Single-blog end -->
            </div>
        </div>
    </div>
</div>
<!-- BLGO-AREA END -->		