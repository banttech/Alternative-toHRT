<?php $cartItems = session('cart') ?>

@extends('layouts.frontend.app')
@php
$subtotal = 0;
$cartTotal = 0;
$discount = 0;
@endphp

@section('content')
<section class="about-page">
    <div class="conatiner-fluid about-inner">
        <div class="row about-row">
            <div class="about-heading">
                <h6>Checkout</h6>
            </div>
        </div>
    </div>
</section>

<style>
    .login_btn:hover {
        text-decoration: underline;
    }

    .hidden {
        display: none;
    }

</style>

@if(isset($cartItems) && count($cartItems) == 0)
<section class="cart-page">
    @include('frontend.cart.empty-cart')
</section>
@else
<section class="check-out" id="billing_form_section">
    <div class="container">
        <!-- Errors Section Start -->
        <div class="row">
            <div class="col-md-12">
                <ul id="billing_form_errors"></ul>
            </div>
        </div>
        <!-- Errors Section End -->
        @if(!Auth::check())
        <div class="row">
            <a href="{{ route('frontend.login') }}?redirect=checkout" class="btn btn-success btn-lg btn-block mb-5 login_btn">Login to checkout</a>
        </div>
        @endif

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4 view-cart-border">
                <div class="view-cart">
                    <h5>Your Order</h5>
                </div>
                <div class="view-cart-head">
                    <h6>Product</h6>
                    <h6>Subtotal</h6>
                </div>
                @if($cartItems)
                @foreach($cartItems as $id => $cartItem)
                <div class="view-cart-pra-1">
                    <p>{{ $cartItem['name'] }} × {{ $cartItem['quantity'] }}</p>
                    <h6>£{{ $cartItem['price'] * $cartItem['quantity'] }}</h6>
                </div>
                @php
                $subtotal += $cartItem['price'] * $cartItem['quantity'];
                @endphp
                @endforeach
                @endif

                @if(session()->has('coupon'))
                @php
                $coupon = session()->get('coupon');
                $discount = ($coupon['discount_percentage'] / 100) * $subtotal;
                $discount = number_format((float)$discount, 2, '.', '');
                $cartTotal = $subtotal - $discount;
                $cartTotal = number_format((float)$cartTotal, 2, '.', '');
                @endphp
                @else
                @php
                $cartTotal = $subtotal;
                $cartTotal = number_format((float)$cartTotal, 2, '.', '');
                @endphp
                @endif

                <div class="view-cart-head  py-3">
                    <h6>Subtotal</h6>
                    <h6> £{{ $subtotal }} </h6>
                </div>
                <!-- <div class="view-cart-head py-3">
            <h6>Subtotal</h6>
            <div class="form-check form-check-inline" style="margin-right: -8px;">
              <label class="form-check-label" for="inlineRadio1">Free shipping</label>&nbsp;
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
            </div>
          </div> -->

                @if(session()->has('coupon'))
                <div class="view-cart-head py-3">
                    <h6>Coupon Disount</h6>
                    <h6>- £{{ $discount }}</h6>
                </div>
                @endif

                <div class="view-cart-head  py-3">
                    <h6>Total</h6>
                    <h6> £{{ $cartTotal }} </h6>
                </div>

                @if(Auth::check())
                <div class="view-cart-check-out">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment-method-selected" id="paymentsense-selected" value="option1" checked>
                        <label class="form-check-label" for="paymentsense-selected">Paymentsense Hosted</label>
                        <input type="text" class="hidden" value="{{ $cartTotal }}" id="total__bill" />
                        <input type="text" class="hidden" id="inputOrderPaymentToken" value="">
                    </div>
                    <div>
                        <img src="{{ asset('frontend_assets/assets/image/paymentlogo (1).png')}}" alt="">
                    </div>
                </div>
                <div id="ps-text" style="display: none;">Pay securely by Credit or Debit card through Paymentsense Hosted.</div>

                <div class="view-cart-check-out">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment-method-selected" id="paypal-selected" value="option1" onclick="showPaypalForm();" checked>
                        <label class="form-check-label" for="paypal-selected">PayPal</label>

                    </div>
                    <div>
                        <img src="{{ asset('frontend_assets/assets/image/paymentlogo (2).png')}}" alt="">
                    </div>
                </div>
                <div id="pp-text">Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</div>

                <div class="view-cart">
                    <div class="form-check">
                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                        I would like to receive exclusive emails with discounts and product information (optional)
                    </div>
                    <p class="personal-data">Your personal data will be used to process your order, support your experience
                        throughout this website, and for other purposes described in our <a href="{{route('frontend.privacy-policy')}}" target="_blank">privacy policy</a>.</p>

                </div>
                @include('shared.pay')
                @include('shared.error')
                @include('shared.pay_result')

                <div class="paypal-shoping">
                    <!-- <a href="#"> <button class="btn-check-shoping">Place order</button></a> -->
                    <div id="paypal-payment-button"></div>
                    <!-- <form id="testForm" action="/CheckoutDemoComplete" method="post">    
                  <script src="https://web.e.test.connect.paymentsense.cloud/assets/js/checkout.js"
                      data-amount="100"
                      data-access-token="@Model.AccessToken"
                      data-currency-code="826"
                      data-description="Demo Payment of 1.00 GBP"
                      data-button-text="Start Payment"
                      data-submit-button-text="Pay 1.00 GBP"
                      class="connect-checkout-btn"></script>        
                  
                  <div>Amount: 1.00 GBP</div>
                  
              </form>

              <style>
                iframe { width: 100%; }
              .connect-container { margin-top: 80px; }
              </style> -->
                </div>
                @else
                <div class="view-cart-check-out">
                    <a href="{{ route('frontend.login') }}?redirect=checkout"><button class="btn-check-shoping">Login</button></a>
                </div>
                @endif
            </div>
            @php $isLogin = Auth::check(); @endphp
            @if(Auth::check())
            @php
            $user = Auth::user();
            $user_billing_address = DB::table('user_billing_address')->where('user_id', $user->id)->first();
            $user_shipping_address = DB::table('user_shipping_address')->where('user_id', $user->id)->first();
            @endphp
            @endif
            <style>
                .error {
                    color: red;
                    margin: 0px !important;
                    text-align: left;
                }

            </style>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3 text-left text-dark">Billing Details</h4>
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="bill_first_name" class="">First name&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                            <input type="text" class="form-control" name="bill_first_name" id="bill_first_name" placeholder="" value="@if($isLogin && $user_billing_address){{ $user_billing_address->firstname }}@endif" required>
                            <p class="error" id="bill_first_name_error"></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="bill_last_name" class="">Last name&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                            <input type="text" class="form-control" name="bill_last_name" id="bill_last_name" placeholder="" value="@if($isLogin && $user_billing_address){{ $user_billing_address->lastname }}@endif" required>
                            <p class="error" id="bill_last_name_error"></p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bill_company_name">Company name (optional)</label>
                        <input type="text" class="form-control" name="bill_company_name" id="bill_company_name" placeholder="" value="@if($isLogin && $user_billing_address){{ $user_billing_address->companyname }}@endif">
                        <p class="error" id="bill_company_name_error"></p>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="bill_country_region">Country / Region&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                            <select class="form-control" name="bill_country_region" id="bill_country_region">
                                <option value="AF" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AF')
                                    selected @endif>Afghanistan</option>
                                <option value="AX" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AX')
                                    selected @endif>Åland Islands</option>
                                <option value="AL" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AL')
                                    selected @endif>Albania</option>
                                <option value="DZ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'DZ')
                                    selected @endif>Algeria</option>
                                <option value="AS" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AS')
                                    selected @endif>American Samoa</option>
                                <option value="AD" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AD')
                                    selected @endif>Andorra</option>
                                <option value="AO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AO')
                                    selected @endif>Angola</option>
                                <option value="AI" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AI')
                                    selected @endif>Anguilla</option>
                                <option value="AQ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AQ')
                                    selected @endif>Antarctica</option>
                                <option value="AG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AG')
                                    selected @endif>Antigua and Barbuda</option>
                                <option value="AR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AR')
                                    selected @endif>Argentina</option>
                                <option value="AM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AM')
                                    selected @endif>Armenia</option>
                                <option value="AW" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AW')
                                    selected @endif>Aruba</option>
                                <option value="AU" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AU')
                                    selected @endif>Australia</option>
                                <option value="AT" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AT')
                                    selected @endif>Austria</option>
                                <option value="AZ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AZ')
                                    selected @endif>Azerbaijan</option>
                                <option value="BS" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BS')
                                    selected @endif>Bahamas</option>
                                <option value="BH" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BH')
                                    selected @endif>Bahrain</option>
                                <option value="BD" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BD')
                                    selected @endif>Bangladesh</option>
                                <option value="BB" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BB')
                                    selected @endif>Barbados</option>
                                <option value="BY" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BY')
                                    selected @endif>Belarus</option>
                                <option value="PW" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PW')
                                    selected @endif>Belau</option>
                                <option value="BE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BE')
                                    selected @endif>Belgium</option>
                                <option value="BZ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BZ')
                                    selected @endif>Belize</option>
                                <option value="BJ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BJ')
                                    selected @endif>Benin</option>
                                <option value="BM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BM')
                                    selected @endif>Bermuda</option>
                                <option value="BT" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BT')
                                    selected @endif>Bhutan</option>
                                <option value="BO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BO')
                                    selected @endif>Bolivia</option>
                                <option value="BQ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BQ')
                                    selected @endif> Bonaire, Saint Eustatius and Saba</option>
                                <option value="BA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BA')
                                    selected @endif>Bosnia and Herzegovina</option>
                                <option value="BW" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BW')
                                    selected @endif>Botswana</option>
                                <option value="BV" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BV')
                                    selected @endif>Bouvet Island</option>
                                <option value="BR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BR')
                                    selected @endif>Brazil</option>
                                <option value="IO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'IO')
                                    selected @endif>British Indian Ocean Territory</option>
                                <option value="BN" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BN')
                                    selected @endif>Brunei</option>
                                <option value="BG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BG')
                                    selected @endif>Bulgaria</option>
                                <option value="BF" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BF')
                                    selected @endif>Burkina Faso</option>
                                <option value="BI" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BI')
                                    selected @endif>Burundi</option>
                                <option value="KH" @if($isLogin && $user_billing_address && $user_billing_address->region == 'KH')
                                    selected @endif>Cambodia</option>
                                <option value="CM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CM')
                                    selected @endif>Cameroon</option>
                                <option value="CA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CA')
                                    selected @endif>Canada</option>
                                <option value="CV" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CV')
                                    selected @endif>Cape Verde</option>
                                <option value="KY" @if($isLogin && $user_billing_address && $user_billing_address->region == 'KY')
                                    selected @endif>Cayman Islands</option>
                                <option value="CF" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CF')
                                    selected @endif>Central African Republic</option>
                                <option value="TD" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TD')
                                    selected @endif>Chad</option>
                                <option value="CL" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CL')
                                    selected @endif>Chile</option>
                                <option value="CN" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CN')
                                    selected @endif>China</option>
                                <option value="CX" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CX')
                                    selected @endif>Christmas Island</option>
                                <option value="CC" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CC')
                                    selected @endif>Cocos (Keeling) Islands</option>
                                <option value="CO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CO')
                                    selected @endif>Colombia</option>
                                <option value="KM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'KM')
                                    selected @endif>Comoros</option>
                                <option value="CG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CG')
                                    selected @endif>Congo (Brazzaville)</option>

                                <option value="CD" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CD')
                                    selected @endif>Congo (Kinshasa)</option>
                                <option value="CK" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CK')
                                    selected @endif>Cook Islands</option>
                                <option value="CR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CR')
                                    selected @endif>Costa Rica</option>
                                <option value="HR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'HR')
                                    selected @endif>Croatia</option>
                                <option value="CU" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CU')
                                    selected @endif>Cuba</option>
                                <option value="CW" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CW')
                                    selected @endif>Cura&ccedil;ao</option>
                                <option value="CY" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CY')
                                    selected @endif>Cyprus</option>
                                <option value="CZ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CZ')
                                    selected @endif>Czech Republic</option>
                                <option value="DK" @if($isLogin && $user_billing_address && $user_billing_address->region == 'DK')
                                    selected @endif>Denmark</option>
                                <option value="DJ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'DJ')
                                    selected @endif>Djibouti</option>
                                <option value="DM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'DM')
                                    selected @endif>Dominica</option>
                                <option value="DO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'DO')
                                    selected @endif>Dominican Republic</option>
                                <option value="EC" @if($isLogin && $user_billing_address && $user_billing_address->region == 'EC')
                                    selected @endif>Ecuador</option>
                                <option value="EG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'EG')
                                    selected @endif>Egypt</option>
                                <option value="SV" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SV')
                                    selected @endif>El Salvador</option>
                                <option value="GQ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GQ')
                                    selected @endif>Equatorial Guinea</option>
                                <option value="ER" @if($isLogin && $user_billing_address && $user_billing_address->region == 'ER')
                                    selected @endif>Eritrea</option>
                                <option value="EE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'EE')
                                    selected @endif>Estonia</option>
                                <option value="SZ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SZ')
                                    selected @endif>Eswatini</option>
                                <option value="ET" @if($isLogin && $user_billing_address && $user_billing_address->region == 'ET')
                                    selected @endif>Ethiopia</option>
                                <option value="FK" @if($isLogin && $user_billing_address && $user_billing_address->region == 'FK')
                                    selected @endif>Falkland Islands</option>
                                <option value="FO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'FO')
                                    selected @endif>Faroe Islands</option>
                                <option value="FJ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'FJ')
                                    selected @endif>Fiji</option>
                                <option value="FI" @if($isLogin && $user_billing_address && $user_billing_address->region == 'FI')
                                    selected @endif>Finland</option>
                                <option value="FR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'FR')
                                    selected @endif>France</option>
                                <option value="GF" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GF')
                                    selected @endif>French Guiana</option>
                                <option value="PF" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PF')
                                    selected @endif>French Polynesia</option>
                                <option value="TF" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TF')
                                    selected @endif>French Southern Territories</option>
                                <option value="GA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GA')
                                    selected @endif>Gabon</option>
                                <option value="GM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GM')
                                    selected @endif>Gambia</option>
                                <option value="GE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GE')
                                    selected @endif>Georgia</option>
                                <option value="DE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'DE')
                                    selected @endif>Germany</option>
                                <option value="GH" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GH')
                                    selected @endif>Ghana</option>
                                <option value="GI" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GI')
                                    selected @endif>Gibraltar</option>
                                <option value="GR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GR')
                                    selected @endif>Greece</option>
                                <option value="GL" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GL')
                                    selected @endif>Greenland</option>
                                <option value="GD" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GD')
                                    selected @endif>Grenada</option>
                                <option value="GP" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GP')
                                    selected @endif>Guadeloupe</option>
                                <option value="GU" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GU')
                                    selected @endif>Guam</option>

                                <option value="GT" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GT')
                                    selected @endif>Guatemala</option>
                                <option value="GG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GG')
                                    selected @endif>Guernsey</option>
                                <option value="GN" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GN')
                                    selected @endif>Guinea</option>
                                <option value="GW" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GW')
                                    selected @endif>Guinea-Bissau</option>
                                <option value="GY" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GY')
                                    selected @endif>Guyana</option>
                                <option value="HT" @if($isLogin && $user_billing_address && $user_billing_address->region == 'HT')
                                    selected @endif>Haiti</option>
                                <option value="HM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'HM')
                                    selected @endif>Heard Island and McDonald Islands</option>
                                <option value="HN" @if($isLogin && $user_billing_address && $user_billing_address->region == 'HN')
                                    selected @endif>Honduras</option>
                                <option value="HK" @if($isLogin && $user_billing_address && $user_billing_address->region == 'HK')
                                    selected @endif>Hong Kong</option>
                                <option value="HU" @if($isLogin && $user_billing_address && $user_billing_address->region == 'HU')
                                    selected @endif>Hungary</option>
                                <option value="IS" @if($isLogin && $user_billing_address && $user_billing_address->region == 'IS')
                                    selected @endif>Iceland</option>
                                <option value="IN" @if($isLogin && $user_billing_address && $user_billing_address->region == 'IN')
                                    selected @endif>India</option>
                                <option value="ID" @if($isLogin && $user_billing_address && $user_billing_address->region == 'ID')
                                    selected @endif>Indonesia</option>
                                <option value="IR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'IR')
                                    selected @endif>Iran</option>
                                <option value="IQ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'IQ')
                                    selected @endif>Iraq</option>
                                <option value="IE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'IE')
                                    selected @endif>Ireland</option>
                                <option value="IM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'IM')
                                    selected @endif>Isle of Man</option>
                                <option value="IL" @if($isLogin && $user_billing_address && $user_billing_address->region == 'IL')
                                    selected @endif>Israel</option>
                                <option value="IT" @if($isLogin && $user_billing_address && $user_billing_address->region == 'IT')
                                    selected @endif>Italy</option>
                                <option value="CI" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CI')
                                    selected @endif>Ivory Coast</option>
                                <option value="JM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'JM')
                                    selected @endif>Jamaica</option>
                                <option value="JP" @if($isLogin && $user_billing_address && $user_billing_address->region == 'JP')
                                    selected @endif>Japan</option>
                                <option value="JE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'JE')
                                    selected @endif>Jersey</option>
                                <option value="JO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'JO')
                                    selected @endif>Jordan</option>
                                <option value="KZ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'KZ')
                                    selected @endif>Kazakhstan</option>
                                <option value="KE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'KE')
                                    selected @endif>Kenya</option>
                                <option value="KI" @if($isLogin && $user_billing_address && $user_billing_address->region == 'KI')
                                    selected @endif>Kiribati</option>
                                <option value="KW" @if($isLogin && $user_billing_address && $user_billing_address->region == 'KW')
                                    selected @endif>Kuwait</option>
                                <option value="KG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'KG')
                                    selected @endif>Kyrgyzstan</option>
                                <option value="LA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LA')
                                    selected @endif>Laos</option>
                                <option value="LV" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LV')
                                    selected @endif>Latvia</option>
                                <option value="LB" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LB')
                                    selected @endif>Lebanon</option>
                                <option value="LS" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LS')
                                    selected @endif>Lesotho</option>
                                <option value="LR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LR')
                                    selected @endif>Liberia</option>
                                <option value="LY" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LY')
                                    selected @endif>Libya</option>
                                <option value="LI" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LI')
                                    selected @endif>Liechtenstein</option>
                                <option value="LT" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LT')
                                    selected @endif>Lithuania</option>
                                <option value="LU" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LU')
                                    selected @endif>Luxembourg</option>
                                <option value="MO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MO')
                                    selected @endif>Macao</option>
                                <option value="MG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MG')
                                    selected @endif>Madagascar</option>
                                <option value="MW" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MW')
                                    selected @endif>Malawi</option>
                                <option value="MY" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MY')
                                    selected @endif>Malaysia</option>
                                <option value="MV" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MV')
                                    selected @endif>Maldives</option>
                                <option value="ML" @if($isLogin && $user_billing_address && $user_billing_address->region == 'ML')
                                    selected @endif>Mali</option>
                                <option value="MT" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LU')
                                    selected @endif>Malta</option>
                                <option value="MH" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MH')
                                    selected @endif>Marshall Islands</option>
                                <option value="MQ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MQ')
                                    selected @endif>Martinique</option>
                                <option value="MR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MR')
                                    selected @endif>Mauritania</option>
                                <option value="MU" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MU')
                                    selected @endif>Mauritius</option>
                                <option value="YT" @if($isLogin && $user_billing_address && $user_billing_address->region == 'YT')
                                    selected @endif>Mayotte</option>
                                <option value="MX" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MX')
                                    selected @endif>Mexico</option>
                                <option value="FM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'FM')
                                    selected @endif>Micronesia</option>
                                <option value="MD" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MD')
                                    selected @endif>Moldova</option>
                                <option value="MC" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MC')
                                    selected @endif>Monaco</option>
                                <option value="MN" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MN')
                                    selected @endif>Mongolia</option>
                                <option value="ME" @if($isLogin && $user_billing_address && $user_billing_address->region == 'ME')
                                    selected @endif>Montenegro</option>
                                <option value="MS" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MS')
                                    selected @endif>Montserrat</option>
                                <option value="MA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MA')
                                    selected @endif>Morocco</option>
                                <option value="MZ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MZ')
                                    selected @endif>Mozambique</option>
                                <option value="MM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MM')
                                    selected @endif>Myanmar</option>
                                <option value="NA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NA')
                                    selected @endif>Namibia</option>
                                <option value="NR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NR')
                                    selected @endif>Nauru</option>
                                <option value="NP" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NP')
                                    selected @endif>Nepal</option>
                                <option value="NL" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NL')
                                    selected @endif>Netherlands</option>
                                <option value="NC" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NC')
                                    selected @endif>New Caledonia</option>
                                <option value="NZ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NZ')
                                    selected @endif>New Zealand</option>
                                <option value="NI" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NI')
                                    selected @endif>Nicaragua</option>
                                <option value="NE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NE')
                                    selected @endif>Niger</option>
                                <option value="NG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NG')
                                    selected @endif>Nigeria</option>
                                <option value="NU" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NU')
                                    selected @endif>Niue</option>
                                <option value="NF" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NF')
                                    selected @endif>Norfolk Island</option>
                                <option value="KP" @if($isLogin && $user_billing_address && $user_billing_address->region == 'KP')
                                    selected @endif>North Korea</option>
                                <option value="MK" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MK')
                                    selected @endif>North Macedonia</option>
                                <option value="MP" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MP')
                                    selected @endif>Northern Mariana Islands</option>
                                <option value="NO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'NO')
                                    selected @endif>Norway</option>
                                <option value="OM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'OM')
                                    selected @endif>Oman</option>
                                <option value="PK" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PK')
                                    selected @endif>Pakistan</option>
                                <option value="PS" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PS')
                                    selected @endif>Palestinian Territory</option>
                                <option value="PA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PA')
                                    selected @endif>Panama</option>
                                <option value="PG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PG')
                                    selected @endif>Papua New Guinea</option>
                                <option value="PY" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PY')
                                    selected @endif>Paraguay</option>
                                <option value="PE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PE')
                                    selected @endif>Peru</option>
                                <option value="PH" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PH')
                                    selected @endif>Philippines</option>
                                <option value="PN" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PN')
                                    selected @endif>Pitcairn</option>
                                <option value="PL" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PL')
                                    selected @endif>Poland</option>
                                <option value="PT" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PT')
                                    selected @endif>Portugal</option>
                                <option value="PR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PR')
                                    selected @endif>Puerto Rico</option>
                                <option value="QA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'QA')
                                    selected @endif>Qatar</option>
                                <option value="RE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'RE')
                                    selected @endif>Reunion</option>
                                <option value="RO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'RO')
                                    selected @endif>Romania</option>
                                <option value="RU" @if($isLogin && $user_billing_address && $user_billing_address->region == 'RU')
                                    selected @endif>Russia</option>
                                <option value="RW" @if($isLogin && $user_billing_address && $user_billing_address->region == 'RW')
                                    selected @endif>Rwanda</option>
                                <option value="ST" @if($isLogin && $user_billing_address && $user_billing_address->region == 'ST')
                                    selected @endif>S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                                <option value="BL" @if($isLogin && $user_billing_address && $user_billing_address->region == 'BL')
                                    selected @endif>Saint Barth&eacute;lemy</option>
                                <option value="SH" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SH')
                                    selected @endif>Saint Helena</option>
                                <option value="KN" @if($isLogin && $user_billing_address && $user_billing_address->region == 'KN')
                                    selected @endif>Saint Kitts and Nevis</option>
                                <option value="LC" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LC')
                                    selected @endif>Saint Lucia</option>
                                <option value="SX" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SX')
                                    selected @endif>Saint Martin (Dutch part)</option>
                                <option value="MF" @if($isLogin && $user_billing_address && $user_billing_address->region == 'MF')
                                    selected @endif>Saint Martin (French part)</option>
                                <option value="PM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'PM')
                                    selected @endif>Saint Pierre and Miquelon</option>
                                <option value="VC" @if($isLogin && $user_billing_address && $user_billing_address->region == 'VC')
                                    selected @endif>Saint Vincent and the Grenadines</option>
                                <option value="WS" @if($isLogin && $user_billing_address && $user_billing_address->region == 'WS')
                                    selected @endif>Samoa</option>
                                <option value="SM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SM')
                                    selected @endif>San Marino</option>
                                <option value="SA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SA')
                                    selected @endif>Saudi Arabia</option>
                                <option value="SN" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SN')
                                    selected @endif>Senegal</option>
                                <option value="RS" @if($isLogin && $user_billing_address && $user_billing_address->region == 'RS')
                                    selected @endif>Serbia</option>
                                <option value="SC" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SC')
                                    selected @endif>Seychelles</option>
                                <option value="SL" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SL')
                                    selected @endif>Sierra Leone</option>
                                <option value="SG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SG')
                                    selected @endif>Singapore</option>
                                <option value="SK" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SK')
                                    selected @endif>Slovakia</option>
                                <option value="SI" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SI')
                                    selected @endif>Slovenia</option>
                                <option value="SB" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SB')
                                    selected @endif>Solomon Islands</option>
                                <option value="SO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SO')
                                    selected @endif>Somalia</option>
                                <option value="ZA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'ZA')
                                    selected @endif>South Africa</option>
                                <option value="GS" @if($isLogin && $user_billing_address && $user_billing_address->region == 'GS')
                                    selected @endif>South Georgia/Sandwich Islands</option>
                                <option value="KR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'KR')
                                    selected @endif>South Korea</option>
                                <option value="SS" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SS')
                                    selected @endif>South Sudan</option>
                                <option value="ES" @if($isLogin && $user_billing_address && $user_billing_address->region == 'ES')
                                    selected @endif>Spain</option>
                                <option value="LK" @if($isLogin && $user_billing_address && $user_billing_address->region == 'LK')
                                    selected @endif>Sri Lanka</option>
                                <option value="SD" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SD')
                                    selected @endif>Sudan</option>
                                <option value="SR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SR')
                                    selected @endif>Suriname</option>
                                <option value="SJ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SJ')
                                    selected @endif>Svalbard and Jan Mayen</option>
                                <option value="SE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SE')
                                    selected @endif>Sweden</option>
                                <option value="CH" @if($isLogin && $user_billing_address && $user_billing_address->region == 'CH')
                                    selected @endif>Switzerland</option>
                                <option value="SY" @if($isLogin && $user_billing_address && $user_billing_address->region == 'SY')
                                    selected @endif>Syria</option>
                                <option value="TW" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TW')
                                    selected @endif>Taiwan</option>
                                <option value="TJ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TJ')
                                    selected @endif>Tajikistan</option>
                                <option value="TZ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TZ')
                                    selected @endif>Tanzania</option>
                                <option value="TH" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TH')
                                    selected @endif>Thailand</option>
                                <option value="TL" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TL')
                                    selected @endif>Timor-Leste</option>
                                <option value="TG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TG')
                                    selected @endif>Togo</option>
                                <option value="TK" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TK')
                                    selected @endif>Tokelau</option>
                                <option value="TO" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TO')
                                    selected @endif>Tonga</option>
                                <option value="TT" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TT')
                                    selected @endif>Trinidad and Tobago</option>
                                <option value="TN" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TN')
                                    selected @endif>Tunisia</option>
                                <option value="TR" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TR')
                                    selected @endif>Turkey</option>
                                <option value="TM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TM')
                                    selected @endif>Turkmenistan</option>
                                <option value="TC" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TC')
                                    selected @endif>Turks and Caicos Islands</option>
                                <option value="TV" @if($isLogin && $user_billing_address && $user_billing_address->region == 'TV')
                                    selected @endif>Tuvalu</option>
                                <option value="UG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'UG')
                                    selected @endif>Uganda</option>
                                <option value="UA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'UA')
                                    selected @endif>Ukraine</option>
                                <option value="AE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'AE')
                                    selected @endif>United Arab Emirates</option>
                                <option value="GB" @if(($isLogin && $user_billing_address && $user_billing_address->region == 'GB') ||
                                    (!isset($user_billing_address))) selected @endif>United Kingdom (UK)</option>
                                <option value="US" @if($isLogin && $user_billing_address && $user_billing_address->region == 'US')
                                    selected @endif>United States (US)</option>
                                <option value="UM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'UM')
                                    selected @endif>United States (US) Minor Outlying Islands</option>
                                <option value="UY" @if($isLogin && $user_billing_address && $user_billing_address->region == 'UY')
                                    selected @endif>Uruguay</option>
                                <option value="UZ" @if($isLogin && $user_billing_address && $user_billing_address->region == 'UZ')
                                    selected @endif>Uzbekistan</option>
                                <option value="VU" @if($isLogin && $user_billing_address && $user_billing_address->region == 'VU')
                                    selected @endif>Vanuatu</option>
                                <option value="VA" @if($isLogin && $user_billing_address && $user_billing_address->region == 'VA')
                                    selected @endif>Vatican</option>
                                <option value="VE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'VE')
                                    selected @endif>Venezuela</option>
                                <option value="VN" @if($isLogin && $user_billing_address && $user_billing_address->region == 'VN')
                                    selected @endif>Vietnam</option>
                                <option value="VG" @if($isLogin && $user_billing_address && $user_billing_address->region == 'VG')
                                    selected @endif>Virgin Islands (British)</option>
                                <option value="VI" @if($isLogin && $user_billing_address && $user_billing_address->region == 'VI')
                                    selected @endif>Virgin Islands (US)</option>
                                <option value="WF" @if($isLogin && $user_billing_address && $user_billing_address->region == 'WF')
                                    selected @endif>Wallis and Futuna</option>
                                <option value="EH" @if($isLogin && $user_billing_address && $user_billing_address->region == 'EH')
                                    selected @endif>Western Sahara</option>
                                <option value="YE" @if($isLogin && $user_billing_address && $user_billing_address->region == 'YE')
                                    selected @endif>Yemen</option>
                                <option value="ZM" @if($isLogin && $user_billing_address && $user_billing_address->region == 'ZM')
                                    selected @endif>Zambia</option>
                                <option value="ZW" @if($isLogin && $user_billing_address && $user_billing_address->region == 'ZW')
                                    selected @endif>Zimbabwe</option>



                            </select>
                            <p class="error" id="bill_country_region_error"></p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bill_address1">Street address&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                        <input type="text" class="form-control" name="bill_address1" id="bill_address1" placeholder="House number and street name" value="@if($isLogin && $user_billing_address){{ $user_billing_address->streetaddress }}@endif" required>
                        <p class="error" id="bill_address1_error"></p>
                    </div>

                    <div class="mb-3">
                        <label for="bill_address2">Address 2 (optional)</label>
                        <input type="text" class="form-control" name="bill_address2" id="bill_address2" placeholder="Apartment, suite, unit, etc. (optional)">
                        <p class="error" id="bill_address2_error"></p>
                    </div>

                    <div class="mb-3">
                        <label for="bill_town_city">Town / City&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                        <input type="text" class="form-control" name="bill_town_city" id="bill_town_city" placeholder="" value="@if($isLogin && $user_billing_address){{ $user_billing_address->city }}@endif" required>
                        <p class="error" id="bill_town_city_error"></p>
                    </div>

                    <div class="mb-3">
                        <label for="bill_county">County (optional)</label>
                        <input type="text" class="form-control" name="bill_county" id="bill_county" placeholder="" value="@if($isLogin && $user_billing_address){{ $user_billing_address->country }}@endif">
                        <p class="error" id="bill_county_error"></p>
                    </div>

                    <div class="mb-3">
                        <label for="bill_postcode">Postcode&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                        <input type="text" class="form-control" name="bill_postcode" id="bill_postcode" placeholder="" value="@if($isLogin && $user_billing_address){{ $user_billing_address->postcode }}@endif" required>
                        <p class="error" id="bill_postcode_error"></p>
                    </div>

                    <div class="mb-3">
                        <label for="bill_phone_number">Phone&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                        <input type="text" class="form-control" name="bill_phone_number" id="bill_phone_number" placeholder="" value="@if($isLogin && $user_billing_address){{ $user_billing_address->phone }}@endif" required>
                        <p class="error" id="bill_phone_number_error"></p>
                    </div>

                    <div class="mb-3">
                        <label for="bill_email">Email address&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                        <input type="email" class="form-control" name="bill_email" id="bill_email" placeholder="" value="@if($isLogin && $user_billing_address){{ $user_billing_address->email }}@endif" required>
                        <p class="error" id="bill_email_error"></p>
                    </div>
                    <div class="my-4 d-flex">
                        <input type="checkbox" class="" name="ship_to_diff_address" id="ship_to_diff_address" onclick="showHideShippingSection()">
                        <label for="ship_to_diff_address" class="font-lg me-4" style="margin:10px;">Ship to a different
                            address?</label>

                    </div>

                    <!-- Shipping Section Start -->
                    <div id="shipping-section" class="d-none">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ship_first_name" class="">First name&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                                <input type="text" class="form-control" name="ship_first_name" id="ship_first_name" placeholder="" value="@if($isLogin && $user_shipping_address){{ $user_shipping_address->firstname }}@endif" required>
                                <p class="error" id="ship_first_name_error"></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ship_last_name" class="">Last name&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                                <input type="text" class="form-control" name="ship_last_name" id="ship_last_name" placeholder="" value="@if($isLogin && $user_shipping_address){{ $user_shipping_address->lastname }}@endif" required>
                                <p class="error" id="ship_last_name_error"></p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="ship_company_name">Company name (optional)</label>
                            <input type="text" class="form-control" name="ship_company_name" id="ship_company_name" placeholder="" value="@if($isLogin && $user_shipping_address){{ $user_shipping_address->companyname }}@endif">
                            <p class="error" id="ship_company_name_error"></p>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="ship_country_region">Country / Region&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                                <select class="form-control" name="ship_country_region" id="ship_country_region">
                                    {{-- <option value="US" @if($isLogin && $user_shipping_address && $user_shipping_address->region ==
                    'US') selected @endif>United States (US)</option> --}}



                                    <option value="AF" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AF')
                                        selected @endif>Afghanistan</option>
                                    <option value="AX" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AX')
                                        selected @endif>Åland Islands</option>
                                    <option value="AL" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AL')
                                        selected @endif>Albania</option>
                                    <option value="DZ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'DZ')
                                        selected @endif>Algeria</option>
                                    <option value="AS" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AS')
                                        selected @endif>American Samoa</option>
                                    <option value="AD" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AD')
                                        selected @endif>Andorra</option>
                                    <option value="AO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AO')
                                        selected @endif>Angola</option>
                                    <option value="AI" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AI')
                                        selected @endif>Anguilla</option>
                                    <option value="AQ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AQ')
                                        selected @endif>Antarctica</option>
                                    <option value="AG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AG')
                                        selected @endif>Antigua and Barbuda</option>
                                    <option value="AR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AR')
                                        selected @endif>Argentina</option>
                                    <option value="AM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AM')
                                        selected @endif>Armenia</option>
                                    <option value="AW" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AW')
                                        selected @endif>Aruba</option>
                                    <option value="AU" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AU')
                                        selected @endif>Australia</option>
                                    <option value="AT" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AT')
                                        selected @endif>Austria</option>
                                    <option value="AZ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AZ')
                                        selected @endif>Azerbaijan</option>
                                    <option value="BS" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BS')
                                        selected @endif>Bahamas</option>
                                    <option value="BH" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BH')
                                        selected @endif>Bahrain</option>
                                    <option value="BD" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BD')
                                        selected @endif>Bangladesh</option>
                                    <option value="BB" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BB')
                                        selected @endif>Barbados</option>
                                    <option value="BY" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BY')
                                        selected @endif>Belarus</option>
                                    <option value="PW" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PW')
                                        selected @endif>Belau</option>
                                    <option value="BE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BE')
                                        selected @endif>Belgium</option>
                                    <option value="BZ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BZ')
                                        selected @endif>Belize</option>
                                    <option value="BJ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BJ')
                                        selected @endif>Benin</option>
                                    <option value="BM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BM')
                                        selected @endif>Bermuda</option>
                                    <option value="BT" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BT')
                                        selected @endif>Bhutan</option>
                                    <option value="BO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BO')
                                        selected @endif>Bolivia</option>
                                    <option value="BQ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BQ')
                                        selected @endif> Bonaire, Saint Eustatius and Saba</option>
                                    <option value="BA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BA')
                                        selected @endif>Bosnia and Herzegovina</option>
                                    <option value="BW" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BW')
                                        selected @endif>Botswana</option>
                                    <option value="BV" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BV')
                                        selected @endif>Bouvet Island</option>
                                    <option value="BR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BR')
                                        selected @endif>Brazil</option>
                                    <option value="IO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'IO')
                                        selected @endif>British Indian Ocean Territory</option>
                                    <option value="BN" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BN')
                                        selected @endif>Brunei</option>
                                    <option value="BG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BG')
                                        selected @endif>Bulgaria</option>
                                    <option value="BF" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BF')
                                        selected @endif>Burkina Faso</option>
                                    <option value="BI" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BI')
                                        selected @endif>Burundi</option>
                                    <option value="KH" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'KH')
                                        selected @endif>Cambodia</option>
                                    <option value="CM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CM')
                                        selected @endif>Cameroon</option>
                                    <option value="CA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CA')
                                        selected @endif>Canada</option>
                                    <option value="CV" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CV')
                                        selected @endif>Cape Verde</option>
                                    <option value="KY" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'KY')
                                        selected @endif>Cayman Islands</option>
                                    <option value="CF" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CF')
                                        selected @endif>Central African Republic</option>
                                    <option value="TD" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TD')
                                        selected @endif>Chad</option>
                                    <option value="CL" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CL')
                                        selected @endif>Chile</option>
                                    <option value="CN" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CN')
                                        selected @endif>China</option>
                                    <option value="CX" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CX')
                                        selected @endif>Christmas Island</option>
                                    <option value="CC" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CC')
                                        selected @endif>Cocos (Keeling) Islands</option>
                                    <option value="CO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CO')
                                        selected @endif>Colombia</option>
                                    <option value="KM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'KM')
                                        selected @endif>Comoros</option>
                                    <option value="CG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CG')
                                        selected @endif>Congo (Brazzaville)</option>

                                    <option value="CD" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CD')
                                        selected @endif>Congo (Kinshasa)</option>
                                    <option value="CK" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CK')
                                        selected @endif>Cook Islands</option>
                                    <option value="CR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CR')
                                        selected @endif>Costa Rica</option>
                                    <option value="HR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'HR')
                                        selected @endif>Croatia</option>
                                    <option value="CU" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CU')
                                        selected @endif>Cuba</option>
                                    <option value="CW" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CW')
                                        selected @endif>Cura&ccedil;ao</option>
                                    <option value="CY" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CY')
                                        selected @endif>Cyprus</option>
                                    <option value="CZ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CZ')
                                        selected @endif>Czech Republic</option>
                                    <option value="DK" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'DK')
                                        selected @endif>Denmark</option>
                                    <option value="DJ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'DJ')
                                        selected @endif>Djibouti</option>
                                    <option value="DM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'DM')
                                        selected @endif>Dominica</option>
                                    <option value="DO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'DO')
                                        selected @endif>Dominican Republic</option>
                                    <option value="EC" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'EC')
                                        selected @endif>Ecuador</option>
                                    <option value="EG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'EG')
                                        selected @endif>Egypt</option>
                                    <option value="SV" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SV')
                                        selected @endif>El Salvador</option>
                                    <option value="GQ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GQ')
                                        selected @endif>Equatorial Guinea</option>
                                    <option value="ER" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'ER')
                                        selected @endif>Eritrea</option>
                                    <option value="EE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'EE')
                                        selected @endif>Estonia</option>
                                    <option value="SZ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SZ')
                                        selected @endif>Eswatini</option>
                                    <option value="ET" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'ET')
                                        selected @endif>Ethiopia</option>
                                    <option value="FK" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'FK')
                                        selected @endif>Falkland Islands</option>
                                    <option value="FO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'FO')
                                        selected @endif>Faroe Islands</option>
                                    <option value="FJ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'FJ')
                                        selected @endif>Fiji</option>
                                    <option value="FI" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'FI')
                                        selected @endif>Finland</option>
                                    <option value="FR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'FR')
                                        selected @endif>France</option>
                                    <option value="GF" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GF')
                                        selected @endif>French Guiana</option>
                                    <option value="PF" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PF')
                                        selected @endif>French Polynesia</option>
                                    <option value="TF" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TF')
                                        selected @endif>French Southern Territories</option>
                                    <option value="GA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GA')
                                        selected @endif>Gabon</option>
                                    <option value="GM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GM')
                                        selected @endif>Gambia</option>
                                    <option value="GE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GE')
                                        selected @endif>Georgia</option>
                                    <option value="DE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'DE')
                                        selected @endif>Germany</option>
                                    <option value="GH" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GH')
                                        selected @endif>Ghana</option>
                                    <option value="GI" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GI')
                                        selected @endif>Gibraltar</option>
                                    <option value="GR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GR')
                                        selected @endif>Greece</option>
                                    <option value="GL" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GL')
                                        selected @endif>Greenland</option>
                                    <option value="GD" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GD')
                                        selected @endif>Grenada</option>
                                    <option value="GP" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GP')
                                        selected @endif>Guadeloupe</option>
                                    <option value="GU" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GU')
                                        selected @endif>Guam</option>

                                    <option value="GT" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GT')
                                        selected @endif>Guatemala</option>
                                    <option value="GG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GG')
                                        selected @endif>Guernsey</option>
                                    <option value="GN" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GN')
                                        selected @endif>Guinea</option>
                                    <option value="GW" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GW')
                                        selected @endif>Guinea-Bissau</option>
                                    <option value="GY" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GY')
                                        selected @endif>Guyana</option>
                                    <option value="HT" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'HT')
                                        selected @endif>Haiti</option>
                                    <option value="HM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'HM')
                                        selected @endif>Heard Island and McDonald Islands</option>
                                    <option value="HN" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'HN')
                                        selected @endif>Honduras</option>
                                    <option value="HK" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'HK')
                                        selected @endif>Hong Kong</option>
                                    <option value="HU" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'HU')
                                        selected @endif>Hungary</option>
                                    <option value="IS" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'IS')
                                        selected @endif>Iceland</option>
                                    <option value="IN" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'IN')
                                        selected @endif>India</option>
                                    <option value="ID" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'ID')
                                        selected @endif>Indonesia</option>
                                    <option value="IR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'IR')
                                        selected @endif>Iran</option>
                                    <option value="IQ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'IQ')
                                        selected @endif>Iraq</option>
                                    <option value="IE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'IE')
                                        selected @endif>Ireland</option>
                                    <option value="IM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'IM')
                                        selected @endif>Isle of Man</option>
                                    <option value="IL" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'IL')
                                        selected @endif>Israel</option>
                                    <option value="IT" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'IT')
                                        selected @endif>Italy</option>
                                    <option value="CI" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CI')
                                        selected @endif>Ivory Coast</option>
                                    <option value="JM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'JM')
                                        selected @endif>Jamaica</option>
                                    <option value="JP" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'JP')
                                        selected @endif>Japan</option>
                                    <option value="JE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'JE')
                                        selected @endif>Jersey</option>
                                    <option value="JO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'JO')
                                        selected @endif>Jordan</option>
                                    <option value="KZ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'KZ')
                                        selected @endif>Kazakhstan</option>
                                    <option value="KE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'KE')
                                        selected @endif>Kenya</option>
                                    <option value="KI" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'KI')
                                        selected @endif>Kiribati</option>
                                    <option value="KW" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'KW')
                                        selected @endif>Kuwait</option>
                                    <option value="KG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'KG')
                                        selected @endif>Kyrgyzstan</option>
                                    <option value="LA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LA')
                                        selected @endif>Laos</option>
                                    <option value="LV" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LV')
                                        selected @endif>Latvia</option>
                                    <option value="LB" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LB')
                                        selected @endif>Lebanon</option>
                                    <option value="LS" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LS')
                                        selected @endif>Lesotho</option>
                                    <option value="LR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LR')
                                        selected @endif>Liberia</option>
                                    <option value="LY" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LY')
                                        selected @endif>Libya</option>
                                    <option value="LI" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LI')
                                        selected @endif>Liechtenstein</option>
                                    <option value="LT" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LT')
                                        selected @endif>Lithuania</option>
                                    <option value="LU" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LU')
                                        selected @endif>Luxembourg</option>
                                    <option value="MO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MO')
                                        selected @endif>Macao</option>
                                    <option value="MG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MG')
                                        selected @endif>Madagascar</option>
                                    <option value="MW" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MW')
                                        selected @endif>Malawi</option>
                                    <option value="MY" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MY')
                                        selected @endif>Malaysia</option>
                                    <option value="MV" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MV')
                                        selected @endif>Maldives</option>
                                    <option value="ML" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'ML')
                                        selected @endif>Mali</option>
                                    <option value="MT" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LU')
                                        selected @endif>Malta</option>
                                    <option value="MH" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MH')
                                        selected @endif>Marshall Islands</option>
                                    <option value="MQ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MQ')
                                        selected @endif>Martinique</option>
                                    <option value="MR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MR')
                                        selected @endif>Mauritania</option>
                                    <option value="MU" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MU')
                                        selected @endif>Mauritius</option>
                                    <option value="YT" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'YT')
                                        selected @endif>Mayotte</option>
                                    <option value="MX" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MX')
                                        selected @endif>Mexico</option>
                                    <option value="FM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'FM')
                                        selected @endif>Micronesia</option>
                                    <option value="MD" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MD')
                                        selected @endif>Moldova</option>
                                    <option value="MC" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MC')
                                        selected @endif>Monaco</option>
                                    <option value="MN" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MN')
                                        selected @endif>Mongolia</option>
                                    <option value="ME" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'ME')
                                        selected @endif>Montenegro</option>
                                    <option value="MS" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MS')
                                        selected @endif>Montserrat</option>
                                    <option value="MA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MA')
                                        selected @endif>Morocco</option>
                                    <option value="MZ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MZ')
                                        selected @endif>Mozambique</option>
                                    <option value="MM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MM')
                                        selected @endif>Myanmar</option>
                                    <option value="NA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NA')
                                        selected @endif>Namibia</option>
                                    <option value="NR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NR')
                                        selected @endif>Nauru</option>
                                    <option value="NP" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NP')
                                        selected @endif>Nepal</option>
                                    <option value="NL" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NL')
                                        selected @endif>Netherlands</option>
                                    <option value="NC" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NC')
                                        selected @endif>New Caledonia</option>
                                    <option value="NZ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NZ')
                                        selected @endif>New Zealand</option>
                                    <option value="NI" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NI')
                                        selected @endif>Nicaragua</option>
                                    <option value="NE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NE')
                                        selected @endif>Niger</option>
                                    <option value="NG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NG')
                                        selected @endif>Nigeria</option>
                                    <option value="NU" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NU')
                                        selected @endif>Niue</option>
                                    <option value="NF" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NF')
                                        selected @endif>Norfolk Island</option>
                                    <option value="KP" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'KP')
                                        selected @endif>North Korea</option>
                                    <option value="MK" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MK')
                                        selected @endif>North Macedonia</option>
                                    <option value="MP" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MP')
                                        selected @endif>Northern Mariana Islands</option>
                                    <option value="NO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'NO')
                                        selected @endif>Norway</option>
                                    <option value="OM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'OM')
                                        selected @endif>Oman</option>
                                    <option value="PK" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PK')
                                        selected @endif>Pakistan</option>
                                    <option value="PS" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PS')
                                        selected @endif>Palestinian Territory</option>
                                    <option value="PA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PA')
                                        selected @endif>Panama</option>
                                    <option value="PG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PG')
                                        selected @endif>Papua New Guinea</option>
                                    <option value="PY" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PY')
                                        selected @endif>Paraguay</option>
                                    <option value="PE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PE')
                                        selected @endif>Peru</option>
                                    <option value="PH" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PH')
                                        selected @endif>Philippines</option>
                                    <option value="PN" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PN')
                                        selected @endif>Pitcairn</option>
                                    <option value="PL" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PL')
                                        selected @endif>Poland</option>
                                    <option value="PT" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PT')
                                        selected @endif>Portugal</option>
                                    <option value="PR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PR')
                                        selected @endif>Puerto Rico</option>
                                    <option value="QA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'QA')
                                        selected @endif>Qatar</option>
                                    <option value="RE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'RE')
                                        selected @endif>Reunion</option>
                                    <option value="RO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'RO')
                                        selected @endif>Romania</option>
                                    <option value="RU" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'RU')
                                        selected @endif>Russia</option>
                                    <option value="RW" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'RW')
                                        selected @endif>Rwanda</option>
                                    <option value="ST" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'ST')
                                        selected @endif>S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                                    <option value="BL" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'BL')
                                        selected @endif>Saint Barth&eacute;lemy</option>
                                    <option value="SH" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SH')
                                        selected @endif>Saint Helena</option>
                                    <option value="KN" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'KN')
                                        selected @endif>Saint Kitts and Nevis</option>
                                    <option value="LC" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LC')
                                        selected @endif>Saint Lucia</option>
                                    <option value="SX" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SX')
                                        selected @endif>Saint Martin (Dutch part)</option>
                                    <option value="MF" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'MF')
                                        selected @endif>Saint Martin (French part)</option>
                                    <option value="PM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'PM')
                                        selected @endif>Saint Pierre and Miquelon</option>
                                    <option value="VC" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'VC')
                                        selected @endif>Saint Vincent and the Grenadines</option>
                                    <option value="WS" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'WS')
                                        selected @endif>Samoa</option>
                                    <option value="SM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SM')
                                        selected @endif>San Marino</option>
                                    <option value="SA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SA')
                                        selected @endif>Saudi Arabia</option>
                                    <option value="SN" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SN')
                                        selected @endif>Senegal</option>
                                    <option value="RS" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'RS')
                                        selected @endif>Serbia</option>
                                    <option value="SC" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SC')
                                        selected @endif>Seychelles</option>
                                    <option value="SL" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SL')
                                        selected @endif>Sierra Leone</option>
                                    <option value="SG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SG')
                                        selected @endif>Singapore</option>
                                    <option value="SK" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SK')
                                        selected @endif>Slovakia</option>
                                    <option value="SI" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SI')
                                        selected @endif>Slovenia</option>
                                    <option value="SB" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SB')
                                        selected @endif>Solomon Islands</option>
                                    <option value="SO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SO')
                                        selected @endif>Somalia</option>
                                    <option value="ZA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'ZA')
                                        selected @endif>South Africa</option>
                                    <option value="GS" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'GS')
                                        selected @endif>South Georgia/Sandwich Islands</option>
                                    <option value="KR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'KR')
                                        selected @endif>South Korea</option>
                                    <option value="SS" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SS')
                                        selected @endif>South Sudan</option>
                                    <option value="ES" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'ES')
                                        selected @endif>Spain</option>
                                    <option value="LK" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'LK')
                                        selected @endif>Sri Lanka</option>
                                    <option value="SD" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SD')
                                        selected @endif>Sudan</option>
                                    <option value="SR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SR')
                                        selected @endif>Suriname</option>
                                    <option value="SJ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SJ')
                                        selected @endif>Svalbard and Jan Mayen</option>
                                    <option value="SE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SE')
                                        selected @endif>Sweden</option>
                                    <option value="CH" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'CH')
                                        selected @endif>Switzerland</option>
                                    <option value="SY" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'SY')
                                        selected @endif>Syria</option>
                                    <option value="TW" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TW')
                                        selected @endif>Taiwan</option>
                                    <option value="TJ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TJ')
                                        selected @endif>Tajikistan</option>
                                    <option value="TZ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TZ')
                                        selected @endif>Tanzania</option>
                                    <option value="TH" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TH')
                                        selected @endif>Thailand</option>
                                    <option value="TL" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TL')
                                        selected @endif>Timor-Leste</option>
                                    <option value="TG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TG')
                                        selected @endif>Togo</option>
                                    <option value="TK" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TK')
                                        selected @endif>Tokelau</option>
                                    <option value="TO" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TO')
                                        selected @endif>Tonga</option>
                                    <option value="TT" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TT')
                                        selected @endif>Trinidad and Tobago</option>
                                    <option value="TN" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TN')
                                        selected @endif>Tunisia</option>
                                    <option value="TR" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TR')
                                        selected @endif>Turkey</option>
                                    <option value="TM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TM')
                                        selected @endif>Turkmenistan</option>
                                    <option value="TC" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TC')
                                        selected @endif>Turks and Caicos Islands</option>
                                    <option value="TV" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'TV')
                                        selected @endif>Tuvalu</option>
                                    <option value="UG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'UG')
                                        selected @endif>Uganda</option>
                                    <option value="UA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'UA')
                                        selected @endif>Ukraine</option>
                                    <option value="AE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'AE')
                                        selected @endif>United Arab Emirates</option>
                                    <option value="GB" @if(($isLogin && $user_shipping_address && $user_shipping_address->region == 'GB')
                                        || (!isset($user_shipping_address))) selected @endif>United Kingdom (UK)</option>
                                    <option value="US" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'US')
                                        selected @endif>United States (US)</option>
                                    <option value="UM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'UM')
                                        selected @endif>United States (US) Minor Outlying Islands</option>
                                    <option value="UY" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'UY')
                                        selected @endif>Uruguay</option>
                                    <option value="UZ" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'UZ')
                                        selected @endif>Uzbekistan</option>
                                    <option value="VU" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'VU')
                                        selected @endif>Vanuatu</option>
                                    <option value="VA" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'VA')
                                        selected @endif>Vatican</option>
                                    <option value="VE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'VE')
                                        selected @endif>Venezuela</option>
                                    <option value="VN" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'VN')
                                        selected @endif>Vietnam</option>
                                    <option value="VG" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'VG')
                                        selected @endif>Virgin Islands (British)</option>
                                    <option value="VI" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'VI')
                                        selected @endif>Virgin Islands (US)</option>
                                    <option value="WF" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'WF')
                                        selected @endif>Wallis and Futuna</option>
                                    <option value="EH" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'EH')
                                        selected @endif>Western Sahara</option>
                                    <option value="YE" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'YE')
                                        selected @endif>Yemen</option>
                                    <option value="ZM" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'ZM')
                                        selected @endif>Zambia</option>
                                    <option value="ZW" @if($isLogin && $user_shipping_address && $user_shipping_address->region == 'ZW')
                                        selected @endif>Zimbabwe</option>




                                </select>
                                <p class="error" id="ship_country_region_error"></p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="ship_address1">Street address&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                            <input type="text" class="form-control" name="ship_address1" id="ship_address1" placeholder="House number and street name" value="@if($isLogin && $user_shipping_address){{ $user_shipping_address->streetaddress }}@endif" required>
                            <p class="error" id="ship_address1_error"></p>
                        </div>

                        <div class="mb-3">
                            <label for="ship_address2">Address 2 (optional)</label>
                            <input type="text" class="form-control" name="ship_address2" id="ship_address2" placeholder="Apartment, suite, unit, etc. (optional)">
                            <p class="error" id="ship_address2_error"></p>
                        </div>

                        <div class="mb-3">
                            <label for="ship_town_city">Town / City&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                            <input type="text" class="form-control" name="ship_town_city" id="ship_town_city" placeholder="" value="@if($isLogin && $user_shipping_address){{ $user_shipping_address->city }}@endif" required>
                            <p class="error" id="ship_town_city_error"></p>
                        </div>

                        <div class="mb-3">
                            <label for="ship_county">County (optional)</label>
                            <input type="text" class="form-control" name="ship_county" id="ship_county" placeholder="" value="@if($isLogin && $user_shipping_address){{ $user_shipping_address->country }}@endif">
                            <p class="error" id="ship_county_error"></p>
                        </div>

                        <div class="mb-3">
                            <label for="ship_postcode">Postcode&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                            <input type="text" class="form-control" name="ship_postcode" id="ship_postcode" placeholder="" value="@if($isLogin && $user_shipping_address){{ $user_shipping_address->postcode }}@endif" required>
                            <p class="error" id="ship_postcode_error"></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endif
<style>
    .font-lg {
        font-size: 22px;
    }

    .paypal-logo-color-default {
        display: none !important;
    }

</style>


<!-- PaymentSense files -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="{{ env('CONNECT_E_BASE_WEB_URL') }}/assets/js/client.js"></script>
<script src="{{ url('payment-sense-assets/js/pay_config.js') }}"></script>
<script src="{{ url('payment-sense-assets/js/shared.js') }}"></script>
<script type="text/javascript">
    var save_order_url = "{{ route('checkout.save_order') }}";
    var orderFailedPaymentSenseUrl = "{{ route('orderFailedPaymentSense') }}";
    var token = "{{ csrf_token() }}";

</script>
@include('frontend.checkout.sale')
<!-- <script src="{{ url('payment-sense-assets/js/sale.js') }}"></script> -->

<script type="text/javascript">
    window.addEventListener('load', function() {
        const btnOrder = document.getElementById("paymentsense-selected");
        btnOrder.onclick = () => {
            $('#pp-text').hide();
            $('#ps-text').show();
            $('#paypal-payment-button').hide();
            processOrder();

        }
        const btnPay = document.getElementById("btnPay");
        // when click on pay button first validateForm then processPayment
        btnPay.onclick = () => {
            if (!validateForm()) {
                $('html, body').animate({
                    scrollTop: $("#billing_form_section").offset().top
                }, 1000);
                return false;
            }
            processPayment();
        }

        function onFormCompleteCallback() {
            document.getElementById("btnPay").focus();
        }

        payConfig.callbacks = {
            onFormComplete: onFormCompleteCallback
        , }
    })

    function showPaypalForm() {
        $('#ps-text').hide();
        $('#pp-text').show();
        $('#paypal-payment-button').show();
        $('#demo-payment').html('');
        $('#sectionPay').addClass('hidden');
    }

</script>


<script src="https://www.paypal.com/sdk/js?client-id=AYMu5lmDT1sGfGKCKe63rLHtD_UA-6-1ymnwDpfe2Hw3eTVxZa7FBZtqdTpIB9eBuoeGibvKL8pw7i7p&components=buttons,payment-fields,marks,funding-eligibility&disable-funding=credit,card&currency=GBP">
</script>

<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            if (!validateForm()) {
                $('html, body').animate({
                    scrollTop: $("#billing_form_section").offset().top
                }, 1000);
                return false;
            }

            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{ $cartTotal }}'
                    }
                }]
            });
        }
        , onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // ajax call to save order
                var coupon_code = '';
                var coupon_discount_percentage = '';
                var coupon_amount = '';

                // check if coupon is applied
                var check_coupon_applied = "{{ session()->has('coupon') }}";
                if (check_coupon_applied) {
                    var coupon = JSON.parse('{!! json_encode(session()->get("coupon")) !!}');
                    coupon_code = coupon.code;
                    coupon_discount_percentage = coupon.discount_percentage;
                    coupon_amount = "{{ $discount }}"
                }

                $.ajax({
                    url: "{{ route('checkout.save_order') }}"
                    , type: "POST"
                    , data: {
                        _token: "{{ csrf_token() }}"
                        , bill_first_name: document.getElementById('bill_first_name').value
                        , bill_last_name: document.getElementById('bill_last_name').value
                        , bill_company_name: document.getElementById('bill_company_name').value
                        , bill_country_region: document.getElementById('bill_country_region').value
                        , bill_address1: document.getElementById('bill_address1').value
                        , bill_address2: document.getElementById('bill_address2').value
                        , bill_town_city: document.getElementById('bill_town_city').value
                        , bill_county: document.getElementById('bill_county').value
                        , bill_postcode: document.getElementById('bill_postcode').value
                        , bill_phone_number: document.getElementById('bill_phone_number').value
                        , bill_email: document.getElementById('bill_email').value
                        , ship_to_diff_address: document.getElementById('ship_to_diff_address').checked
                        , coupon_code: coupon_code
                        , coupon_discount_percentage: coupon_discount_percentage
                        , coupon_amount: coupon_amount,
                          ship_first_name: document.getElementById('ship_first_name').value
                        , ship_last_name: document.getElementById('ship_last_name').value
                        , ship_company_name: document.getElementById('ship_company_name').value
                        , ship_country_region: document.getElementById('ship_country_region').value
                        , ship_address1: document.getElementById('ship_address1').value
                        , ship_address2: document.getElementById('ship_address2').value
                        , ship_town_city: document.getElementById('ship_town_city').value
                        , ship_county: document.getElementById('ship_county').value
                        , ship_postcode: document.getElementById('ship_postcode').value
                        // Check if "ship_to_diff_address" is checked, then include shipping details
                        // ...(document.getElementById('ship_to_diff_address').checked ? {
                        //     ship_first_name: document.getElementById('ship_first_name').value
                        //     , ship_last_name: document.getElementById('ship_last_name').value
                        //     , ship_company_name: document.getElementById('ship_company_name').value
                        //     , ship_country_region: document.getElementById('ship_country_region').value
                        //     , ship_address1: document.getElementById('ship_address1').value
                        //     , ship_address2: document.getElementById('ship_address2').value
                        //     , ship_town_city: document.getElementById('ship_town_city').value
                        //     , ship_county: document.getElementById('ship_county').value
                        //     , ship_postcode: document.getElementById('ship_postcode').value
                        // , } : {})
                        , payment_method: 'paypal'
                        , payment_order_id: data.orderID
                        , total_amount: '{{ $cartTotal }}'
                    , }
                    , success: function(response) {
                        if (response.status == 'success') {
                            alert('Your Order Placed Successfully!!');
                            window.location.href = "{{ route('frontend.userorder') }}";
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });
        }
        , onCancel: function(data) {
            alert('Transaction canceled');
        }
    }).render('#paypal-payment-button');

    function validateForm() {
        var isValid = true;

        var errorList = [];

        if (document.getElementById('bill_first_name').value == '') {
            isValid = false;
            errorList.push('Billing first name is required');
            document.getElementById('bill_first_name_error').innerHTML = 'First name is a required field';
        }

        if (document.getElementById('bill_last_name').value == '') {
            isValid = false;
            errorList.push('Billing last name is required');
            document.getElementById('bill_last_name_error').innerHTML = 'Last name is a required field';
        }

        if (document.getElementById('bill_country_region').value == '') {
            isValid = false;
            errorList.push('Billing country is required');
            document.getElementById('bill_country_region_error').innerHTML = 'Country is a required field';
        }

        if (document.getElementById('bill_address1').value == '') {
            isValid = false;
            errorList.push('Billing street address is required');
            document.getElementById('bill_address1_error').innerHTML = 'Street address is a required field';
        }

        if (document.getElementById('bill_town_city').value == '') {
            isValid = false;
            errorList.push('Billing town / city is required');
            document.getElementById('bill_town_city_error').innerHTML = 'Town / city is a required field';
        }

        if (document.getElementById('bill_postcode').value == '') {
            isValid = false;
            errorList.push('Billing zip is required');
            document.getElementById('bill_postcode_error').innerHTML = 'Postcode is a required field';
        }

        if (document.getElementById('bill_phone_number').value == '') {
            isValid = false;
            errorList.push('Billing phone number is required');
            document.getElementById('bill_phone_number_error').innerHTML = 'Phone number is a required field';
        }

        if (document.getElementById('bill_email').value == '') {
            isValid = false;
            errorList.push('Billing email is required');
            document.getElementById('bill_email_error').innerHTML = 'Email is a required field';
        }

        // check if ship_to_diff_address is checked
        if (document.getElementById('ship_to_diff_address').checked) {
            if (document.getElementById('ship_first_name').value == '') {
                isValid = false;
                errorList.push('Shipping first name is required');
                document.getElementById('ship_first_name_error').innerHTML = 'First name is a required field';
            }

            if (document.getElementById('ship_last_name').value == '') {
                isValid = false;
                errorList.push('Shipping last name is required');
                document.getElementById('ship_last_name_error').innerHTML = 'Last name is a required field';
            }

            if (document.getElementById('ship_country_region').value == '') {
                isValid = false;
                errorList.push('Shipping country is required');
                document.getElementById('ship_country_region_error').innerHTML = 'Country is a required field';
            }

            if (document.getElementById('ship_address1').value == '') {
                isValid = false;
                errorList.push('Shipping street address is required');
                document.getElementById('ship_address1_error').innerHTML = 'Street address is a required field';
            }

            if (document.getElementById('ship_town_city').value == '') {
                isValid = false;
                errorList.push('Shipping town / city is required');
                document.getElementById('ship_town_city_error').innerHTML = 'Town / city is a required field';
            }

            if (document.getElementById('ship_postcode').value == '') {
                isValid = false;
                errorList.push('Shipping zip is required');
                document.getElementById('ship_postcode_error').innerHTML = 'Postcode is a required field';
            }
        }

        if (!isValid) {
            var errorHtml = '<ul>';
            errorList.forEach(function(error) {
                errorHtml += '<li>' + error + '</li>';
            });
            errorHtml += '</ul>';
            // document.getElementById('billing_form_errors').innerHTML = errorHtml;
            return false;
        } else {
            document.getElementById('billing_form_errors').innerHTML = '';
            document.getElementById('bill_first_name_error').innerHTML = '';
            document.getElementById('bill_last_name_error').innerHTML = '';
            document.getElementById('bill_country_region_error').innerHTML = '';
            document.getElementById('bill_address1_error').innerHTML = '';
            document.getElementById('bill_town_city_error').innerHTML = '';
            document.getElementById('bill_postcode_error').innerHTML = '';
            document.getElementById('bill_phone_number_error').innerHTML = '';
            document.getElementById('bill_email_error').innerHTML = '';
            document.getElementById('ship_first_name_error').innerHTML = '';
            document.getElementById('ship_last_name_error').innerHTML = '';
            document.getElementById('ship_country_region_error').innerHTML = '';
            document.getElementById('ship_address1_error').innerHTML = '';
            document.getElementById('ship_town_city_error').innerHTML = '';
            document.getElementById('ship_postcode_error').innerHTML = '';


            return true;
        }

    }

    function showHideShippingSection() {
        if (document.getElementById('ship_to_diff_address').checked) {
            document.getElementById('shipping-section').classList.remove('d-none');
        } else {
            document.getElementById('shipping-section').classList.add('d-none');
        }
    }

</script>

@endsection
