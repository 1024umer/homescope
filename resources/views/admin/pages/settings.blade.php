@extends('admin.layout.master')

@section('content')
@php
    $settings = \App\Models\GeneralSetting::find(1);
@endphp
<!--start breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Settings</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0 align-items-center">
          <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
          </li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
      <div class="btn-group">
      </div>
    </div>
  </div>
  <!--end breadcrumb-->


  <div class="row">
    <div class="col-xl-12">
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
          <h6 class="mb-0 text-uppercase">General Settings</h6>
          <hr>
          
          <form method="post" @if($generalsettings)  action="{{route('update.setting')}}" @else action="{{route('store.setting')}}" @endif enctype="multipart/form-data">
           @csrf
           @if($generalsettings)
           <input type="hidden" name="id" value="{{$generalsettings->id}}">
           @endif
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Site Title</label>
                    <input type="text" class="form-control" name="site_title" @if($generalsettings) value="{{$generalsettings->site_title ?? old('site_title')}} " @endif >
                   
                </div>
                <div class="col-6">
                    <label class="form-label">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" @if($generalsettings) value="{{$generalsettings->meta_title ?? old('meta_title')}}" @endif >
                   
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Meta Tags</label>
                    <input type="text" class="form-control" name="meta_tags" @if($generalsettings) value="{{$generalsettings->meta_tags ?? old('meta_tags')}} " @endif >
                   
                </div>
                <div class="col-6">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" name="meta_keywords" @if($generalsettings) value="{{$generalsettings->meta_keywords ?? old('meta_keywords')}}" @endif >
                    
                </div>
            </div>
            <div class="col-12">
              <label class="form-label">Meta Description</label>
              <textarea class="form-control" name="meta_description" > @if($generalsettings) {{$generalsettings->meta_description ?? old('meta_description')}} @endif</textarea>
                
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Main Logo</label>
                    <input type="file" class="form-control" name="logo" />
                   
                </div>
                <div class="col-6">
                    <img src="@if($settings){{ asset('public/assets/images/logo') }}/{{ $settings->logo }}@endif" alt="" style="width:100px">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Favicon</label>
                    <input type="file" class="form-control" name="favicon" />
                   
                </div>
                <div class="col-6">
                    <img src="@if($settings){{ asset('public/assets/images/logo') }}/{{ $settings->favicon }}@endif" alt="" style="width:100px">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Facebook</label>
                    <input type="text" class="form-control" name="facebook" />
                   
                </div>
                <div class="col-6">
                    <label class="form-label">Instagram</label>
                    <input type="text" class="form-control" name="instagram" />
                   
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Twitter</label>
                    <input type="text" class="form-control" name="twitter" />
                   
                </div>
                <div class="col-6">
                    <label class="form-label">Pintrest</label>
                    <input type="text" class="form-control" name="pintrest" />
                   
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Gmail</label>
                    <input type="text" class="form-control" name="email" />
                   
                </div>
                <div class="col-6">
                    <label class="form-label">Youtube</label>
                    <input type="text" class="form-control" name="youtube" />
                   
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Linkedin</label>
                    <input type="text" class="form-control" name="linkedin" />
                   
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="about" ></textarea>
    
                   
                </div>
            </div>
            <br>
            <div class="col-12">
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
          
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
