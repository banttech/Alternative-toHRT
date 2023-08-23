@extends('layouts.frontend.userdashboardlayouts')

@section('usercontent')
<div class="col-md-8">
    <div class="dashboard-innersecond">
            <section class="login-section-1">
  <div class="login-container-1">
      <div class="login-box-1">
        <h2>Account Details</h2>
        <form action="{{route('frontend.useraccount.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
          @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
          @endif
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
        @csrf
          <div class="form-group">
            <input type="text" id="username"  name="firstname" required placeholder="FIRSTNAME" value="{{Auth::user()->firstname}}">
          </div>
          <div class="form-group">
            <input type="text" id="lastname"  name="lastname" required placeholder="LASTNAME" value="{{Auth::user()->lastname}}">
          </div>
          <div class="form-group">
            <input type="text" id="username or email"  name="email" required  placeholder="USERNAME OR EMAIL" value="{{Auth::user()->email}}">
          </div>
          <div class="form-group">
            <input type="password" id="password" name="old_password"   placeholder="Current PASSWORD">
            <p class="text-success">(leave blank to leave unchanged)</p>
          <div class="form-group">
            <input type="password" id="password" name="password"  placeholder="NEW PASSWORD">
          </div>
          <div class="form-group">
            <input type="password" id="password" name="password_confirmation"  placeholder="CONFIRN NEW PASSWORD">
          </div>
            <div class="login-btn">
              <button type="submit">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</section>
    </div>
</div>
@endsection