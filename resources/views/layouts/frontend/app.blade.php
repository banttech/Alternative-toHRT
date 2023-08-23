<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$pageTitle ?? 'Alternative to HRT'}}</title>
  <link rel="stylesheet" href="{{ asset('frontend_assets/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend_assets/assets/css/bootstrap.min.css')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=PT+Sans:ital@0;1&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('frontend_assets/assets/css/font-awesome.min.css')}}">
  {{-- <link rel='stylesheet' href='{{ asset('frontend_assets/assets/css/uikit.min.css')}}'> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('frontend_assets/assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend_assets/assets/css/owl.theme.default.css')}}">
  <!-- toastr css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <!-- Google Captcha Link -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>


<!--Start of Tawk.to Script-->
{{-- <script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/6349247b54f06e12d89a23cb/1gfard0p5';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script> --}}
  <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6349247b54f06e12d89a23cb/1gfard0p5';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
  <!--End of Tawk.to Script-->
  
</head>

<body>

  <section class="header-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 header-iconleft header-side">
          <ul>
            <li><a href="tel:+442072052477">
                <i class="fa fa-phone" aria-hidden="true">&nbsp;&nbsp;(+44) 207 205 2477</i></a></li>
            <li>
              <a href="mailto:admin@alternativetohrt.co.uk"><i class="fa fa-envelope"
                  aria-hidden="true">admin@alternativetohrt.co.uk</i></a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{route('frontend.home')}}"><img
            src="{{ asset('frontend_assets/assets/image/hrt-logo.webp')}}" width="120px" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto header-menu">
            <li class="">
              <a class="" href="{{route('frontend.home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="">
              <a class="" href="{{route('frontend.aboutus')}}">About Us</a>
            </li>
            <li class="">
              <a class="" href="{{route('frontend.shop')}}">Shop</a>
            </li>
            <li class="">
              <a class="" href="{{route('frontend.blog')}}">Wellness Blog</a>
            </li>
            <li class="">
              <a class="" href="{{route('frontend.contactus')}}">Contact Us</a>
            </li>
          </ul>
          <!-- <form class="form-inline my-2 my-lg-0"> -->
          @if (!Auth::check())
          <a href="{{route('frontend.login')}}"><button type="button" class="btn btn-success ">Login</button></a>
          <a href="{{route('frontend.register.create')}}"><button type="button"
              class="btn btn-success">Register</button>
            @endif
            @if(Auth::check())

            <form class="form-inline my-2 my-lg-0">

              <div class="navi">

                <div class="profile">
                  <div class="user">
                    <h3>{{ ucfirst(Auth::user()->firstname .' '. Auth::user()->lastname)}}
          </a>
          </h3>

        </div>

    </div>
    <div class="menu">
      <ul>
        <li><a href="{{route('frontend.userdashboard')}}"><i class="ph-bold ph-user"></i>&nbsp;Dashboard</a></li>
        <li><a href="{{route('frontend.userorder')}}"><i class="ph-bold ph-envelope-simple"></i>&nbsp;Orders</a></li>
        <li><a href="{{route('frontend.userdownload')}}"><i class="ph-bold ph-gear-six"></i>&nbsp;Downloads</a></li>
        <li><a href="{{route('frontend.useraccount')}}"><i class="ph-bold ph-question"></i>&nbsp;Account Details</a>
        </li>
        <li><a href="{{route('frontend.useraddress')}}"><i class="ph-bold ph-question"></i>&nbsp;Addresses</a></li>
        <li><a href="{{route('frontend.logout')}}"><i class="ph-bold ph-sign-out"></i>&nbsp;Logout</a></li>
      </ul>
    </div>
    </div>
    </form>
    <a href="{{route('frontend.logout')}}"><button type="button" class="btn btn-success">Logout</button>
      @endif
      <div class="header-socialicon">
        <ul>
          @include('frontend.shop.productSearch')
          <li>
            <a href="{{route('cart.index')}}" style="position: relative;">
              <i class="fa fa-shopping-bag" aria-hidden="true">
                <span class="badge badge-danger" id="cart_count"
                  style="position: absolute; top: -9px; right: -12px; color: #fff; background-color: #ff6f54; font-size: 11px; border-radius: 50%;width:20px;height:20px;display: flex;
                  justify-content: center;
                  align-items: center;">
                  @php
                  $totalItems = 0;
                  if(session('cart')){
                  foreach(session('cart') as $id => $details){
                  $totalItems += $details['quantity'];
                  }
                  }
                  @endphp
                  {{$totalItems}}
                </span>
              
   
              </i>
            </a>
          </li>
        </ul>
      </div>
      <!-- </form> -->
      </div>
      </nav>
      </div>
  </section>
  {{-- here content section yield --}}
  @yield('content')
  @yield('userdashboard')

  <div class="footer">
    <div class="container footer-inner">
      <div class="row">
        <div class="col-md-4 footer-inner">

          <div class="footer-img">
            <img src="{{ asset('frontend_assets/assets/image/hrt-logo.webp')}}"  alt="">
          </div>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto">
          <div class="footer_tel">
            <a href="tel:+442072052477">(+44) 207 205 2477,</a><br>
            <a href="tel:0208 894 1315">0208 894 1315</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="footer-pra">
            <h6>Useful Links</h6>
            <hr style="width: 70px;">
            <div class="pra-inner">
              <div class="pra-1">
                <p>
                  <a href="{{route('frontend.aboutus')}}">About Us</a>
                </p>
                <p>
                  <a href="{{route('frontend.shop')}}">Shop</a>
                </p>
                <p>
                  <a href="{{route('frontend.blog')}}">Wellness Blog</a>
                </p>
              </div>
              <div class="pra">
                <p>
                  <a href="{{route('frontend.privacy-policy')}}">Privacy Policy</a>
                </p>
                <p>
                  <a href="{{route('frontend.terms-conditions')}}">Terms and Conditions</a>
                </p>
                <p>
                  <a href="{{route('frontend.contactus')}}">Contact Us</a>
                </p>
                <p>
                  <a href="{{route('frontend.sitemap')}}">Navigation to Website</a>
                </p>
              </div>


            </div>
          </div>
        </div>
        <hr class="">
        <div class="col-md-4">
          <div class="footer-down">
            <h6>Follow Us</h6>
            <hr style="width: 60px; text-align: center;margin: auto;">
            <ul>
              <li><a href="https://www.facebook.com/NaturalJuicesUK"><i class="fa fa-facebook-square"
                    aria-hidden="true"></i></a></li>
              <li><a href="https://instagram.com/organicjuiceuk"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      Copyright © 2020 <a href="{{route('frontend.home')}}" target="blank">AlternativeToHRT</a>. Powered by <a
        href="https://www.naturaljuices.co.uk/">Natural Juices and Vitamins Ltd</a>. All Rights Reserved.
    <p class="text-white"> Company Reg. No. 07539535 VAT No. 151772511</p>
    </div>
    @include('frontend.cookies.cookies')
  </div>

  <script src="{{ asset('frontend_assets/assets/js/jquery-3.7.0.min.js')}}"></script>

  <script src="{{ asset('frontend_assets/assets/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{ asset('frontend_assets/assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('frontend_assets/assets/js/style.js')}}"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- Toaster JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <!-- Cart Functionality -->
  <script>
    function addToCart(id, productname, price, image, quantity) {
      $token = "{{ csrf_token() }}";
      $.ajax({
        url: "{{route('cart.add')}}",
        type: "POST",
        data: {
          id: id,
          product_name: productname,
          product_price: price,
          product_image: image,
          quantity: quantity,
          _token: $token
        },
        success: function(response) {
          // toastr.success(response.message);
          $('#cart_count').html(response.totalItems);
          // launch the cartModal and show the data
          $('#cart-modal-image').attr('src', "{{asset('admin_assets/images/')}}" + '/' + response.image);
          $('#cart-modal-product-name').html(response.prodcutName);
          $('#cart-modal-total-price').html('£' + response.totalPrice);
          $('#total-items-in-cart').html(response.totalItems + ' items');
          $('#cart-modal-product-link').attr('href', "{{route('frontend.product','')}}" + '/' + response.slug);
          $('#cart-modal-product-link-img').attr('href', "{{route('frontend.product','')}}" + '/' + response.slug);
          $('#cartModal').modal('show');
        }
      });
    }

    function removeFromCart(id) {
      var confirmation = confirm("Are you sure you want to remove?");

      if (confirmation) {
        $token = "{{ csrf_token() }}";
        $.ajax({
          url: "{{route('cart.remove')}}",
          type: "POST",
          data: {
            id: id,
            _token: $token
          },
          success: function(response) {
            toastr.success(response.message);
            if (response.totalItems == 0) {
              $('#cart-page-main-sec').html(response.cartPageHtml);
            } else {
              $('#cart_count').html(response.totalItems);
              // check if dom has cart-item-list id then update it
              if ($('#cart-item-list').length) {
                $('#cart-item-list').html(response.cartItemsList);
              }
              // check if dom has sub-total-sec id then update it
              if ($('#sub-total-sec').length) {
                $('#sub-total-sec').html(response.cartSubTotalSec);
              }
              // check if dom has cart-total-sec id then update it
              if ($('#cart-total-sec').length) {
                $('#cart-total-sec').html(response.cartTotalSec);
              }
            }
          }
        });
      } else {
        return false;
      }
    }

    function addToWishList(id) {
      $token = "{{ csrf_token() }}";
      $.ajax({
        url: "{{route('frontend.userwishlist.add')}}",
        type: "POST",
        data: {
          id: id,
          _token: $token
        },
        success: function(response) {
          // check if dom shop-products id then update it
          if ($('#shop-products').length) {
            $('#shop-products').html(response.shopProducts);
          }
          // check if dome has wishlist-items-body id then update it
          if ($('#wishlist-items-body').length) {
            $('#wishlist-items-body').html(response.wishListItems);
            $('#wishListModel').modal('show');
          }
          toastr.success(response.message);
          $('#blackHeartIcon_'+id).hide();
          $('#redHeartIcon_'+id).show();
        }
      });
    }

    function removeFromWishList(id, pid) {
      $token = "{{ csrf_token() }}";
      $.ajax({
        url: "{{route('frontend.userwishlist.removeFromWishlist')}}",
        type: "POST",
        data: {
          id: id,
          _token: $token
        },
        success: function(response) {
          // check if dom shop-products id then update it
          if ($('#shop-products').length) {
            $('#shop-products').html(response.shopProducts);
          }
          // check if dome has wishlist-items-body id then update it
          if ($('#wishlist-items-body').length) {
            // update wishlist items body with new data and don't hide modal
            $('#wishlist-items-body').html(response.wishListItems);
            // get div using this id wishListModel and add show class to it also add this style in this div padding-right: 17px; display: block;
            $('#wishListModel').addClass('show');
            // add style
            $('#wishListModel').css({
              'padding-right': '17px',
              'display': 'block'
            });
          }
          toastr.success(response.message);
          $('#redHeartIcon_'+pid).hide();
          $('#blackHeartIcon_'+pid).show();
        }
      });
    }

  
  </script>
  <!-- Show Toaster Start -->
  @if(Session::has('success-toast'))
  <script>
    toastr.success("{{ Session::get('success-toast') }}");
  </script>
  @endif

  @if(Session::has('error-toast'))
  <script>
    toastr.error("{{ Session::get('error-toast') }}");
  </script>
  @endif
  <!-- Show Toaster End -->
</body>

</html>