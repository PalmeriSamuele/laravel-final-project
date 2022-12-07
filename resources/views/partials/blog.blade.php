
<?php 
    use Illuminate\Support\Str;
    use App\Models\Review;
?>
<!-- HEADING-BANNER START -->
<div class=" overlay-bg" style="background: rgba(0, 0, 0, 0) url('assets/img/bg/{{$banner->image}}') no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>Blog</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HEADING-BANNER END -->
<!-- BLGO-AREA START -->
<div class="blog-area blog-2  pt-80 pb-80">
    <div class="container">	
        <div class="blog">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-option mb-30 clearfix">
                        <!-- Categories start -->
                        <div class="dropdown floatleft">
                            <button class="option-btn active" data-bs-toggle="dropdown" >
                            Categories
                            </button>
                            <div class="dropdown-menu dropdown-width" >
                                <!-- Widget-Categories start -->
                                <aside class="widget widget-categories">
                                    <div class="widget-title">
                                        <h4>Categories</h4>
                                    </div>
                                    <div id="cat-treeview"  class="widget-info product-cat boxscrol2 d-flex flex-column">
                                        <a href="/blog">Toutes les categories</a>

                                        @foreach ($categories as $category )
                                            <a href="/blog/category/{{$category->id}}">{{$category->name}}</a>
                                        @endforeach
                                    </div>
                                </aside>
                                <!-- Widget-categories end -->
                            </div>
                        </div>	
                        <!-- Categories end -->
                    </div>						
                </div>							
            </div>
            <div class="row">

                @foreach ($blogs as $blog )
                    <!-- Single-blog start -->
                    <?php 
                                                
                        $date = $blog->created_at->format('d');
                        $monthName= $blog->created_at->format('F');
                        $year = $blog->created_at->format('Y');

                       
                        $reviews = Review::where('blog_id',$blog->id);
                                            
    
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog mb-30">
                            <div class="blog-photo">
                                <a href="#"><img src={{asset("assets/img/blog/" . $blog->image)}} alt="" /></a>
                                <div class="like-share text-center fix">
                                    <form action="{{route('like',$blog->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button><i class="zmdi zmdi-favorite"></i><span>{{$blog->likes}} Like</span></button>                                    
                                    </form>
                                    <a href="#"><i class="zmdi zmdi-comments"></i><span>{{$reviews->count()}} Comments</span></a>
                                </div>
                            </div>
                            <div class="blog-info"> 
                                <div class="post-meta fix">
                                    <div class="post-date floatleft"><span class="text-dark-red">{{$date}}</span></div>
                                    <div class="post-year floatleft">
                                        <p class="text-uppercase text-dark-red mb-0">{{$monthName}}, {{$year}}</p>
                                        <h4 class="post-title"><a href="#" tabindex="0">{{$blog->title}}</a></h4>
                                    </div>
                                </div>
                                <p>{{ Str::limit($blog->text,100,'...') }}</p>
                                <a href="/blog/{{$blog->id}}" class="button-2 text-dark-red">Read more...</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single-blog end -->
                @endforeach


                
            </div>	
            <div class="row">
                <div class="col-md-12">
                    {{$blogs->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BLGO-AREA END -->		