
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
          <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
          <h6 class="mb-0 text-uppercase">Edit User</h6>
          <hr>
          {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id] , 'enctype'=> 'multipart/form-data','class' => 'row g-3']) !!}
            <div class="col-12">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="username"  value="{{old('username') ?? $user->username }}" readonly>
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="col-12">
              <label class="form-label">Email ID</label>
              <input type="email" class="form-control" name="email" value="{{old('email') ?? $user->email }}" readonly>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            
            
            <div class="col-12">
                <label for="form-label">Role</label>
                @if(session()->get('role')== 'superadmin')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="superadmin" value="superadmin" {{ $user->role == 'superadmin' ? 'checked' : ''}}>
                    <label class="form-check-label" for="superadmin">Super Admin</label>
                </div>
                @endif
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="admin" value="admin" {{ $user->role == 'admin' ? 'checked' : ''}}>
                    <label class="form-check-label" for="admin">Admin</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="editor" value="editor" {{ $user->role == 'editor' ? 'checked' : ''}}>
                    <label class="form-check-label" for="editor">Editor</label>
                </div>
            </div>
            @if(session()->get('role')== 'superadmin' || session()->get('role')== 'admin')
            <div class="col-12">
                <label for="form-label">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="active" value="active" {{ $user->status == 'active' ? 'checked' : ''}}>
                    <label class="form-check-label" for="active">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="deactive" value="deactive" {{ $user->status == 'deactive' ? 'checked' : ''}}>
                    <label class="form-check-label" for="deactive">De Active</label>
                </div>
            </div>
            @endif
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
