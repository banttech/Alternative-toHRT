@extends('layouts.frontend.app')

@section('content')
<section class="about-page">
  <div class="conatiner-fluid about-inner">
    <div class="row about-row">
      <div class="about-heading">
        <h6>{{$wellness_blogs[0]->name}} </h6>
      </div>
    </div>
  </div>
</section>
{{-- <style>
  .post-item__excerpt p {
    text-align: left
  }
</style> --}}
<section class="recent-post jerm-post">
  <main>

    <section class="blog1-grid" id="Jermainechi">
      <div class="row  jermain-blogcenter">

        @foreach($wellness_blogs as $key => $wellness_blog)

        @php
        $blogLength = Str::length($wellness_blog->description);
        $categoryName = DB::table('blogcategory')->where('id',$wellness_blog->category_id)->first();
        @endphp
        <div class="col-md-4 col-sm-12">
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
              @php
              $wBlogDec=strip_tags(htmlspecialchars_decode( $wellness_blog->description));
              @endphp
              <p class="blog1-desc">{{ str::limit($wBlogDec, 120) }}</p>
              <div class="blog1-details">
                <div class="blog1-author-details">
                  <div class="blog1-author-desig"><i class="fa fa-calendar" aria-hidden="true"></i> {{date('F d, Y', strtotime($wellness_blog->date))}} /&nbsp;&nbsp;<b><i class="fa fa-user-o" aria-hidden="true"></i> BY
                      :</b> {{$wellness_blog->name}}</div>

                  @if($blogLength>=120)
                  <p class="post-item__read-more post-read"><a href="{{ route('frontend.blogpage',$wellness_blog->slug) }}">Read more</a></p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>
  </main>
</section>
</section>
</section>

@endsection