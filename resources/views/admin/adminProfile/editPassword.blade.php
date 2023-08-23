@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Admin Password Edit</h5>

          </div>
          @if (Session::has('success'))
          <div class="alert alert-dark">
            {{ Session::get('success') }}
          </div>
          @endif
          @if (Session::has('error'))
          <div class="alert alert-danger">
            {{ Session::get('error') }}
          </div>
          @endif
          <div class="card-body">
            <form action="{{route('admin.update.password')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="old_password">Current Password*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  name="old_password" id="basic-default-name" placeholder="">
                </div>
                @error('old_password')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="password">New Password*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="password" id="basic-default-name" placeholder="">
                </div>
                @error('password')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="password_confirmation">Confirm Password*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="password_confirmation" id="basic-default-name"
                    placeholder="">
                </div>
                @error('password_confirmation')
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

@endsection