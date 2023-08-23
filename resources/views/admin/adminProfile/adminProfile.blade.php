@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

<div class="row">
  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Admin Profile Edit</h5>
       
      </div>
      @if (Session::has('success'))
      <div class="alert alert-dark">
          {{ Session::get('success') }}
      </div>
  @endif
      <div class="card-body">
        <form action="{{route('admin.profile.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="firstname">First Name*</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="firstname" id="basic-default-name" placeholder="" value="{{Auth::user()->firstname}}" required>
            </div>
            @error('firstname')
            <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
             @enderror
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="lastname">Last Name*</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="lastname" id="basic-default-name" placeholder="" value="{{Auth::user()->lastname}}" required>
            </div>
            @error('lastname')
            <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
             @enderror
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="email">Email*</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="email" id="basic-default-name" placeholder="" value="{{Auth::user()->email}}" required>
            </div>
            @error('email')
            <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
             @enderror
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label " for="basic-default-name">Image*<br>(200 x 200 pixel)</label>
          <div class="col-sm-10">
            <img class="mt-2" src="{{ url('admin_assets/images/'. Auth::user()->image)}}" alt=" "
             width="200px" height="200px" id="img" /> <br><br>
            <input type="file" name="image"  class="form-control"value="{{Auth::user()->image}}"/>
            <p class="allowed_type text-danger small">Only JPG, JPEG and PNG extensions are allowed.Image size can't exceeds the size 200px X 200px.</p>
          </div>
          @error('image')
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
</div>
</div>
</div>
<script>
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