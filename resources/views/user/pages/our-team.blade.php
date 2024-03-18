@extends('user.layout.master')
@section('content')

			<div class="community-title-area bg-1" style="background:url({{ asset('public/bg.jpeg') }}) no-repeat center; background-size:cover;">
				<div class="container">
					<div class="page-title-content">
						<h2>Our Team</h2>
						<ul>
							<li>
								<a href="/">
									Home
								</a>
							</li>

							<li class="active">Our Team</li>
						</ul>
					</div>
				</div>
			</div>
            <div class="can-help-area pt-70 pb-4 " style="background:#3E3C3D">
				<div class="container">
					<div class="section-title left-title">
						<h2 class="mb-1" style="color:white">Meet Our Team</h2>
					</div>
					<p class=" mb-5" style="color:white">We want to provide our consumers options to consider, working with our sales and marketing staff in Dubai Real Estate. The team is tasked with examining all the variables in order to assist people who are interested in purchasing and selling real estate in the UAE.

					</p>

					<div class="row justify-content-center">
					    @foreach($teams as $row)
						<div class="col-sm-6 col-md-4 col-lg-3">
							<div class="single-agents style-agents text-center " >
								<div class="agents-img pt-4">
									<img src="{{asset('public/assets/images/teams')}}/{{$row->image}}" alt="Samer Al Naqbi" class="rounded-circle" />
								</div>
								<div class="agents-content">
									<h3 style="color:#C59E53"> {{$row->name}}</h3>
									<p class="text-uppercase"  style="color:white">{{$row->designation}}</p>
									<p class=""  style="color:white;text-transform:lowercase">{!!$row->description!!}</p>
									<ul class="info">
										<li  style="color:white">
										 {{$row->languages}}
										</li>
									</ul>
								</div>
								<div class="shadw"></div>
							</div>
						</div>
						@endforeach
						</div>
						</div>
						</div>
@endsection
