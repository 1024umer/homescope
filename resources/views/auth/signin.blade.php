@extends('userpanel.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="row">
            <div class="col s12 m12 l10 offset-l1 center">
                <div class="">
                    <h2 class="grey-text text-darken-2 pbl">Sign in</h2>
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


                    <div class="row">
                        <div class="col l5 m6 s12">
                            <h3>Continue with Email</h3>
                            <div class="pal">
                                <form method="post" action="{{ route('validate.signin') }}">
                                    @csrf
                                    <div class="input-field mvm">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" name="email" required>
                                    </div>
                                    <div class="input-field mvm">
                                        <label for="passw">Password</label>
                                        <input id="passw" type="password" name="password" required>
                                    </div>

                                    <div class="mtl">
                                        <button type="submit" class="btn">Sign in</button>
                                    </div>
                                </form>
                                <br>
                                <a href="{{ route('auth.signup') }}">Sign up</a> &nbsp;&bull;&nbsp;
                                <a href="/signin/iforgot">Forgotten password</a>
                            </div>

                        </div>
                        <div class="col l7 m6 s12">

                            <div class="row">
                                <div class="col s12 m12 l8 offset-l2 center">
                                    <div class="mvl pvs">
                                        <a id="fb-login-btn" href="" class="btn-large indigo lighten-1 truncate">
                                            <img src="{{ asset('public/user-assets/img/facebook.png') }}" width="54"
                                                height="54" alt="Facebook logo" class="left" /> Continue with Facebook
                                        </a>
                                    </div>
                                    <div class="mvl pvs">
                                        <a id="gp-login-btn" href=""
                                            class="btn-large white grey-text text-darken-1 truncate">
                                            <img src="{{ asset('public/user-assets/img/google.png') }}" alt="Google logo"
                                                class="left" />
                                            Continue with Google
                                        </a>
                                    </div>
                                    <div class="mvl pvs">
                                        <a id="in-login-btn" href=""
                                            class="btn-large light-blue darken-3 white-text text-darken-1 truncate">
                                            <img src="{{ asset('public/user-assets/img/linkedin.png') }}" width="54"
                                                height="54" alt="linkedin logo" class="left" /> Continue with LinkedIn
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <small class="grey-text">By signing in, you agree to our 'Terms of use'.</small>
                </div>
            </div>
        </div>
    </div>
@endsection
