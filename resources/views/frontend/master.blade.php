<!DOCTYPE html>
<html lang="en">
<?php $appName = isset($staticPages['website-title']['description']) ? $staticPages['website-title']['description'] : env('APP_NAME'); ?>
<head>
	<!-- PAGE TITLE HERE -->
	<title>@yield('title') | EVG</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:url" content="{!! url()->full() !!}">
    <meta property="fb:app_id" content="1081710445331564">
    <meta property="og:description" content="@yield('seo_description')">
    <meta property="og:site_name" content="{!! env("APP_NAME") !!}">
    <meta property="og:type" content="product">
    <meta name="twitter:site" content="{!! env("APP_NAME") !!}">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('seo_description')">
    <meta name="twitter:creator" content="{!! env("APP_NAME") !!}">
    <meta name="twitter:card" content="photo">
    <meta name="twitter:url" content="{!! url()->full() !!}">
    <link rel="canonical" href="{!! route('home') !!}">
    <meta name="author" content="{!! env("APP_NAME") !!}" />
    <meta name="keywords" content="@yield('seo_keywords')" />
    <meta name="description" content="@yield('seo_description')" />
    <meta name="copyright" content="BCTech, Công ty Cổ phần Giải pháp Công nghệ cao BCTech, Chuyên thiết kế website, phần mềm ứng dụng, ứng dụng Android, iOS, các giải pháp Cloud Server, Streaming, Camera, Cung cấp VPS, Hosting, 024 6688 3355" />
    <link rel="icon" href="{{ asset('assets/frontend/images/evg_logo.png') }}" type="image/x-icon" />

	<!-- STYLESHEETS -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}" type="text/css" media="screen">
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/fullwidth.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/settings.css') }}" media="screen" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/jquery.bxslider.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/style.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/responsive.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/bootstrap-slider.min.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/pricing-table.css') }}" media="screen">
    <style type="text/css">
        .main-color {
            color: #f2621f !important;
            ;
        }
        
        .logo-color {
            color: #6d3c1d !important;
            ;
        }
        
        .heading-1 {
            font-weight: 900;
            ;
        }
        
        .border-buttom-main-text {
            border-bottom: 1px solid #6d3c1d !important;
            ;
        }
        
        .blue-color {
            color: #0076f9 !important;
            ;
        }
    </style>
    <style type="text/css">
        .listpriceDomain li {
            list-style: none;
            margin: 10px 15px 10px 0;
            display: inline-block;
            text-transform: uppercase;
        }
        
        .testimonials-box h3 span,
        .staff-box h3 span,
        .infographic-box h3 span {
            display: inline-block;
            padding: 15px;
            background: #F2621F;
            border-radius: 6px;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            -o-border-radius: 6px;
            font-weight: 400;
            position: relative;
        }
    </style>
    <meta name="google-site-verification" content="fd0KpVbeyVu-dLcZSUSdRYvGa1mkSm24qYjPlGIJEoM" />
</head>

<body>
	<!-- Container -->
    <div id="container">
        <!-- Header
            ================================================== -->
        <header class="clearfix">
            <!-- Static navbar -->
            <div class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('home') }}"><img alt="" src="{{ asset('assets/frontend/images/logo3.png') }}" width="232" height="66"></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right col-md-4 col-lg-4 col-sm-6">
                            <li class="drop">
                                <a class="active" href="tel:{!! isset($staticPages['phone']['description']) ? $staticPages['phone']['description'] : '' !!}"  style="padding: 19px 5px">
                                    <h4 class="top-words">{!! isset($staticPages['hotline']['description']) ? $staticPages['hotline']['description'] : '' !!}</h4>
                                </a>
                            </li>
                        </ul>
                        {{-- <ul class="nav navbar-nav navbar-right col-md-6 col-lg-6 col-sm-6 col-xs-12" style="margin: 20px 0;">
                            <li class="drop"><a href="#" class="non-active"><h4>{!! isset($staticPages['address']['description']) ? $staticPages['address']['description'] : '' !!}</h4></a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header -->

        @yield('content')
        
        <!-- footer
            ================================================== -->
        <footer>
            <div class="footer-line">
                <div class="container">
                    <div class="footer-line-in">
                        <div class="row">
                            <div class="col-md-8">
                                {!! isset($staticPages['footer']['description']) ? $staticPages['footer']['description'] : '' !!}
                            </div>
                            <div class="col-md-4">
                                <ul class="social-icons">
                                    <li>
                                        <a class="facebook" href="{{ route('home') }}" style="color: white;">
                                            <i class="fa fa-globe"></i>{!! isset($staticPages['domain']['description']) ? $staticPages['domain']['description'] : '' !!}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="facebook" href="tel:{!! isset($staticPages['phone']['description']) ? $staticPages['phone']['description'] : '' !!}" style="color: white;">
                                            <i class="fa fa-phone"></i>{!! isset($staticPages['zalo']['description']) ? $staticPages['zalo']['description'] : '' !!}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer -->
        <div class="fixed-link-top">
            <div class="container">
                <a class="go-top" href="javascript:void(0)"><i class="fa fa-angle-up"></i></a>
            </div>
        </div>
    </div>
	<!-- Footer END-->
	<!-- JAVASCRIPT FILES ========================================= -->
	<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.migrate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.bxslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/plugins-scroll.js') }}"></script>
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap-slider.min.js') }}"></script>
	<script type="text/javascript">
        var tpj = jQuery;
        tpj.noConflict();

        tpj(document).ready(function() {

            if (tpj.fn.cssOriginal != undefined)
                tpj.fn.css = tpj.fn.cssOriginal;

            var api = tpj('.fullwidthbanner').revolution({
                delay: 8000,
                startwidth: 1170,
                startheight: 500,

                onHoverStop: "off", // Stop Banner Timet at Hover on Slide on/off

                thumbWidth: 100, // Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
                thumbHeight: 50,
                thumbAmount: 3,

                hideThumbs: 0,
                navigationType: "none", // bullet, thumb, none
                navigationArrows: "solo", // nexttobullets, solo (old name verticalcentered), none

                navigationStyle: "round", // round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom

                navigationHAlign: "center", // Vertical Align top,center,bottom
                navigationVAlign: "bottom", // Horizontal Align left,center,right
                navigationHOffset: 30,
                navigationVOffset: 40,

                soloArrowLeftHalign: "left",
                soloArrowLeftValign: "center",
                soloArrowLeftHOffset: 0,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: "right",
                soloArrowRightValign: "center",
                soloArrowRightHOffset: 0,
                soloArrowRightVOffset: 0,

                touchenabled: "on", // Enable Swipe Function : on/off

                stopAtSlide: -1, // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
                stopAfterLoops: -1, // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

                hideCaptionAtLimit: 0, // It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
                hideAllCaptionAtLilmit: 0, // Hide all The Captions if Width of Browser is less then this value
                hideSliderAtLimit: 0, // Hide the whole slider, and stop also functions if Width of Browser is less than this value

                fullWidth: "on",

                shadow: 1 //0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

            });

            // TO HIDE THE ARROWS SEPERATLY FROM THE BULLETS, SOME TRICK HERE:
            // YOU CAN REMOVE IT FROM HERE TILL THE END OF THIS SECTION IF YOU DONT NEED THIS !
            api.bind("revolution.slide.onloaded", function(e) {

                jQuery('.tparrows').each(function() {
                    var arrows = jQuery(this);

                    var timer = setInterval(function() {

                        if (arrows.css('opacity') == 1 && !jQuery('.tp-simpleresponsive').hasClass("mouseisover"))
                            arrows.fadeOut(300);
                    }, 3000);
                })

                jQuery('.tp-simpleresponsive, .tparrows').hover(function() {
                    jQuery('.tp-simpleresponsive').addClass("mouseisover");
                    jQuery('body').find('.tparrows').each(function() {
                        jQuery(this).fadeIn(300);
                    });
                }, function() {
                    if (!jQuery(this).hasClass("tparrows"))
                        jQuery('.tp-simpleresponsive').removeClass("mouseisover");
                })
            });
            // END OF THE SECTION, HIDE MY ARROWS SEPERATLY FROM THE BULLETS
        });
    </script>
    <script>
        jQuery(function() {
            jQuery("#txtDomain").keypress(function(e) {
                if (e.which == 13) {
                    window.open("http://domain.bctech.vn/customer/cart/result/" + jQuery(this).val(), '_blank');
                }
            });
        });

        function check_domain() {
            window.open("http://domain.bctech.vn/customer/cart/result/" + jQuery("#txtDomain").val(), '_blank');
        }
    </script>
</body>

</html>
