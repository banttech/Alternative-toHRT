@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">{{$pagetitle}}</h5>

          </div>

          <div class="card-body">
            <form action="{{route('wellness_blog.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="title">Blog Title*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" id="foo" placeholder="" required>
                </div>
                @error('title')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="category">Blog Slug*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="slug" id="bar" placeholder="" required>
                </div>
                @error('slug')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Blog Category</label>
                <div class="col-sm-10">
                  <select id="largeSelect" class="form-select form-select-lg" name="category_id">
                    @foreach($blogcategorys as $key => $blogcategory)
                    <option value="{{$blogcategory->id}}" {{ old('blogcategory')==$blogcategory->categoryname ?
                      'selected' : '' }}>
                      {{$blogcategory->categoryname}}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>

              
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tags">Tags*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tags" id="bar" placeholder="">
                </div>
                @error('tags')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="description">Blog Description*</label>
                <div class="col-sm-10">
                  <textarea id="description" class="form-control" name="description" required></textarea>
                </div>
                @error('description')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label " for="basic-default-name">Image*<br>(800 x 800 pixel)</label>
                <div class="col-sm-10">

                  <input type="file" name="image" class="form-control" required /><br>
                  <p class="allowed_type text-danger small">Only JPG, JPEG and PNG extensions are allowed.Image size can't exceeds the size 800px X 800px.</p>
                </div>
                @error('image')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">Name*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="basic-default-company" placeholder="" name="name"
                    required />
                </div>
                @error('name')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror

              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
      <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
      <script>
        CKEDITOR.replace('description');
     
      </script>
      @endsection