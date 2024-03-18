@extends('adminpanel.layout.master')
@section('styles')
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Shipping Zones</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>                            
                            <li class="breadcrumb-item">Settings</li>
                            <li class="breadcrumb-item active">Shipping Zones</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <!-- <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download report</button> -->
                                <button type="button" class="btn btn-secondary add-btn"><i class="fa fa-plus"></i> Add New</button>
                                <button type="button" class="btn btn-secondary close-btn" style="display:none"> Close</button>
                            </div>
                            <div class="p-2 d-flex">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix add-form" style="display:none">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add New Zone</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate action="{{route('store.shipping.zones')}}">
                                @csrf
                                
                                <div class="row">
                                  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zone Name</label>
                                            <input type="text" name="name" class="form-control" require>
                                        </div>
                                        <div class="form-group">
                                            <label>Region</label>
                                            <select class="js-example-basic-multiple select2" name="region[]" multiple="multiple" style="width:100%">
                                                @foreach ($allcities as $row)
                                                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <br>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Shipping Zones Records</h2>                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Zone</th>
                                            <th style="width:50%">Region</th>
                                            <th style="width:50%">Shipping Methods</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($shippingzones as $row)
                                        <tr>
                                            <td>{{$row->name}}</td>
                                            <td>
                                                @php
                                                    $regions = explode(',',$row->region);
                                                   
                                                @endphp
                                                
                                                @foreach($regions as $region)
 
                                                @php
                                                    $city = \DB::table('cities')->where('id',$region)->first();
                                                @endphp
                                                 @if($city)
                                                 <span class="badge badge-secondary">{{$city->name}}</span>
                                                 @endif
                                                @endforeach
                                                
                                            </td>
                                            <td>
                                                @php
                                                    $shippingmethods = \App\Models\ShippingMethod::where('zone_id',$row->id)->get();
                                                @endphp
                                                @foreach($shippingmethods as $method)
                                                <a href="javascript:void(0)" class="methodeditbtn" data-id="{{$method->id}}" data-zoneid="{{$method->zone_id}}" data-name="{{$method->name}}"
                                                    data-cost="{{$method->cost}}" data-free_shipping="{{$method->free_shippping_requires}}"
                                                    data-min_order="{{$method->min_order}}" data-coupon_dis="{{$method->coupon_discount}}" data-is_enable="{{$method->is_enable}}">{{$method->name}} |</a>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="#MethodModal" data-toggle="modal" data-target="#MethodModal" data-id="{{$row->id}}" class="methodmodalbtn">
                                                Add Shipping Method
                                            </a> 
                                            <a href="{{route('edit.shipping.zones',$row->id)}}" class="btn btn-sm btn-default"> <i class="fa fa-pencil"></i></a> <a href="{{route('del.shipping.zones',$row->id)}}" class="btn btn-sm btn-default"> <i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal fade" id="MethodModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="title" id="largeModalLabel">Add Shipping Method</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                Choose the shipping method you wish to add. Only shipping methods which support zones are listed.
                            </p>
                            <br>
                            <form id="basic-form" method="post" novalidate action="{{route('store.shipping.methods')}}">
                                @csrf
                                
                                <div class="row">
                                  
                                    <div class="col-md-6">
                                         <input type="hidden" name="zone_id" class="zoneid" value="">
                                        <div class="form-group">
                                            <label>Method</label>
                                            <select class="form-control method" name="method" >
                                               <option>--Select Method</option>
                                               <option value="Flat Rate">Flat Rate</option>
                                               <option value="Free Shipping">Free Shipping</option>
                                            </select>
                                        </div>
                                        <div class="form-group cost" style="display:none">
                                            <label for="">Cost</label>
                                            <input type="text" name="cost" class="form-control">
                                        </div>
                                        <div class="form-group free_shipping" style="display:none">
                                            <label>Free Shipping requires...</label>
                                            <select class="form-control free_shipping_requires" name="free_shiping_requires" >
                                                <option value="N/A<">N/A</option>
                                                <option value="A valid free shipping coupon">A valid free shipping coupon</option>
                                                <option value="A minimum order amount">A minimum order amount</option>
                                                <option value="A minimum order amount OR coupon">A minimum order amount OR coupon</option>
                                                <option value="A minimum order amount AND coupon">A minimum order amount AND coupon</option>
                                             </select>
                                        </div>
                                        <div class="form-group minimum_order" style="display:none">
                                            <label for="">Minimum order amount</label>
                                            <input type="text" name="minimum_order_amount" class="form-control minimum_order_amount">
                                        </div>
                                        <div class="form-group coupon" style="display:none">
                                            <label for="">Coupon discounts</label>
                                            <div class="fancy-checkbox">
                                                <label><input type="checkbox" name="coupon_discounts" class="coupon_enable"><span>Apply minimum order rule before coupon discount</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <br>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form> 
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal fade methodEditModal" id=""  tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="title method_title" id="largeModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                           
                            <form id="basic-form" method="post" novalidate action="{{route('update.shipping.methods')}}">
                                @csrf
                                
                                <div class="row">
                                  
                                    <div class="col-md-6">
                                         <input type="hidden" name="id" class="id" value="">
                                        
                                        <div class="form-group cost" style="display:none">
                                            <label for="">Cost</label>
                                            <input type="text" name="cost" class="form-control method_cost">
                                        </div>
                                        <div class="form-group free_shipping" style="display:none">
                                            <label>Free Shipping requires...</label>
                                            <select class="form-control free_shipping_requires method_free_ship" name="free_shiping_requires" >
                                                
                                                <option value="N/A<">N/A</option>
                                                <option value="A valid free shipping coupon">A valid free shipping coupon</option>
                                                <option value="A minimum order amount">A minimum order amount</option>
                                                <option value="A minimum order amount OR coupon">A minimum order amount OR coupon</option>
                                                <option value="A minimum order amount AND coupon">A minimum order amount AND coupon</option>
                                             </select>
                                        </div>
                                        <div class="form-group minimum_order" style="display:none">
                                            <label for="">Minimum order amount</label>
                                            <input type="text" name="minimum_order_amount" class="form-control minimum_order_amount method_min">
                                        </div>
                                        <div class="form-group coupon" style="display:none">
                                            <label for="">Coupon discounts</label>
                                            <div class="fancy-checkbox">
                                                <label><input type="checkbox" name="coupon_discounts" class="coupon_enable method_coupon"><span>Apply minimum order rule before coupon discount</span></label>
                                            </div>
                                        </div>
                                        
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
<script src="{{asset('public/admin-assets/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/bundles/jquery-datatable.js')}}"></script>
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

    $(document).on('click','.methodmodalbtn',function(){
        
           var zoneid = $(this).data('id');
           console.log(zoneid);
           $('.zoneid').val(zoneid);
    });
    $(document).on('click','.methodeditbtn',function(){
        
           $('.methodEditModal').modal('show');
           var id = $(this).data('id');
           var zoneid = $(this).data('zoneid');
           var name = $(this).data('name');
           var cost = $(this).data('cost');
           var free_shipping = $(this).data('free_shipping');
           var coupon_dis = $(this).data('coupon_dis');
           var min_order = $(this).data('min_order');
           var is_enable = $(this).data('is_enable');
           
           console.log(id);
           console.log(zoneid);
           console.log(name);
           console.log(cost);
           console.log(free_shipping);
           console.log(coupon_dis);
           console.log(min_order);
           console.log(is_enable);
           $('.id').val(id);
           $('.zoneid').val(zoneid);
           $('.method_title').text(name+" Settings");

           if(name == 'Flat Rate')
           {
            $('.cost').css('display','block');
            $('.minimum_order').css('display','none');
            $('.free_shipping').css('display','none');
            $('.coupon').css('display','none');
            $('.method_cost').val(cost);
            

           }
           else{
            $('.cost').css('display','none');

           }
           if(name == 'Free Shipping')
           {
            $('.free_shipping').css('display','block');
            $('.method_free_ship').val(free_shipping);
           }
           else{
            $('.free_shipping').css('display','none');
            
           }
           if(free_shipping != null)
           {
            if( free_shipping == 'A minimum order amount' || free_shipping == 'A minimum order amount OR coupon' || free_shipping =='A minimum order amount AND coupon')
            {
                $('.minimum_order').css('display','block');
                $('.coupon').css('display','block');
                $('.method_min').val(min_order);
                $('.method_coupon').val(coupon_dis);
            }
            else{
                $('.minimum_order').css('display','none');
                $('.coupon').css('display','none');
            }
           }
           if(coupon_dis != null)
            {
                $('.method_coupon').attr('checked', true );
                
            }
            else{
                $('.method_coupon').attr('checked', false );

            }
           $('.zoneid').val(is_enable);

    });
    $(document).on('change','.method',function(){
       var method =  $(this).val();
       if(method == 'Flat Rate')
       {
        $('.cost').css('display','block');
        $('.minimum_order').css('display','none');
        $('.free_shipping').css('display','none');
        $('.coupon').css('display','none');
       }
       else if (method == 'Free Shipping')
       {
        $('.cost').css('display','none');
        $('.free_shipping').css('display','block');
        
       }
    });
    $(document).on('change','.free_shipping_requires',function(){
       var free_shipping =  $(this).val();
       if(free_shipping == 'A minimum order amount' || free_shipping == 'A minimum order amount OR coupon' || free_shipping =='A minimum order amount AND coupon' )
       {
        $('.cost').css('display','none');
        $('.minimum_order').css('display','block');
        $('.coupon').css('display','block');
        
       }
       else 
       {
        $('.cost').css('display','none');
        $('.minimum_order').css('display','none');
        $('.coupon').css('display','none');
        
       }
    });
</script>
@endsection