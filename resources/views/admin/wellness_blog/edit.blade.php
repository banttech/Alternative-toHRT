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
          <form action="{{route('wellness_blog.update',$wellness_blogs->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="title">Blog Title*</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="basic-default-name" value="{{$wellness_blogs->title}}" placeholder="" required>
              </div>
              @error('title')
              <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
               @enderror
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="slug">Blog Slug*</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="slug" id="basic-default-name" value="{{$wellness_blogs->slug}}" placeholder="" required>
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
                        <option value="{{$blogcategory->id}}" {{ $blogcategory->id == $wellness_blogs->category_id ? 'selected' : ''}}>
                          {{$blogcategory->categoryname}}
                        </option>
                        @endforeach
                      </select>   
                    </div>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tags">Tags*</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tags" id="bar" placeholder="" value="{{$wellness_blogs->tags}}">
              </div>
              @error('tags')
              <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
              @enderror
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="description">Blog Description*</label>
                <div class="col-sm-10">
                  <textarea
                    id="description"
                    class="form-control"
                   name="description"
                   required
                  >{{$wellness_blogs->description}}</textarea>
                </div>
                @error('description')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                 @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label " for="basic-default-name">Image*<br>(800 x 800 pixel)</label>
              <div class="col-sm-10">
                <img class="mt-2" src="{{ url('admin_assets/images/'. $wellness_blogs->image)}}" alt=" "
                 width="200px" height="200px" id="img" /> <br><br>
                <input type="file" name="image"  class="form-control"value="{{$wellness_blogs->image}}"/>
                <p class="allowed_type text-danger small">Only JPG, JPEG and PNG extensions are allowed.Image size can't exceeds the size 800px X 800px.</p>
               
            
              </div>
              @error('image')
              <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
               @enderror
              </div>
              
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="name">Name*</label>
              <div class="col-sm-10">
                <input
                  type="text"
                  class="form-control"
                  id="basic-default-company"
                  placeholder=""
                  name="name"
                  required
                  value="{{$wellness_blogs->name}}"
                />
              </div>
              @error('name')
              <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
               @enderror
            
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="date">Date*</label>
              <div class="col-sm-10">
                <input
                  type="text"
                  class="form-control"
                  id="basic-default-company"
                  placeholder=""
                  name="date"
                  required
                  value="{{$wellness_blogs->date}}"
                />
              </div>
              @error('date')
              <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
               @enderror
            
            </div>
            
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
      CKEDITOR.config.width = 1112  
      CKEDITOR.config.height = 300
       
      const logoImg = document.getElementById('img');
      const logoInput = document.querySelector('input[name="image"]');
      logoInput.addEventListener('change', function() {
          const file = this.files[0];
          if (file) {
              const reader = new FileReader();
              reader.addEventListener('load', function() {
                  logoImg.setAttribute('src', this.result);
              });
              reader.readAsDataURL(file);
          }
      });
     
</script>
@endsection