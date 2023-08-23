@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    <form action="{{route('wellness_blog')}}" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Serch by Blog Title/Editor Name" name="search"
          value="{{ request()->search }}">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
      </div>
    </form>


    <div class="card">
      <h5 class="card-header">{{$pagetitle}}</h5>
      <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('wellness_blog.create') }}" class="btn btn-primary admin_allpage">Add Wellness Blog</a>
      </div>

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th>Feature Image</th>
              <th>Blog Title</th>
              <th>Category</th>
              <th>Tags</th>
              <th>Editor Name</th>
              <th>Posted Date</th>
              <th>Actions</th>

            </tr>
          </thead>
          @if (Session::has('success'))
          <div class="alert alert-dark">
            {{ Session::get('success') }}
          </div>
          @endif
          <tbody class="table-border-bottom-0">
            @if(count($wellness_blogs) > 0)
            @foreach($wellness_blogs as $key => $wellness_blog)
            @php 
            $blogTitleLength = Str::length($wellness_blog->title);
            @endphp  
            <tr>
              <td><img class="mt-2" src="{{ url('admin_assets/images/'.$wellness_blog->image)}}" alt=" " width="100px"
                  height="100px" id="img" /></td>
                  @if($blogTitleLength>=50)
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{!! substr($wellness_blog->title,0,50,)!!}</strong>
              </td>
              @else
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
               {!! substr($wellness_blog->title,0,50,)!!}</strong>
                @endif
              @php
              foreach ($blogcategorys as $blogcategory) {
              if ($blogcategory->id == $wellness_blog->category_id) {
              $value = $blogcategory->categoryname;
              break;
              }
              }
              @endphp
              <td>{{$value}}</td>
              <td>{{$wellness_blog->tags}}</td>
              <td>{{$wellness_blog->name}}</td>
              <td>{{$wellness_blog->date}}</td>
              <td> <a href="{{ route('wellness_blog.edit', $wellness_blog->id) }}"
                  class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ route('wellness_blog.delete', $wellness_blog->id) }}" class="btn btn-danger btn-sm"
                  onclick="return confirm('Are you sure you want to delete this Blog?');">Delete</a>
              </td>
            </tr>
            </tr>
            @endforeach
            @else

            <tr>
              <td colspan="9" class="text-center text-danger">No Record Found</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-3">
    {{ $wellness_blogs->links() }}
  </div>
</div>
@endsection