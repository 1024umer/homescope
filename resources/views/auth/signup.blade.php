@extends('userpanel.layout.master')
@section('content')
<div class="page-wrapper">
    <div class="row ptl">
        <div class="col s12 m12 l6 offset-l3 center">
            @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            @elseif(Session::has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('error') }}
                @php
                    Session::forget('error');
                @endphp
            </div>
            @endif
            <div class="card-panel">
                <h2 class="grey-text text-darken-2 pbl">Sign up</h2>
                <div class="phl">
                    <form method="post" action="{{route('validate.signup')}}">
                        @csrf
                        <div class="input-field mvm">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" >
                        </div>
                        <div class="input-field mvm">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" >
                        </div>
                        <div class="input-field mvm">
                            <label for="passw">Password</label>
                            <input id="passw" type="password" name="password">
                            <span class="help-block"> Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character. </span>
                        </div>

                        <div class="mvl">
                            <a href="/signin/register?resend=true">Resend confirmation email</a>
                        </div>
                        <div class="input-field mvm leaveblank">
                            <label>Leave blank</label>
                            <input type="text" name="leaveblank" value="">
                            <input type="hidden" name="timestamp" value="1669754589985">
                        </div>
                        <button data-sitekey="6Ldp7-kdAAAAALn1WuUtBGblIQJ9KvqbzoedDVLG"
                            data-callback="onSubmit" data-action="submit" class="btn g-recaptcha">
                            Sign up </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection