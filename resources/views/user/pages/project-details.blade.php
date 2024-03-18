<!DOCTYPE html>
<html lang="en-us">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    @php
        $generalsettings = \App\Models\GeneralSetting::find(1);
    @endphp

    <title>
        
            {{ $project->meta_title }}
        
    </title>
    <meta name="title" content="{{ $project->meta_title }} ">
    <meta name="tags" content="{{ $project->meta_tags }} ">
    <meta name="description" content="{{ $project->meta_description }} ">
    <meta name="keywords" content="{{ $project->meta_keywords }} ">


    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('public/assets/images/projects/logo') }}/{{ $project->logo }}" type="image/x-icon">
    <link rel="canonical" href="{{ route('index') }}" />
    <meta name="author" content="Sobha Realty AE" />
    <meta property="og:url" content="{{ route('index') }}" />
    <meta property="og:type" content="{{ route('index') }}" />
    <meta property="og:title" content="{{ $project->meta_title }} " />
    <meta property="og:description"
        content=" {{ $project->meta_description }} " />
    <link href="{{ asset('public/assets/css/styles.css') }}" rel="stylesheet" />
    <script src="{{ asset('public/assets/js/topjs.js') }}"></script>
</head>

<body style="background:#3E3C3D">
    
    <div id="mySidenav" class="sidenav" style="width: 250px; right: -35px;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="/Projects/Porto-Playa-at-Hayat-Island">Overview</a>
        <a href="/Projects/Porto-Playa-at-Hayat-Island-Amenities">Amenities</a>
        <a href="/Projects/Porto-Playa-at-Hayat-Island-PaymentPlan">Payment Plan</a>
        <a href="/Projects/Porto-Playa-at-Hayat-Island-FloorPlans">Floor Plans</a>
        <a href="/Projects/Porto-Playa-at-Hayat-Island-Location">Location</a>
        <a href="/Projects/Porto-Playa-at-Hayat-Island-MasterPlan">Master Plan</a>
        <a href="/Projects/Porto-Playa-at-Hayat-Island#gly">Gallery</a>
        <p>Get in Touch</p>
        <span><a href="tel:+971526892790" class="border-0">
            <img src="{{ asset('public/assets/images/call.png') }}" width="15" height="15" alt="Call Us">
             +971 52 689 2790</a></span>

        <span> <a rel="nofollow"
                                href="https://api.whatsapp.com/send?l=en&amp;phone=+971509260992&amp;text=I want more information on {{$project->name}}"
                                target="_blank" class="mr-3">
                                <img src="{{ asset('public/assets/images/whats-app.svg') }}" width="15"
                                    height="15" alt="WhatsApp">
                                <span>+971 50 926 0992</span>
                            </a></span>
    </div>
    <div id="main">
       
        <div class="top-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 col-md-6 col-lg-6 menu-left">
                        <div class="call-btn">
                            <a href="tel:+971509260992">
                                <img src="{{ asset('public/assets/images/call.png') }}" width="15" height="15"
                                    alt="Call Us">
                                <span>+971 50 926 0992</span></a>
                            <a rel="nofollow"
                                href="https://api.whatsapp.com/send?l=en&amp;phone=+971509260992&amp;text=I want more information on {{$project->name}}"
                                target="_blank" class="mr-3">
                                <img src="{{ asset('public/assets/images/whats-app.svg') }}" width="15"
                                    height="15" alt="WhatsApp">
                                <span>+971 50 926 0992</span>
                            </a>
                        </div>
                    </div>
                    <div class="lang-drop col-8 col-md-6 col-lg-6">

                    </div>
                </div>
            </div>
        </div>
        <nav id="navbar_top" class="navbar navbar-expand-lg custom_nav_menu sticky">
            <section class="container-fluid">
                <a itemprop="url" class="navbar-brand logo" hreflang="en" href='{{ route('index') }}'>
                    <img src="{{ asset('public/assets/images/projects/logo') }}/{{$project->logo}}" width="172" height="45"
                        alt="" class="img-fluid logo-light">
                    <img src="{{ asset('public/assets/images/projects/logo') }}/{{$project->logo}}" width="172" height="45"
                        alt="" class="img-fluid logo-dark">
                </a>
                <div>
                    <span class="nav-icon" onclick="openNav()">&#9776;</span>
                </div>
                <div class="container">
                    
                    <div class="collapse navbar-collapse">
                            <ul class="navbar-nav mx-auto mr-0" style="margin-right: 0 !important;">
                                <li class="nav-item">
                                    <a class="nav-link" href="#overview">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#amenities">
                                        Amenities</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#pay">
                                        Payment Plan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#floorplan">
                                        Floor Plans</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#location">
                                        Location</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#masterplan">
                                        Master Plan</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#gallery">
                                        Gallery</a>
                                </li>
                            </ul>
                        </div>
                </div>
            </section>
        </nav>


        <section id="overview" class="bg_inner_img innerpage_80vh">
            <div id='proslider' class='carousel slide' data-ride='carousel'>
                <div class='carousel-inner'>
                    <div class='carousel-item active'>
                        <img class='d-block' src="{{ asset('public/assets/images/projects') }}/{{$project->banner}}" width='1400'
                            height='600' alt='{{$project->meta_title}}'>
                        <div class='carousel-caption'>
                            <h1>{{$project->meta_title}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            function yes_js_login(e) {
                e.stopImmediatePropagation();
            }
        </script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?l=en&amp;phone=+971509260992&amp;text=I want more information on {{$project->name}}" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
<style>
    .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>
        <div class="projects">
            <section class="pro_overview">
                <section class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-lg-3 order-md-2" id="enq">
                            <aside class="card enq-form">
                                <div class="card-header">
                                    Get In Touch <span class="close d-block  d-sm-block ">&times;</span>
                                </div>
                                <div class="card-body">
                                    <div id="ProjectQuickContact_contact_form" class="contact-form">
                                        <div class="loader_formhideContent" id="lfpqc">
                                            <img id="imgWaitClose4" class="loaderImgResize"
                                                src="/assets/img/loading.gif" alt="Please wait..." />
                                        </div>
                                        <div class="form-group">
                                            <label for="txtname"></label>
                                            <input type="text" id="txtname" name="n" placeholder="Name *"
                                                class="form-control name" />
                                        </div>
                                        <div class="form-group">
                                            <label for="txtemail"></label>
                                            <input id="txtemail" type="email" name="e"
                                                placeholder="Email Id *" class="form-control email" />
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="ddlCountryCode"></label>
                                                    <select id="ddlCountryCode" name="cc"
                                                        class="form-control code">
                                                        <option selected="selected" value="Code">Code</option>
                                                        <option data-countryCode="DZ" value="213">Algeria (+213)
                                                        </option>
                                                        <option data-countryCode="AD" value="376">Andorra (+376)
                                                        </option>
                                                        <option data-countryCode="AO" value="244">Angola (+244)
                                                        </option>
                                                        <option data-countryCode="AI" value="1264">Anguilla (+1264)
                                                        </option>
                                                        <option data-countryCode="AG" value="1268">Antigua &amp;
                                                            Barbuda (+1268)</option>
                                                        <option data-countryCode="AR" value="54">Argentina (+54)
                                                        </option>
                                                        <option data-countryCode="AM" value="374">Armenia (+374)
                                                        </option>
                                                        <option data-countryCode="AW" value="297">Aruba (+297)
                                                        </option>
                                                        <option data-countryCode="AU" value="61">Australia (+61)
                                                        </option>
                                                        <option data-countryCode="AT" value="43">Austria (+43)
                                                        </option>
                                                        <option data-countryCode="AZ" value="994">Azerbaijan (+994)
                                                        </option>
                                                        <option data-countryCode="BS" value="1242">Bahamas (+1242)
                                                        </option>
                                                        <option data-countryCode="BH" value="973">Bahrain (+973)
                                                        </option>
                                                        <option data-countryCode="BD" value="880">Bangladesh (+880)
                                                        </option>
                                                        <option data-countryCode="BB" value="1246">Barbados (+1246)
                                                        </option>
                                                        <option data-countryCode="BY" value="375">Belarus (+375)
                                                        </option>
                                                        <option data-countryCode="BE" value="32">Belgium (+32)
                                                        </option>
                                                        <option data-countryCode="BZ" value="501">Belize (+501)
                                                        </option>
                                                        <option data-countryCode="BJ" value="229">Benin (+229)
                                                        </option>
                                                        <option data-countryCode="BM" value="1441">Bermuda (+1441)
                                                        </option>
                                                        <option data-countryCode="BT" value="975">Bhutan (+975)
                                                        </option>
                                                        <option data-countryCode="BO" value="591">Bolivia (+591)
                                                        </option>
                                                        <option data-countryCode="BA" value="387">Bosnia
                                                            Herzegovina (+387)</option>
                                                        <option data-countryCode="BW" value="267">Botswana (+267)
                                                        </option>
                                                        <option data-countryCode="BR" value="55">Brazil (+55)
                                                        </option>
                                                        <option data-countryCode="BN" value="673">Brunei (+673)
                                                        </option>
                                                        <option data-countryCode="BG" value="359">Bulgaria (+359)
                                                        </option>
                                                        <option data-countryCode="BF" value="226">Burkina Faso
                                                            (+226)</option>
                                                        <option data-countryCode="BI" value="257">Burundi (+257)
                                                        </option>
                                                        <option data-countryCode="KH" value="855">Cambodia (+855)
                                                        </option>
                                                        <option data-countryCode="CM" value="237">Cameroon (+237)
                                                        </option>
                                                        <option data-countryCode="CA" value="1">Canada (+1)
                                                        </option>
                                                        <option data-countryCode="CV" value="238">Cape Verde
                                                            Islands (+238)</option>
                                                        <option data-countryCode="KY" value="1345">Cayman Islands
                                                            (+1345)</option>
                                                        <option data-countryCode="CF" value="236">Central African
                                                            Republic (+236)</option>
                                                        <option data-countryCode="CL" value="56">Chile (+56)
                                                        </option>
                                                        <option data-countryCode="CN" value="86">China (+86)
                                                        </option>
                                                        <option data-countryCode="CO" value="57">Colombia (+57)
                                                        </option>
                                                        <option data-countryCode="KM" value="269">Comoros (+269)
                                                        </option>
                                                        <option data-countryCode="CG" value="242">Congo (+242)
                                                        </option>
                                                        <option data-countryCode="CK" value="682">Cook Islands
                                                            (+682)</option>
                                                        <option data-countryCode="CR" value="506">Costa Rica (+506)
                                                        </option>
                                                        <option data-countryCode="HR" value="385">Croatia (+385)
                                                        </option>
                                                        <option data-countryCode="CU" value="53">Cuba (+53)
                                                        </option>
                                                        <option data-countryCode="CY" value="90392">Cyprus North
                                                            (+90392)</option>
                                                        <option data-countryCode="CY" value="357">Cyprus South
                                                            (+357)</option>
                                                        <option data-countryCode="CZ" value="42">Czech Republic
                                                            (+42)</option>
                                                        <option data-countryCode="DK" value="45">Denmark (+45)
                                                        </option>
                                                        <option data-countryCode="DJ" value="253">Djibouti (+253)
                                                        </option>
                                                        <option data-countryCode="DM" value="1809">Dominica (+1809)
                                                        </option>
                                                        <option data-countryCode="DO" value="1809">Dominican
                                                            Republic (+1809)</option>
                                                        <option data-countryCode="EC" value="593">Ecuador (+593)
                                                        </option>
                                                        <option data-countryCode="EG" value="20">Egypt (+20)
                                                        </option>
                                                        <option data-countryCode="SV" value="503">El Salvador
                                                            (+503)</option>
                                                        <option data-countryCode="GQ" value="240">Equatorial Guinea
                                                            (+240)</option>
                                                        <option data-countryCode="ER" value="291">Eritrea (+291)
                                                        </option>
                                                        <option data-countryCode="EE" value="372">Estonia (+372)
                                                        </option>
                                                        <option data-countryCode="ET" value="251">Ethiopia (+251)
                                                        </option>
                                                        <option data-countryCode="FK" value="500">Falkland Islands
                                                            (+500)</option>
                                                        <option data-countryCode="FO" value="298">Faroe Islands
                                                            (+298)</option>
                                                        <option data-countryCode="FJ" value="679">Fiji (+679)
                                                        </option>
                                                        <option data-countryCode="FI" value="358">Finland (+358)
                                                        </option>
                                                        <option data-countryCode="FR" value="33">France (+33)
                                                        </option>
                                                        <option data-countryCode="GF" value="594">French Guiana
                                                            (+594)</option>
                                                        <option data-countryCode="PF" value="689">French Polynesia
                                                            (+689)</option>
                                                        <option data-countryCode="GA" value="241">Gabon (+241)
                                                        </option>
                                                        <option data-countryCode="GM" value="220">Gambia (+220)
                                                        </option>
                                                        <option data-countryCode="GE" value="7880">Georgia (+7880)
                                                        </option>
                                                        <option data-countryCode="DE" value="49">Germany (+49)
                                                        </option>
                                                        <option data-countryCode="GH" value="233">Ghana (+233)
                                                        </option>
                                                        <option data-countryCode="GI" value="350">Gibraltar (+350)
                                                        </option>
                                                        <option data-countryCode="GR" value="30">Greece (+30)
                                                        </option>
                                                        <option data-countryCode="GL" value="299">Greenland (+299)
                                                        </option>
                                                        <option data-countryCode="GD" value="1473">Grenada (+1473)
                                                        </option>
                                                        <option data-countryCode="GP" value="590">Guadeloupe (+590)
                                                        </option>
                                                        <option data-countryCode="GU" value="671">Guam (+671)
                                                        </option>
                                                        <option data-countryCode="GT" value="502">Guatemala (+502)
                                                        </option>
                                                        <option data-countryCode="GN" value="224">Guinea (+224)
                                                        </option>
                                                        <option data-countryCode="GW" value="245">Guinea - Bissau
                                                            (+245)</option>
                                                        <option data-countryCode="GY" value="592">Guyana (+592)
                                                        </option>
                                                        <option data-countryCode="HT" value="509">Haiti (+509)
                                                        </option>
                                                        <option data-countryCode="HN" value="504">Honduras (+504)
                                                        </option>
                                                        <option data-countryCode="HK" value="852">Hong Kong (+852)
                                                        </option>
                                                        <option data-countryCode="HU" value="36">Hungary (+36)
                                                        </option>
                                                        <option data-countryCode="IS" value="354">Iceland (+354)
                                                        </option>
                                                        <option data-countryCode="IN" value="91">India (+91)
                                                        </option>
                                                        <option data-countryCode="ID" value="62">Indonesia (+62)
                                                        </option>
                                                        <option data-countryCode="IR" value="98">Iran (+98)
                                                        </option>
                                                        <option data-countryCode="IQ" value="964">Iraq (+964)
                                                        </option>
                                                        <option data-countryCode="IE" value="353">Ireland (+353)
                                                        </option>
                                                        <option data-countryCode="IL" value="972">Israel (+972)
                                                        </option>
                                                        <option data-countryCode="IT" value="39">Italy (+39)
                                                        </option>
                                                        <option data-countryCode="JM" value="1876">Jamaica (+1876)
                                                        </option>
                                                        <option data-countryCode="JP" value="81">Japan (+81)
                                                        </option>
                                                        <option data-countryCode="JO" value="962">Jordan (+962)
                                                        </option>
                                                        <option data-countryCode="KZ" value="7">Kazakhstan (+7)
                                                        </option>
                                                        <option data-countryCode="KE" value="254">Kenya (+254)
                                                        </option>
                                                        <option data-countryCode="KI" value="686">Kiribati (+686)
                                                        </option>
                                                        <option data-countryCode="KP" value="850">Korea North
                                                            (+850)</option>
                                                        <option data-countryCode="KR" value="82">Korea South (+82)
                                                        </option>
                                                        <option data-countryCode="KW" value="965">Kuwait (+965)
                                                        </option>
                                                        <option data-countryCode="KG" value="996">Kyrgyzstan (+996)
                                                        </option>
                                                        <option data-countryCode="LA" value="856">Laos (+856)
                                                        </option>
                                                        <option data-countryCode="LV" value="371">Latvia (+371)
                                                        </option>
                                                        <option data-countryCode="LB" value="961">Lebanon (+961)
                                                        </option>
                                                        <option data-countryCode="LS" value="266">Lesotho (+266)
                                                        </option>
                                                        <option data-countryCode="LR" value="231">Liberia (+231)
                                                        </option>
                                                        <option data-countryCode="LY" value="218">Libya (+218)
                                                        </option>
                                                        <option data-countryCode="LI" value="417">Liechtenstein
                                                            (+417)</option>
                                                        <option data-countryCode="LT" value="370">Lithuania (+370)
                                                        </option>
                                                        <option data-countryCode="LU" value="352">Luxembourg (+352)
                                                        </option>
                                                        <option data-countryCode="MO" value="853">Macao (+853)
                                                        </option>
                                                        <option data-countryCode="MK" value="389">Macedonia (+389)
                                                        </option>
                                                        <option data-countryCode="MG" value="261">Madagascar (+261)
                                                        </option>
                                                        <option data-countryCode="MW" value="265">Malawi (+265)
                                                        </option>
                                                        <option data-countryCode="MY" value="60">Malaysia (+60)
                                                        </option>
                                                        <option data-countryCode="MV" value="960">Maldives (+960)
                                                        </option>
                                                        <option data-countryCode="ML" value="223">Mali (+223)
                                                        </option>
                                                        <option data-countryCode="MT" value="356">Malta (+356)
                                                        </option>
                                                        <option data-countryCode="MH" value="692">Marshall Islands
                                                            (+692)</option>
                                                        <option data-countryCode="MQ" value="596">Martinique (+596)
                                                        </option>
                                                        <option data-countryCode="MR" value="222">Mauritania (+222)
                                                        </option>
                                                        <option data-countryCode="YT" value="269">Mayotte (+269)
                                                        </option>
                                                        <option data-countryCode="MX" value="52">Mexico (+52)
                                                        </option>
                                                        <option data-countryCode="FM" value="691">Micronesia (+691)
                                                        </option>
                                                        <option data-countryCode="MD" value="373">Moldova (+373)
                                                        </option>
                                                        <option data-countryCode="MC" value="377">Monaco (+377)
                                                        </option>
                                                        <option data-countryCode="MN" value="976">Mongolia (+976)
                                                        </option>
                                                        <option data-countryCode="MS" value="1664">Montserrat
                                                            (+1664)</option>
                                                        <option data-countryCode="MA" value="212">Morocco (+212)
                                                        </option>
                                                        <option data-countryCode="MZ" value="258">Mozambique (+258)
                                                        </option>
                                                        <option data-countryCode="MN" value="95">Myanmar (+95)
                                                        </option>
                                                        <option data-countryCode="NA" value="264">Namibia (+264)
                                                        </option>
                                                        <option data-countryCode="NR" value="674">Nauru (+674)
                                                        </option>
                                                        <option data-countryCode="NP" value="977">Nepal (+977)
                                                        </option>
                                                        <option data-countryCode="NL" value="31">Netherlands (+31)
                                                        </option>
                                                        <option data-countryCode="NC" value="687">New Caledonia
                                                            (+687)</option>
                                                        <option data-countryCode="NZ" value="64">New Zealand (+64)
                                                        </option>
                                                        <option data-countryCode="NI" value="505">Nicaragua (+505)
                                                        </option>
                                                        <option data-countryCode="NE" value="227">Niger (+227)
                                                        </option>
                                                        <option data-countryCode="NG" value="234">Nigeria (+234)
                                                        </option>
                                                        <option data-countryCode="NU" value="683">Niue (+683)
                                                        </option>
                                                        <option data-countryCode="NF" value="672">Norfolk Islands
                                                            (+672)</option>
                                                        <option data-countryCode="NP" value="670">Northern Marianas
                                                            (+670)</option>
                                                        <option data-countryCode="NO" value="47">Norway (+47)
                                                        </option>
                                                        <option data-countryCode="OM" value="968">Oman (+968)
                                                        </option>
                                                        <option data-countryCode="PK" value="92">Pakistan (+92)
                                                        </option>
                                                        <option data-countryCode="PW" value="680">Palau (+680)
                                                        </option>
                                                        <option data-countryCode="PA" value="507">Panama (+507)
                                                        </option>
                                                        <option data-countryCode="PG" value="675">Papua New Guinea
                                                            (+675)</option>
                                                        <option data-countryCode="PY" value="595">Paraguay (+595)
                                                        </option>
                                                        <option data-countryCode="PE" value="51">Peru (+51)
                                                        </option>
                                                        <option data-countryCode="PH" value="63">Philippines (+63)
                                                        </option>
                                                        <option data-countryCode="PL" value="48">Poland (+48)
                                                        </option>
                                                        <option data-countryCode="PT" value="351">Portugal (+351)
                                                        </option>
                                                        <option data-countryCode="PR" value="1787">Puerto Rico
                                                            (+1787)</option>
                                                        <option data-countryCode="QA" value="974">Qatar (+974)
                                                        </option>
                                                        <option data-countryCode="RE" value="262">Reunion (+262)
                                                        </option>
                                                        <option data-countryCode="RO" value="40">Romania (+40)
                                                        </option>
                                                        <option data-countryCode="RU" value="7">Russia (+7)
                                                        </option>
                                                        <option data-countryCode="RW" value="250">Rwanda (+250)
                                                        </option>
                                                        <option data-countryCode="SM" value="378">San Marino (+378)
                                                        </option>
                                                        <option data-countryCode="ST" value="239">Sao Tome &amp;
                                                            Principe (+239)</option>
                                                        <option data-countryCode="SA" value="966">Saudi Arabia
                                                            (+966)</option>
                                                        <option data-countryCode="SN" value="221">Senegal (+221)
                                                        </option>
                                                        <option data-countryCode="CS" value="381">Serbia (+381)
                                                        </option>
                                                        <option data-countryCode="SC" value="248">Seychelles (+248)
                                                        </option>
                                                        <option data-countryCode="SL" value="232">Sierra Leone
                                                            (+232)</option>
                                                        <option data-countryCode="SG" value="65">Singapore (+65)
                                                        </option>
                                                        <option data-countryCode="SK" value="421">Slovak Republic
                                                            (+421)</option>
                                                        <option data-countryCode="SI" value="386">Slovenia (+386)
                                                        </option>
                                                        <option data-countryCode="SB" value="677">Solomon Islands
                                                            (+677)</option>
                                                        <option data-countryCode="SO" value="252">Somalia (+252)
                                                        </option>
                                                        <option data-countryCode="ZA" value="27">South Africa
                                                            (+27)</option>
                                                        <option data-countryCode="ES" value="34">Spain (+34)
                                                        </option>
                                                        <option data-countryCode="LK" value="94">Sri Lanka (+94)
                                                        </option>
                                                        <option data-countryCode="SH" value="290">St. Helena (+290)
                                                        </option>
                                                        <option data-countryCode="KN" value="1869">St. Kitts (+1869)
                                                        </option>
                                                        <option data-countryCode="SC" value="1758">St. Lucia (+1758)
                                                        </option>
                                                        <option data-countryCode="SD" value="249">Sudan (+249)
                                                        </option>
                                                        <option data-countryCode="SR" value="597">Suriname (+597)
                                                        </option>
                                                        <option data-countryCode="SZ" value="268">Swaziland (+268)
                                                        </option>
                                                        <option data-countryCode="SE" value="46">Sweden (+46)
                                                        </option>
                                                        <option data-countryCode="CH" value="41">Switzerland (+41)
                                                        </option>
                                                        <option data-countryCode="SI" value="963">Syria (+963)
                                                        </option>
                                                        <option data-countryCode="TW" value="886">Taiwan (+886)
                                                        </option>
                                                        <option data-countryCode="TJ" value="7">Tajikstan (+7)
                                                        </option>
                                                        <option data-countryCode="TH" value="66">Thailand (+66)
                                                        </option>
                                                        <option data-countryCode="TG" value="228">Togo (+228)
                                                        </option>
                                                        <option data-countryCode="TO" value="676">Tonga (+676)
                                                        </option>
                                                        <option data-countryCode="TT" value="1868">Trinidad &amp;
                                                            Tobago (+1868)</option>
                                                        <option data-countryCode="TN" value="216">Tunisia (+216)
                                                        </option>
                                                        <option data-countryCode="TR" value="90">Turkey (+90)
                                                        </option>
                                                        <option data-countryCode="TM" value="7">Turkmenistan (+7)
                                                        </option>
                                                        <option data-countryCode="TM" value="993">Turkmenistan
                                                            (+993)</option>
                                                        <option data-countryCode="TC" value="1649">Turks &amp;
                                                            Caicos Islands (+1649)</option>
                                                        <option data-countryCode="TV" value="688">Tuvalu (+688)
                                                        </option>
                                                        <option data-countryCode="UG" value="256">Uganda (+256)
                                                        </option>
                                                        <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                                                        <option data-countryCode="UA" value="380">Ukraine (+380)
                                                        </option>
                                                        <option data-countryCode="AE" value="971">United Arab
                                                            Emirates (+971)</option>
                                                        <option data-countryCode="UY" value="598">Uruguay (+598)
                                                        </option>
                                                        <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                                        <option data-countryCode="UZ" value="7">Uzbekistan (+7)
                                                        </option>
                                                        <option data-countryCode="VU" value="678">Vanuatu (+678)
                                                        </option>
                                                        <option data-countryCode="VA" value="379">Vatican City
                                                            (+379)</option>
                                                        <option data-countryCode="VE" value="58">Venezuela (+58)
                                                        </option>
                                                        <option data-countryCode="VN" value="84">Vietnam (+84)
                                                        </option>
                                                        <option data-countryCode="VG" value="84">Virgin Islands -
                                                            British (+1284)</option>
                                                        <option data-countryCode="VI" value="84">Virgin Islands -
                                                            US (+1340)</option>
                                                        <option data-countryCode="WF" value="681">Wallis &amp;
                                                            Futuna (+681)</option>
                                                        <option data-countryCode="YE" value="969">Yemen
                                                            (North)(+969)</option>
                                                        <option data-countryCode="YE" value="967">Yemen
                                                            (South)(+967)</option>
                                                        <option data-countryCode="ZM" value="260">Zambia (+260)
                                                        </option>
                                                        <option data-countryCode="ZW" value="263">Zimbabwe (+263)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="txtphone"></label>
                                                    <input id="txtphone" name="c" type="number"
                                                        placeholder="Contact No * " class="form-control phone" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtmsg"></label>
                                            <input type="text" id="txtmsg" placeholder="Enter Message"
                                                class="form-control message" />
                                           
                                        </div>
                                        <div class="form-group">
                                            <span id="" class="submit_mess green">&nbsp;</span>
                                        </div>
                                        <div class="form-group">
                                            <button id="" type="button"
                                                class="btn btn-block btn_custom btn-rounded messagebtn">
                                                Send Message</button>
                                        </div>
                                        <div>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="commission">
                                            <ul>
                                                <li><i class="fa fa-phone"></i>
                                                    <a href="tel:+971509260992" title="Call Us">+971 50 926 0992</a>
                                                </li>
                                                <li><i class="fa fa-whatsapp"></i>
                                                    <a rel="nofollow"
                                                        href="https://api.whatsapp.com/send?l=en&amp;phone=+971509260992&amp;text=I want more information on {{$project->name}}"
                                                        target="_blank">+971 50 926 0992</a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                </div>
                            </aside>
                        </div>
                        <div class="col-md-12 col-lg-9 order-md-1" itemprop="offers" itemscope
                            itemtype="http://schema.org/Offer">
                            <div class="row">
                                <div class="col-md-8">
                                    <div id="divPathMenu" class="breadcrumb"><a class='breadcrumb-item'
                                            href='{{ route('index') }}'><i class='fa fa-home'></i>&nbsp;
                                            Home</a><span class='breadcrumb-item'>{{$project->name}}</span><span
                                            class='breadcrumb-item active'>Overview</span></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="download">
                                        <a href="{{ route('brochure',$project->slug) }}" class="brochuremodalbtn">Download
                                            Brochure</a>
                                    </div>
                                </div>
                            </div>
                            <div id="divSummary" class="card pro_head mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h2 class="titles"><span itemprop="name">{{$project->name}}</span>
                                                
                                            </h2>
                                            <h3 class="location">By <strong><a title="Sobha Group"
                                                        href="javascript:;">
                                                        {{$project->developer}}</a> </strong>&nbsp; | &nbsp; <a
                                                    title="Sobha Hartland"
                                                    href="javascript:;">
                                                    <i class="fa fa-map-marker"></i>&nbsp; {{$project->community}}</a>
                                            </h3>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="price-head">
                                                <a>
                                                    <label for="lblStartingPrice">Starting From</label>
                                                    <h2 id="lblStartingPrice" itemprop="price"><span
                                                            id="lblPriceId">AED {{$project->price}}</span>&nbsp;<i id="pricehsid"
                                                            class="fa fa-info-circle" aria-hidden="true"
                                                            data-toggle="modal" data-target="#Priceinfo"></i></h2>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offers">
                                        <span>Status</span> <a title="Sobha One" href="javascript:;">
                                            {{$project->status}}</a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table summmry">
                                                <tbody id="SummarId">
                                                    @if($project->property_type)
                                                    <tr>
                                                        <th><i class='fa fa-building-o'></i>Property Type: </th>
                                                        <td>{{$project->property_type}}</td>
                                                    </tr>
                                                    @endif
                                                    @if($project->unit_type)
                                                    <tr>
                                                        <th><i class='fa fa-bed'></i>Unit type: </th>
                                                        <td><a href="javascript:;">{{$project->unit_type}}</a>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if($project->plot_size)
                                                    <tr>
                                                        <th><i class='fa fa-area-chart'></i>Size: </th>
                                                        <td>{{$project->plot_size}} <i class='fa fa-info-circle'
                                                                aria-hidden='true' data-toggle='modal'
                                                                data-target='#Sizeinfo'></i></td>
                                                    </tr>
                                                    @endif
                                                    @if($project->property_sub_type)
                                                    <tr>
                                                        <th><i class='fa fa-building-o'></i>Property Type: </th>
                                                        <td>{{$project->property_sub_type}}</td>
                                                    </tr>
                                                    @endif
                                                    @if($project->built_up_area)
                                                    <tr>
                                                        <th><i class='fa fa-area-chart'></i>Size: </th>
                                                        <td>{{$project->built_up_area}} <i class='fa fa-info-circle'
                                                                aria-hidden='true' data-toggle='modal'
                                                                data-target='#Sizeinfo'></i></td>
                                                    </tr>
                                                    @endif
                                                    @if($project->down_payment)
                                                    <tr>
                                                        <th><i class='fa fa-percent'></i>Down Payment: </th>
                                                        <td>{{$project->down_payment}}</td>
                                                    </tr>
                                                    @endif
                                                    @if($project->payment_plan)
                                                    <tr>
                                                        <th><i class='fa fa-money'></i>Payment Plan: </th>
                                                        <td><a href='javascript:;'>{{$project->payment_plan}}</a></td>
                                                    </tr>
                                                    @endif
                                                    @if($project->handover)
                                                    <tr>
                                                        <th><i class='fa fa-calendar-check-o'></i>Handover: </th>
                                                        <td>{{$project->handover}}</td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="projoffer">
                            </div>
                            <div class="card mt-4" id="gallery">
                                <div class="card-body">
                                    <h3><span>Image Gallery</span></h3>
                                    <div id="divImageGallery" class="row banner_sec lightgallery">
                                        <div class='col-md-8'><a
                                                href='{{ asset('public/assets/images/projects') }}/{{$project->banner}}'><img
                                                    src='{{ asset('public/assets/images/projects') }}/{{$project->banner}}'
                                                    width='900' height='600'
                                                    data-echo='{{ asset('public/assets/images/projects') }}/{{$project->banner}}'
                                                    alt='' class='img-fluid cover'></a></div>
                                        <div class='col-md-4'>
                                            @php
                                                $imagescount = Count($images);
                                            @endphp
                                            @foreach($images as $row)
                                            <div class='banner_holder'> <a
                                                    href='{{ asset('public/assets/images/projects/gallery') }}/{{$row->image}}'> <img
                                                        src='{{ asset('public/assets/images/projects/gallery') }}/{{$row->image}}'
                                                        width='900' height='600'
                                                        data-echo='{{ asset('public/assets/images/projects/gallery') }}/{{$row->image}}'
                                                        alt='{{$row->title}}' class='img-fluid cover'><span class="more-img-count"></span></a> </div>
                                                        @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card overview" id="over">
                                <div class="card-body">
                                    <h3><span>Overview</span></h3>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="row">
                                                {{-- <div class="col-md-5">
                                                    <h4>Key Highlights:</h4>
                                                    <ul>
                                                        <li>1 to 4 bedroom apartments and 2 to 4 bedroom duplexes</li>
                                                        <li>One of its kind five residential high-rise towers</li>
                                                        <li>Premium amenities and sky garden like facilities</li>
                                                        <li>Top notch golf course in access</li>
                                                        <li>Lifestyle amidst lush greenery</li>
                                                        <li>Waterfront lifestyle with private facilities</li>
                                                    </ul>
                                                </div> --}}
                                                <div class="col-md-12">
                                                   <div  style="color:white">
                                                        {!!$project->description!!}
                                                   </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="ProjConfig">
                            </div>
                            
                            <div class="card mt-4" id="pay">
                                <div class="card-body">
                                    <h3><span>Payment Plan</span></h3>
                                    <div class="download float-right">
                                        <a href="{{ route('payment.plan',$project->slug) }}" id="trackBrochure2">Download Payment
                                            Plan </a>
                                    </div>
                                    <div id="paymentplanId" class="shortpayment">
                                        <div class='paymentplan'>
                                            <div class='row'>
                                                <div class='col-md-4 col-lg-3'>
                                                    <div class='pay-box'>
                                                        <img src='{{ asset('public/assets/images/down-payment.webp') }}'
                                                            width='128' height='128' alt='Down Payment' />
                                                        <h4>{{$project->down_payment}}<small>%</small></h4>
                                                        <h5>Down Payment</h5>
                                                        <span>On Booking Date</span>
                                                    </div>
                                                </div>
                                                <div class='col-md-3'>
                                                    <div class='pay-box'>
                                                        <img src='{{ asset('public/assets/images/during-construction.webp') }}'
                                                            width='128' height='128'
                                                            alt='During Construction' />
                                                        <h4>@if($details){{$details->during_construction}}@endif<small>%</small></h4>
                                                        <h5>During Construction</h5>

                                                        <span>
                                                            @if($details)
                                                            @if($details->during_construction == 20) 1st to 2nd Installment 
                                                            @elseif($details->during_construction == 30) 1st to 3rd Installment 
                                                            @elseif($details->during_construction == 40) 1st to 4th Installment 
                                                            @elseif($details->during_construction == 50) 1st to 5th Installment 
                                                            @elseif($details->during_construction == 60) 1st to 6th Installment 
                                                            @elseif($details->during_construction == 70) 1st to 7th Installment 
                                                            @elseif($details->during_construction == 80) 1st to 8th Installment 
                                                            @else($details->during_construction == 90) 1st to 9th Installment 
                                                            @endif
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class='col-md-3'>
                                                    <div class='pay-box'>
                                                        <img src='{{ asset('public/assets/images/handover.webp') }}'
                                                            width='128' height='128' alt='Handover' />
                                                        <h4>@if($details){{$details->handover_payment}}@endif<small>%</small></h4>
                                                        <h5>On Handover</h5>
                                                        <span>100% Completion</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                           
                            <div class="card mt-4" id="floorplan">
                                <div id="divFloorPlan" class="card-body">
                                    <h3><span>Floor Plan</span></h3>
                                    <div class="download float-right">
                                        <a href="{{ route('floor.plan',$project->slug) }}" id="trackBrochure3">Download Floor Plan
                                        </a>
                                    </div>
                                    <div class="blog-container-inner">
                                        <section class="gallery-area pb-80 elements3 innr-page">
                                            <div id="floor">
                                                <div class="row gallery-mrg">
                                                    <div class="floor-table">
                                                        <div id="floorplandtlId">
                                                            <table class='table table-class' id='floorplanlstId'>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Floor Plan</th>
                                                                        <th>Category</th>
                                                                        <th>Unit Type</th>
                                                                        <th>Floor Details</th>
                                                                        <th>Sizes</th>
                                                                        <th>Type</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($floorplans as $row)
                                                                    <tr>
                                                                        <td><a
                                                                                href='{{ asset('public/assets/images/floorplans') }}/{{$row->floorplan}}'><img
                                                                                    src='{{ asset('public/assets/images/floorplans') }}/{{$row->icon}}'
                                                                                    width='75' height='75'
                                                                                    alt='Type A, Variant 1'
                                                                                    class='floor-plan img-fluid'></a>
                                                                        </td>
                                                                        <td class='CategoryCaption'>{{$row->category}}</td>
                                                                        <td class='SubCategoryCaption'>{{$row->unit_type}}</td>
                                                                        <td><span>{{$row->floor_details}}</span></td>
                                                                        <td><span>{{$row->sizes}}</span></td>
                                                                        <td class='PropertyType'>{{$row->type}}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </div>
                                </div>
                            </div>
                            <div class="card mt-4" id="amenities">
                                <div class="card-body">
                                    <h3><span>Feature &amp; Amenities</span></h3>
                                    <div id="FeatureId" class="" style="color:white">
                                       @if($details) {{$details->features_details}} @endif
                                        <div class='features-item row'>
                                            @if($details)
                                           @php
                                               $amenities = explode(',',$details->amenities);
                                           @endphp
                                           
                                           @foreach($amenities as $row)
                                           @php
                                               $amenity = \App\Models\Amenity::where('id',$row)->first();
                                           @endphp
                                            @if($amenity)
                                            <div class='features col-md-3 col-6'>
                                                <div class='features-icon'>
                                                    <img src='{{ asset('public/assets/images/projects/amenities') }}/{{$amenity->icon}}'
                                                        alt='{{$amenity->name}}'>
                                                    <h5>{{$amenity->name}}</h5>
                                                    <h6>{{$amenity->description}}</h6>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div id="videoId" class="d-none">
                            </div>
                            @if($details)
                            <div class="card mt-4 location" id="location">
                                <div class="card-body">
                                    <h3><span>Location Map</span></h3>
                                    <div class="row">
                                        <div class="col-md-5 loc">
                                            <figure>
                                                <a href="{{ asset('public/assets/images/projects/documents') }}/{{$details->location }}">
                                                    <img src="{{ asset('public/assets/images/projects/documents') }}/{{$details->location}}"
                                                        alt=" Location Map" width="1000" height="500"
                                                        class="img-fluid">
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="col-md-7">
                                            <div id="LocConnectivityId" class="">
                                                <div class='location-item row' style=color:white"">
                                                    @if($details->location_details) {{$details->location_details}} @endif
                                                    @if($locations)
                                                    @foreach($locations as $row)
                                                    <div class='location col-md-3 col-6'>
                                                        <div class='location-icon'>
                                                            <img src='{{ asset('public/assets/images/projects/location') }}/{{$row->icon}}'
                                                                alt='{{$row->name}}'>
                                                            <h5>{{$row->name}}</h5>
                                                            <h6>{{$row->description}}</h6>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                </div>
                            </div>
                            @endif
                            @if($details)
                            <div class="card mt-4 location" id="masterplan">
                                <div class="card-body">
                                    <h3><span>Master Plan</span></h3>
                                    <div class="row">
                                         @if($details->master_details)
                                        <div class="col-md-5 loc">
                                            <figure>
                                                <a href="{{ asset('public/assets/images/projects/documents') }}/{{$details->master_plan}}">
                                                    <img src="{{ asset('public/assets/images/projects/documents') }}/{{$details->master_plan}}"
                                                        alt="Master Plan" width="1000" height="500"
                                                        class="img-fluid">
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="col-md-7" style="color:white">
                                            {{$details->master_details}} 
                                        </div>
                                        @else
                                        <div class="col-md-12 loc">
                                            <figure>
                                                <a href="{{ asset('public/assets/images/projects/documents') }}/{{$details->master_plan}}">
                                                    <img src="{{ asset('public/assets/images/projects/documents') }}/{{$details->master_plan}}"
                                                        alt="Master Plan" width="1000" height="500"
                                                        class="img-fluid">
                                                </a>
                                            </figure>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </section>
                {{-- <section class="similar_pro container-fluid text-center mt-5 mb-1">
          <div>
             <h2 itemprop="author" itemscope itemtype="http://schema.org/Person">Other Projects of
                <span itemprop="name">Sobha Group</span>
             </h2>
             <div class="row" id="moreprojectsId">
                <div class="col-md-4 col-lg-3">
                   <div class="card mb-5 shadow-sm">
                      <figure>
                         <a href="/Project-list.aspx?Project-Status=Under-Construction">
                         <span>Under Construction</span></a>
                         <a href="/Projects/One-Park-Avenue">
                         <img src="{{asset('public/assets/images/client-loader.gif" data-echo="https://manage.tanamiproperties.com/Project/Project_Index/446/Thumb/446.webp')}}"
                            width="534" height="360" alt="One Park Avenue" class="card-img-top cover" /></a>
                      </figure>
                      <div class="card-body p-3">
                         <span class="price tempprice">
                            <span>Starting From</span>
                            <h4 class="tempmoreprojectscss">AED 1,209,395</h4>
                            <input type="hidden" class="hdntempmoreprojectscss" value='1209395' />
                         </span>
                         <h5 class="card-title"><a href="/Projects/One-Park-Avenue">
                            One Park Avenue</a>
                         </h5>
                         <p class="address">
                            <a href="/Projects/One-Park-Avenue-Location">
                            <i class="fa fa-map-marker"></i>&nbsp; Al Merkadh (MBR City)</a>
                         </p>
                      </div>
                      <div class="card-footer">
                         <a href="/Projects/One-Park-Avenue" class="">View
                         Details</a>
                      </div>
                   </div>
                </div>
                <div class="col-md-4 col-lg-3">
                   <div class="card mb-5 shadow-sm">
                      <figure>
                         <a href="/Project-list.aspx?Project-Status=New-Launch">
                         <span>New Launch</span></a>
                         <a href="/Projects/Sobha-Waves-Opulence">
                         <img src="{{asset('public/assets/images/client-loader.gif" data-echo="https://manage.tanamiproperties.com/Project/Project_Index/1147/Thumb/1147.webp')}}"
                            width="534" height="360" alt="Sobha Waves Opulence" class="card-img-top cover" /></a>
                      </figure>
                      <div class="card-body p-3">
                         <span class="price tempprice">
                            <span>Starting From</span>
                            <h4 class="tempmoreprojectscss">AED 1.55 M</h4>
                            <input type="hidden" class="hdntempmoreprojectscss" value='1550000' />
                         </span>
                         <h5 class="card-title"><a href="/Projects/Sobha-Waves-Opulence">
                            Sobha Waves Opulence</a>
                         </h5>
                         <p class="address">
                            <a href="/Projects/Sobha-Waves-Opulence-Location">
                            <i class="fa fa-map-marker"></i>&nbsp; Al Merkadh (MBR City)</a>
                         </p>
                      </div>
                      <div class="card-footer">
                         <a href="/Projects/Sobha-Waves-Opulence" class="">View
                         Details</a>
                      </div>
                   </div>
                </div>
                <div class="col-md-4 col-lg-3">
                   <div class="card mb-5 shadow-sm">
                      <figure>
                         <a href="/Project-list.aspx?Project-Status=New-Launch">
                         <span>New Launch</span></a>
                         <a href="/Projects/Tranquility">
                         <img src="{{asset('public/assets/images/client-loader.gif" data-echo="https://manage.tanamiproperties.com/Project/Project_Index/839/Thumb/839.webp')}}"
                            width="534" height="360" alt="Tranquility" class="card-img-top cover" /></a>
                      </figure>
                      <div class="card-body p-3">
                         <span class="price tempprice">
                            <span>Starting From</span>
                            <h4 class="tempmoreprojectscss">AED 8,784,168</h4>
                            <input type="hidden" class="hdntempmoreprojectscss" value='8784168' />
                         </span>
                         <h5 class="card-title"><a href="/Projects/Tranquility">
                            Tranquility</a>
                         </h5>
                         <p class="address">
                            <a href="/Projects/Tranquility-Location">
                            <i class="fa fa-map-marker"></i>&nbsp; Al Merkadh (MBR City)</a>
                         </p>
                      </div>
                      <div class="card-footer">
                         <a href="/Projects/Tranquility" class="">View
                         Details</a>
                      </div>
                   </div>
                </div>
                <div class="col-md-4 col-lg-3">
                   <div class="card mb-5 shadow-sm">
                      <figure>
                         <a href="">
                         <span>Under Construction</span></a>
                         <a href="/Projects/Waves-Grande">
                         <img src="{{asset('public/assets/images/client-loader.gif" data-echo="https://manage.tanamiproperties.com/Project/Project_Index/954/Thumb/954.webp')}}"
                            width="534" height="360" alt="Waves Grande" class="card-img-top cover" /></a>
                      </figure>
                      <div class="card-body p-3">
                         <span class="price tempprice">
                            <span>Starting From</span>
                            <h4 class="tempmoreprojectscss">AED 1.2 Million</h4>
                            <input type="hidden" class="hdntempmoreprojectscss" value='1200221' />
                         </span>
                         <h5 class="card-title"><a href="/Projects/Waves-Grande">
                            Waves Grande</a>
                         </h5>
                         <p class="address">
                            <a href="/Projects/Waves-Grande-Location">
                            <i class="fa fa-map-marker"></i>&nbsp; Al Merkadh (MBR City)</a>
                         </p>
                      </div>
                      <div class="card-footer">
                         <a href="/Projects/Waves-Grande" class="">View
                         Details</a>
                      </div>
                   </div>
                </div>
             </div>
             <a href="/DeveloperDetails.aspx?Developer=Sobha-Group" class="btn btn-primary">
             View More</a>
          </div>
       </section> --}}
            </section>
        </div>
        <footer class="footer_detail" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
            <div class="container">

                <div class="fot_bor"></div>
                <div class="row pt-4 pb-5">
                    <div class="col-lg-12">
                        <div class=" text-center">
                            <p class="text-white mb-0 copyright">
                                &copy; 2023 <a href="/" style="color:white"> {{$project->name}} </a> All
                                Rights Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a href="#" class="back_top_angle_up">
            <i class="fa fa-angle-up"></i>
        </a>
        <div class="call-pont"style="display:none !important;">
            <ul>
                <li><a href="tel:+971526892790">
                        <span><i class="fa fa-phone"></i></span>
                        Call Us
                    </a>
                </li>
                <li><a href="mailto:info@homescope.ae" class="top-enq">
                        <span><i class="fa fa-envelope"></i></span>
                        Enquire Now</a>
                </li>
                <li><a rel="nofollow"
                        href="https://api.whatsapp.com/send?l=en&amp;phone= +971526892790&amp;text=I want more information on {{$project->name}}">
                        <span><i class="fa fa-whatsapp"></i></span>
                        WhatsApp
                    </a>
                </li>
            </ul>
        </div>
        <div class="modal fade" id="paybitcoin" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered bitcoin-modal" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-body p-0">
                        <div class="row">

                            <div class="col-md-12">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <center>
                                    <img src="{{ asset('public/check.png') }}" alt="check" class="img-fluid"
                                        style="width:100px" />
                                    <h3>Message Sent Sucessfully!</h3>
                                </center>
                            </div>
                        </div>
                        <div class="loader_formhideContent" id="loaderbit">
                            <img id="imgWaitClose4" class="loaderImgResize" src="/assets/img/loading.gif"
                                alt="Please wait..." />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('public/assets/js/tpjs.js') }}"></script>
    <script src="{{ asset('public/assets/js/font.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.messagebtn').attr('disabled', true);


            $('.email').keyup(function() {
                if ($(this).val().length != 0) {
                    $('.messagebtn').attr('disabled', false);
                } else {
                    $('.messagebtn').attr('disabled', true);
                }
            });
        });
        $(document).on('click', '.messagebtn', function() {

            var name = $('.name').val();
            var email = $('.email').val();
            var code = $('.code').val();
            var phone = $('.phone').val();
            var phone = code + phone;
            var message = $('.message').val();

            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };

            if (name == '' && email == '' && phone == '') {
                setTimeout(() => {
                    toastr.error("Please fill all fields!");
                }, 100);
            } else {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('store.lead') }}',
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        message: message
                    },
                    success: function(resp) {

                        $('.name').val('');
                        $('.email').val('');
                        $('.code').val('');
                        $('.phone').val('');
                        $('.message').val('');
                        // setTimeout(() => {
                        //   toastr.success("Message Sent Successfully!");
                        //   },100);

                        $('#paybitcoin').modal('show');

                    },
                    error: function(resp) {
                        console.log(resp);
                    }
                });
            }

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#font-setting-basic').easyView({
                container: '#basic'
            });
            $('#font-setting-buttons').easyView({
                container: '#main',
                increaseSelector: '.increase-me',
                decreaseSelector: '.decrease-me',
                normalSelector: '.reset-me',
                contrastSelector: '.change-me'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var stickyToggle = function(sticky, stickyWrapper, scrollElement) {
                var stickyHeight = sticky.outerHeight();
                var stickyTop = stickyWrapper.offset().top;
                if (scrollElement.scrollTop() >= stickyTop) {
                    stickyWrapper.height(stickyHeight);
                    sticky.addClass("is-sticky");
                } else {
                    sticky.removeClass("is-sticky");
                    stickyWrapper.height('auto');
                }
                if ($(window).width() <= 500) {
                    sticky.removeClass("is-sticky");
                    stickyWrapper.height('auto');
                }
            };
            $('[data-toggle="sticky-onscroll"]').each(function() {
                var sticky = $(this);
                var stickyWrapper = $('<div>').addClass('sticky-wrapper');
                sticky.before(stickyWrapper);
                sticky.addClass('sticky');

                $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function() {
                    stickyToggle(sticky, stickyWrapper, $(this));
                });
                stickyToggle(sticky, stickyWrapper, $(window));
            });
            $('.top-enq').on("click", function() {
                $('.enq-form').addClass("open");
            });
            $('.close').on("click", function() {
                $('.enq-form').removeClass("open");
            });
            $('[data-toggle="modal"]').click(function() {
                var modalId = $(this).data('target');
                $(modalId).modal('show');
            });
            closeNav();
            fnPriceCurrency();
            fnbindddlSelectPrice();
            fnsetpriceconvert();
        });

        function openNav() {
            $("#mySidenav").css("width", "250px").css("right", "-35px");
            $("#main").addClass("bg-light");
        }

        function closeNav() {
            $("#mySidenav").css("width", "0").css("right", "-35px");
            $("#main").removeClass("bg-light");

        }
        $("body").on("click", function(e) {
            if (e.target.toString().indexOf("http") < 0) {
                if ($("#mySidenav").width() > 0) {
                    $("#mySidenav").css("width", "0").css("right", "-35px");
                    $("#main").removeClass("bg-light");
                }
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    document.getElementById('navbar_top').classList.add('fixed-top');
                    navbar_height = document.querySelector('.navbar').offsetHeight;
                    document.body.style.paddingTop = navbar_height + 'px';
                } else {
                    document.getElementById('navbar_top').classList.remove('fixed-top');
                    document.body.style.paddingTop = '0';
                }
            });
        });
    </script>
    
</body>

</html>
