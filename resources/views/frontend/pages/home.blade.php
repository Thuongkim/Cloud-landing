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
                        <button type="button" class="detail" data-toggle="collapse" data-target="#demo_{{ $k}}">Chi tiết</button>
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
                    <div class="col-md-4">
                        <div class="services-post">
                            <a class="services-cloud-server" href="javascript:void(0)">
                                <i class="{!! $service['icon'] !!}"></i>
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
                    <div class="{!! ($k == 0) ? ('col-md-2 col-md-offset-1') : ('col-md-2') !!}">
                        <div class="services-post">
                            <div class="services-post-content">
                                <h4>{!! $step['title'] !!}</h4>
                            </div>
                            <a class="services-cloud-server" href="javascript:void(0)">
                                <i class="{!! $step['icon'] !!}"></i>
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
                        <h4 style="color: #d29103;margin-top: 30px;">{!! isset($staticPages['experience']['description']) ? $staticPages['experience']['description'] : '' !!}</h4><br>
                        <p><a href="{{ route('home') }}"><i class="fa fa-hand-o-right"></i>{!! isset($staticPages['advisory']['description']) ? $staticPages['advisory']['description'] : '' !!}</a></p>
                    </div>
                    <a href="#"><button class="read-more">Chi tiết</button></a>
                </div>
            </div>

            <div class="person-box">
                <h3 class="box-title">Đội ngũ nhân sự</h3>
                <div class="row">
                @foreach($teams as $team)
	                <div class="col-lg-4">
	                  <img class="img-circle" src="{{ asset('assets/media/images/teams/'. $team['image']) }}" alt="Generic placeholder image" width="200" height="200">
	                  <h2>{!! $team['name'] !!}</h2>
	                  <p>{!! $team['duty'] !!}</p>
	                  <p>{!! $team['content'] !!}</p>
	                </div><!-- /.col-lg-4 -->
                @endforeach
              	</div><!-- /.row -->
          </div>
            <br/>
        </div>
    </div>
</div>
<!-- End content -->

@endsection
