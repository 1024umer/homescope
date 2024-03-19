@extends('user.layout.master')
@section('content')
    <style>
        @media(max-width:768px) {
            video {
                width: 100%;
            }
        }

        .txt-grad {
            background: -webkit-linear-gradient(#EDBA35, #FED353);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .over-lay {
            background: #000000bd;
            width: 100%;
            height: 100%;
            position: absolute;
        }

        .can-hel-overlay {
            background: #000000ad;
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .video-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #0000009c;
            top: 0;
            left: 0;
            z-index: 2;
        }

        .featured_offers {
            background: transparent;
            padding: 0;
        }

        .featured_offers .heading span {
            color: #f0af0b;
        }

        .proj-list {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px !important;
        }
    </style>
    <div class="position-relative">
        <div class="py-md-23 py-22">
            <div class="video-overlay"></div>
            <video autoplay muted loop playsinline
                style="position: absolute; z-index:1; top: 0; left: 0; width: 100%; height: 100%; object-fit: fill;">
                <source src="{{ asset('assets/images/banner-video.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="mt-n22">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-md-12 col-12">
                        <div class="mb-md-12 text-center animate__zoomIn" style="position: relative;z-index:999">
                            <h2 class=" display-5 mb-2 fw-bold txt-grad">Welcome</h2>
                            <h1 class=" display-5 mb-2 fw-bold txt-grad">Homescope Real Estate</h1>
                            <p class=" txt-grad" style="font-size:30px;">Unlock Your Dream Home Today</p>
                            <!--<p class="text-white">Ready &amp; Off Plan Properties For Sale</p>-->
                        </div>
                        <div class="banner-rent-sale-form">
                            <div class="rent-sale-form wow animate__animated animate__fadeInUp delay-0-8s">
                                <h6 class="mb-3" style="color:#C59E53 !important">WHAT ARE YOU LOOKING FOR? <span
                                        class="small" style="color:white">(Easily find the
                                        house of your choice)</span></h6>
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="for-rent-tab" data-bs-toggle="pill"
                                            data-bs-target="#for-rent" type="button" role="tab"
                                            aria-controls="for-rent" aria-selected="false">Buy</button>
                                    </li>

                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="for-rent" role="tabpanel"
                                        aria-labelledby="for-rent-tab">
                                        <div class="row g-2">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <select id="PTTypebuyId" class="form-select form-control">
                                                        <option selected>Property Type</option>
                                                        <option value='appartment'>Apartment</option>
                                                        <option value='villa'>Villa</option>
                                                        <option value='townhouse'>Townhouse</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <input list="locoption" id="txtlocoptionbuyId" class="form-control"
                                                        placeholder="City Neighbourhood, Community">
                                                    <datalist id="locoption">
                                                        <option value='Damac Hills'>
                                                        <option value='Downtown Dubai'>
                                                        <option value='Dubai Creek Harbour'>
                                                        <option value='Dubai Investment Park'>
                                                        <option value='Dubailand'>
                                                        <option value='Marina'>
                                                        <option value='Meydan'>
                                                        <option value='Palm Jumeirah'>
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group mb-0">
                                                    <button type="button" id="btnbuyid" class="default-btn">
                                                        <i class="ri-search-line"></i> Search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="for-sall" role="tabpanel"
                                        aria-labelledby="for-sall-tab">
                                        <div class="row g-2">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <select id="PTTyperentId" class="form-select form-control"
                                                        aria-label="Default select example">
                                                        <option selected>Property Type</option>
                                                        <option value='3'>Apartment</option>
                                                        <option value='12'>Studio</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <input list="locoptionrent" id="txtlocoptionrentId" class="form-control"
                                                        placeholder="City Neighbourhood, Community">
                                                    <datalist id="locoptionrent">
                                                        <option value='Dubai Investment Park'>
                                                        <option value='Jumeirah Lake Towers'>
                                                        <option value='Palm Jumeirah'>
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group mb-0">
                                                    <button type="button" id="btnrentid" class="default-btn">
                                                        <i class="ri-search-line"></i> Search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="featured_offers mt-5">
        <div class="over-la"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center" data-heading="Projects">
                        <span>Featured Projects</span>
                    </div>
                    <div class="featured-slide owl-carousel owl-theme">
                        @foreach ($projects as $row)
                            <div class="col-md-12">
                                <div class="card smooth-shadow-sm border-0 proj-list"><span class="Ribbon bg-danger">
                                        {{ $row->status }}</span>
                                    <div class="card-img"><a class="text-reset"
                                            href="{{ route('project.details', $row->slug) }}"><img
                                                src="{{ asset('assets/images/projects') }}/{{ $row->banner }}"
                                                alt="Damac Casa Tower" width="800" height="450"
                                                class="rounded-top img-fluid"></a>
                                        <div class="purpleC rounded-1 position-absolute end-0 mt-n6 px-2 me-3"><span
                                                class="fs-6 lh-1 fw-bold prcCss">AED {{ $row->price }}</span></div>
                                    </div>
                                    <div class="card-body"><a class="text-reset urlClass" href="javascript:;">
                                            <h5 class="mb-3" style="color:#fff !important">{{ $row->name }}</h5>
                                        </a>
                                        <a class="text-reset urlClass" href="javascript:;">
                                            <p class="text-sm mb-0" style="color:#fff !important"><span><i
                                                        class="fa fa-user fa-lg2 me-2" style="color:#C59E53"></i>
                                                </span>{{ $row->developer }}</p>
                                        </a>
                                        <a class="text-reset urlClass" href="javascript:;">
                                            <p class="text-sm font-weight-semi-bold mb-2" style="color:#fff !important"><i
                                                    class="fa fa-map-marker fa-lg me-2" aria-hidden="true"
                                                    style="color:#C59E53"></i>{{ $row->community }}</p>
                                        </a>
                                        @if ($row->property_type)
                                            <p class="mb-0 p" style="color:#fff !important"><i
                                                    class="fa fa-building text-danger me-2"
                                                    style="color:#C59E53 !important"></i>{{ $row->property_type }}</p>
                                        @endif
                                        @if ($row->unit_type)
                                            <p class="mb-0 p" style="color:#fff !important"><i
                                                    class="fa fa-bed text-danger me-2"
                                                    style="color:#C59E53 !important"></i>{{ $row->unit_type }}</p>
                                        @endif
                                        @if ($row->plot_size)
                                            <p class="mb-0 p" style="color:#fff !important"><i
                                                    class="fa fa-square-o text-danger me-2" aria-hidden="true"
                                                    style="color:#C59E53 !important"></i>{{ $row->plot_size }}
                                            </p>
                                        @endif
                                        @if ($row->handover)
                                            <p class="mb-0 p" style="color:#fff !important"><i
                                                    class="fa fa-calendar text-danger me-2" aria-hidden="true"
                                                    style="color:#C59E53 !important"></i>{{ $row->handover }}</p>
                                        @endif
                                        <a class="text-reset urlClass"
                                            href="{{ route('project.details', $row->slug) }}"><span
                                                class="btn btn-danger">View
                                                Details</span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="feturd_ofr_container">

                    </div>
                    <br>
                    <center>
                        {{-- <a href="" class="btn btn-primary">View More Projects...</a> --}}

                    </center>
                </div>

            </div>

        </div>
    </section>
    <section class="featured_offers mt-5 mb-5">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center" data-heading="Projects">
                        <span>Re-Sale Projects</span>
                    </div>
                    <div class="featured-slide owl-carousel owl-theme">

                        @php
                            $sn = 1;
                        @endphp
                        @foreach ($pflisitng['property'] as $row)
                            @if ($sn <= 20)
                                <div class="col-md-12">
                                    <div class="card smooth-shadow-sm border-0 proj-list"><span class="Ribbon bg-danger">
                                            {{ $row['completion_status'] }} </span>
                                        <div class="card-img">
                                            <a class="text-reset" href=""><img
                                                    src="{{ $row['photo']['url'][0] }}" alt="Damac Casa Tower"
                                                    width="800" height="450" class="rounded-top img-fluid"></a>
                                            <div class="purpleC rounded-1 position-absolute end-0 mt-n6 px-2 me-3"><span
                                                    class="fs-6 lh-1 fw-bold prcCss">AED {{ $row['price'] }}</span></div>
                                        </div>
                                        <div class="card-body"><a class="text-reset urlClass" href="javascript:;">
                                                <h5 class="mb-3"
                                                    style="color:#fff !important;font-size:0.85rem !important">
                                                    {{ $row['title_en'] }}</h5>
                                            </a>

                                            <a class="text-reset urlClass" href="javascript:;">
                                                <p class="text-sm font-weight-semi-bold mb-2"
                                                    style="color:#fff !important"><i class="fa fa-map-marker fa-lg me-2"
                                                        aria-hidden="true"
                                                        style="color:#C59E53"></i>{{ $row['community'] }}</p>
                                            </a>

                                            <p class="mb-0 p" style="color:#fff !important"><i
                                                    class="fa fa-building text-danger me-2"
                                                    style="color:#C59E53 !important"></i>
                                                @if ($row['property_type'] == 'TH')
                                                    Townhouse
                                                @elseif($row['property_type'] == 'VH')
                                                    Villa
                                                @elseif($row['property_type'] == 'AP')
                                                    Apartment
                                                @endif
                                            </p>


                                            <p class="mb-0 p" style="color:#fff !important"><i
                                                    class="fa fa-bed text-danger me-2"
                                                    style="color:#C59E53 !important"></i>{{ $row['bedroom'] }} Bedrooms
                                            </p>

                                            <p class="mb-0 p" style="color:#fff !important"><i
                                                    class="fa fa-bath text-danger me-2"
                                                    style="color:#C59E53 !important"></i>{{ $row['bathroom'] }} Bathrooms
                                            </p>
                                            <p class="mb-0 p" style="color:#fff !important"><i
                                                    class="fa fa-square-o text-danger me-2" aria-hidden="true"
                                                    style="color:#C59E53 !important"></i>{{ $row['size'] }} Sq.ft
                                            </p>



                                            <a class="text-reset urlClass"
                                                href="{{ route('portal.property.details', $row['reference_number']) }}"><span
                                                    class="btn btn-danger">View
                                                    Details</span></a>

                                        </div>
                                    </div>
                                </div>
                            @endif
                            @php
                                $sn++;
                            @endphp
                        @endforeach
                    </div>
                    <div class="feturd_ofr_container">

                    </div>
                    <br>
                    <center>
                        {{-- <a href="" class="btn btn-primary">View More Projects...</a> --}}

                    </center>
                </div>

            </div>

        </div>
    </section>
    <div class="can-hel-overlay mt-5 mb-5"></div>
    <div class="can-help-area mt-5"
        style="background: url('{{ asset('bg.jpeg') }}'),no-repeat center; background-size: cover; background-attachment: fixed;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 wow animate__animated animate__fadeInUp delay-0-2s animated"
                    style="visibility: visible; animation-name: fadeInUp;">
                    <a href="javascript:;">
                        <video autoplay="autoplay" muted width="500" controls>
                            <source src="{{ asset('nas.mp4') }}" type="video/mp4">
                            <source src="{{ asset('nas.mp4') }}" type="video/ogg">

                        </video>
                    </a>
                </div>
                <div class="col-md-4 wow animate__animated animate__fadeInUp delay-0-4s animated"
                    style="visibility: visible; animation-name: fadeInUp;">
                    <div class="ps-lg-4">
                        <small class="text-muted text-uppercase fw-bold mt-3 d-block" style="color:#C59E53">Coming
                            Soon..</small>
                        <h3>Nad Al Sheba Gardens townhouses and villas for sale in Dubai by Meraas</h3>
                        <p style="color:white">Nad Al Sheba Gardens is a prominent development by Meraas featuring
                            exclusive design 3, 4 & 5 bedroom townhouses and villas at Nad Al Sheba, Dubai. This unique
                            neighbourhood is coveted by a nostalgic design philosophy, creating a unique blend of lifestyle
                            with a private gated community.</p>

                        <a href="https://homescope.ae/project/nad-al-sheba-gardens-by-meraas"
                            class="btn btn-custom btn-lg">
                            Find More
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-end pt-100">
                <div class="col-md-6 order-md-2 wow animate__animated animate__fadeInUp delay-0-2s animated"
                    style="visibility: visible; animation-name: fadeInUp;">
                    <a href="/secondary-market-properties?AvailableFor=rent">
                        <video autoplay="autoplay" muted width="500" controls>
                            <source src="{{ asset('ar3.mp4') }}" type="video/mp4">
                            <source src="{{ asset('ar3.mp4') }}" type="video/ogg">

                        </video>
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="pe-lg-4 text-md-end wow animate__animated animate__fadeInUp delay-0-8s animated"
                        style="visibility: visible; animation-name: fadeInUp;">

                        <small class="text-muted text-uppercase fw-bold mt-3 d-block">Coming Soon..</small>
                        <h3>Arabian Ranches 3 by Emaar</h3>
                        <p style="color:white">Arabian Ranches 3 is the latest development brought by Emaar Properties
                            offering exclusive designed 3 & 4 bedroom townhouses, lined with unparalleled facilities. It
                            seamlessly blends contemporary design with timeless elegance, creating a distinctive landmark
                            that stands out amidst the skyline.</p>
                        <a href="https://homescope.ae/project/arabian-ranches-3-summary" class="btn btn-custom btn-lg">
                            Find More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="combine_stores bg_color mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="combine_stores_container">
                        <div class="combine_str_item">
                            <div class="combine_header">
                                <div class="heading" data-heading="Developers">
                                    <span>Browse by Developers</span>
                                </div>

                            </div>
                            <div class="str_list_item ">
                                @foreach ($developers as $key => $row)
                                    <a href="{{ route('developer.projects', $row->slug) }}" class="store_slide">
                                        <div class="store_slide_img">
                                            <div class="web_imagebox">
                                                <img class="lazy"
                                                    src="{{ asset('assets/images/developers') }}/{{ $row->logo }}"
                                                    style="">
                                            </div>
                                        </div>
                                        <p class="store_slide_name">{{ $row->name }}</p>
                                    </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="combine_stores p-0 bg_color mt-5 mb-5"
        style="background: url('{{ asset('bg.jpeg') }}'),no-repeat center; background-size: cover; background-attachment: fixed;">
        <div class="over-lay"></div>
        <div class="container px-3 py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="combine_stores_container">
                        <div class="combine_str_item">
                            <div class="combine_header">
                                <div class="heading" data-heading="Communities">
                                    <span>Browse by Communities</span>
                                </div>

                            </div>
                            <div class='row g-4'>
                                @foreach ($communities as $key => $row)
                                    <div class='col-lg-2 col-md-4 col-sm-6 col-6'>
                                        <div
                                            class='single-featured-box wow animate__animated animate__fadeInUp delay-0-2s'>
                                            <a href="{{ route('community.projects', $row->slug) }}"><img
                                                    src='{{ asset('assets/images/communities') }}/{{ $row->banner }}'
                                                    alt='{{ $row->name }}' class='img-fluid' width='391'
                                                    height='367' />
                                                <h3>{{ $row->name }}</h3>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
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
@endsection
