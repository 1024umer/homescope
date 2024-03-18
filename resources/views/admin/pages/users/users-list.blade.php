@extends('admin.layout.master')
@section('style')
    <link href="{{asset('public/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section('content')


<!--start breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Users</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0 align-items-center">
          <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Users Record</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
          <a href="{{route('users.create')}}" class="btn btn-outline-primary">Add New User</a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                @if(session()->get('role') != 'editor')
                                <th>Added By</th>
                                <th>Created_at</th>
                                <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $row)
                                <tr>
                                    <td>{{$row->username}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->role}}</td>
                                    <td>@if($row->status == 'active') <span class="badge bg-success"> Active</span> @else <span class="badge bg-danger"> In Active </span> @endif</td>
                                    @if(session()->get('role') != 'editor')
                                    @php
                                    $user = \App\Models\User::find($row->added_by);
                                    @endphp
                                    <td>{{$user->username}}</td>
                                    <td>{{date('d-M-Y',strtotime($row->created_at))}}</td>
                                    <td>
                                        <a href="{{route('users.edit',$row->id)}}" class="text-warning btn btn-default" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit">
                                            <ion-icon name="pencil-sharp" role="img" class="md hydrated" aria-label="pencil sharp"></ion-icon>
                                          </a>
                                          <a href="{{route('change.password',$row->id)}}" class="text-warning btn btn-default" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Change Password" aria-label="Change Password">
                                            <ion-icon name="key" role="img" class="md hydrated" aria-label="Change Password "></ion-icon>
                                          </a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $row->id],'style'=>'display:inline']) !!}
                                        {!! Form::button('<ion-icon name="trash-sharp" role="img" class="md hydrated" aria-label="trash sharp"></ion-icon>', ['type' =>'submit', 'class'=> 'btn btn-default text-danger' ,'data-bs-toggle'=>'tooltip', 'data-bs-placement'=>'bottom' , 'data-bs-original-title'=>'Delete', 'aria-label'=>'Delete']) !!}
                                    {!! Form::close() !!}
                                    </td>
                                    @endif
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