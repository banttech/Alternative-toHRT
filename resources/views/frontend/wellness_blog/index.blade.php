@extends('layouts.frontend.app')

@section('content')
<section class="about-page">
  <div class="conatiner-fluid about-inner">
    <div class="row about-row">
      <div class="about-heading">
        <h6>Wellness Blog</h6>
      </div>
    </div>
  </div>
</section>

<section class="recent-post">
  <main>
    <h1>Recent Posts</h1>
    <section class="blog1-grid">
      <div class="row">

        @foreach($wellness_blogs as $key => $wellness_blog)

        @php
        $blogLength = Str::length($wellness_blog->description);
        $categoryName = DB::table('blogcategory')->where('id',$wellness_blog->category_id)->first();
        @endphp
        <div class="col-md-4 mb-5 col-sm-6">
          <div class="blog1">
            <div class="blog1-img">
              <img src="{{asset('admin_assets/images/'.$wellness_blog->image)}}" alt="">
            </div>

            <div class="blog1-content">
              <div class="cat-inner">
                <div class="post-right"><a href="{{route('frontend.blogcategory', $categoryName->slug)}}">
                    <h6>{{$categoryName->categoryname}}</h6>
                  </a></div>
              </div>
              <a href="{{ route('frontend.blogpage', $wellness_blog->slug) }}">
                <h2 class="blog1-title">{{$wellness_blog->title}}</h2>
              </a>

              <div class="blog1-details">
                <div class="blog1-author-details">
                  <div class="blog1-author-desig"><i class="fa fa-calendar" aria-hidden="true"></i> {{date('F d, Y',
                    strtotime($wellness_blog->date))}} /&nbsp;&nbsp;<b><i class="fa fa-user-o" aria-hidden="true"></i>
                      BY
                      : </b><a href="{{route('frontend.author', $wellness_blog->name)}}">{{$wellness_blog->name}}</a>
                  </div>
                </div>
              </div>
              @php
              $wBlogDec=strip_tags(htmlspecialchars_decode( $wellness_blog->description));
              @endphp
              <p class="blog1-desc">{{ str::limit($wBlogDec, 120) }}</p>

              <div class="post-item__read-more post-read"><a
                  href="{{ route('frontend.blogpage',$wellness_blog->slug) }}">Read more</a></div>


            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>
  </main>
</section>
@foreach($catidarrays as $key => $catidarray)


<section class="blog">
  <h1>{{$categoryname[$key]}}</h1>
  <section class="posts-listing">
    @php
    $wellness_blogbycategory =
    DB::table('wellness_blog')->orderBy('id','desc')->take(3)->where('category_id',$catidarray)->get();

    @endphp
    @foreach ($wellness_blogbycategory as $item)
    @php
    $blogLength = Str::length($item->description);

    @endphp

    <article class="post-item">
      <a class="post-item__inner" href="#">

        <div class="post-item__thumbnail-wrapper">
          <div class="post-item__thumbnail"
            style="background-image:url({{asset('admin_assets/images/'.$item->image)}});"></div>
        </div>

        <div class="post-item__content-wrapper">
          <div class="blog-text">
            <div class="blog-right"><a href="{{route('frontend.blogcategory', $categoryslug[$key])}}">
                <h5>{{$categoryname[$key]}}</h5>
              </a></div>
            <h2><a href="{{ route('frontend.blogpage',$item->slug) }}">{{$item->title}}</a></h2>
          </div>
          <div class="post-item__metas">
            <time class="post-item__meta post-item__meta--date"><i class="fa fa-calendar" aria-hidden="true"></i>
              {{date('F d, Y', strtotime($item->date))}}</time>
            <p class="post-item__meta post-item__meta--category">/ &nbsp;<i class="fa fa-user-o" aria-hidden="true"></i>
              BY :<a href="{{route('frontend.author', $wellness_blog->name)}}"> {{$item->name}}</a></p>
          </div>
          @php
          $wBlogDec=strip_tags(htmlspecialchars_decode( $wellness_blog->description));
          @endphp
          <div class="post-item__excerpt">{{ str::limit($wBlogDec, 120) }}</div>



          @if($blogLength>=120)
          <div class="post-item__read-more-wrapper">
            <p class="post-item__read-more"><a href="{{ route('frontend.blogpage',$item->slug) }}">Read more</a></p>
          </div>
          @endif
        </div>
      </a>
    </article>
    @endforeach



  </section>

</section>

@endforeach


@endsection