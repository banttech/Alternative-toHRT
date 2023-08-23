@extends('layouts.frontend.app')

@section('content')

<style>
    .herbal-inner p {
        text-align: left;
    }
</style>

<section class="about-page">
    <div class="conatiner-fluid about-inner">
        <div class="row about-row">
                <div  class="about-heading">
                    <h6>Terms And Conditions</h6>
                </div>
        </div>
    </div>
</section>
<section class="about-second">
  .   <div class="container">
     <div class="row">
         <div class="herbal-inner">
            {!!$terms_conditions->terms_conditions!!}
         </div>
         
     </div>
  </div>
 </section>

@endsection