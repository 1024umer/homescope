<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	@php
    $generalsettings = \App\Models\GeneralSetting::find(1);
@endphp

<meta name="title" content="@if ($generalsettings){{$generalsettings->meta_title}}@endif">
<meta name="tags" content="@if ($generalsettings){{$generalsettings->meta_tags}}@endif">
<meta name="description" content="@if ($generalsettings){{$generalsettings->meta_description}}@endif">
<meta name="keywords" content="@if ($generalsettings){{$generalsettings->meta_keywords}}@endif">

 <link rel="icon" href="@if($generalsettings){{ asset('public/assets/images/logo') }}/{{ $generalsettings->favicon }}@endif" type="image/x-icon">
<title>@if ($generalsettings) {{$generalsettings->site_title}} @endif</title>
	
	@include('admin.includes.styles')
    @yield('style')
</head>

<body>
	
    <div class="wrapper">
		
		
		<!-- Left Sidebar Menu -->
		@include('admin.includes.leftsidebar')
		<!-- /Left Sidebar Menu -->
		<!-- Top Menu Items -->
		@include('admin.includes.nav')
		<!-- /Top Menu Items -->
        <!-- Main Content -->
        <div class="page-content-wrapper">
			<div class="page-content">
		        @yield('content')
			</div>
        </div>
        <!-- /Main Content -->

    </div>

    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    @include('admin.includes.scripts')
    @yield('script')
	<script>
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove(); 
			});
		}, 4000);
	</script>
</body>

</html>
