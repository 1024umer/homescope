@extends('admin.layout.master')

@section('content')
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Floor Plans</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;">
                            <ion-icon name="home-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Floor Plan</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('floorplans.index') }}" class="btn btn-outline-primary">Back to List</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->


    <div class="row">
        <div class="col-xl-8 ">
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
                        <h6 class="mb-0 text-uppercase">Add New Floor Plan</h6>
                        <hr>
                        {!! Form::open([
                            'route' => 'floorplans.store',
                            'method' => 'POST',
                            'enctype' => 'multipart/form-data',
                            'class' => 'row g-3',
                        ]) !!}
                        <div class="col-12">
                            <label class="form-label">Project</label>
                            <select name="project_id" class="form-control">
                                <option value="">--Select Project--</option>
                                @foreach ($projects as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-12">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" name="category">

                        </div>
                        <div class="col-12">
                            <label class="form-label">Floor Detail</label>
                            <input type="text" class="form-control" name="floor_details">

                        </div>
                        <div class="col-12">
                            <label class="form-label">Unit Type</label>
                            <input type="text" class="form-control" name="unit_type">

                        </div>
                        <div class="col-12">
                            <label class="form-label">Size</label>
                            <input type="text" class="form-control" name="sizes">

                        </div>
                        <div class="col-12">
                            <label class="form-label">Type</label>
                            <input type="text" class="form-control" name="type">

                        </div>
                        <div class="col-12">
                            <label class="form-label">Icon</label>
                            <input type="file" class="form-control" name="icon" />
                        </div>
                        <div class="col-12">
                            <label class="form-label">Floor Plan</label>
                            <input type="file" class="form-control" name="floorplan" />
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
