@extends('layouts.frontend.app')
@section('content')


<section class="about-page">
  <div class="conatiner-fluid about-inner">
    <div class="row about-row">
      <div class="about-heading">
        <h6>{{$wellness_blogs->title}}</h6>
      </div>
    </div>
  </div>
</section>

<section class="blog-page">
  <div class="container">
  <div class="row">


      <!--BLOG SECTION-->
      {{-- <div class="blog_container"> --}}
        <div class="col-md-9"><div class="blog_content">
          <div class="left_content">
            <!--CARD BEGINING-->
            <div class="blog_card">
              <a href="" class="figure">
                <img src="{{asset('admin_assets/images/'.$wellness_blogs->image)}}" alt="" loading="lazy">
               
              </a>
              <section>
                <div class="blog-left"><a href="{{route('frontend.blogcategory', $categoryname->slug)}}">
                    <h5>{{$categoryname->categoryname}}</h5>
                  </a></div>
                <h2 href="#" class="title">{!!$wellness_blogs->title !!}</h2> <br>
                <time class="post-item__meta post-item__meta--date"><i class="fa fa-calendar"
                    aria-hidden="true"></i> {{date('F d, Y', strtotime($wellness_blogs->date))}}</time>
                <p class="post-item__meta post-item__meta--category">/ <i class="fa fa-user-o"
                    aria-hidden="true"></i>&nbsp; BY :<a
                    href="{{route('frontend.author', $wellness_blogs->name)}}">{!!$wellness_blogs->name !!}</a></p>
                <div class="blog-page-pra">
                  <p> {!!$wellness_blogs->description !!}</p>
                </div>
              </section>
            </div>

        
          </div>
          <div class="side-bar-tag">
            <h2 class="new-tag-sidebar">Tags</h2>
            <div class="tag-sec-2">
            @php
            $alltags = '';
            @endphp
           
            @php
            $alltags = $alltags . "," . $wellness_blogs->tags;
            @endphp
         
            @php

            $tagarr = explode(',',$alltags);

            $results = array_unique( $tagarr, SORT_REGULAR);
            // dd($result);
            @endphp
            @foreach($results as $key => $result)
            @if($result!="")

            <a href="{{ route('frontend.blog.tag', $result) }}">{{$result}}</a>
            @endif
            @endforeach
           </div>
          </div>
              
        </div>
      </div>
        
            <div class="col-md-3"><div class="blog_content right_content">

              <div class="columns categories">
                <span class="title blog-categories">Categories</span>
                <section>
                  @foreach($blogcategorys as $key => $blogcategory)
                  <a href="{{route('frontend.blogcategory', $blogcategory->slug)}}">{{$blogcategory->categoryname}}</a>
                  @endforeach
                </section>
              </div>
    
              <div class="columns posts">
                <span class="title blog-categories">Recent Posts <a href="#" title="Explore More"><i
                      class=""></i></a></span>
                <section>
    
                  @foreach($recent_blogs as $key => $recent_blog)
                  <div class="recent-posttext"><a href="{{ route('frontend.blogpage', $recent_blog->slug)}}"><img
                        src="{{asset('admin_assets/images/'.$recent_blog->image)}}" alt="" loading="lazy">
                      <p>{{$recent_blog->title}}</p>
                      <!-- <h6>{{date('F d, Y', strtotime($recent_blog->date))}}</h6> -->
                    </a></div>
                  @endforeach
    
                </section>
              </div>
    
            </div></div>
            
              {{--//here leave a reply section --}}
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="comments-inner">
                      <h5>{{count($LeaveReplys)}} Comments</h5>
                      @foreach($LeaveReplys as $key => $LeaveReply)
                      <div class="comments-fafa">
                        <i class="fa fa-user-circle-o"></i>
                        <div class="comment-text">{{$LeaveReply->name}}<br>{{date('F d, Y H:i:s A', strtotime($LeaveReply->date))}}<br>{{$LeaveReply->message}}</p></div> 
                      </div>
        
                      {{-- <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </h6>
                        <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h6>
                       <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6> --}}
                      @endforeach
                    </div>
                  </div>

                </div>
              </div>
            
              {{--//here leave a reply section --}}
              @if (Session::has('success'))
              <div class="alert alert-dark">
                {{ Session::get('success') }}
              </div>
              @endif
  

            <section class="blog-sec-five">
            
              
               <div class="row">
                 <div class="contact-page-form blog-leave-form blog-sec-innertag comment-leave" method="#">
                   <h2>Leave a Reply</h2>
                   <p style="padding-left:18px">Your email address will not be published. Required fields are marked *</p>
                   <form action="{{route('frontend.comment.store',$wellness_blogs->id)}}" method="POST"
                     enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                       <div class="col-md-4 col-sm-6 col-xs-12">
                         <div class="single-input-field">
                           <input type="text" placeholder="Your Name*" name="name" required/>
                         </div>
                         @error('name')
                         <div class="error text-danger">{{ $message }}</div>
                         @enderror
                       </div>
                       <div class="col-md-4 col-sm-6 col-xs-12">
                         <div class="single-input-field">
                           <input type="email" placeholder="E-mail*" name="email" required />
                         </div>
                         @error('email')
                         <div class="error text-danger">{{ $message }}</div>
                         @enderror
                       </div>
                       <div class="col-md-4 col-sm-6 col-xs-12">
                         <div class="single-input-field">
                           <input type="text" placeholder="Your Website" name="your_website" />
                         </div>
                       </div>
 
                       <div class="col-md-12 message-newinput">
                         <div class="single-input-field">
                           <textarea placeholder="Write Your Message*" name="message" required></textarea>
                         </div>
                         @error('message')
                         <div class="error text-danger">{{ $message }}</div>
                         @enderror
                       </div>
                       <div class="single-input-fieldsbtn blog_page_btn">
                         <input type="submit" value="POST COMMENT" />
                       </div>
                     </div>
                   </form>
                 </div>
               </div>
             </section>
 
        
      {{-- </div> --}}

  </div>
</div>
</section>
@endsection