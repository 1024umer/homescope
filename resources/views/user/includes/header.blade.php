<div class="navbar-area" style="background:#3E3C3D">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="/">
                        <img src="@if($generalsettings){{ asset('assets/images/logo') }}/{{ $generalsettings->logo }}@endif" class="main-logo" alt="Homescope Real Estate" style="width:150px">
                        <img src="@if($generalsettings){{ asset('assets/images/logo') }}/{{ $generalsettings->logo }}@endif" class="white-logo" alt="Homescope Real Estate" style="width:150px">
                    </a>
                </div>

            </div>

        </div>
    </div>

    <div class="desktop-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="@if($generalsettings){{ asset('assets/images/logo') }}/{{ $generalsettings->logo }}@endif" class="main-logo" alt="Homescope Real Estate" style="width:150px">
                    <img src="@if($generalsettings){{ asset('assets/images/logo') }}/{{ $generalsettings->logo }}@endif" class="white-logo" alt="Homescope Real Estate" style="width:150px">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{route('index')}}" class="nav-link active">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('secondary.property')}}" class="nav-link">
                                Secondary Properties
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('offplan.property')}}" class="nav-link">
                                Off Plan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('team')}}" class="nav-link">
                                Our Team
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{route('careers')}}" class="nav-link">
                               Careers
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('contact')}}" class="nav-link">Contact Us</a>
                        </li>

                    </ul>

                    <div class="others-options style">

                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!--<div class="nav-header nav-header-classic menu-space header-position header-white">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!--                        <nav class="navbar navbar-expand-lg">-->
<!--                            <a class="navbar-brand" href="{{route('index')}}">-->
<!--                                <img src="@if($generalsettings){{ asset('assets/images/logo') }}/{{ $generalsettings->logo }}@endif" alt="" style="width:150px"></a>-->
<!--                            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                                <span class="icon-bar"></span>-->
<!--                                <span class="icon-bar"></span>-->
<!--                                <span class="icon-bar"></span>-->
<!--                            </button>-->
<!--                            <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--                                <ul class="navbar-nav m-auto">-->
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" href="{{route('index')}}">Home-->
<!--                                        </a>-->

<!--                                    </li>-->
<!--                                    <li class="nav-item dropdown">-->
<!--                                        <a class="nav-link dropdown-toggle" href="/real-estate-properties-for-sale" id="projDropdown">-->
<!--                                            Projects-->
<!--                                        </a>-->
<!--                                        <ul class="dropdown-menu">-->
<!--                                            <li><a class="dropdown-item" href="new-launch-projects">New Launch</a></li><li><a class="dropdown-item" href="under-construction-projects">Under Construction</a></li><li><a class="dropdown-item" href="ready-to-move-in-projects">Ready to Move in</a></li><li><a class="dropdown-item" href="upcoming-projects">Upcoming</a></li>-->
<!--                                        </ul>-->
<!--                                    </li>-->

<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" href="#developers">Developers</a>-->
<!--                                    </li>-->
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" href="#communities">Communities</a>-->
<!--                                    </li>-->
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" href="/cities">Cities</a>-->
<!--                                    </li>-->
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" href="/locations">Locations</a>-->
<!--                                    </li>-->
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" href="/contact-us">Contact</a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                                <a href="tel:+971 50 926 0992" class="p-1 px-3 call d-none d-lg-block fw-bold"><i class="bi bi-telephone-outbound me-1"></i>+971 50 926 0992</a>-->
<!--                            </div>-->
<!--                        </nav>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
