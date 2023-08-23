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
        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
       
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">First Name*</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                id="basic-default-company"
                placeholder=""
                name="firstname"
                required
              />
            </div>
            @error('firstname')
            <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
             @enderror
          
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">Last Name*</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                id="basic-default-company"
                placeholder=""
                name="lastname"
                required
              />
            </div>
            @error('lastname')
            <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
             @enderror
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="email">Email*</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                id="basic-default-company"
                placeholder=""
                name="email"
                required
              />
            </div>
            @error('email')
            <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
             @enderror
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="password">Password*</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                id="basic-default-company"
                placeholder=""
                name="password"
                required
              />
            </div>
            @error('password')
            <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
             @enderror
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="password">Confirm Password*</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                id="basic-default-company"
                placeholder=""
                name="password_confirmation"
                required
              />
            </div>
            @error('password_confirmation')
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
</div>
</div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
  CKEDITOR.config.width = 1112  
  CKEDITOR.config.height = 300
  </script>
@endsection