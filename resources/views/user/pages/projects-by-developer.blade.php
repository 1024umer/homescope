@extends('user.layout.master')
@section('content')
<div class="community-title-area bg-1" style="background:url({{ asset('public/bg.jpeg') }}) no-repeat center; background-size:cover;">
        <div class="container">
            <div class="page-title-content">
                <h2>{{$developer->name}}</h2>
                <ul>
                    <li>
                        <a href="{{route('index')}}">
                            Home
                        </a>
                    </li>
                    <li class="active">{{$developer->slug}}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="featured_offers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading" data-heading="Projects">
                        <span>Featured Projects</span>
                    </div>
                    <div class="feturd_ofr_container">
                        @foreach ($projects as $row)
                            <div class="feturd_ofr_item lazy bg_blend" data-src=""
                                style="background:url({{ asset('public/assets/images/projects') }}/{{ $row->banner }});background-position:center;background-size:cover;background-repeat:no-repeat">
                                <div class="tag">{{ $row->status }}</div>
                                <a href="{{route('project.details',$row->slug)}}" class="web_imagebox">
                                    <img src="{{ asset('public/assets/images/projects/logo') }}/{{ $row->logo }}"
                                        class="lazy">
                                </a>
                                <div class="feturd_ofr_content">
                                    <ul class="bages">

                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path
                                                    d="M256-.0078C260.7-.0081 265.2 1.008 269.4 2.913L457.7 82.79C479.7 92.12 496.2 113.8 496 139.1C495.5 239.2 454.7 420.7 282.4 503.2C265.7 511.1 246.3 511.1 229.6 503.2C57.25 420.7 16.49 239.2 15.1 139.1C15.87 113.8 32.32 92.12 54.3 82.79L242.7 2.913C246.8 1.008 251.4-.0081 256-.0078V-.0078zM256 444.8C393.1 378 431.1 230.1 432 141.4L256 66.77L256 444.8z" />
                                            </svg>
                                            {{ $row->community }}
                                        </li>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                <path
                                                    d="M319.9 320c57.41 0 103.1-46.56 103.1-104c0-57.44-46.54-104-103.1-104c-57.41 0-103.1 46.56-103.1 104C215.9 273.4 262.5 320 319.9 320zM369.9 352H270.1C191.6 352 128 411.7 128 485.3C128 500.1 140.7 512 156.4 512h327.2C499.3 512 512 500.1 512 485.3C512 411.7 448.4 352 369.9 352zM512 160c44.18 0 80-35.82 80-80S556.2 0 512 0c-44.18 0-80 35.82-80 80S467.8 160 512 160zM183.9 216c0-5.449 .9824-10.63 1.609-15.91C174.6 194.1 162.6 192 149.9 192H88.08C39.44 192 0 233.8 0 285.3C0 295.6 7.887 304 17.62 304h199.5C196.7 280.2 183.9 249.7 183.9 216zM128 160c44.18 0 80-35.82 80-80S172.2 0 128 0C83.82 0 48 35.82 48 80S83.82 160 128 160zM551.9 192h-61.84c-12.8 0-24.88 3.037-35.86 8.24C454.8 205.5 455.8 210.6 455.8 216c0 33.71-12.78 64.21-33.16 88h199.7C632.1 304 640 295.6 640 285.3C640 233.8 600.6 192 551.9 192z" />
                                            </svg>
                                            {{ $row->developer }}
                                        </li>
                                    </ul>
                                    <h4 class="slide_title show_coupon" data-id="138" data-clipboard-text="NEWBIE10 ">
                                       <a href="{{route('project.details',$row->slug)}}" style="color:white"> {{ $row->name }}</a></h4>
                                    <div
                                        style="
                        overflow: hidden;
                        text-overflow: ellipsis;
                        display: -webkit-box;
                         -webkit-line-clamp: 2;
                         white-space: nowrap;
                         -webkit-box-orient: vertical;color:white" class="ellipsis">
                                        {!! $row->description !!}</div>
                                    <a href="{{route('project.details',$row->slug)}}" class="code_btn get_deal show_coupon">
                                        <span class="get_code">AED {{ $row->price }}</span>
                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <center>
                   {{$projects->links('pagination::bootstrap-4')}}
                    </center>
                </div>
               
            </div>
            
        </div>
    </section>
@endsection