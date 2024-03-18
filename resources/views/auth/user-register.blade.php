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

<link rel="icon" href="@if ($generalsettings){{asset('public/admin-assets/assets/images/logo')}}/{{$generalsettings->favicon}} @endif" type="image/x-icon">
<title>@if ($generalsettings) {{$generalsettings->site_title}} @endif</title>
@include('userpanel.includes.styles')
</head>

<body class="bg-white">
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto pl-5 pr-5">
                                <h3 class="login-heading mb-4">Welcome back!</h3>
                                <form action="{{route('user.validate.register')}}" method="post">
                                    @csrf
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control"
                                            placeholder="Email address" autocomplete="off" name="email">
                                        <label for="inputEmail">Email address / Mobile</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control"
                                            placeholder="Password" autocomplete="off" name="password">
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    
                                    <button type="submit"class="btn btn-lg btn-outline-primary btn-block btn-login text-uppercase font-weight-bold mb-2">Sign
                                        up</button>
                                    <div class="text-center pt-3">
                                        Already have an acocunt? <a class="font-weight-bold" href="{{route('user.login')}}">Sign
                                            In</a>
                                    </div>
                                </form>
                                <hr class="my-4">
                                <p class="text-center">REGISTER WITH</p>
                                <div class="row">
                                    <div class="col pr-2">
                                        <button
                                            class="btn pl-1 pr-1 btn-lg btn-google font-weight-normal text-white btn-block text-uppercase"
                                            type="submit"><i class="fab fa-google mr-2"></i> Google</button>
                                    </div>
                                    <div class="col pl-2">
                                        <button
                                            class="btn pl-1 pr-1 btn-lg btn-facebook font-weight-normal text-white btn-block text-uppercase"
                                            type="submit"><i class="fab fa-facebook-f mr-2"></i> Facebook</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('userpanel.includes.scripts')

</body>

</html>