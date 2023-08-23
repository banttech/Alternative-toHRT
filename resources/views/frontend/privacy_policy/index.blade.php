@extends('layouts.frontend.app')

@section('content')

{{-- <style>
    .herbal-inner p {
        text-align: left;
    }
    .herbal-inner h2 {
        text-align: left;
    }
</style> --}}

<section class="about-page">
    <div class="conatiner-fluid about-inner">
        <div class="row about-row">
                <div  class="about-heading">
                    <h6>Privacy Policy</h6>
                </div>
        </div>
    </div>
</section>
<section class="privacy-page">
  .   <div class="container">
     <div class="row">
        <div class="col-md-12">
         <div class="privacy-inner">
             {!!$privacy_policy->privacy_policy!!}
         </div>
        </div>
         
     </div>
  </div>
 </section>

@endsection