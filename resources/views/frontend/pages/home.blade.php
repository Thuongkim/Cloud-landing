@extends('frontend.master')

@section('title'){!! trans('frontend.home') !!}@stop

@section('seo_keywords'){!! isset($staticPages['seo-keywords']['description']) ? strip_tags($staticPages['seo-keywords']['description']) : '' !!}@stop
@section('seo_description'){!! isset($staticPages['seo-description']['description']) ? strip_tags($staticPages['seo-description']['description']) : '' !!}@stop

@section('content')

<!-- slider
================================================== -->
<div id="slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <ul>
            	@foreach($sliders as $k => $slider)
                <li data-transition="3dcurtain-vertical" data-slotamount="10" data-masterspeed="300">
                    <!-- THE MAIN IMAGE IN THE DEMO SLIDE -->
                    <img alt="" src="{{ asset($slider['image']) }}">

                    <!-- THE CAPTIONS IN THIS SLDIE -->
                    <div class="caption randomrotate" data-x="700" data-y="122" data-speed="600" data-start="1200" data-easing="easeOutExpo">
                        <img src="{{ asset($slider['sub_image']) }}" />
                    </div>
                    <div class="caption big_white sft stt slide3-style" data-x="10" data-y="100" data-speed="500" data-start="1500" data-easing="easeOutExpo">
                        <span class="blue-color"class="opt-style2"><span style="color: white;">{!! $slider['name'] !!}</span></span>
                    </div>
                    <!-- <div class="caption modern_medium_fat sft stt slide3-style" data-x="520" data-y="237" data-speed="500" data-start="1700" data-easing="easeOutExpo">
                        <span class="opt-style2">ViCloud</span>
                    </div> -->
                    <div class="caption lfr medium_text" data-x="10" data-y="170" data-speed="600" data-start="1900" data-easing="easeOutExpo">
                        <!-- <a href="http://vicloud.vn" target="blank_" style="background: #0076f9; color: white;">Chi tiết</a> -->
                        <div>
                        {!! $slider['summary'] !!}
                        </div>
                        <br>
                        <div id="demo_{{ $k}}" class="collapse" style="width: 100%;">
                        {!! $slider['content']!!}
                        </div>
                        <a>
                            <button type="button" class="detail" data-toggle="collapse" data-target="#demo_{{ $k}}">Chi tiết</button>
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- End slider -->
<!-- content
================================================== -->

<div id="content">
    <div class="fullwidth-box">
        <div class="container">
            <!-- services-box -->
            <div class="services-box">
                <div class="row">
                	@foreach($services as $service)
                    <div class="col-sm-4">
                        <div class="services-post">
                            <a class="services-cloud-server" href="javascript:void(0)">
                                <img alt="" src="{{ asset($service['image']) }}">
                            </a>
                            <div class="services-post-content">
                                <h4>{!! $service['title'] !!}</h4>
                                <p>{!! $service['content'] !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- SSL pricing section  -->
            <div class="services-box">
                <h3 class="box-title">Đăng kí sử dụng dễ dàng</h3>
                 <div class="row">
                 	@foreach($steps as $k => $step)
                    <div class="{!! ($k == 0) ? ('col-xs-4 col-sm-2 col-sm-offset-1') : ('col-xs-4 col-sm-2') !!}">
                        <div class="services-post">
                            <div class="services-post-content">
                                <h4>{!! $step['title'] !!}</h4>
                            </div>
                            <a class="services-cloud-server" href="javascript:void(0)">
                                <img alt="" src="{{ asset($step['image']) }}">
                            </a>
                            <div class="services-post-content">
                                <p>{!! $step['content'] !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-sm-6">
                       {!! isset($staticPages['image']['description']) ? $staticPages['image']['description'] : '' !!}
                    </div>
                    <div class="col-sm-6">
                        <h2 class="exp">{!! isset($staticPages['experience']['description']) ? $staticPages['experience']['description'] : '' !!}</h2><br>
                        <div class="red-words">{!! isset($staticPages['advisory']['description']) ? $staticPages['advisory']['description'] : '' !!}</div>
                    </div>
                    <a href="#"><button class="read-more">Chi tiết</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- static-box -->
    <div class="footer-line exp-box">
        <div class="container">
            <div class="exp-line-in">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="exp-box-title">BẰNG KINH NGHIỆM VÀ SỰ THẤU HIỂU KHÁCH HÀNG  ĐƯỢC MINH CHỨNG QUA</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fullwidth-box">
        <div class="container">
            <div class="services-box">
                <div class="row" id="counter">
                    {!! isset($staticPages['succeed']['description']) ? $staticPages['succeed']['description'] : '' !!}
                    {{-- <div class="col-sm-3 col-xs-6">
                        <div class="services-post col-md-offset-3">
                            <div class="exp-icon col-sm-5">
                                <i class="fa fa-calendar fa-4x"></i>
                            </div>
                            <div class="exp-icon col-sm-7 services-post-content">
                                <h2> > 6</h2>
                                <div>Năm phát triển</div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-3 col-xs-6">
                        <div class="services-post col-md-offset-3">
                            <div class="exp-icon col-sm-5">
                                <i class="fa fa-paper-plane fa-4x"></i>
                            </div>
                            <div class="exp-icon col-sm-7 services-post-content">
                                <h2> > 2000</h2>
                                <div>VM đã cung cấp</div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-3 col-xs-6">
                        <div class="services-post col-md-offset-1">
                            <div class="exp-icon col-sm-5">
                                <i class="fa fa-heart-o fa-4x"></i>
                            </div>
                            <div class="exp-icon col-sm-7 services-post-content">
                                <h2>99%</h2>
                                <div>Hài lòng về dịch vụ</div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-3 col-xs-6">
                        <div class="services-post col-md-offset-1">
                            <div class="exp-icon col-sm-5">
                                <i class="fa fa-hand-peace-o fa-4x"></i>
                            </div>
                            <div class="exp-icon col-sm-7 services-post-content">
                                <h2>100%</h2>
                                <div>Hài lòng về thái độ phục vụ</div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- teams-box -->
            <div class="person-box">
                <h3 class="box-title">Đội ngũ nhân sự</h3>
                <div class="row">
                @foreach($teams as $team)
	                <div class="col-sm-4">
	                  <img class="img-circle" src="{{ asset('assets/media/images/teams/'. $team['image']) }}" alt="Generic placeholder image" width="200" height="200">
	                  <h2>{!! $team['name'] !!}</h2>
	                  <p>{!! $team['duty'] !!}</p>
	                  <p>{!! $team['content'] !!}</p>
	                </div><!-- /.col-lg-4 -->
                @endforeach
              	</div><!-- /.row -->
            </div>
        </div>
    </div>
    <br>
    <div style="background-color: #efefef;">
        <div class="fullwidth-box">
            <div class="container">
                <div class="table-box">
                    <h3 class="box-title">EVG-CLOUD CUNG CẤP CHO BẠN CÁC GÓI SẢN PHẨM</h3>
                    <div class="row">
                        @foreach($prices as $price)
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="services-post">
                                <div class="table-post-content">
                                    <table width="85%" align="center">
                                        <tr>
                                            <td><h1>{{ $price['price'] }}</h1></td>
                                            <td><button class="table-button">{{ $price['type'] }}</button></td>
                                        </tr>
                                        <tr class="border-table"><td colspan="2">{{ $price['cpu'] }}</td></tr>
                                        <tr class="border-table"><td colspan="2">{{ $price['ram'] }}</td></tr>
                                        <tr class="border-table"><td colspan="2">{{ $price['ssd'] }}</td></tr>
                                        <tr><td colspan="2">{{ $price['ip'] }}</td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-8 col-md-offset-2 contact-content"><h2 class="contact-button">LIÊN HỆ NGAY ĐỂ TRẢI NGHIỆM DỊCH VỤ</h2></div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: white;">
        <div class="fullwidth-box">
            <div class="container">
                <div class="table-box">
                    <a class="table-text" href="tel:{!! isset($staticPages['phone']['description']) ? $staticPages['phone']['description'] : '' !!}"><h2 class="contact-content"><b>{!! isset($staticPages['zalo']['description']) ? $staticPages['zalo']['description'] : '' !!}</b></h2></a>
                     <a class="table-text" href="https://client.evgcorp.net"><h2 class="contact-content"><b>{!! isset($staticPages['domain']['description']) ? $staticPages['domain']['description'] : '' !!}</b></h2></a>
                    <div class="col-md-2 col-md-offset-5 contact-content">
                        <img alt="" src="/assets/media/images/rocket.png"/>
                        <div class="col-md-12 contact-content">
                            <button class="contact-small-button">liên hệ ngay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End content -->

@endsection
