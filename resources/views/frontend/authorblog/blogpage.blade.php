@extends('layouts.frontend.app')
@section('content')
<section class="about-page">
    <div class="conatiner-fluid about-inner">
        <div class="row about-row">
                <div  class="about-heading">
                    <h6>Blog</h6>
                </div>
        </div>
    </div>
</section>

<section class="blog-page">
    <div class="row">
        <div class="blog-section">

<!--BLOG SECTION-->
<div class="blog_container">
<div class="blog_content">
<div class="left_content">
<!--CARD BEGINING-->
<div class="blog_card"> 
<a href="" class="figure">
<img src="{{asset('admin_assets/images/'.$wellness_blogs->image)}}"  alt="" loading="lazy">
<span class="tag">{{date('F d, Y', strtotime($wellness_blogs->date))}}</span>
</a>
<section>
  <div class="blog-left"><a href="{{route('frontend.blogcategory', $categoryname->slug)}}"><h5>{{$categoryname->categoryname}}</h5> </a></div>
<h2 href="#" class="title">{!!$wellness_blogs->title !!}</h2> <br>
<time class="post-item__meta post-item__meta--date"><i class="fa fa-calendar" aria-hidden="true"></i>{{date('F d, Y', strtotime($wellness_blogs->date))}}</time>
<p class="post-item__meta post-item__meta--category">/ <i class="fa fa-user-o" aria-hidden="true"></i>&nbsp; BY : {!!$wellness_blogs->name !!} </p>
  <div class="blog-page-pra">
    <p> {!!$wellness_blogs->description !!}</p>
  </div>
</section>
</div>
<section class="blog-sec-five">
<div class="row">
<div class="contact-page-form blog-leave-form blog-sec-innertag" method="#">
  <h2>Leave a Reply</h2> 
  <form action="contact-mail.php" method="post">
    <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="single-input-field">
        <input type="text" placeholder="Your Name" name="name"/>
      </div>
    </div>  
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="single-input-field">
        <input type="email" placeholder="E-mail" name="email" required/>
      </div>
    </div>                              
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="single-input-field">
        <input type="text" placeholder="Phone Number" name="phone"/>
      </div>
    </div>  
    
    <div class="col-md-12 message-newinput">
      <div class="single-input-field">
        <textarea  placeholder="Write Your Message" name="message"></textarea>
      </div>
    </div>                                                
    <div class="single-input-fieldsbtn blog_page_btn">
      <input type="submit" value="Send Now"/>
    </div>                          
  </div>
  </form>   
</div> 
</div>
</section>

</div>

</div>

<div class="blog_content right_content">

<div class="columns categories">
<span class="title blog-categories">Categories</span>
<section>
    @foreach($blogcategorys as $key => $blogcategory)
    <a href="{{route('frontend.blogcategory', $blogcategory->slug)}}">{{$blogcategory->categoryname}}</a> 
@endforeach 
</section>
</div>

<div class="columns posts">
<span class="title blog-categories">Recent Posts <a href="#" title="Explore More"><i class=""></i></a></span>
<section>

    @foreach($recent_blogs as $key => $recent_blog)
    <div class="recent-posttext"><a href="{{ route('frontend.blogpage', $recent_blog->slug)}}"><img src="{{asset('admin_assets/images/'.$recent_blog->image)}}" alt="" loading="lazy"><p>{{$recent_blog->title}}</p><h6>{{date('F d, Y', strtotime($recent_blog->date))}}</h6></a></div>
@endforeach 

</section>
</div>

</div>
</div>  
</section>
@endsection
