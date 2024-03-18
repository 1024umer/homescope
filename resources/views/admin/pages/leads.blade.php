@extends('admin.layout.master')
@section('style')
    <link href="{{asset('public/admin-assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section('content')


<!--start breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Leads</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0 align-items-center">
          <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Leads Record</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
         
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
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Property Type</th>
                                            <th>Category</th>
                                            <th>Bedrooms</th>
                                            
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($leads as $row)
                                        
                                        <tr>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->p_type}}</td>
                                            <td>{{$row->category}}</td>
                                            <td>{{$row->bedrooms}}</td>
                                            
                                            <td>{{$row->message}}</td>
                                            <td>{{date('d-M-Y',strtotime($row->created_at))}}</td>
                                            <td><a href="{{route('del.lead',$row->id)}}" class="btn btn-danger"> Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                </div>
            </div>
        </div>
@endsection
@section('script')

<script src="{{asset('public/admin-assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin-assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('public/admin-assets/js/table-datatable.js')}}"></script>
@endsection