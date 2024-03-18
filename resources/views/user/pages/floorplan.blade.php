<!DOCTYPE html>
<html lang="en-us">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    @php
        $generalsettings = \App\Models\GeneralSetting::find(1);
    @endphp

    <title>
        @if ($generalsettings)
            {{ $generalsettings->site_title }}
        @endif
    </title>
    <meta name="title" content="@if ($generalsettings) {{ $generalsettings->meta_title }} @endif">
    <meta name="tags" content="@if ($generalsettings) {{ $generalsettings->meta_tags }} @endif">
    <meta name="description" content="@if ($generalsettings) {{ $generalsettings->meta_description }} @endif">
    <meta name="keywords" content="@if ($generalsettings) {{ $generalsettings->meta_keywords }} @endif">


    <!-- Fav Icon -->
     <link rel="icon" href="{{ asset('public/assets/images/projects/logo') }}/{{ $project->logo }}" type="image/x-icon">
    <link rel="canonical" href="{{ route('index') }}" />
    <meta name="author" content="Sobha Realty AE" />
    <meta property="og:url" content="{{ route('index') }}" />
    <meta property="og:type" content="{{ route('index') }}" />
    <meta property="og:title" content="@if ($generalsettings) {{ $generalsettings->meta_title }} @endif" />
    <meta property="og:description"
        content="@if ($generalsettings) {{ $generalsettings->meta_description }} @endif" />
    <link href="{{ asset('public/assets/css/styles.css') }}" rel="stylesheet" />
    <script src="{{ asset('public/assets/js/topjs.js') }}"></script>
</head>

<body itemprop="mainEntityOfPage" itemscope itemtype="http://schema.org/Webpage">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('index') }}">Overview</a>
        <p>Get in Touch</p>
        <span><a href="tel:+971522953747" class="border-0">
                <img src="{{ asset('public/assets/images/call.png') }}" width="15" height="15" alt="Call Us">
                +971 52 295 3747</a></span>
        <span><a rel="nofollow"
                href="https://api.whatsapp.com/send?l=en&amp;phone=+971509260992&amp;text=I want more information on Sobha One"
                target="_blank" class="border-0">
                <img src="{{ asset('public/assets/images/whats-app.svg') }}" width="15" height="15"
                    alt="WhatsApp">
                +971 50 926 0992</a></span>
    </div>
    <div id="main">
        <div class="top-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 col-md-6 col-lg-6 menu-left">
                        <div class="call-btn">
                            <a href="tel:+971522953747">
                                <img src="{{ asset('public/assets/images/call.png') }}" width="15" height="15"
                                    alt="Call Us">
                                <span>+971 52 295 3747</span></a>
                            <a rel="nofollow"
                                href="https://api.whatsapp.com/send?l=en&amp;phone=+971509260992&amp;text=I want more information on Sobha One "
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
                                <a class="nav-link" href="{{ route('index') }}">Overview</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </nav>
<div class="projects brochure">
   <section class="pro_overview">
      <section class="container">
         <div class="row">
            <div class="" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
               <div class="row no-gutters proj-bro">
                  <div class="col-lg-6 myprojdetail">
                     <div class="card location rounded-0 pro_head">
                        <div class="card-body sumry">
                           <div class="row">
                              <div class="col-lg-7">
                                 <h2 class="titles"><span itemprop="name"><a href="javascript:;">{{$project->name}}</a> </span></h2>
                                 <h6><span>Project Status:</span> {{$project->status}}</h6>
                              </div>
                              <div class="col-6 col-lg-5">
                                 <div class="price-head">
                                    <label for="lblStartingPrice">Starting From</label>
                                    <h2 id="lblStartingPrice" itemprop="price"><span id="lblPriceId" style="color:red">AED {{$project->price}}</span>&nbsp;<i id="QuickBrochure_pricehsid" class="fa fa-info-circle" aria-hidden="true" data-toggle="modal" data-target="#Priceinfo"></i></h2>
                                 </div>
                              </div>
                              <div class="col-6 d-md-none">
                                 <a href="{{route('index')}}" class="btn btn-primary vdtls mt-2 ml-2">
                                 View Details
                                 </a>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <div id="QuickBrochure_brochureTableId" class="row">
                              <div class="col-md-12 brochure-table">
                                 <table>
                                    <tbody>
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
                  </div>
                  <div class="col-lg-6 mycontact">
                     <div class="card location rounded-0">
                        <div class="card-body">
                           <h3><span><i class="fa fa-download mr-1" aria-hidden="true"></i>Download Floor Plan</span></h3>
                           <div class="form-group mybrochure">
                              <a href="{{route('brochure',$project->slug)}}"  class="brochbtn "><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Project Brochure</a>
                              <a href="{{route('floor.plan',$project->slug)}}"  class="brochbtn active"><i class="fa fa-object-group" aria-hidden="true"></i>Floor Plan </a>
                              <a href="{{route('payment.plan',$project->slug)}}"  class="brochbtn"><i class="fa fa-money" aria-hidden="true"></i>Payment Plan </a>
                           </div>
                           <div id="QuickBrochure_fpfilterId" class="form-group ">
                              <div class="row broc-floor-filter">
                                 <div class="input-warp25">
                                    <div class="filter-label">
                                       <label>Property Type</label>
                                    </div>
                                    <select name="property_type" class="p_type">
                                       <option value="All">All</option>
                                       <option value="Apartment">Apartment</option>
                                       <option value="Duplex Apartments">Duplex Apartments</option>
                                    </select>
                                 </div>
                                 <div class="input-warp25">
                                    <div class="filter-label">
                                       <label>Category</label>
                                    </div>
                                    <select name="category" class="category">
                                       <option value="All">All</option>
                                       <option value="Tower A">Tower A</option>
                                       <option value="Tower B">Tower B</option>
                                    </select>
                                 </div>
                                 <div class="input-warp25">
                                    <div class="filter-label">
                                       <label>Unit Type</label>
                                    </div>
                                    <select name="bedroom" class="bedroom">
                                       <option value="All">All</option>
                                       <option value="1 Bedroom">1 Bedroom</option>
                                       <option value="1 Bedroom + Study">1 Bedroom + Study</option>
                                       <option value="2 Bedrooms">2 Bedrooms</option>
                                       <option value="2 Bedrooms + Maid">2 Bedrooms + Maid</option>
                                       <option value="3 Bedrooms + Maid">3 Bedrooms + Maid</option>
                                       <option value="4 Bedrooms + Maid">4 Bedrooms + Maid</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="txtnamepbr">Name</label>
                              <input name="name" type="text" id="txtnamepbr" class="form-control name" placeholder="Name *" onkeyup="fnchkbtnbroch();" onblur="fnchkbtnbroch();">
                           </div>
                           <div class="form-group">
                              <label for="txtemailpbr">Email ID</label>
                              <input name="email" type="text" id="txtemailpbr" class="form-control email" placeholder="Email Id *" onkeyup="fnchkbtnbroch();" onblur="fnchkbtnbroch();">
                           </div>
                           <div class="form-group">
                                <label for="txtphonepbr">&nbsp;</label>
                                <input name="phone" type="text" maxlength="13" id="txtphonepbr " class="form-control phone" placeholder="Contact No *" >
                           </div>
                           <button type="button" class="btn btn-dark d-block floorplanbtn">Download Now</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </section>
</div>
<footer class="footer_detail" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
   <div class="container">

       <div class="fot_bor"></div>
       <div class="row pt-4 pb-5">
           <div class="col-lg-12">
               <div class=" text-center">
                   <p class="text-white mb-0 copyright">
                       &copy; 2024 <a href="/" style="color:white"> Homescope Real Estate </a> All
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
<div class="call-pont">
   <ul>
       <li><a href="tel:+971522953747">
               <span><i class="fa fa-phone"></i></span>
               Call Us
           </a>
       </li>
       <li><a href="mailto:info@justdubai.ae" class="top-enq">
               <span><i class="fa fa-envelope"></i></span>
               Enquire Now</a>
       </li>
       <li><a rel="nofollow"
               href="https://api.whatsapp.com/send?l=en&amp;phone=+971509260992&amp;text=I want more information on Sobha One ">
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
   $(document).ready(function(){
    $('.floorplanbtn').attr('disabled',true);
     
     
    $('.email').keyup(function(){
        if($(this).val().length !=0){
            $('.floorplanbtn').attr('disabled', false);
        }
        else
        {
            $('.floorplanbtn').attr('disabled', true);        
        }
    });
});
   $(document).on('click','.floorplanbtn',function(){
      
       var name = $('.name').val();
       var email = $('.email').val();
       var phone = $('.phone').val();
       var p_type = $('.p_type').val();
       var category = $('.category').val();
       var bedroom = $('.bedroom').val();
       
       console.log(name);
       console.log(email);
       console.log(phone);
       console.log(p_type);
       console.log(category);
       console.log(bedroom);
       $.ajax({
           type:'GET',
           url:'{{route("store.lead")}}',
           data:{name:name,email:email,phone:phone,p_type,category:category,bedroom:bedroom},
           success:function(resp)
           {
               if(resp.success == true)
               {
                    $('#paybitcoin').modal('show');  
                   window.location.href="@if($details){{asset('public/assets/images/projects/documents')}}/{{$details->floor_plan}}@endif";
               }
           },
           error:function(resp)
           {
               console.log(resp);
           }
       });
   });
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