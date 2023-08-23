@extends('layouts.frontend.app')
@section('content')
<section class="about-page">
  <div class="conatiner-fluid about-inner">
    <div class="row about-row">
      <div class="about-heading">
        <h6>{{ucwords($blogcategorys->categoryname)}}</h6>
      </div>
    </div>
  </div>
</section>

<section class="blog-page healthy-post" id="heath-blog">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="blog_content right_content">
  
          <div class="columns categories">
            <span class="title blog-categories">Categories</span>
            <section class="health-side">
              @foreach($categorynames as $key => $categoryname)

              <a href="{{route('frontend.blogcategory', $categoryname->slug)}}">{{$categoryname->categoryname}}</a>

              @endforeach
            </section>
          </div>

        </div>
      </div>
      <div class="col-md-9">
        <div class="blog-section">
          <div class="blog_container">
            <div class="blog_content">
              <section class="posts-category healthy-inner">
                @if(count($blogs)>0)
              
                @foreach ($blogs as $blog)
                @php
                $blogLength = Str::length($blog->description);
                @endphp
                <article class="post-item">
                  <a class="post-item__inner" href="#">
    
                    <div class="post-item__thumbnail-wrapper">
                      <div class="post-item__thumbnail"
                        style="background-image:url({{asset('admin_assets/images/'.$blog->image)}});"></div>
                    </div>
    
                    <div class="post-item__content-wrapper">
                      <div class="blog-text">
                        @php
                        $catName = DB::table('blogcategory')->where('id',$blog->category_id)->first();
                        @endphp
    
                        <div class="blog-right"><a href="{{route('frontend.blogcategory', $catName->slug)}}">
                            <h5>{{$catName->categoryname}}</h5>
                          </a></div>
                        <h2>
                          <a href="{{route('frontend.blogpage',$blog->slug)}}">
                            {{$blog->title}}
                          </a>
                        </h2>
                      </div>
                      <div class="post-item__metas">
                        <time class="post-item__meta post-item__meta--date" datetime="2022-02-14T20:24:54+00:00"><i
                            class="fa fa-calendar" aria-hidden="true"></i> &nbsp;{{date('F d, Y',
                          strtotime($blog->date))}}</time>
                        <p class="post-item__meta post-item__meta--category">/ <i class="fa fa-user-o"
                            aria-hidden="true"></i>&nbsp; BY : <a
                            href="{{route('frontend.author', $blog->name)}}">{{$blog->name }}</a></p>
                      </div>
                     
                      @php
                      $wBlogDec=strip_tags(htmlspecialchars_decode($blog->description));
                      @endphp
                     <div class="post-item__excerpt">{{str::limit($wBlogDec, 120)}}</div>
        
                      <div class="post-item__read-more-wrapper">
                        <p class="post-item__read-more">
                          <a href="{{route('frontend.blogpage',$blog->slug)}}">Read more</a>
                        </p>
                      </div>
                   
                    </div>
                  </a>
                </article>
                @endforeach
                @else
                <div class="col-md-12 ml-0 pl-0">
                  <div class="product-name pl-0">
                      <h3 class="pr_name mt-3">No blogs found...!!</h3>
                  </div>
              </div>
                @endif
              </section>
            </div>
    
          
          </div>
        </div>
      </div>
     
    </div>
  </div>
  
</section>
@endsection