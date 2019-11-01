@extends('frontend.master')

@section('title'){!! strip_tags($categories[0][$lang]['name']) !!}@stop

@section('seo_keywords'){!! strip_tags($detailService[0][$lang]['name']) !!}@stop
@section('seo_description'){!! strip_tags($detailService[0][$lang]['name']) !!}@stop

@section('content')

<!-- Content -->
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="animation-effects">
		<div class="dlab-bnr-inr overlay-black-middle bg-pt active wow zoomIn" style="background-image:url({{ asset('assets/frontend/images/main-slider/slide1.jpg') }});">
			<div class="container">
				<div class="dlab-bnr-inr-entry">
					<h1 class="text-white">{!! $categories[0][$lang]['name'] !!}</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="{{ route('home') }}">{!! trans('frontend.home') !!}</a></li>
							<li>{!! $categories[0][$lang]['name'] !!}</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
				</div>
			</div>
		</div>
	</div>

	<!-- inner page banner END -->
	{{-- <div class="content-area">
		<div class="container">
			<div class="row">
				<!-- Left part start -->
				<div class="col-xl-9 col-lg-8 col-md-7">
					@foreach($serviceCategories as $service)
					<div class="blog-post blog-lg blog-rounded dlab-info p-a20 border-1">
						<div class="dlab-post-media dlab-img-effect zoom-slow col-xl-3 col-lg-3 col-md-3">
							<img src="{{ asset($service['image']) }}" alt="">
						</div>
						<div class="dlab-info p-a20">
							<div class="dlab-post-meta">
								<ul>
									<li class="post-date"> <strong>{!! date("d/m", strtotime($service['updated_at'])) !!}</strong> <span> {!! date("/Y", strtotime($service['updated_at'])) !!}</span> </li>
									<li class="post-author"> {{trans('frontend.by')}} <a href="">{{$service['created_by']}}</a> </li>
								</ul>
							</div>
							<div class="dlab-post-title">
								<h4 class="post-title"><a href="{!! route('home.services-detail', ['slug' => str_slug($service[$lang]['title']), 'id' => $service['id']]) !!}">{{ $service[$lang]['title'] }}</a></h4>
							</div>
							<div class="dlab-post-text">
								<p>{!! $service[$lang]['summary'] !!}</p>
							</div>
							<div class="dlab-post-readmore">
								<a href="{!! route('home.services-detail', ['slug' => str_slug($service[$lang]['title']), 'id' => $service['id']]) !!}" title="READ MORE" rel="bookmark"
									class="site-button">{{trans('frontend.read_more')}}
									<i class="ti-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
					@endforeach
					<!-- Pagination start -->
                    <div class="pagination-bx clearfix text-center">
						{!! $services->links("frontend.pagination") !!}
					</div>
					<!-- Pagination END -->
				</div>
				<!-- Left part END -->
				
				<!-- Side bar start -->
				<div class="col-xl-3 col-lg-4 col-md-5 sticky-top">
					<aside class="side-bar">
						<div class="widget recent-posts-entry">
							<h5 class="widget-title style-1">{{trans('frontend.service')}}</h5>
							<div class="widget-post-bx">
								@foreach ($servicesNew as $servicesN)
								<div class="widget-post clearfix">
									<div class="dlab-post-media">
										<img src="{{ asset($servicesN['image']) }}" width="200" height="143" alt="">
									</div>
									<div class="dlab-post-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>{!! date("d/m/Y", strtotime($servicesN['updated_at'])) !!}</strong> </li>
												<li class="post-author"> {{trans('frontend.by')}} <a href="javascript:void(0);">{{$servicesN['created_by']}}
													</a> </li>
											</ul>
										</div>
										<div class="dlab-post-header">
											<h6 class="post-title"><a href="{!! route('home.services-detail', ['slug' => str_slug($servicesN[$lang]['title']), 'id' => $service['id']]) !!}">{{$servicesN[$lang]['title']}}</a></h6>
										</div>
									</div>
								</div>
								@endforeach()
							</div>
						</div>
					</aside>
				</div>
				<!-- Side bar END -->

			</div>
		</div>
	</div> --}}
	<div class="content-area">
		<div class="container">
			<div class="row">
				<!-- left part start -->
				<div class="col-lg-9 col-md-7 animation-effects">
					{{-- <div class="row"> --}}
						<!-- blog grid  -->
						<div id="masonry" class="dlab-blog-grid-2">
							@foreach($serviceCategories as $service)
							<div class="dlab-box-bg post card-container col-lg-6 col-md-12 col-sm-12  active wow bounceIn" style="margin-top: 30px;visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
								<div class="blog-post blog-grid blog-rounded blog-effect1">
									<div class="dlab-post-media dlab-img-effect"> 
										<a href="{!! route('home.services-detail', ['slug' => str_slug($service[$lang]['title']), 'id' => $service['id']]) !!}"><img src="{{ asset($service['image']) }}" alt=""></a> 
									</div>
									<div class="dlab-info p-a20 border-1">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>{!! date("d/m", strtotime($service['updated_at'])) !!}</strong> <span> {!! date("/Y", strtotime($service['updated_at'])) !!}</span> </li>
												<li class="post-author"> {{trans('frontend.by')}} <a href="">{{$service['created_by']}}</a> </li>
											</ul>
										</div>
										<div class="dlab-post-title">
											<h4 class="post-title"><a href="{!! route('home.services-detail', ['slug' => str_slug($service[$lang]['title']), 'id' => $service['id']]) !!}">{{ $service[$lang]['title'] }}</a></h4>
										</div>
										<div class="dlab-post-text">
											<p>{!! \App\Helper\HString::modSubstr($service[$lang]['summary'], 100) !!}</p>
										</div>
										<div class="dlab-post-readmore"> 
											<a href="{!! route('home.services-detail', ['slug' => str_slug($service[$lang]['title']), 'id' => $service['id']]) !!}" title="READ MORE" rel="bookmark"
												class="site-button">{{trans('frontend.read_more')}}
												<i class="ti-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach

						</div>
						<!-- blog grid END -->
						<!-- Pagination start -->
						<div class="pagination-bx clearfix m-b30 text-center col-md-12">
							{!! $services->links("frontend.pagination") !!}
						</div>
						<!-- Pagination END -->
					{{-- </div> --}}
				</div>
				<!-- left part start -->
				<!-- Side bar start -->
				<div class="col-lg-3 col-md-5 animation-effects">
					<aside  class="side-bar sticky-top">
						<div class="widget recent-posts-entry">
							<h5 class="widget-title style-1">{{trans('frontend.service')}}</h5>
							<div class="widget-post-bx">
								@foreach ($servicesNew as $servicesN)
								<div class="widget-post clearfix dlab-box-bg post card-container active wow bounceInRight" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInRight;">
									<div class="dlab-post-media"> 
										<img src="{{ asset($servicesN['image']) }}" width="200" height="143" alt=""> 
									</div>
									<div class="dlab-post-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>{!! date("d/m/Y", strtotime($servicesN['updated_at'])) !!}</strong> </li>
												<li class="post-author"> {{trans('frontend.by')}} <a href="javascript:void(0);">{{$servicesN['created_by']}}
												</a> </li>
											</ul>
										</div>
										<div class="dlab-post-header">
											<h6 class="post-title"><a href="{!! route('home.services-detail', ['slug' => str_slug($servicesN[$lang]['title']), 'id' => $service['id']]) !!}">{{$servicesN[$lang]['title']}}</a></h6>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</aside>
				</div>
				<!-- Side bar END -->
			</div>
		</div>
	</div>

</div>
<!-- Content END-->



@endsection
