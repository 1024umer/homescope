@php
    $generalsettings = \App\Models\GeneralSetting::find(1);
@endphp
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Homescope | Careers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="PRO Card - Material Resume / CV / vCard Template" />
    <meta name="keywords" content="vcard, resposnive, retina, resume, jquery, css3, bootstrap, Material CV, portfolio" />
    <meta name="author" content="lmtheme" />
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('career-assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('career-assets/css/normalize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('career-assets/css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('career-assets/css/transition-animations.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('career-assets/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('career-assets/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('career-assets/css/main-green.css') }}" type="text/css">

    <!-- This styles needs for demo -->
    <link rel="stylesheet" href="{{ asset('career-assets/css/lmpixels-demo-panel.css') }}" type="text/css">
    <!-- /This styles needs for demo -->

    <script src="{{ asset('career-assets/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('career-assets/js/modernizr.custom.js') }}"></script>
</head>
<style>
    .video-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: #0000009c;
        top: 0;
        left: 0;
        z-index: 2;
    }
</style>

<body class="material-template">
    <!-- Loading animation -->
    <div class="preloader">
        <div class="preloader-animation">
            <div class="preloader-spinner">
            </div>
        </div>
    </div>
    <!-- /Loading animation -->

    <div id="page" class="page">
        <!-- Header -->
        <header id="site_header" class="header mobile-menu-hide">
            <div class="header-content">
                <div class="site-title-block mobile-hidden">
                    <div class="site-title">HomeScope <span>Careers</span></div>
                </div>

                <!-- Navigation -->
                <div class="site-nav">
                    <!-- Main menu -->
                    <ul id="nav" class="site-main-menu">
                        <li>
                            <a class="pt-trigger" href="{{ route('index') }}">Home</a>
                        </li>
                        <li>
                            <a class="pt-trigger"
                                href="#careers">Careers</a><!-- href value = data-id without # of .pt-page. -->
                        </li>
                        {{-- <li>
            <a class="pt-trigger" href="#resume">Resume</a>
          </li>
          <li>
            <a class="pt-trigger" href="#services">Services</a>
          </li>
          <li>
            <a class="pt-trigger" href="#portfolio">Portfolio</a>
          </li>
          <li>
            <a class="pt-trigger" href="#blog">Blog</a>
          </li> --}}
                        <li>
                            <a class="pt-trigger" href="#apply">Apply</a>
                        </li>
                    </ul>
                    <!-- /Main menu -->
                </div>
                <!-- Navigation -->
            </div>
        </header>
        <!-- /Header -->
        <!-- Mobile Header -->
        <div class="mobile-header mobile-visible">
            <div class="mobile-logo-container">
                <div class="mobile-site-title">Homescope Careers</div>
            </div>

            <a class="menu-toggle mobile-visible">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <!-- /Mobile Header -->
        @if (Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                {{ Session::get('error') }}
                @php
                    Session::forget('error');
                @endphp
            </div>
        @endif

        <!-- Main Content -->
        <div id="main" class="site-main">
            <div class="pt-wrapper">
                <!-- Subpages -->
                <div class="subpages"
                    style="background: url('{{ asset('bg.jpeg') }}'),no-repeat center; background-size: cover; background-attachment: fixed;position:relative; height:100% ">
                    <div class="video-overlay"></div>
                    <!-- Home Subpage -->
                    <section class="pt-page" data-id="careers">
                        <div class="section-inner start-page-content">
                            <div class="video-overlay"></div>
                            <div class="page-header">
                                <video autoplay muted loop playsinline
                                    style="position: absolute; z-index:1; top: 0; left: 0; width: 100%; height: 100%; object-fit: fill;">
                                    <source src="{{ asset('assets/images/banner-video.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="row" style="position: relative;z-index: 999;">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <img width="50%" height="50%"
                                                src="@if ($generalsettings) {{ asset('assets/images/logo') }}/{{ $generalsettings->logo }} @endif"
                                                class="main-logo" alt=" Properties">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="title-block">
                                            <h1>Hiring!</h1>
                                            <div class="owl-carousel text-rotation">
                                                <div class="item">
                                                    <div class="sp-subtitle">We’re hiring Join us at Homescope now for
                                                        an amazing work culture "TOWARDS GROWING FUTURE"</div>
                                                </div>
                                                {{-- <div class="item">
                                                    <div class="sp-subtitle">Frontend-developer</div>
                                                    </div> --}}
                                            </div>
                                        </div>

                                        {{-- <div class="social-links">
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                            </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="page-content" style="">
                                <div class="row" style="position: relative; z-index: 999;">

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="about-me">
                                            <div class="block-title">
                                                <h3>About <span>Us</span></h3>
                                            </div>
                                            <p>Homescope Real Estate Company is a leading and reputable property
                                                development firm based in Dubai, United Arab Emirates. With a strong
                                                focus on quality, innovation, and customer satisfaction, Homescope has
                                                established itself as a trusted name in the real estate industry.</p>
                                        </div>
                                        <div class="block-title">
                                            <h3>Job <span>Description</span></h3>
                                        </div>
                                        <ul class="info-list">
                                            <li><span class="title">Job Type: </span><span
                                                    class="value">Full-time</span></li>

                                            <li><span class="title">Job Timings: </span><span class="value">9 am - 6
                                                    pm Monday – Saturday (Sundays are off)</span></li>

                                        </ul>
                                        <div class="download-resume">
                                            <a href="#apply" class="btn btn-secondary">Apply Now</a>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">

                                        <div class="block-title">
                                            <h3>Preferred <span>Requirements</span></h3>
                                        </div>
                                        <ul class="info-list">
                                            <li><span class="title">1- Sales negotiation, communication, and client
                                                    relationship skills</span></li>
                                            <li><span class="title">2- Presentable with a professional image</span>
                                            </li>
                                            <li><span class="title">3- Financially stable to work on commission
                                                    basis</span></li>
                                            <li><span class="title">4- Content Creation (upto 2 videos a day)</span>
                                            </li>
                                            <li><span class="title">5- Generating leads from content and following up
                                                    with them</span></li>
                                            <li><span class="title">6- Scheduling meetings and site visits with
                                                    potential clients.</span></li>
                                            <li><span class="title">7- Advise clients on market conditions, prices,
                                                    and mortgage solutions</span></li>


                                        </ul>
                                        <div class="block-title">
                                            <h3>Benefits <span></span></h3>
                                        </div>
                                        <ul class="info-list">
                                            <li><span class="title">1- The employee will be entitled to 30 days of
                                                    annual vacation plus all UAE national holidays as per UAE labour
                                                    law.</span></li>
                                            <li><span class="title">2- Brand Building</span></li>
                                            <li><span class="title">3- Employment visa provided by the company</span>
                                            </li>
                                            <li><span class="title">4- Medical Health Insurance</span></li>
                                            <li><span class="title">5- Admin support </span></li>
                                            <li><span class="title">6- Photography and videography team</span></li>
                                            <li><span class="title">7- Assistance with RERA training course</span>
                                            </li>
                                            <li><span class="title">8- Company Exclusive Units</span></li>
                                            <li><span class="title">9- Potential Leads will be provided</span></li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End of Home Subpage -->

                    <!-- Resume Subpage -->
                    <section class="pt-page" data-id="resume">
                        <div class="section-inner custom-page-content">
                            <div class="page-header color-1">
                                <h2>Resume</h2>
                            </div>
                            <div class="page-content">

                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="block">
                                            <div class="block-title">
                                                <h3>Education</h3>
                                            </div>

                                            <div class="timeline">
                                                <!-- Education 1 -->
                                                <div class="timeline-item">
                                                    <h4 class="item-title">Specialization Course</h4>
                                                    <span class="item-period">2010</span>
                                                    <span class="item-small">Apple Inc.</span>
                                                    <p class="item-description">Mauris magna sapien, pharetra
                                                        consectetur fringilla vitae, interdum sed tortor.</p>
                                                </div>
                                                <!-- / Education 1 -->

                                                <!-- Education 2 -->
                                                <div class="timeline-item">
                                                    <h4 class="item-title">Specialization Course</h4>
                                                    <span class="item-period">2010</span>
                                                    <span class="item-small">Apple Inc.</span>
                                                    <p class="item-description">Mauris magna sapien, pharetra
                                                        consectetur fringilla vitae, interdum sed tortor.</p>
                                                </div>
                                                <!-- / Education 2 -->

                                                <!-- Education 3 -->
                                                <div class="timeline-item">
                                                    <h4 class="item-title">Specialization Course</h4>
                                                    <span class="item-period">2010</span>
                                                    <span class="item-small">Apple Inc.</span>
                                                    <p class="item-description">Mauris magna sapien, pharetra
                                                        consectetur fringilla vitae, interdum sed tortor.</p>
                                                </div>
                                                <!-- / Education 3 -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="block">
                                            <div class="block-title">
                                                <h3>Experience</h3>
                                            </div>

                                            <div class="timeline">
                                                <!-- Experience 1 -->
                                                <div class="timeline-item">
                                                    <h4 class="item-title">Frontend-developer</h4>
                                                    <span class="item-period">Dec 2012 - Current</span>
                                                    <span class="item-small">Web Agency</span>
                                                    <p class="item-description">Mauris magna sapien, pharetra
                                                        consectetur fringilla vitae, interdum sed tortor.</p>
                                                </div>
                                                <!-- / Experience 1 -->

                                                <!-- Experience 2 -->
                                                <div class="timeline-item">
                                                    <h4 class="item-title">Web Designer</h4>
                                                    <span class="item-period">Dec 2011 - Nov 2012</span>
                                                    <span class="item-small">Apple Inc.</span>
                                                    <p class="item-description">Mauris magna sapien, pharetra
                                                        consectetur fringilla vitae, interdum sed tortor.</p>
                                                </div>
                                                <!-- / Experience 2 -->

                                                <!-- Experience 3 -->
                                                <div class="timeline-item">
                                                    <h4 class="item-title">Graphic Designer</h4>
                                                    <span class="item-period">Jan 2010 - Dec 2011</span>
                                                    <span class="item-small">Apple Inc.</span>
                                                    <p class="item-description">Mauris magna sapien, pharetra
                                                        consectetur fringilla vitae, interdum sed tortor.</p>
                                                </div>
                                                <!-- / Experience 3 -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="block">
                                            <div class="block-title">
                                                <h3>Design <span>Skills</span></h3>
                                            </div>

                                            <div class="skills-info">
                                                <h4>Web Design</h4>
                                                <div class="skill-container">
                                                    <div class="skill-percentage skill-1"></div>
                                                </div>

                                                <h4>Graphic Design</h4>
                                                <div class="skill-container">
                                                    <div class="skill-percentage skill-2"></div>
                                                </div>

                                                <h4>Print Design</h4>
                                                <div class="skill-container">
                                                    <div class="skill-percentage skill-3"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="block">
                                            <div class="block-title">
                                                <h3>Coding <span>Skills</span></h3>
                                            </div>

                                            <div class="skills-info">
                                                <h4>HTML5</h4>
                                                <div class="skill-container">
                                                    <div class="skill-percentage skill-4"></div>
                                                </div>

                                                <h4>CSS3/LESS/SASS</h4>
                                                <div class="skill-container">
                                                    <div class="skill-percentage skill-5"></div>
                                                </div>

                                                <h4>jQuery</h4>
                                                <div class="skill-container">
                                                    <div class="skill-percentage skill-6"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Download Resume Button -->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="block">
                                            <div class="center download-resume">
                                                <a href="#" class="btn btn-secondary">Download Resume</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Download Resume Button -->

                            </div>
                        </div>
                    </section>
                    <!-- End of Resume Subpage -->


                    <!-- Services Subpage -->
                    <section class="pt-page" data-id="services">
                        <div class="section-inner custom-page-content">
                            <div class="page-header color-1">
                                <h2>Services</h2>
                            </div>
                            <div class="page-content">
                                <!-- My Services -->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="block-title">
                                            <h3>My <span>Services</span></h3>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="service-block">
                                            <div class="service-info">
                                                <!--<i class="service-icon fa fa-shopping-cart"></i>-->
                                                <div class="service-image">
                                                    <img src="images/service/web_design_icon.png"
                                                        alt="Responsive Design" class="mCS_img_loaded">
                                                </div>
                                                <h4>Web Design</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                    eiusmod tempor.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="service-block">
                                            <div class="service-info">
                                                <div class="service-image">
                                                    <img src="images/service/photography_icon.png" alt="Photography"
                                                        class="mCS_img_loaded">
                                                </div>
                                                <h4>Photography</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                    eiusmod tempor.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="service-block">
                                            <div class="service-info">
                                                <div class="service-image">
                                                    <img src="images/service/creativity_icon.png" alt="Creativity"
                                                        class="mCS_img_loaded">
                                                </div>
                                                <h4>Management</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                    eiusmod tempor.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="service-block">
                                            <div class="service-info">
                                                <div class="service-image">
                                                    <img src="images/service/advetising_icon.png" alt="Advetising"
                                                        class="mCS_img_loaded">
                                                </div>
                                                <h4>Advertising</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                    eiusmod tempor.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of My Services -->

                                <!-- Clients -->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="block-title">
                                            <h3>Clients</h3>
                                        </div>

                                        <div class="col-sm-4 col-md-2 subpage-block">
                                            <div class="client-block">
                                                <a href="#" target="_blank"><img
                                                        src="images/clients/client_1.png" alt="image"
                                                        class="mCS_img_loaded"></a>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-md-2 subpage-block">
                                            <div class="client-block">
                                                <a href="#" target="_blank"><img
                                                        src="images/clients/client_2.png" alt="image"
                                                        class="mCS_img_loaded"></a>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-md-2 subpage-block">
                                            <div class="client-block">
                                                <a href="#" target="_blank"><img
                                                        src="images/clients/client_3.png" alt="image"
                                                        class="mCS_img_loaded"></a>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-md-2 subpage-block">
                                            <div class="client-block">
                                                <a href="#" target="_blank"><img
                                                        src="images/clients/client_4.png" alt="image"
                                                        class="mCS_img_loaded"></a>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-md-2 subpage-block">
                                            <div class="client-block">
                                                <a href="#" target="_blank"><img
                                                        src="images/clients/client_5.png" alt="image"
                                                        class="mCS_img_loaded"></a>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-md-2 subpage-block">
                                            <div class="client-block">
                                                <a href="#" target="_blank"><img
                                                        src="images/clients/client_6.png" alt="image"
                                                        class="mCS_img_loaded"></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- End of Clients -->

                                <!-- Testimonials -->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="block-title">
                                            <h3>Testimonials</h3>
                                        </div>


                                        <div class="testimonials owl-carousel block">
                                            <!-- Testimonial 1 -->
                                            <div class="testimonial-item">
                                                <!-- Testimonial Author -->
                                                <div class="testimonial-credits">
                                                    <!-- Picture -->
                                                    <div class="testimonial-picture">
                                                        <img src="images/testimonials/testimonial_photo_1.jpg"
                                                            alt="">
                                                    </div>
                                                    <!-- /Picture -->
                                                    <!-- Testimonial author information -->
                                                    <div class="testimonial-author-info">
                                                        <p class="testimonial-author">Maria Richardson</p>
                                                        <p class="testimonial-firm">Lindsley's Lumber</p>
                                                    </div>
                                                </div>
                                                <!-- /Testimonial author information -->
                                                <!-- Testimonial Content -->
                                                <div class="testimonial-content">
                                                    <div class="testimonial-text">
                                                        <p>"Phasellus eu nunc tincidunt, ultricies elit vitae, pretium
                                                            eros. Sed sed ipsum sed massa."</p>
                                                    </div>
                                                </div>
                                                <!-- /Testimonial Content -->
                                            </div>
                                            <!-- End of Testimonial 1 -->

                                            <!-- Testimonial 2 -->
                                            <div class="testimonial-item">
                                                <!-- Testimonial Author -->
                                                <div class="testimonial-credits">
                                                    <!-- Picture -->
                                                    <div class="testimonial-picture">
                                                        <img src="images/testimonials/testimonial_photo_2.jpg"
                                                            alt="">
                                                    </div>
                                                    <!-- /Picture -->
                                                    <!-- Testimonial author information -->
                                                    <div class="testimonial-author-info">
                                                        <p class="testimonial-author">John Doe</p>
                                                        <p class="testimonial-firm">Apple Inc.</p>
                                                    </div>
                                                </div>
                                                <!-- /Testimonial author information -->
                                                <!-- Testimonial Content -->
                                                <div class="testimonial-content">
                                                    <div class="testimonial-text">
                                                        <p>"Vivamus porta dapibus tristique. Suspendisse et arcu eget
                                                            nisi convallis eleifend nec ac lorem.</p>
                                                    </div>
                                                </div>
                                                <!-- /Testimonial Content -->
                                            </div>
                                            <!-- End of Testimonial 2 -->

                                            <!-- Testimonial 3 -->
                                            <div class="testimonial-item">
                                                <!-- Testimonial Author -->
                                                <div class="testimonial-credits">
                                                    <!-- Picture -->
                                                    <div class="testimonial-picture">
                                                        <img src="images/testimonials/testimonial_photo_3.jpg"
                                                            alt="">
                                                    </div>
                                                    <!-- /Picture -->
                                                    <!-- Testimonial author information -->
                                                    <div class="testimonial-author-info">
                                                        <p class="testimonial-author">George McQueen</p>
                                                        <p class="testimonial-firm">Harmony House</p>
                                                    </div>
                                                </div>
                                                <!-- /Testimonial author information -->
                                                <!-- Testimonial Content -->
                                                <div class="testimonial-content">
                                                    <div class="testimonial-text">
                                                        <p>"Aliquam congue auctor lectus sed fermentum. Nulla ultricies
                                                            tellus quis sapien lacinia egestas."</p>
                                                    </div>
                                                </div>
                                                <!-- /Testimonial Content -->
                                            </div>
                                            <!-- End of Testimonial 3 -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Tesimonials -->

                                <!-- Pricing -->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="block-title">
                                            <h3>Pricing</h3>
                                        </div>

                                        <div class="lm-pricing row clearfix">
                                            <div class="lm-package-wrap col-md-4 default-col">
                                                <div class="lm-package">
                                                    <div class="lm-heading-row">
                                                        <span>Plan 1</span>
                                                    </div>
                                                    <div class="lm-pricing-row">
                                                        <span>$64</span>
                                                        <small>per month</small>
                                                    </div>

                                                    <div class="lm-button-row">
                                                        <a href="#" target="_self" class="btn btn-primary">Free
                                                            Trial</a>
                                                    </div>
                                                    <div class="lm-default-row">
                                                        Lorem ipsum dolor
                                                    </div>
                                                    <div class="lm-default-row">
                                                        Pellentesque scelerisque
                                                    </div>
                                                    <div class="lm-default-row">
                                                        Morbi eu sagittis
                                                    </div>
                                                    <div class="lm-default-row">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="lm-package-wrap col-md-4 highlight-col ">
                                                <div class="lm-package">
                                                    <div class="lm-heading-row">
                                                        <span>Plan 2</span>
                                                    </div>
                                                    <div class="lm-pricing-row">
                                                        <span>$128</span>
                                                        <small>per month</small>
                                                    </div>

                                                    <div class="lm-button-row">
                                                        <a href="#" target="_self" class="btn btn-primary">Free
                                                            Trial</a>
                                                    </div>
                                                    <div class="lm-default-row">
                                                        Lorem ipsum dolor
                                                    </div>
                                                    <div class="lm-default-row">
                                                        Pellentesque scelerisque
                                                    </div>
                                                    <div class="lm-default-row">
                                                        Morbi eu sagittis
                                                    </div>
                                                    <div class="lm-default-row">
                                                        Donec non diam
                                                    </div>
                                                    <div class="lm-default-row">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="lm-package-wrap col-md-4 default-col ">
                                                <div class="lm-package">
                                                    <div class="lm-heading-row">
                                                        <span>Plan 3</span>
                                                    </div>

                                                    <div class="lm-pricing-row">
                                                        <span>$256</span>
                                                        <small>per month</small>
                                                    </div>

                                                    <div class="lm-button-row">
                                                        <a href="#" target="_self" class="btn btn-primary">Free
                                                            Trial</a>
                                                    </div>

                                                    <div class="lm-default-row">
                                                        Lorem ipsum dolor
                                                    </div>
                                                    <div class="lm-default-row">
                                                        Pellentesque scelerisque
                                                    </div>
                                                    <div class="lm-default-row">
                                                        Morbi eu sagittis
                                                    </div>
                                                    <div class="lm-default-row">
                                                        Donec non diam
                                                    </div>
                                                    <div class="lm-default-row">
                                                        Aenean nec libero
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Pricing -->
                            </div>
                        </div>
                    </section>
                    <!-- End of Services Subpage -->


                    <!-- Portfolio Subpage -->
                    <section class="pt-page" data-id="portfolio">
                        <div class="section-inner custom-page-content">
                            <div class="page-header color-1">
                                <h2>Portfolio</h2>
                            </div>
                            <div class="page-content">

                                <!-- Portfolio Content -->
                                <div class="portfolio-content">

                                    <!-- Portfolio filter -->
                                    <ul id="portfolio_filters" class="portfolio-filters">
                                        <li class="active">
                                            <a class="filter btn btn-sm btn-link active" data-group="all">All</a>
                                        </li>
                                        <li>
                                            <a class="filter btn btn-sm btn-link" data-group="media">Media</a>
                                        </li>
                                        <li>
                                            <a class="filter btn btn-sm btn-link"
                                                data-group="illustration">Illustration</a>
                                        </li>
                                        <li>
                                            <a class="filter btn btn-sm btn-link" data-group="video">Video</a>
                                        </li>
                                    </ul>
                                    <!-- End of Portfolio filter -->

                                    <!-- Portfolio Grid -->
                                    <div id="portfolio_grid" class="portfolio-grid portfolio-masonry masonry-grid-3">

                                        <!-- Portfolio Item 1 -->
                                        <figure class="item" data-groups='["all", "media"]'>
                                            <a class="ajax-page-load" href="portfolio-1.html">
                                                <img src="images/portfolio/1.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Media</small>
                                                    <i class="fa fa-file-text-o"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 1 -->

                                        <!-- Portfolio Item 2 -->
                                        <figure class="item" data-groups='["all", "video"]'>
                                            <a href="https://player.vimeo.com/video/97102654?autoplay=1"
                                                title="Praesent Dolor Ex" class="lightbox mfp-iframe">
                                                <img src="images/portfolio/2.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Video</small>
                                                    <i class="fa fa-video-camera"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 2 -->

                                        <!-- Portfolio Item 3 -->
                                        <figure class="item" data-groups='["all","illustration"]'>
                                            <a href="images/portfolio/full/3.jpg" class="lightbox"
                                                title="Duis Eu Eros Viverra">
                                                <img src="images/portfolio/3.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Illustration</small>
                                                    <i class="fa fa-image"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 3 -->

                                        <!-- Portfolio Item 4 -->
                                        <figure class="item" data-groups='["all", "media"]'>
                                            <a class="ajax-page-load" href="portfolio-2.html">
                                                <img src="images/portfolio/4.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Media</small>
                                                    <i class="fa fa-file-text-o"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 4 -->

                                        <!-- Portfolio Item 5 -->
                                        <figure class="item" data-groups='["all", "illustration"]'>
                                            <a href="images/portfolio/full/5.jpg" class="lightbox"
                                                title="Aliquam Condimentum Magna Rhoncus">
                                                <img src="images/portfolio/5.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Illustration</small>
                                                    <i class="fa fa-image"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 5 -->

                                        <!-- Portfolio Item 6 -->
                                        <figure class="item" data-groups='["all", "media"]'>
                                            <a class="ajax-page-load" href="portfolio-3.html">
                                                <img src="images/portfolio/6.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Media</small>
                                                    <i class="fa fa-file-text-o"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 6 -->

                                        <!-- Portfolio Item 7 -->
                                        <figure class="item" data-groups='["all", "video"]'>
                                            <a href="https://player.vimeo.com/video/97102654?autoplay=1"
                                                title="Nulla Facilisi" class="lightbox mfp-iframe">
                                                <img src="images/portfolio/7.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Video</small>
                                                    <i class="fa fa-video-camera"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 7 -->

                                        <!-- Portfolio Item 8 -->
                                        <figure class="item" data-groups='["all",  "media"]'>
                                            <a class="ajax-page-load" href="portfolio-4.html">
                                                <img src="images/portfolio/8.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Media</small>
                                                    <i class="fa fa-file-text-o"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 8 -->

                                        <!-- Portfolio Item 9 -->
                                        <figure class="item" data-groups='["all","illustration"]'>
                                            <a href="images/portfolio/full/9.jpg" class="lightbox"
                                                title="Mauris Neque Dolor">
                                                <img src="images/portfolio/9.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Illustration</small>
                                                    <i class="fa fa-image"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 9 -->

                                        <!-- Portfolio Item 10 -->
                                        <figure class="item" data-groups='["all", "video"]'>
                                            <a href="https://player.vimeo.com/video/97102654?autoplay=1"
                                                title="Donec Lectus Arcu" class="lightbox mfp-iframe">
                                                <img src="images/portfolio/10.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Video</small>
                                                    <i class="fa fa-video-camera"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 10 -->

                                        <!-- Portfolio Item 11 -->
                                        <figure class="item" data-groups='["all","illustration"]'>
                                            <a href="images/portfolio/full/11.jpg" class="lightbox"
                                                title="Duis Eu Eros Viverra">
                                                <img src="images/portfolio/11.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Illustration</small>
                                                    <i class="fa fa-image"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 11 -->

                                        <!-- Portfolio Item 12 -->
                                        <figure class="item" data-groups='["all","media"]'>
                                            <a class="ajax-page-load" href="portfolio-5.html">
                                                <img src="images/portfolio/12.jpg" alt="">
                                                <div>
                                                    <h5 class="name">Project Name</h5>
                                                    <small>Media</small>
                                                    <i class="fa fa-file-text-o"></i>
                                                </div>
                                            </a>
                                        </figure>
                                        <!-- /Portfolio Item 12 -->
                                    </div>
                                    <!-- /Portfolio Grid -->

                                </div>
                                <!-- /Portfolio Content -->
                            </div>
                        </div>
                    </section>
                    <!-- /Portfolio Subpage -->

                    <!-- Blog Subpage -->
                    <section class="pt-page" data-id="blog">
                        <div class="section-inner custom-page-content">
                            <div class="page-header color-1">
                                <h2>Blog</h2>
                            </div>
                            <div class="page-content">

                                <!-- Blog Posts Grid -->
                                <div class="blog-masonry two-columns">
                                    <!-- Blog Post 1 -->
                                    <div class="item">
                                        <div class="blog-card">
                                            <div class="media-block">
                                                <a href="blog-post-1.html">
                                                    <img class="post-image img-responsive"
                                                        src="images/blog/blog_post_1.jpg" alt="blog-post-1" />
                                                    <div class="mask"></div>
                                                    <div class="post-date"><span class="day">6</span><span
                                                            class="month">Dec</span><!--<span class="year">2016</span>-->
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <ul class="category">
                                                    <li><a href="#">Travel</a></li>
                                                </ul>
                                                <a href="blog-post-1.html">
                                                    <h4 class="blog-item-title">Bootstrap is the Most Popular Framework
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Blog Post 1 -->

                                    <!-- Blog Post 2 -->
                                    <div class="item">
                                        <div class="blog-card">
                                            <div class="media-block">
                                                <a href="blog-post-1.html">
                                                    <img class="post-image img-responsive"
                                                        src="images/blog/blog_post_2.jpg" alt="blog-post-2" />
                                                    <div class="mask"></div>
                                                    <div class="post-date"><span class="day">3</span><span
                                                            class="month">Nov</span><!--<span class="year">2016</span>-->
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <ul class="category">
                                                    <li><a href="#">jQuery</a></li>
                                                </ul>
                                                <a href="blog-post-1.html">
                                                    <h4 class="blog-item-title">One Framework, Every Device</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Blog Post 2 -->

                                    <!-- Blog Post 3 -->
                                    <div class="item">
                                        <div class="blog-card">
                                            <div class="media-block">
                                                <a href="blog-post-1.html">
                                                    <img class="post-image img-responsive"
                                                        src="images/blog/blog_post_3.jpg" alt="blog-post-3" />
                                                    <div class="mask"></div>
                                                    <div class="post-date"><span class="day">12</span><span
                                                            class="month">Oct</span><!--<span class="year">2016</span>-->
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <ul class="category">
                                                    <li><a href="#">Sport</a></li>
                                                </ul>
                                                <a href="blog-post-1.html">
                                                    <h4 class="blog-item-title">Designed for Everyone, Everywhere</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Blog Post 3 -->

                                    <!-- Blog Post 4 -->
                                    <div class="item">
                                        <div class="blog-card">
                                            <div class="media-block">
                                                <a href="blog-post-1.html">
                                                    <img class="post-image img-responsive"
                                                        src="images/blog/blog_post_4.jpg" alt="blog-post-4" />
                                                    <div class="mask"></div>
                                                    <div class="post-date"><span class="day">18</span><span
                                                            class="month">Aug</span><!--<span class="year">2016</span>-->
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <ul class="category">
                                                    <li><a href="#">CSS</a></li>
                                                </ul>
                                                <a href="blog-post-1.html">
                                                    <h4 class="blog-item-title">An Introduction To PostCSS</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Blog Post 4 -->

                                    <!-- Blog Post 5 -->
                                    <div class="item">
                                        <div class="blog-card">
                                            <div class="media-block">
                                                <a href="blog-post-1.html">
                                                    <img class="post-image img-responsive"
                                                        src="images/blog/blog_post_5.jpg" alt="blog-post-5" />
                                                    <div class="mask"></div>
                                                    <div class="post-date"><span class="day">2</span><span
                                                            class="month">Jul</span><!--<span class="year">2016</span>-->
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <ul class="category">
                                                    <li><a href="#">CSS3</a></li>
                                                </ul>
                                                <a href="blog-post-1.html">
                                                    <h4 class="blog-item-title">Original and Innovative Web Layouts
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Blog Post 5 -->

                                    <!-- Blog Post 6 -->
                                    <div class="item">
                                        <div class="blog-card">
                                            <div class="media-block">
                                                <a href="blog-post-1.html">
                                                    <img class="post-image img-responsive"
                                                        src="images/blog/blog_post_6.jpg" alt="blog-post-6" />
                                                    <div class="mask"></div>
                                                    <div class="post-date"><span class="day">8</span><span
                                                            class="month">May</span><!--<span class="year">2016</span>-->
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <ul class="category">
                                                    <li><a href="#">HTML5</a></li>
                                                </ul>
                                                <a href="blog-post-1.html">
                                                    <h4 class="blog-item-title">Creative and Innovative Navigation
                                                        Designs</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Blog Post 6 -->

                                    <!-- Blog Post 7 -->
                                    <div class="item">
                                        <div class="blog-card">
                                            <div class="media-block">
                                                <a href="blog-post-1.html">
                                                    <img class="post-image img-responsive"
                                                        src="images/blog/blog_post_7.jpg" alt="blog-post-7" />
                                                    <div class="mask"></div>
                                                    <div class="post-date"><span class="day">7</span><span
                                                            class="month">Apr</span><!--<span class="year">2016</span>-->
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <ul class="category">
                                                    <li><a href="#">Design</a></li>
                                                </ul>
                                                <a href="blog-post-1.html">
                                                    <h4 class="blog-item-title">Navigation for Mega-Sites</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Blog Post 7 -->

                                    <!-- Blog Post 8 -->
                                    <div class="item">
                                        <div class="blog-card">
                                            <div class="media-block">
                                                <a href="blog-post-1.html">
                                                    <img class="post-image img-responsive"
                                                        src="images/blog/blog_post_8.jpg" alt="blog-post-8" />
                                                    <div class="mask"></div>
                                                    <div class="post-date"><span class="day">21</span><span
                                                            class="month">Mar</span><!--<span class="year">2016</span>-->
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <ul class="category">
                                                    <li><a href="#">CSS3</a></li>
                                                </ul>
                                                <a href="blog-post-1.html">
                                                    <h4 class="blog-item-title">Front-End Challenge Accepted: CSS 3D
                                                        Cube</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Blog Post 8 -->
                                </div>
                                <!-- Blog Posts Grid -->
                            </div>
                        </div>
                    </section>
                    <!-- /Blog Subpage -->

                    <!-- Contact Subpage -->
                    <section class="pt-page" data-id="apply">
                        <div class="section-inner custom-page-content">
                            <div class="page-header color-1">
                                <h2>Application</h2>
                            </div>
                            <div class="page-content">

                                <div class="row">
                                    {{-- <div class="col-sm-6 col-md-6">
                <div class="block-title">
                  <h3>Get in <span>Touch</span></h3>
                </div>

                <div class="contact-info-block">
                  <div class="ci-icon">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <div class="ci-text">
                    <h5>Los Angeles, USA</h5>
                  </div>
                </div>
                <div class="contact-info-block">
                  <div class="ci-icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="ci-text">
                    <h5><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="badbd6dfc2c9d7d3ced2fadfc2dbd7cad6df94d9d5d7">[email&#160;protected]</a></h5>
                  </div>
                </div>
                <div class="contact-info-block">
                  <div class="ci-icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <div class="ci-text">
                    <h5>+123 654 78900</h5>
                  </div>
                </div>
                <div class="contact-info-block">
                  <div class="ci-icon">
                    <i class="fa fa-check"></i>
                  </div>
                  <div class="ci-text">
                    <h5>Freelance Available</h5>
                  </div>
                </div>
              </div> --}}

                                    <div class="col-sm-12 col-md-12">
                                        <div class="block-title">
                                            <h3>Job <span>Application</span></h3>
                                        </div>
                                        <form id="" method="post" action="{{ route('application') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="messages"></div>

                                            <div class="controls">
                                                <div class="form-group form-group-with-icon">
                                                    <i class="fa fa-user"></i>
                                                    <label>Full Name</label>
                                                    <input id="form_name" type="text" name="full_name"
                                                        class="form-control" placeholder="Full Name">
                                                    <div class="form-control-border"></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group form-group-with-icon">
                                                    <i class="fa fa-user"></i>
                                                    <label>Email</label>
                                                    <input id="form_name" type="email" name="email"
                                                        class="form-control" placeholder="Email Address">
                                                    <div class="form-control-border"></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group form-group-with-icon">
                                                    <i class="fa fa-file"></i>
                                                    <label>Driving Licesne</label>
                                                    <input id="form_name" type="text" name="driving_license"
                                                        class="form-control" placeholder=" Driving License">
                                                    <div class="form-control-border"></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>

                                                <div class="form-group form-group-with-icon">
                                                    <i class="fa fa-car"></i>
                                                    <label>Car</label>
                                                    <input id="form_email" type="text" name="car"
                                                        class="form-control" placeholder=" Car">
                                                    <div class="form-control-border"></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group form-group-with-icon">
                                                    <i class="fa fa-shield"></i>
                                                    <label>Experience in dubai</label>
                                                    <input id="form_email" type="text" name="experience_in_dubai"
                                                        class="form-control" placeholder="Experience in Dubai">
                                                    <div class="form-control-border"></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group form-group-with-icon">
                                                    <i class="fa fa-signal"></i>
                                                    <label>Visa status</label>
                                                    <input id="form_email" type="text" name="visa_status"
                                                        class="form-control" placeholder="Visa Status">
                                                    <div class="form-control-border"></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group form-group-with-icon">
                                                    <i class="fa fa-calendar"></i>
                                                    <label>Visa Validity</label>
                                                    <input id="form_email" type="text" name="visa_validity"
                                                        class="form-control" placeholder="Visa Validity">
                                                    <div class="form-control-border"></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group form-group-with-icon">
                                                    <i class="fa fa-user"></i>
                                                    <label>Nationlity</label>
                                                    <input id="form_email" type="text" name="nationality"
                                                        class="form-control" placeholder="Nationality">
                                                    <div class="form-control-border"></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group form-group-with-icon">
                                                    <i class="fa fa-file"></i>
                                                    <label>Upload Resume</label>
                                                    <input id="form_email" type="file" name="resume"
                                                        class="form-control" placeholder="">
                                                    <div class="form-control-border"></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <input type="submit" class="button btn-send" value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Contact Subpage -->


                </div>
            </div>
            <footer>
                <div class="copyrights">© 2023 All rights reserved. Homescope.ae</div>
            </footer>
            <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="{{ asset('career-assets/js/pages-switcher.js') }}"></script>
            <script type="text/javascript" src="{{ asset('career-assets/js/imagesloaded.pkgd.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('career-assets/js/validator.js') }}"></script>
            <script type="text/javascript" src="{{ asset('career-assets/js/jquery.shuffle.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('career-assets/js/masonry.pkgd.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('career-assets/js/owl.carousel.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('career-assets/js/jquery.magnific-popup.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('career-assets/js/jquery.hoverdir.js') }}"></script>
            <script type="text/javascript"
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrDf32aQTCVENBhFJbMBKOUTiUAABtC2o"></script>
            <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>-->
            <script type="text/javascript" src="{{ asset('career-assets/js/jquery.googlemap.js') }}"></script>
            <script type="text/javascript" src="{{ asset('career-assets/js/main.js') }}"></script>
            <!-- Demo Color changer Script -->
            <script src="{{ asset('career-assets/js/lmpixels-demo-panel.js') }}"></script>
            <!-- /Demo Color changer Script -->
            <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039"
                integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g=="
                data-cf-beacon='{"rayId":"7e85a9bedb9d895c","version":"2023.4.0","r":1,"token":"94b99c0576dc45bf9d669fb5e9256829","si":100}'
                crossorigin="anonymous"></script>

</body>

</html>
