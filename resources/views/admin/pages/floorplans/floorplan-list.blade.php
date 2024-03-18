@extends('admin.layout.master')
@section('style')
    <link href="{{asset('public/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section('content')


<!--start breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Floor Plans</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0 align-items-center">
          <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Floor Plan Record</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
          <a href="{{route('floorplans.create')}}" class="btn btn-outline-primary">Add New Floor Plan</a>
        </div>
      </div>
  </div>
  <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Category</th>
                                <th>Floor Details</th>
                                <th>Unit Type</th>
                                <th>Sizes</th>
                                <th>Type</th>
                                <th>Actions</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($floorplans as $row)
                                <tr>
                                    <td> <img src="{{ asset('public/assets/images/floorplans') }}/{{ $row->icon }}" alt="" style="width:50px"></td>
                                    <td>{{$row->category}}</td>
                                    <td>{{$row->floor_details}}</td>
                                    <td>{{$row->unit_type}}</td>
                                    <td>{{$row->sizes}}</td>
                                    <td>{{$row->type}}</td>
                                    <td>
                                        <a href="{{route('floorplans.edit',$row->id)}}" class="text-warning btn btn-default" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit">
                                            <ion-icon name="pencil-sharp" role="img" class="md hydrated" aria-label="pencil sharp"></ion-icon>
                                          </a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['floorplans.destroy', $row->id],'style'=>'display:inline']) !!}
                                        {!! Form::button('<ion-icon name="trash-sharp" role="img" class="md hydrated" aria-label="trash sharp"></ion-icon>', ['type' =>'submit', 'class'=> 'btn btn-default text-danger' ,'data-bs-toggle'=>'tooltip', 'data-bs-placement'=>'bottom' , 'data-bs-original-title'=>'Delete', 'aria-label'=>'Delete']) !!}
                                    {!! Form::close() !!}
                                    </td>
                                   
                                </tr>
                                @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
@endsection
@section('script')

<script src="{{asset('public/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('public/assets/js/table-datatable.js')}}"></script>
@endsection