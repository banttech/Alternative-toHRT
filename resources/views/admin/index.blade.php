@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-lg-12 mb-4 order-0">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-primary">Welcome To The Admin Panel</h5>
                  <p class="mb-4">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis, voluptatem! <span class="fw-bold">72%</span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus atque tenetur, quibusdam quisquam ratione unde. Consectetur consequatur nesciunt odio error!
                    your profile.
                  </p>
                </div>
              </div>
              <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                  <img
                    src="{{ asset('admin_assets/assets/img/illustrations/man-with-laptop-light.png')}}"
                    height="250" 
                    alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>

</div>
</div>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
      <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
          ©
          <script>
            document.write(new Date().getFullYear());
          </script>
          , made with ❤️ by
          <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Banttech</a>
        </div>
      
      </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
@endsection