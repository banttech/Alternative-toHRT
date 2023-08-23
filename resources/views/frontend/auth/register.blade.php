@extends('layouts.frontend.app')

@section('content')

<section class="login-section-1">
  <div class="login-container-1">
    <div class="login-box-1">
      <h2>Register</h2>
      <form action="{{route('frontend.register.store')}}@if(request()->has('redirect'))?redirect={{request()->redirect}}@endif" onsubmit="return checkForm();" method="POST" enctype="multipart/form-data">
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
        <div class="form-group">
          <input type="text" id="firstname" name="firstname" placeholder="FIRSTNAME*">
          @error('firstname')
          <div class="text-danger">{{ $message }}</div>
          @enderror
         
        </div>
        <div class="form-group">
          <input type="text" id="lastname" name="lastname" placeholder="LASTNAME*">
          @error('lastname')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        
        
        </div>
        <div class="form-group">
          <input type="email" id="email" name="email" placeholder="EMAIL*">
          @error('email')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        
        </div>
        <div class="form-group">
          <input type="password" id="password" name="password" placeholder="PASSWORD*">
          @error('password')
          <div class="text-danger">{{ $message }}</div>
          @enderror
         
        </div>
        <div class="form-group">
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="CONFIRM PASSWORD*">
          @error('password_confirmation')
          <div class="text-danger">{{ $message }}</div>
          @enderror
         
        </div>
        <div class="col-md-12">
         
          <div id="html_element">
            <div class="reg-capture"  style="width: 100%; height: 78px;">
              <div>
                <div class="g-recaptcha" data-sitekey="6Ld6vA4nAAAAAHYL8YCWlBqBioLCcqmn_ViT-KjG"></div>
              </div>
            </div>
          </div>
          @error('g-recaptcha-response')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <span class="text-danger error-text" id="recaptchaError" style="color: rgb(204, 0, 102); font-size: 14px; font-weight: 500;"></span>
        </div>
        <div class="col-md-12">
        <div class="login-btn">
          <button type="submit">Register</button>
        </div>
</div>
        <div class="register">
          @if(request()->has('redirect'))
          <p>Already Registered? Already have an account? Please <a href="{{route('frontend.login')}}?redirect={{request()->redirect}}"> Login</a>.</p>
          @else
          <p>Already Registered? Already have an account? Please <a href="{{route('frontend.login')}}">Login</a>.</p>
          @endif
        </div>
      </form>
    </div>
  </div>
</section>
<script>
   if (grecaptcha.getResponse() == '') {
      document.getElementById('recaptchaError').innerHTML = '<span class="text-danger error-text" id="recaptchaError" style="color: rgb(204, 0, 102); font-size: 14px; font-weight: 500;">Invalid response</span>';
      return false;
    } else {
      document.getElementById('recaptchaError').innerHTML = '';
      return true;
    }
</script>
{{-- <script>
  function checkForm() {
    // get values of required fields if empty then show error
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var password_confirmation = document.getElementById('password_confirmation').value;

    if (firstname == '' || lastname == '' || email == '' || password == '' || password_confirmation == '') {
      if (firstname == '') {
        document.getElementById('firstNameError').innerHTML = '<span style="color: rgb(204, 0, 102); font-size: 14px; font-weight: 500;">Firstname field is required</span>';
      } else {
        document.getElementById('firstNameError').innerHTML = '';
      }

      if (lastname == '') {
        document.getElementById('lastNameError').innerHTML = '<span style="color: rgb(204, 0, 102); font-size: 14px; font-weight: 500;">Lastname field is required</span>';
      } else {
        document.getElementById('lastNameError').innerHTML = '';
      }

      if (email == '') {
        document.getElementById('emailError').innerHTML = '<span style="color: rgb(204, 0, 102); font-size: 14px; font-weight: 500;">Email field is required</span>';
      } else {
        document.getElementById('emailError').innerHTML = '';
      }

      if (email != '') {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!emailReg.test(email)) {
          document.getElementById('emailError').innerHTML = '<span style="color: rgb(204, 0, 102); font-size: 14px; font-weight: 500;">Email is invalid</span>';
        } else {
          document.getElementById('emailError').innerHTML = '';
        }
      }

      if (password == '') {
        document.getElementById('passwordError').innerHTML = '<span style="color: rgb(204, 0, 102); font-size: 14px; font-weight: 500;">Password field is required</span>';
      } else {
        document.getElementById('passwordError').innerHTML = '';
      }

      if (password != '') {
        if (password.length < 8) {
          document.getElementById('passwordError').innerHTML = '<span style="color: rgb(204, 0, 102); font-size: 14px; font-weight: 500;">Password must be at least 8 characters</span>';
        } else {
          document.getElementById('passwordError').innerHTML = '';
        }
      }

      if (password_confirmation == '') {
        document.getElementById('passwordConfirmationError').innerHTML = '<span style="color: rgb(204, 0, 102); font-size: 14px; font-weight: 500;">Confirm Password field is required</span>';
      } else {
        document.getElementById('passwordConfirmationError').innerHTML = '';
      }

      if (password != '' && password_confirmation != '') {
        if (password != password_confirmation) {
          document.getElementById('passwordConfirmationError').innerHTML = '<span style="color: rgb(204, 0, 102); font-size: 14px; font-weight: 500;">Password and Confirm Password must be same</span>';
        } else {
          document.getElementById('passwordConfirmationError').innerHTML = '';
        }
      }

      return false;
    }

    // empty the error message
    document.getElementById('firstNameError').innerHTML = '';
    document.getElementById('lastNameError').innerHTML = '';
    document.getElementById('emailError').innerHTML = '';
    document.getElementById('passwordError').innerHTML = '';
    document.getElementById('passwordConfirmationError').innerHTML = '';

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