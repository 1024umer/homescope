@extends('adminpanel.layout.master')
@section('styles')
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/summernote/dist/summernote.css')}}"/>

@endsection
@section('content')
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Leads </h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li>                            
                            <li class="breadcrumb-item">Leads</li>
                            <li class="breadcrumb-item active">Leads</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                               
                            </div>
                            <div class="p-2 d-flex">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Leads Records</h2>                            
                        </div>
                        <div class="body">
                            <div class="table-responsive m-t-20">
                                <table class="table  table-bordered mb-0 dataTable js-exportable">
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
                </div>
            </div>
            
@endsection
@section('scripts')
<script src="{{asset('public/admin-assets/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>

<script src="{{asset('public/admin-assets/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="{{asset('public/admin-assets/assets/bundles/jquery-datatable.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/ckeditor/ckeditor.js')}}"></script> <!-- Ckeditor --> 
<script src="{{asset('public/admin-assets/assets/bundles/editors.js')}}"></script>
<script>
   $(document).ready(function() {
    
   });
</script>
@endsection