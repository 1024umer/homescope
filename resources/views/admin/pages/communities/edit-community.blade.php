
@extends('admin.layout.master')

@section('content')

<!--start breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Communities</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0 align-items-center">
          <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Edit Community</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
      <div class="btn-group">
        <a href="{{route('communities.index')}}" class="btn btn-outline-primary">Back to List</a>
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
          <h6 class="mb-0 text-uppercase">Edit Developer</h6>
          <hr>
          {!! Form::model($community, ['method' => 'PATCH','route' => ['communities.update', $community->id] , 'enctype'=> 'multipart/form-data','class' => 'row g-3']) !!}
            <div class="col-12">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name"  value="{{old('name') ?? $community->name }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="col-12">
              <label class="form-label">Banner</label>
              <input type="file" class="form-control" name="banner" />
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
