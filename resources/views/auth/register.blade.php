<!doctype html>
<html lang="en">

<head>
<title>:: Iconic :: Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/font-awesome/css/font-awesome.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/css/main.css')}}">

</head>

<body data-theme="light" class="font-nunito">
	<!-- WRAPPER -->
	<div id="wrapper" class="theme-cyan">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <img src="{{asset('public/admin-assets/assets/images/logo/Akodra-Logo.png')}}" alt="Iconic">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Register your account</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" action="{{route('validate.register')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" id="signin-email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="signin-password" name="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                                <div class="bottom">
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span>
                                    <span>Already have an account? <a href="{{route('login')}}">Login</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
