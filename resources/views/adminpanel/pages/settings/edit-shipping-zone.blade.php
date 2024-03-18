@extends('adminpanel.layout.master')
@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Edit Shipping Zone</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>                            
                            <li class="breadcrumb-item">Settings</li>
                            <li class="breadcrumb-item active">Edit Shipping Zone</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <!-- <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download report</button> -->
                                <a href="{{route('shipping.zones')}}" class="btn btn-secondary"> Back</a>
                            </div>
                            <div class="p-2 d-flex">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Zone</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate action="{{route('update.shipping.zones')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$shippingzone->id}}">
                                <div class="row">
                                  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zone Name</label>
                                            <input type="text" name="name" class="form-control" require value="{{$shippingzone->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Region</label>
                                            
                                            <select class="js-example-basic-multiple select2" name="region[]" multiple="multiple" style="width:100%">
                                                @php
                                                $regions = explode(',',$shippingzone->region);
                                               
                                                @endphp
                                                
                                                @foreach($regions as $region)

                                                @php
                                                    $city = \DB::table('cities')->where('id',$region)->first();
                                                @endphp
                                                @if($city)
                                                <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                                @endif
                                                @endforeach
                                                @foreach ($allcities as $row)
                                                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Enable</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @foreach($shippingmethods as $row)
                                                <tr>
                                                    <td>{{$row->name}}</td>
                                                    <td>
                                                        {{$row->is_enable}}
                                                    </td>
                                                    <td><a href="{{route('edit.shipping.zones',$row->id)}}" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i></a> <a href="{{route('del.shipping.zones',$row->id)}}" class="btn btn-sm btn-default"> <i class="fa fa-trash"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
@endsection
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    $(document).on('click','.add-btn', function(){
           $('.add-form').css('display','block');
           $('.close-btn').css('display','block');
           $('.add-btn').css('display','none');
    });

    $(document).on('click','.close-btn', function(){
           $('.add-form').css('display','none');
           $('.close-btn').css('display','none');
           $('.add-btn').css('display','block');
    });
</script>
@endsection