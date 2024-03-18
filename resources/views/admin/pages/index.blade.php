@extends('admin.layout.master')
@section('content')
   <!--start breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0 align-items-center">
          <li class="breadcrumb-item"><a href="javascript:;">
              <ion-icon name="home-outline"></ion-icon>
            </a>
          </li>
        </ol>
      </nav>
    </div>
    
  </div>
  <!--end breadcrumb-->


  <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
    <div class="col">
      <div class="card radius-10">
        <div class="card-body">
          <div class="d-flex align-items-center gap-2">
            <div class="fs-5">
              <ion-icon name="person-add-outline"></ion-icon>
            </div>
            <div>
              <p class="mb-0">Total Leads</p>
            </div>
            <div class="fs-5 ms-auto">
              <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
            </div>
          </div>
          <div class="d-flex align-items-center mt-3">
            <div>
              <h5 class="mb-0">{{$total_leads}}</h5>
            </div>
            <div class="ms-auto" id="chart1"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10">
        <div class="card-body">
          <div class="d-flex align-items-center gap-2">
            <div class="fs-5">
              <ion-icon name="heart-outline"></ion-icon>
            </div>
            <div>
              <p class="mb-0">This Month Leads</p>
            </div>
            <div class="fs-5 ms-auto">
              <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
            </div>
          </div>
          <div class="d-flex align-items-center mt-3">
            <div>
              <h5 class="mb-0">{{$current_month_leads}}</h5>
            </div>
            <div class="ms-auto" id="chart2"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10">
        <div class="card-body">
          <div class="d-flex align-items-center gap-2">
            <div class="fs-5">
              <ion-icon name="person-add-outline"></ion-icon>
            </div>
            <div>
              <p class="mb-0">Last Month Leads</p>
            </div>
            <div class="fs-5 ms-auto">
              <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
            </div>
          </div>
          <div class="d-flex align-items-center mt-3">
            <div>
              <h5 class="mb-0">{{$leadpreviousMonthly}}</h5>
            </div>
            <div class="ms-auto" id="chart1"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10">
        <div class="card-body">
          <div class="d-flex align-items-center gap-2">
            <div class="fs-5">
              <ion-icon name="heart-outline"></ion-icon>
            </div>
            <div>
              <p class="mb-0">Today's Leads</p>
            </div>
            <div class="fs-5 ms-auto">
              <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
            </div>
          </div>
          <div class="d-flex align-items-center mt-3">
            <div>
              <h5 class="mb-0">{{$current_day_leads}}</h5>
            </div>
            <div class="ms-auto" id="chart2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end row-->

@endsection