@extends('adminpanel.layout.master')
@section('styles')
<link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/morrisjs/morris.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/admin-assets/assets/vendor/chartist/css/chartist.min.css')}}">
@endsection
@section('content')
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2></h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li>                            
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active"></li>
                        </ul>
                    </div>
                    
                </div>
            </div>

            <div class="row clearfix row-deck">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card top_widget primary-bg">
                        <div class="body">
                            <div class="icon bg-light">
                                <i class="fa fa-user"></i> 
                            </div>
                            <div class="content text-dark">
                                <div class="text mb-2 text-uppercase">
                                    Total Leads
                                </div>
                                <h4 class="number mb-0">{{$total_leads}}<span class="font-12"></span></h4>   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card top_widget primary-bg">
                        <div class="body">
                            <div class="icon bg-light"><i class="fa fa-user"></i> </div>
                            <div class="content text-dark">
                                <div class="text mb-2 text-uppercase ">This Month Leads</div>
                                <h4 class="number mb-0">{{$current_month_leads}}</h4>
                                
                            </div>
                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card top_widget primary-bg">
                        <div class="body">
                            <div class="icon bg-light"><i class="fa fa-user"></i> </div>
                            <div class="content text-dark">
                                <div class="text mb-2 text-uppercase">Today's Leads</div>
                                <h4 class="number mb-0">{{$current_day_leads}}</h4>
                                
                            </div>
                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card top_widget primary-bg">
                        <div class="body">
                            <div class="icon bg-light"><i class="fa fa-user"></i> </div>
                            <div class="content text-dark">
                                <div class="text mb-2 text-uppercase">Last Month Leads</div>
                                <h4 class="number mb-0">{{$leadpreviousMonthly}}</h4>
                                
                            </div>
                        
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>Leads Summary on Daily Basis</h2>
                            </div>
                            <div class="body text-center">
                                <div class="sparkline" data-type="bar" data-width="100%" data-height="100px"
                                    data-bar-Width="7" data-bar-Spacing="10" data-bar-Color="#02b5b2">
                                    @foreach($leads as $lead)  {{$lead->lead_count}}, @endforeach</div>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        <p class="mb-0">Yesterday</p>
                                        <h6>{{$last_day_leads}}</h6>
                                    </div>
                                    <div class="col-4">
                                        <p class="mb-0">This Month</p>
                                        <h6>{{$current_month_leads}}</h6>
                                    </div>
                                    <div class="col-4">
                                        <p class="mb-0">Last Month</p>
                                        <h6>{{$leadpreviousMonthly}}</h6>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            
@endsection
@section('scripts')
<script></script>

    <script src="{{asset('public/admin-assets/assets/bundles/flotscripts.bundle.js')}}"></script>
    
    <script src="{{asset('public/admin-assets/assets/bundles/chart-widgets.js')}}"></script>
@endsection