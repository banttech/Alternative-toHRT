@extends('layouts.frontend.userdashboardlayouts')

@section('usercontent')
<div class="col-md-8">
    <div class="dashboard-innersecond">
            <section class="login-section-1">
  <div class="login-container-1">
      <div class="login-box-1">
        <h2>Edit Billing Address</h2>
        <form action="{{route('frontend.billing.update')}}" method="POST" enctype="multipart/form-data">
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
            <input type="text" id="firstname"  name="firstname" required placeholder="FIRSTNAME" value="{{$billing->firstname}}">
          </div>
          <div class="form-group">
            <input type="text" id="lastname"  name="lastname" required placeholder="LASTNAME" value="{{$billing->lastname}}">
          </div>
          
          @php $isLogin = Auth::check(); @endphp
            @if(Auth::check())
            @php
            $user = Auth::user();
            $user_billing_address = DB::table('user_billing_address')->where('user_id', $user->id)->first();
            $user_shipping_address = DB::table('user_shipping_address')->where('user_id', $user->id)->first();
            @endphp
            @endif

          <div class="form-group">
            <select class="form-control" name="region" id="region">
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
                                    (!$user_billing_address)) selected @endif>United Kingdom (UK)</option>
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
          </div>

          <div class="form-group">
            <input type="text" id="streetaddress"  name="streetaddress" required placeholder="Street address *" value="{{$billing->streetaddress}}">
          </div>
          <div class="form-group">
            <input type="text" id="city"  name="city" required placeholder="Town / City *" value="{{$billing->city}}">
          </div>
          {{-- <div class="form-group">
            <input type="text" id="country"  name="country" required placeholder="County (optional)" value="{{$billing->country}}">
          </div> --}}
          <div class="form-group">
            <input type="text" id="postcode"  name="postcode" required placeholder="Postcode *" value="{{$billing->postcode}}">
          </div>
          <div class="form-group">
            <input type="text" id="phone"  name="phone" required placeholder="Phone *" value="{{$billing->phone}}">
          </div>
          <div class="form-group">
            <input type="text" id="companyname"  name="companyname" required placeholder="Company name (optional)" value="{{$billing->companyname}}">
          </div>

          <div class="form-group">
            <input type="text" id="email"  name="email" required  placeholder="Email address *" value="{{$billing->email}}">
          </div>
          <div class="login-btn">
            <button type="submit">Save address</button>
          </div>
        </form>
      </div>
    </div>
</section>
    </div>
</div>
   
@endsection