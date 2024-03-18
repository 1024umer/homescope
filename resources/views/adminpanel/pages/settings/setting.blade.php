@extends('adminpanel.layout.master')
@section('styles')
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/multi-select/css/multi-select.css')}}">
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
@endsection
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>All Settings</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li>                            
                            <li class="breadcrumb-item">Settings</li>
                            <li class="breadcrumb-item active">All Settings</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <!-- <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download report</button> -->
                                
                            </div>
                            <div class="p-2 d-flex">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <form @if($generalsettings)  action="{{route('update.setting')}}" @else action="{{route('store.setting')}}" @endif method="post" enctype="multipart/form-data">
                            @csrf
                            @if($generalsettings)
                            <input type="hidden" name="id" value="{{$generalsettings->id}}">
                            @endif
                            <div class="body">
                                <h6>Site Information</h6>
                                <br>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">       
                                            <label for="">Site Title</label>                                         
                                            <input type="text" class="form-control" placeholder="Site Title" name="site_title" @if($generalsettings) value="{{$generalsettings->site_title}}" @endif>
                                        </div>
                                        <div class="form-group">       
                                            <label for="">Meta Title</label>                                         
                                            <input type="text" class="form-control" placeholder="Meta Title" name="meta_title" @if($generalsettings) value="{{$generalsettings->meta_title}}" @endif>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">                                                
                                            <label for="">Meta Tags</label>                                         
                                            <input type="text" class="form-control" placeholder="Meta Tags" name="meta_tags" @if($generalsettings) value="{{$generalsettings->meta_tags}}" @endif>
                                        </div>
                                        <div class="form-group">                                                
                                            <label for="">Meta Keywords</label>                                         
                                            <input type="text" class="form-control" placeholder="Meta Keywords" name="meta_keywords" @if($generalsettings) value="{{$generalsettings->meta_keywords}}" @endif>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta Description</label>                                         
                                            <textarea name="meta_description" class="form-control" name="meta_description">@if($generalsettings) {{$generalsettings->meta_description}} @endif</textarea>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
@section('scripts')
<script src="{{asset('public/admin-assets/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script> <!-- Bootstrap Colorpicker Js --> 
<script src="{{asset('public/admin-assets/assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script> <!-- Input Mask Plugin Js --> 
<script src="{{asset('public/admin-assets/assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script> <!-- Multi Select Plugin Js -->
<script src="{{asset('public/admin-assets/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/admin-assets/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script> <!-- Bootstrap Tags Input Plugin Js --> 
<script src="{{asset('public/admin-assets/assets/bundles/advanced-form-elements.js')}}"></script>
<script>
    $('#btn-upload-favicon').on('click', function() {
            $(this).siblings('#filePhoto').trigger('click');
    });

    $('#btn-upload-weblogo').on('click', function() {
            $(this).siblings('#filePhoto').trigger('click');
    });
    $('#btn-upload-mobilelogo').on('click', function() {
            $(this).siblings('#filePhoto').trigger('click');
    });
     
    $('#currency_id').on('change', function () {
      var Currency_id = this.value;
      $("#code").html('');
      $.ajax({
         url: "{{url('get-currency-list')}}",
         type: "POST",
         data: {
            currency_id: Currency_id,
            _token: '{{csrf_token()}}'
         },
         dataType: 'json',
         success: function (result) {
            console.log(result);
            $.each(result.codes, function (key, value) {
               $("#code").append('<option value="' + value.html_entity + '">' + value.html_entity + '</option>');
            });
         }
      });
   }); 

   

   $(document).on('change','.closedeliverycheck',function(){
        if(this.checked){
            $('.scheduledeliverycheck').attr('disabled',true);
        }
        else{
            $('.scheduledeliverycheck').attr('disabled',false);

        }
   });
   $(document).on('change','.scheduledeliverycheck',function(){
        if(this.checked){
            $('.closedeliverycheck').attr('disabled',true);
        }
        else{
            $('.closedeliverycheck').attr('disabled',false);

        }
   });
</script>
@endsection
