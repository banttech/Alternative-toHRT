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
          <form action="{{route('country.update',$countries->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="countryname">Country Name*</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="countryname" id="basic-default-name" value="{{$countries->countryname}}" placeholder="" >
              </div>
              @error('countryname')
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
@endsection