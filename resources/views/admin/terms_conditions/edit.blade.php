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
        <form action="{{route('terms-conditions.update',$terms_conditions->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="description">Terms Conditions*</label>
              <div class="col-sm-10">
                <textarea
                  id="description"
                  class="form-control"
                 name="terms_conditions"
                 required
                >{{$terms_conditions->terms_conditions}}</textarea>
              </div>
              @error('terms_condition')
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
 
  </script>
@endsection