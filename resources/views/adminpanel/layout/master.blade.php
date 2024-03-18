<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@php
    $generalsettings = \App\Models\GeneralSetting::find(1);
@endphp

<meta name="title" content="@if ($generalsettings){{$generalsettings->meta_title}}@endif">
<meta name="tags" content="@if ($generalsettings){{$generalsettings->meta_tags}}@endif">
<meta name="description" content="@if ($generalsettings){{$generalsettings->meta_description}}@endif">
<meta name="keywords" content="@if ($generalsettings){{$generalsettings->meta_keywords}}@endif">

 <link rel="icon" href="{{asset('public/assets/images/favicon.png')}}" type="image/x-icon">
<title>@if ($generalsettings) {{$generalsettings->site_title}} @endif</title>


<!-- VENDOR CSS -->
@include('adminpanel.includes.styles')
@yield('styles')

</head>

<body data-theme="light" class="font-nunito">

<div id="wrapper" class="theme-cyan">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Top navbar div start -->
    @include('adminpanel.includes.navbar')

        
@include('adminpanel.includes.left-sidebar')
        

        <div class="right_icon_bar">
            <ul>
                <li><a href="{{route('logout')}}"><i class="fa fa-lock"></i></a></li>
                <li><a href="javascript:void(0);" class="right_icon_btn"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>
    <!-- mani page content body part -->
    <div id="main-content">
        <div class="container-fluid">
            @yield('content')
            
        </div>
    </div>
    
</div>

<!-- Javascript -->
@include('adminpanel.includes.scripts')
@yield('scripts')
</body>
</html>
