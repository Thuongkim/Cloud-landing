@extends('frontend.master')

@section('title'){!! trans('frontend.home') !!}@stop

@section('seo_keywords'){!! isset($staticPages[$lang]['seo-keywords']['description']) ? strip_tags($staticPages[$lang]['seo-keywords']['description']) : '' !!}@stop
@section('seo_description'){!! isset($staticPages[$lang]['seo-description']['description']) ? strip_tags($staticPages[$lang]['seo-description']['description']) : '' !!}@stop

@section('content')

<div class="page-content bg-white">
			<!-- Slider -->
			<div class="main-slider style-two default-banner" id="home">
				<div class="tp-banner-container">
					<div class="tp-banner">
						<div id="welcome_wrapper" class="rev_slider_wrapper fullscreen-container"
							data-alias="reveal-add-on36" data-source="gallery" style="background:#ffffff;padding:0px;">
							<!-- START REVOLUTION SLIDER 5.4.7.2 fullscreen mode -->
							<div id="welcome" class="rev_slider fullscreenbanner" style="display:none;"
								data-version="5.4.7.2">
								<ul>
									<!-- SLIDE  -->
									@foreach($sliders as $slider)
									<li data-index="rs-100" data-transition="slideoververtical"
										data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"
										data-easein="default" data-easeout="default" data-masterspeed="default"
										data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide"
										data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
										data-param6="" data-param7="" data-param8="" data-param9="" data-param10=""
										data-description="">
										<!-- MAIN IMAGE -->
										<img src="{{ asset('assets/frontend/images/main-slider/dummy.png') }}" alt=""
											data-lazyload="{!! asset($slider['image']) !!}"
											data-bgposition="center center" data-kenburns="on" data-duration="4000"
											data-ease="Power3.easeInOut" data-scalestart="150" data-scaleend="100"
											data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0"
											data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="4"
											class="rev-slidebg" data-no-retina>
										<!-- LAYER NR. 1 -->
										<!-- LAYERS -->
										{{-- <div class="tp-caption tp-shape tp-shapewrapper " id="slide-100-layer"
											data-x="['center','center','center','center']"
											data-hoffset="['0','0','0','0']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['0','0','0','0']" data-width="full" data-height="full"
											data-whitespace="nowrap" data-type="shape" data-basealign="slide"
											data-responsive_offset="off" data-responsive="off"
											data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}]'
											data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
											data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
											data-paddingleft="[0,0,0,0]"
											style="z-index: 2;background-color:rgba(0, 0, 0, 0.1);border-color:rgba(0, 0, 0, 0);border-width:0px; background-image:url({{ asset('assets/frontend/images/overlay/rrdiagonal-line.png') }})">
										</div> --}}
										<!-- LAYER NR. 1 -->

										<div class="tp-caption tp-shape tp-shapewrapper ov-tp " id="slide-100-layer-1"
											data-x="['center','center','center','center']"
											data-hoffset="['0','0','0','0']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['0','0','0','0']" data-width="full" data-height="full"
											data-whitespace="nowrap" data-type="shape" data-basealign="slide"
											data-responsive_offset="off" data-responsive="off"
											data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]'
											data-textAlign="['inherit','inherit','inherit','inherit']"
											data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
											data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
											style="z-index: 5;font-family: 'rubik', sans-serif;">
										</div>
										<div class="tp-caption " id="slide-100-layer-3"
											data-x="['center','center','center','center']"
											data-hoffset="['-90','-200','0','0']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['-100','-100','-100','-90']"
											data-fontsize="['65','40','40','30']"
											data-lineheight="['80','40','40','30']"
											data-letterspacing="['2','2','2','2']"
											data-width="['1000','none','768','360']" data-height="none"
											data-whitespace="['normal','nowrap','normal','normal']" data-type="text"
											data-responsive_offset="off" data-responsive="off"
											data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
											data-textAlign="['left','left','center','center']"
											data-paddingtop="[0,0,0,0]" data-paddingright="[10,10,0,0]"
											data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
											style="z-index: 6; min-width: 800px; max-width: 800px; font-weight: 600; white-space: normal; color: #fff; font-family: 'Poppins',sans-serif;">
											<!-- Fast and Reliable <br/>Electrical services -->
										</div>
										<!-- LAYER NR. 3 -->
										<div class="tp-caption" id="slide-100-layer-4"
											data-x="['center','center','center','center']"
											data-hoffset="['-265','-165','0','0']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['50','0','-5','00']" data-fontsize="['18','16','14','14']"
											data-lineheight="['30','30','26','26']"
											data-width="['640','481','500','300']" data-height="none"
											data-whitespace="normal" data-type="text" data-responsive_offset="off"
											data-responsive="off"
											data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
											data-textAlign="['left','left','center','center']"
											data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
											data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
											style="z-index: 7; min-width: 640px; max-width: 640px; font-weight: 700; font-size: 18px; line-height: 30px; font-weight: 400; color: #fff; font-family: 'Poppins',sans-serif;">
										</div>
										<!-- LAYER NR. 5 -->
										<a class="tp-caption rev-btn tc-btnshadow tp-rs-menulink" href="{!! route('home.static-page', 'thong-tin-chung') !!}"
											target="_self" id="slide-100-layer-5"
											data-x="['center','center','center','center']"
											data-hoffset="['-510','-335','-100','-80']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['160','90','80','90']"
											data-lineheight="['18','18','18','18']" data-whitespace="nowrap"
											data-type="button" data-actions='' data-responsive_offset="off"
											data-responsive="off"
											data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"x:-50px;z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;fbr:100;","bgcolor":"#000000","to":"o:1;fbr:100;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","bgcolor":"#000000","to":"opacity:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"150","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fbr:90%;","style":"c:rgba(255,255,255,1);"}]'
											data-textAlign="['center','center','center','center']"
											data-paddingtop="[15,15,15,10]" data-paddingright="[30,30,30,20]"
											data-paddingbottom="[15,15,15,10]" data-paddingleft="[30,30,30,20]"
											style="z-index: 8;letter-spacing: 2px; white-space: nowrap; font-size: 12px; font-weight: 600; color: rgba(255,255,255,1); font-family:rubik; background-color:#775186; text-transform: uppercase; border-radius: 30px">
										
											{{trans('frontend.about-us')}}
											
										</a>
										<!-- LAYER NR. 5 -->
										<a class="tp-caption rev-btn tc-btnshadow tp-rs-menulink"
											href="{!! route('home.static-page', 'tam-nhin-gia-tri-cot-loi') !!}" target="_self" id="slide-100-layer-6"
											data-x="['center','center','center','center']"
											data-hoffset="['-340','-160','70','70']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['160','90','80','90']"
											data-lineheight="['18','18','18','18']" data-whitespace="nowrap"
											data-type="button" data-actions='' data-responsive_offset="off"
											data-responsive="off"
											data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"x:-50px;z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;fbr:100;","bgcolor":"#000000","to":"o:1;fbr:100;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","bgcolor":"#000000","to":"opacity:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"150","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fbr:90%;","style":"c:rgba(255,255,255,1);"}]'
											data-textAlign="['center','center','center','center']"
											data-paddingtop="[15,15,15,10]" data-paddingright="[30,30,30,20]"
											data-paddingbottom="[15,15,15,10]" data-paddingleft="[30,30,30,20]"
											style="z-index: 8;letter-spacing: 2px; white-space: nowrap; font-size: 12px; font-weight: 600; color: rgba(255,255,255,1); font-family:rubik; background-color:#775186; text-transform: uppercase;border-radius: 30px">
											{{trans('frontend.tam-nhin')}}
										</a>
									</li>
									@endforeach
								</ul>
								<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
							</div>
						</div>
						<!-- END REVOLUTION SLIDER -->
					</div>
				</div>
			</div>
			<!-- Slider END -->
			<!-- contact area -->
			<div class="content-block">
				<!-- Call To Action End -->
				<div class="section-full call-action bg-primary wow fadeIn" data-wow-duration="2s"
					data-wow-delay="0.2s">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-white">
								<h2 class="title">{{trans('frontend.introduction')}}</h2>
								<p class="m-b0">
								{!! isset($staticPages[$lang]['index']['description']) ? $staticPages[$lang]['index']['description'] : '' !!}
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- Call To Action End -->
				<!-- Dự án-->			

				<!-- About Us -->
				<div class="section-full content-inner bg-white active wow zoomIn" style="visibility: visible; animation-duration: 0.6s; animation-delay: 0.8s;" data-wow-duration="2s"
					data-wow-delay="0.4s">
					<div class="container">
						<div class="section-head text-black text-center">
							<h2 class="title" style="text-transform: uppercase;">
								{{trans('frontend.service_home')}}
							</h2>
						</div>
						<div class="on-show-slider ">
							
							<div id="sync2" class="owl-carousel owl-theme owl-none owl-dots-none project-list">
								@foreach($servicess as $servicesLang)
								<div class="item image_logo">
									<div class="project-owbx" style="background: url({{ asset($servicesLang['image_logo']) }}); max-height: 153px; max-width:277.5px;">
										<div class="hovers">
										{{-- @if($servicesLang['image_logo'])
										<img src="{{ asset($servicesLang['image_logo']) }}" style="max-height: 150px; max-width:270px;z-index: -100; position:absolute; border-radius: 8px;">
										@else
										<i class="fa {{ $servicesLang['icon'] }}"></i>
										@endif --}}
										<h4 class="title" style="margin-top: 30px; font-size: 17px!important; font-family: Roboto Black Italic !important; 	text-transform: uppercase;"><b>
											<?php $str = explode ('-', $servicesLang[$lang]['title']); ?>
											{{ $str[0] }}<br>{{ $str[1] }}</b>
										</h4>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div id="sync1"
								class="owl-carousel owl-theme owl-btn-center-lr m-b5 owl-dots-none owl-btn-3 primary">
								@foreach($servicess as $servicesLang)
								<div class="item">
									<div class="row service align-items-center">
										<div class="col-lg-8 col-md-8 m-b30">
											<div class="our-story">
												<h2 class="title" style="text-transform: uppercase;">
													<?php $string = str_replace('-','',$servicesLang[$lang]['title']) ?>
													{{ $string }}
												</h2>
												<h4 style="font-size: 18px;">{!! $servicesLang[$lang]['summary_long'] !!}</h4>
												<p>{!! $servicesLang[$lang]['summary'] !!}</p>
												<a href="{!! route('home.services-detail', ['slug' => str_slug($servicesLang[$lang]['title']), 'id' => $servicesLang['id']]) !!}" class="site-button btnhover16">{{trans('frontend.read_more')}}</a>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 m-b30">
											<img src="{{ asset($servicesLang['image']) }}" class="radius-sm" style="max-height: 320px;max-width: 360px;padding: 0px;">
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>

					</div>
				</div>
				<!-- About Us End -->
				<!-- Client logo -->
				<div class="container">
					<div class="section-head text-black text-center wow zoomIn" style="visibility: visible; animation-duration: 0.6s; animation-delay: 1s;">
						<h2 class="title" style="text-transform: uppercase;">{{trans('frontend.partner')}}</h2>
					</div>
				</div>
				<div class="section-full content-inner bg-gray wow zoomIn" style="visibility: visible; animation-duration: 0.6s; animation-delay: 1s;" data-wow-duration="2s" data-wow-delay="0.6s">
					<div class="container">
						{{-- <div class="section-head text-black text-center">
							<h2 class="title text-capitalize">{{trans('frontend.partner')}}</h2>
						</div> --}}
						{{-- <div
							class="client-logo-carousel owl-loaded owl-theme owl-carousel owl-dots-none owl-btn-center-lr owl-btn-3">
							@foreach ($partners as $partner)
							<div class="item fly-box-ho">
								<div class="ow-client-logo">
									<div class="client-logo border">
										<a href="{{ $partner['partner_link'] }}"><img src="{!! asset('assets/media/images/partners/' . $partner['image']) !!}" alt=""></a>
									</div>
								</div>
							</div>
							@endforeach
						</div> --}}

						<div class="owl-team owl-carousel dlab-team11-area owl-theme owl-btn-center-lr owl-dots-none owl-btn-3">
						@foreach ($partners as $partner)
						<div class="item wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
							<div class="dlab-box dlab-team11">
								<div class="dlab-media dlab-img-effect zoom">
									<a href="{{ $partner['partner_link'] }}"><img src="{!! asset('assets/media/images/partners/' . $partner['image']) !!}" alt=""></a>
								</div>
							</div>
						</div>
						@endforeach

					</div>

					</div>
				</div>


				<!-- Client logo End -->
				<!-- Services -->
				<!-- Portfolio  -->

				<!-- <div class="section-full content-inner portfolio bg-white du_an active wow zoomIn" style="visibility: visible; animation-duration: 0.6s; animation-delay: 1.2s;" id="portfolio" >
					<div class="container">
						<div class="section-head text-black text-center">
							<h2 class="title ">{{trans('frontend.project')}}</h2>
						</div>
						<div class="site-filters clearfix center  m-b40">
							<ul class="filters_1" data-toggle="buttons">
								{{-- <li data-filter="" class="btn active">
									<input type="radio">
									<a href="javascript:void(0);"
										class="site-button-secondry button-sm radius-xl"><span>{{trans('frontend.all')}}</span></a>
									</li> --}}
									@foreach ($projectCategories as $k => $projectCategory)
									@if($k == 0)
									<li data-filter="project_{{ $projectCategory['id']}}" class="btn active metal">
										<input type="radio">
										<a href="javascript:void(0);"
										class="site-button-secondry button-sm radius-xl"><span>{{trans('frontend.project')}} {{ $projectCategory[$lang]['name']}}</span></a>
									</li>
									@else
									<li data-filter="project_{{$projectCategory['id']}}" class="btn">
										<input type="radio">
										<a href="javascript:void(0);"
										class="site-button-secondry button-sm radius-xl"><span>{{trans('frontend.project')}} {{ $projectCategory[$lang]['name']}}</span></a>
									</li>
									@endif
									@endforeach
								</ul>
							</div>

							<div class="clearfix" id="lightgallery">
								<ul id="masonry_1" class=" portfolio-ic dlab-gallery-listing gallery-grid-4 gallery lightgallery text-center">
									@php
									$tmp = []
									@endphp
									@foreach ($projects as $project)
									@if ($project[$lang]['title'] && $tmp[$project['category_id']] < 4)
									@php
									$tmp[$project['category_id']]++;
									@endphp
									<li class="project_{{ $project['category_id']}} design card-container col-lg-3 col-md-6 col-sm-6 p-a0 fly-box-ho">
										<div class="dlab-box dlab-gallery-box">
											@if (!$project['image'])
											<div class="dlab-media dlab-img-effect zoom-slow">
												<a href="{{ route('project-detail', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}"><img src="https://via.placeholder.com/279x200.png?text=HTE-project" alt="">
												</a>
												{{-- <div class="overlay-bx">
													<div class="overlay-icon">
														<div class="text-white">
															<a href="{{ route('project-detail', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}"><i
																	class="fa fa-link icon-bx-xs"></i></a>
														</div>
													</div>
												</div> --}}
											</div>
											@else
											<div class="dlab-media dlab-img-effect zoom-slow">
												<a href="{{ route('project-detail', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}"><img src="{!! asset('assets/media/images/projects/' . $project['image']) !!}" alt="">
												</a>
												{{-- <div class="overlay-bx">
													<div class="overlay-icon">
														<div class="text-white">
															<a href="{{ route('project-detail', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}"><i
																	class="fa fa-link icon-bx-xs"></i></a>
														</div>
													</div>
												</div> --}}
											</div>
											@endif
											<div class="dez-info p-a30 bg-white">
												<b><p class="dez-title m-t0" style="text-transform: capitalize;">
													<a href="{{ route('project-detail', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}">
														{!! \App\Helper\HString::modSubstr($project[$lang]['title'], 45)!!}
													</a>
												</p></b>
											</div>
										</div>
									</li>
									@endif
									@endforeach
								</ul>
							</div>
						</div>
					</div> -->

				<!-- Services End -->
				<!-- Latest Blog -->
				<div class="section-full bg-white wow zoomIn" style="visibility: visible; animation-duration: 0.6s; animation-delay: 1.4s;">
					<div class="container">
						<div class="section-head text-black text-center">
							<h2 class="title" style="text-transform: uppercase; margin-top: 15px;">{{trans('frontend.news_event')}}</h2>
						</div>
						<!-- blog post Carousel with no margin -->
						<div class="section-content box-sort-in m-b30 button-example">
							<div
								class="blog-carousel mfp-gallery owl-loaded owl-theme owl-carousel gallery owl-btn-center-lr owl-btn-1 primary">
								@foreach ($news as $news)
								@if ($news[$lang]['title'])
								<div class="item">
									<div class="ow-blog-post date-style-2">
										<div class="ow-post-media dlab-img-effect zoom-slow">
											@if(!$news['image'])
											<a href="{{ route('news.show', ['slug' => str_slug($news[$lang]['title']), 'id' => $news['id']]) }}">
												<img src="https://via.placeholder.com/370x250.png?text=HTE-news" style="height: 250px;" alt="">
											</a>
											@else
											<a href="{{ route('news.show', ['slug' => str_slug($news[$lang]['title']), 'id' => $news['id']]) }}">
												<img src="{!! asset('assets/media/' . $news['image']) !!}" style="height: 250px;" alt="">
											</a>
											@endif
										</div>
										<div class="ow-post-info">
											<div class="ow-post-title">
												<h4 class="post-title"> <a href="{{ route('news.show', ['slug' => str_slug($news[$lang]['title']), 'id' => $news['id']]) }}"
														title="news">{!! \App\Helper\HString::modSubstr($news[$lang]['title'], 75) !!}</a> </h4>
											</div>
											<div class="ow-post-meta">
												<ul>
													<li class="post-date"> <i
															class="ti-comment-alt"></i><strong>{!! date("d/m", strtotime($news['updated_at'])) !!}</strong> <span>
															{!! date("Y", strtotime($news['updated_at'])) !!}</span> </li>
													{{-- <li class="post-author"><i class="ti-user"></i>{{trans('frontend.by')}} <a
															href="javascript:void(0);" title="Posts by admin"
															rel="author">{!! $news['created_by'] !!}</a> </li> --}}
												</ul>
											</div>
											{{-- <div class="dlab-post-readmore">
												<a href="{{ route('news.show', ['slug' => str_slug($news[$lang]['title']), 'id' => $news['id']]) }}" title="READ MORE" rel="bookmark"
													class="site-button">{{trans('frontend.read_more')}}
													<i class="ti-arrow-right"></i>
												</a>
											</div> --}}
											{{-- <div class="ow-post-text" style="min-height: 196px;">
												<p>{!! \App\Helper\HString::modSubstr(strip_tags($news[$lang]['summary']), 255) !!}</p>
											</div> --}}
										</div>
									</div>
								</div>
								@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- blog post Carousel with no margin END -->
		</div>
	</div>
	<!-- Latest Blog End -->
	</div>
	<!-- contact area END -->
	</div>


@endsection
