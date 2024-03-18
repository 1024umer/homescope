<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="{{asset('public/assets/css/pace.min.css')}}" rel="stylesheet" />
  <script src="{{asset('public/assets/js/pace.min.js')}}"></script>

  <!--plugins-->
  <link href="{{asset('public/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('public/assets/css/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <title>Mackinnon Pakistan</title>
  <link rel="shortcut icon" href="{{asset('public/assets/images/short_icon.png')}}">
	<link rel="icon" href="{{asset('public/assets/images/short_icon.png')}}" type="image/x-icon">
</head>

<body class="bg-white">

  <!--start wrapper-->
  <div class="wrapper">
    <div class="">
      <div class="row g-0 m-0">
        <div class="col-xl-6 col-lg-12">
          <div class="login-cover-wrapper">
            <div class="card shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <h1><img src="{{asset('public/assets/images/logoblack.png')}}" alt=""></h1>
                  <p>Sign In to your account</p>
                </div>
                <form class="form-body row g-3" method="POST" action="{{route('login.validate')}}">
                    @csrf
					<div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password">
                  </div>
                  {{-- <div class="col-12 col-lg-6">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRemember">
                      <label class="form-check-label" for="flexSwitchCheckRemember">Remember Me</label>
                    </div>
                  </div> --}}
                  {{-- <div class="col-12 col-lg-6 text-end">
                    <a href="authentication-reset-password-cover.html">Forgot Password?</a>
                  </div> --}}
                  <div class="col-12 col-lg-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                  </div>
                  {{-- <div class="col-12 col-lg-12">
                    <div class="position-relative border-bottom my-3">
                      <div class="position-absolute seperator translate-middle-y">or continue with</div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="social-login d-flex flex-row align-items-center justify-content-center gap-2 my-2">
                      <a href="javascript:;" class=""><img src="assets/images/icons/facebook.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="assets/images/icons/apple-black-logo.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="assets/images/icons/google.png" alt=""></a>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12 text-center">
                    <p class="mb-0">Don't have an account? <a href="authentication-sign-up-cover.html">Sign up</a></p>
                  </div> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-fixed top-0 h-100 d-xl-block d-none login-cover-img">
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </div>
  <!--end wrapper-->


</body>

</html>