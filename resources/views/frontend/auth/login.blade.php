@extends('layouts.frontend.app')

@section('content')

<section class="login-section">
  <div class="login-container">
    <div class="login-box">
      @if (Session::has('success'))
      <div class="alert alert-dark">
          {{ Session::get('success') }}
      </div>
  @endif 
      <h2>Login</h2>
      <form action="{{route('frontend.login')}}@if(request()->has('redirect'))?redirect={{request()->redirect}}@endif" method="POST" onsubmit="return checkForm();" enctype="multipart/form-data">
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif --}}
        @csrf
       <div class= "col-md-12">
       <div class="form-group">
          <input type="text" id="email" name="email" placeholder="EMAIL*">
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
         
        </div>
      </div>
          <div class="col-md-12">
          <div class="form-group">
            
              <input type="password" id="password" name="password" placeholder="PASSWORD*">
              @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            
            </div> 
            <a href="{{ route('frontend.forgot') }}">
              <small>Lost your password?</small>
            </a>
    </div>
       
        <div class="col-md-12">
         
          <div id="html_element">
            <div style="width: 304px; height: 78px;">
              <div>
                <div class="g-recaptcha" data-sitekey="6Ld6vA4nAAAAAHYL8YCWlBqBioLCcqmn_ViT-KjG"></div>
              </div>
            </div>
          </div>
          @error('g-recaptcha-response')
          <div class="text-danger">Captcha is required</div>
          @enderror
         
        </div>
        <div class="login-btn">
          <button type="submit">Login</button>
        </div>
        <div class="register">
          @if(request()->has('redirect'))
          <p>"Don't Have An Account? Please <a href="{{route('frontend.register.create')}}?redirect={{request()->redirect}}">Sign Up</a>.</p>
          @else
          <p>Don't Have An Account? Please <a href="{{route('frontend.register.create')}}">Sign Up</a>.</p>
          @endif
        </div>
      </form>
    </div>
  </div>
</section>

{{-- <script>
  function checkForm() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (email == '' || password == '') {
      if (email == '') {
        document.getElementById('emailError').innerHTML = 'Please enter email';
      } else {
        document.getElementById('emailError').innerHTML = '';
      }
      if (password == '') {
        document.getElementById('passwordError').innerHTML = 'Please enter password';
      } else {
        document.getElementById('passwordError').innerHTML = '';
      }
      return false;
    }
    alert(grecaptcha.getResponse());
    return false;
    // empty the error message
    document.getElementById('emailError').innerHTML = '';
    document.getElementById('passwordError').innerHTML = '';

    if (grecaptcha.getResponse() == '') {
      document.getElementById('recaptchaError').innerHTML = '<span style="color: rgb(204, 0, 102); font-size: 15px; font-weight: 500;">Incorrect response. Please try again.</span>';
      return false;
    } else {
      document.getElementById('recaptchaError').innerHTML = '';
      return true;
    }
  }
</script> --}}

@endsection