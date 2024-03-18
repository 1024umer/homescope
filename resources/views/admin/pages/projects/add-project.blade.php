@extends('admin.layout.master')
@section('style')
<link href="{{ asset('public/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Projects</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;">
                            <ion-icon name="home-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Project</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('projects.index') }}" class="btn btn-outline-primary">Back to List</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->


    <div class="row">
        <div class="col-xl-12 ">
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
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Add New Project</h6>
                        <hr>
                        {!! Form::open([
                            'route' => 'projects.store',
                            'method' => 'POST',
                            'enctype' => 'multipart/form-data',
                            'class' => 'row g-3',
                        ]) !!}
                        <div class="col-12">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                          <label class="form-label">Price</label>
                          <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                          @if ($errors->has('price'))
                              <span class="text-danger">{{ $errors->first('price') }}</span>
                          @endif
                      </div>

                        <div class="col-6">
                            <label class="form-label">Developer</label>
                            <select name="developer_id" class="form-control">
                                <option value="">--Select Developer--</option>
                                @foreach ($developers as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('developer_id'))
                                <span class="text-danger">{{ $errors->first('developer_id') }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label class="form-label">Community</label>
                            <select name="community_id" class="form-control">
                                <option value="">--Select Community--</option>
                                @foreach ($communities as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('community_id'))
                                <span class="text-danger">{{ $errors->first('community_id') }}</span>
                            @endif
                        </div>

                        <div class="col-12">
                            <label class="form-label">Banner</label>
                            <input type="file" class="form-control" name="banner" />
                        </div>
                        <div class="col-12">
                          <label class="form-label">Logo</label>
                          <input type="file" class="form-control" name="logo" />
                      </div>
                        <div class="col-4">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-control">
                                <option value="">--Select Category--</option>
                                <option value="off-Plan">Off Plan</option>
                                <option value="secondary">Secondary</option>
                            </select>
                           
                        </div>
                        <div class="col-4">
                            <label class="form-label">Property Type</label>
                            <select name="property_type" class="form-control">
                                <option value="">--Select Type--</option>
                                <option value="Appartments">Appartments</option>
                                <option value="Villas">Villas</option>
                                <option value="Town Houses">Town Houses</option>
                            </select>
                            @if ($errors->has('property_type'))
                                <span class="text-danger">{{ $errors->first('property_type') }}</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <label class="form-label">Property Sub Type</label>
                            <select name="property_sub_type" class="form-control">
                                <option value="">--Select Sub Type--</option>
                                <option value="Studios">Studios</option>
                                <option value="Duplex Appartments">Duplex Appartments</option>
                            </select>
                            @if ($errors->has('property_sub_type'))
                                <span class="text-danger">{{ $errors->first('property_sub_type') }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label class="form-label">Unit Type</label>
                            <select name="unit_type" class="form-control">
                                <option value="">--Select Unit Type--</option>
                                <option value="1 Bedroom">1 Bedroom</option>
                                <option value="2 Bedrooms">2 Bedrooms</option>
                                <option value="3 Bedrooms">3 Bedrooms</option>
                                <option value="4 Bedrooms">4 Bedrooms</option>
                                <option value="5 Bedrooms">5 Bedrooms</option>
                                <option value="1 to 2 Bedrooms">1 to 2 Bedrooms</option>
                                <option value="1 to 3 Bedrooms">1 to 3 Bedrooms</option>
                                <option value="1 to 4 Bedrooms">1 to 4 Bedrooms</option>
                                <option value="1 to 5 Bedrooms">1 to 5 Bedrooms</option>
                                <option value="2,3 Bedrooms">2,3 Bedrooms</option>
                                <option value="2,3,4 Bedrooms">2,3,4 Bedrooms</option>
                                <option value="3 & 4 Bedrooms">3 & 4 Bedrooms</option>
                                <option value="3,4,5 Bedrooms">3,4,5 Bedrooms</option>
                                <option value="4,5 Bedrooms">4,5 Bedrooms</option>
                                <option value="Will updated soon"> Will updated soon</option>
                            </select>
                            @if ($errors->has('unit_type'))
                                <span class="text-danger">{{ $errors->first('unit_type') }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label class="form-label">Plot Size</label>
                            <input type="text" class="form-control" name="plot_size" value="{{ old('plot_size') }}">
                            @if ($errors->has('plot_size'))
                                <span class="text-danger">{{ $errors->first('plot_size') }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label class="form-label">Built Up Area</label>
                            <input type="text" class="form-control" name="built_up_area"
                                value="{{ old('built_up_area') }}">
                            @if ($errors->has('built_up_area'))
                                <span class="text-danger">{{ $errors->first('built_up_area') }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label class="form-label">Handover</label>
                            <input type="text" class="form-control" name="handover" value="{{ old('handover') }}">
                            @if ($errors->has('handover'))
                                <span class="text-danger">{{ $errors->first('handover') }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label class="form-label">Payment Plan</label>
                            <input type="text" class="form-control" name="payment_plan"
                                value="{{ old('payment_plan') }}">
                            @if ($errors->has('payment_plan'))
                                <span class="text-danger">{{ $errors->first('payment_plan') }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label class="form-label">Down Payment</label>
                            <input type="text" class="form-control" name="down_payment"
                                value="{{ old('down_payment') }}">
                            @if ($errors->has('down_payment'))
                                <span class="text-danger">{{ $errors->first('down_payment') }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label class="form-label">During Construction Payment</label>
                            <input type="text" class="form-control" name="during_construction"
                                value="{{ old('during_construction') }}">
                            
                        </div>
                        <div class="col-6">
                            <label class="form-label">At Handover Payment</label>
                            <input type="text" class="form-control" name="handover_payment"
                                value="{{ old('handover_payment') }}">
                            
                        </div>
                        <div class="col-12">
                            <label class="form-label">Amenities</label>
                            @foreach($amenities as $row)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="amenities[]" id="{{$row->name}}" value="{{$row->id}}" >
                                <label class="form-check-label" for="{{$row->name}}">{{$row->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-6">
                            <label class="form-label">Brochure</label>
                            <input type="file" class="form-control" name="brochure"
                               >
                            
                        </div>
                        <div class="col-6">
                            <label class="form-label">Floor Plan</label>
                            <input type="file" class="form-control" name="floor_plan"
                                >
                            
                        </div>
                        <div class="col-6">
                            <label class="form-label">Payment Plan</label>
                            <input type="file" class="form-control" name="paymentplan"
                                >
                            
                        </div>
                        <div class="col-6">
                            <label class="form-label">Master Plan</label>
                            <input type="file" class="form-control" name="masterplan"
                                >
                            
                        </div>
                        <div class="col-6">
                            <label class="form-label">Location Map</label>
                            <input type="file" class="form-control" name="location"
                                >
                            
                        </div>
                       
                        <div class="col-6">
                            <label class="form-label">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title"
                                value="{{ old('meta_title') }}">

                        </div>
                        <div class="col-6">
                            <label class="form-label">Meta Tags</label>
                            <input type="text" class="form-control" name="meta_tags" value="{{ old('meta_tags') }}">

                        </div>
                        <div class="col-12">
                            <label class="form-label">Meta Keywords</label>
                            <input type="text" class="form-control" name="meta_keywords"
                                value="{{ old('meta_keywords') }}">

                        </div>
                        <div class="col-12">
                            <label class="form-label"> Meta Description</label>
                            <textarea class="form-control" name="meta_description"> {{ old('meta_description') }}</textarea>

                        </div>
                        <div class="col-12">
                            <label class="form-label"> Features Description</label>
                            <textarea class="form-control" name="features_description"> {{ old('features_description') }}</textarea>

                        </div>
                        <div class="col-12">
                            <label class="form-label"> Location Description</label>
                            <textarea class="form-control" name="location_description"> {{ old('location_description') }}</textarea>

                        </div>
                        <div class="col-12">
                            <label class="form-label"> Master Plan Description</label>
                            <textarea class="form-control" name="master_description"> {{ old('master_description') }}</textarea>

                        </div>
                        <div class="col-12">
                            <label class="form-label"> Description</label>
                            <textarea class="ckeditor" name="description"> {{ old('description') }}</textarea>
                            @if ($errors->has('down_payment'))
                                <span class="text-danger">{{ $errors->first('down_payment') }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                          <label class="form-label">Status</label>
                          <input type="text" class="form-control" name="status"
                              value="{{ old('status') }}">

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
@section('script')
<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<script src="{{ asset('public/assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('public/assets/js/form-select2.js') }}"></script>
@endsection