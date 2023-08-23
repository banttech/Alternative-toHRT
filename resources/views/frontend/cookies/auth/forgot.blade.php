@extends('layouts.frontend.app')

@section('content')

<section class="login-section">
  <div class="login-container">
    <div class="login-box">
      <h2>Forgot Password</h2>
      <p>Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.</p>
      <form action="{{route('frontend.forgot')}}" method="POST" enctype="multipart/form-data">
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
          <input type="text" id="username" name="email" required placeholder="EMAIL">
        </div>
        <div class="login-btn">
          <button type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection