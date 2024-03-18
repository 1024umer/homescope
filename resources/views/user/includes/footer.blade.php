<div class="footer-area bg-dark pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <div class="single-footer-widget wow animate__animated animate__fadeInUp delay-0-2s">
                    <a href="{{route('index')}}">
                        <img src="@if($generalsettings){{ asset('assets/images/logo') }}/{{ $generalsettings->logo }}@endif" class="main-logo" alt="Homescope Real Estate">
                    </a>
                    <p class="w-75">The goal of Homescope,
                        a firm established in the United Arab Emirates, is to increase transparency in the UAE real estate market
                        by providing its clients with specialised real estate knowledge and exceptional experiences.</p>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget wow animate__animated animate__fadeInUp delay-0-6s">
                    <h3>Quick Links</h3>
                    <ul class="help-link">
                        <li>
                            <i class="fa fa-angle-right"></i>
                            <a href="{{route('index')}}">Home</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                            <a href="{{route('about')}}">About Us</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                            <a href="{{route('careers')}}">Careers</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                            <a href="{{route('contact')}}">Contact Us</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                            <a href="{{route('privacy.policy')}}">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="single-footer-widget wow animate__animated animate__fadeInUp delay-0-4s">
                    <h3>Contacts Info</h3>

                    <ul class="contact-info">
                        <li>
                            <i class="fa fa-map"></i>
                            Al Moosa Tower 2, Sheikh Zayed Road,<br />
                            Dubai, UAE.
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <a href="tel:+971522953747">+971 52 295 3747
                            </a> / <a href="tel:+971509260992">+971 50 926 0992
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-whatsapp"></i>
                            <a
                                href="https://api.whatsapp.com/send?phone=+971509260992&text=I want more information about Dubai Real Estate">+971 50 926 0992</a> /
                                <a
                                href="https://api.whatsapp.com/send?phone=+971522953747&text=I want more information about Dubai Real Estate">+971 52 295 3747</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:admin@homescope.ae">admin@homecope.ae</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="copy-right-area" style="background:#C59E53">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6 wow animate__animated animate__fadeInLeft delay-0-2s">
                <p>@ Copyright <span id="year"></span> <a href="/" style="color:#3E3C3D">@if ($generalsettings) {{$generalsettings->site_title}} @endif</a> - All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="go-top">
    <i class="fa fa-angle-up"></i>
</div>
<div class="fixed-whatsapp">
    <a href="https://wa.me/+971509260992?text=I want more information about Dubai Real Estate" target="_blank">
        <i class="fa fa-whatsapp"></i>
    </a>
</div>
