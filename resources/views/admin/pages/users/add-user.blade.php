@extends('admin.layout.master')

@section('content')

<!--start breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Users</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0 align-items-center">
          <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Add New User</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
      <div class="btn-group">
        <a href="{{route('users.index')}}" class="btn btn-outline-primary">Back to List</a>
      </div>
    </div>
  </div>
  <!--end breadcrumb-->


  <div class="row">
    <div class="col-xl-8 mx-auto">
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
      <div class="card">
        <div class="card-body">
          <div class="border p-3 rounded">
          <h6 class="mb-0 text-uppercase">Add New User</h6>
          <hr>
          {!! Form::open(array('route' => 'users.store','method'=>'POST', 'enctype'=> 'multipart/form-data' , 'class'=> 'row g-3')) !!}
            <div class="col-12">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="username" value="{{old('username')}}">
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="col-12">
              <label class="form-label">Email ID</label>
              <input type="email" class="form-control" name="email" value="{{old('email')}}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="col-12">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" value="{{old('password')}}">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block"> Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character. </span>
            </div>
            <div class="col-12">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="c_password" value="{{old('c_password')}}">
                @if ($errors->has('c_password'))
                    <span class="text-danger">{{ $errors->first('c_password') }}</span>
                @endif
            </div>
            
            <div class="col-6">
                <label for="form-label">Role</label>
                @if(session()->get('role')== 'superadmin')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="superadmin" value="siperadmin" {{ old('role')=="superadmin" ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label class="form-check-label" for="superadmin">Super Admin</label>
                </div>
                @endif
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="admin" value="admin" {{ old('role')=="admin" ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label class="form-check-label" for="admin">Admin</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="editor" value="editor" {{ old('role')=="editor" ? 'checked='.'"'.'checked'.'"' : '' }}>
                    <label class="form-check-label" for="editor">Editor</label>
                </div>
            </div>
            <div class="col-12">
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
