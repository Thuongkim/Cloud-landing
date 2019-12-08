@extends('frontend.master')

@section('title'){!! trans('frontend.home') !!}@stop

@section('seo_keywords'){!! isset($staticPages[$lang]['seo-keywords']['description']) ? strip_tags($staticPages[$lang]['seo-keywords']['description']) : '' !!}@stop
@section('seo_description'){!! isset($staticPages[$lang]['seo-description']['description']) ? strip_tags($staticPages[$lang]['seo-description']['description']) : '' !!}@stop

@section('content')

<!-- slider
================================================== -->
<div id="slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <ul>
                <li data-transition="3dcurtain-vertical" data-slotamount="10" data-masterspeed="300">
                    <!-- THE MAIN IMAGE IN THE DEMO SLIDE -->
                    <img alt="" src="image/cloud6.png">

                    <!-- THE CAPTIONS IN THIS SLDIE -->
                    <div class="caption randomrotate" data-x="700" data-y="122" data-speed="600" data-start="1200" data-easing="easeOutExpo">
                        <img src="https://bctech.vn/assets/media/images/rs_captions/page-31_16_11_2017_16_12_28.png" />
                    </div>
                    <div class="caption big_white sft stt slide3-style" data-x="10" data-y="100" data-speed="500" data-start="1500" data-easing="easeOutExpo">
                        <span class="blue-color"class="opt-style2"><span style="color: white;">EVG-CLOUD </span></span>
                    </div>
                    <!-- <div class="caption modern_medium_fat sft stt slide3-style" data-x="520" data-y="237" data-speed="500" data-start="1700" data-easing="easeOutExpo">
                        <span class="opt-style2">ViCloud</span>
                    </div> -->
                    <div class="caption lfr medium_text" data-x="10" data-y="170" data-speed="600" data-start="1900" data-easing="easeOutExpo">
                        <!-- <a href="http://vicloud.vn" target="blank_" style="background: #0076f9; color: white;">Chi tiết</a> -->
                        <div>
                        Được xây dựng và phát triển bởi đội ngũ nhân sự giàu kinh nghiệm, trên nền hệ thống phần cứng hiện đại nhất <br>
                        từ DELL, HP, IBM… với giải pháp công nghệ KVM đã được Amazon, IBM, Alibaba…tin tưởng sử dụng. <br><br>
                        </div>
                        <div id="demo" class="collapse" style="width: 100%;">
                        EVG-CLOUD là dịch vụ cho phép khách hàng khởi tạo theo nhu cầu hàng loạt các loại tài nguyên máy chủ ảo<br>
                         bao gồm bộ vi xử lý trung tâm (CPU), bộ nhớ tạm thời (RAM), dung lượng lưu trữ (Storage) và hệ thống mạng<br> (Networks) mà không cần phải đầu tư thiết bị phần cứng tại Data Center<br><br>

                        Hệ thống được phân bố tại các Data Center đạt chuẩn Tier 3 như FPT, Viettel, VNPT. Dịch vụ sử dụng riêng hệ <br>thống kết nối cáp quốc tế ổn định, băng thông cao lên tới 10Gbps; đảm bảo cam kết chất lượng (SLA) 99,99%. <br><br>

                        Khách hàng dễ dàng quản lý máy chủ  và dịch vụ chỉ với vài cú nhấp chuột; tất cả các nghiệp vụ quản trị, vận <br>hành đều được thực hiện thông qua giao diện web portal
                        </div>
                        <button type="button" class="detail" data-toggle="collapse" data-target="#demo">Chi tiết</button>
                    </div>
                </li>
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
                    <div class="col-md-4">
                        <div class="services-post">
                            <a class="services-cloud-server" href="javascript:void(0)">
                                <i class="fa fa-rocket"></i>
                            </a>
                            <div class="services-post-content">
                                <h4>Cloud Server</h4>
                                <p>Giải pháp và hạ tầng máy chủ Cloud với chi phí thấp mà tính hiệu quả cao, hỗ trợ đầy đủ các tính năng cần thiết. Chúng tôi cũng là đơn vị cung cấp giải pháp Cloud Private</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="services-post">
                            <a class="services-giai-phap-dich-vu-streaming" href="javascript:void(0)">
                                <i class="fa fa-users"></i>
                            </a>
                            <div class="services-post-content">
                                <h4>Giải pháp & dịch vụ Streaming</h4>
                                <p>Cung cấp giải pháp và hạ tầng trong lĩnh vực Streaming. Các chuẩn nén tiên tiến giảm bớt dung lượng đường truyền và lưu trữ mà đảm bảo chất lượng cũng như độ delay thấp</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="services-post">
                            <a class="services-dich-vu-colocation" href="javascript:void(0)">
                                <i class="fa fa-shield"></i>
                            </a>
                            <div class="services-post-content">
                                <h4>Dịch vụ Colocation</h4>
                                <p>Cho thuê một phần không gian – diện tích mặt sàn để đặt hệ thống máy chủ và các thiết phị phần cứng khác. Với hạ tầng IDC lớn nhất Việt Nam, đạt chuẩn quốc tế, chuyên nghiệp</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="services-post">
                            <a class="services-ung-dung-android" href="javascript:void(0)">
                                <i class="fa fa-university"></i>
                            </a>
                            <div class="services-post-content">
                                <h4>Ứng dụng Android</h4>
                                <p>Phát triển các ứng dụng dựa trên nền tảng Android. Chúng tôi đã có hơn 250 ứng dụng trên Google Play</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="services-post">
                            <a class="services-ung-dung-ios" href="javascript:void(0)">
                                <i class="fa fa-refresh"></i>
                            </a>
                            <div class="services-post-content">
                                <h4>Ứng dụng iOS</h4>
                                <p>Phát triển các ứng dụng dựa trên nền tảng iOS. Chúng tôi đã có hơn 100 ứng dụng trên App Store</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="services-post">
                            <a class="services-thiet-ke-website" href="javascript:void(0)">
                                <i class="fa fa-cogs"></i>
                            </a>
                            <div class="services-post-content">
                                <h4>Thiết kế website</h4>
                                <p>Phát triển phần mềm, website theo yêu cầu khách hàng như : thương mại điện tử, thanh toán trực tuyến, giới thiệu công ty... </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SSL pricing section  -->
            <div class="services-box">
                <h3 class="box-title">Đăng kí sử dụng dễ dàng</h3>
                 <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        <div class="services-post">
                            <div class="services-post-content">
                                <h4>Bước 1</h4>
                            </div>
                            <a class="services-cloud-server" href="javascript:void(0)">
                                <i class="fa fa-hand-o-up"></i>
                            </a>
                            <div class="services-post-content">
                                <p>Giải pháp và hạ tầng máy chủ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="services-post">
                            <div class="services-post-content">
                                <h4>Bước 2</h4>
                            </div>
                            <a class="services-giai-phap-dich-vu-streaming" href="javascript:void(0)">
                                <i class="fa fa-server"></i>
                            </a>
                            <div class="services-post-content">
                                <p>Giải pháp và hạ tầng máy chủ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="services-post">
                            <div class="services-post-content">
                                <h4>Bước 3</h4>
                            </div>
                            <a class="services-dich-vu-colocation" href="javascript:void(0)">
                                <i class="fa fa-dollar"></i>
                            </a>
                            <div class="services-post-content">
                                <p>Giải pháp và hạ tầng máy chủ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="services-post">
                            <div class="services-post-content">
                                <h4>Bước 4</h4>
                            </div>
                            <a class="services-ung-dung-android" href="javascript:void(0)">
                                <i class="fa fa-key"></i>
                            </a>
                            <div class="services-post-content">
                                <p>Giải pháp và hạ tầng máy chủ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="services-post">
                            <div class="services-post-content">
                                <h4>Bước 5</h4>
                            </div>
                            <a class="services-ung-dung-ios" href="javascript:void(0)">
                                <i class="fa fa-headphones"></i>
                            </a>
                            <div class="services-post-content">
                                <p>Giải pháp và hạ tầng máy chủ.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-sm-6">
                        <img src="image/img2.png">
                    </div>
                    <div class="col-sm-6">
                        <h4 style="color: #d29103;margin-top: 30px;">Trải nghiệm EVG-CLOULD bạn nhận ngay:</h4><br>
                        <p><a href="https://bctech.vn/ssl.html"><i class="fa fa-hand-o-right"></i> Tư vấn tối ưu dịch vụ bởi chuyên gia</a></p>
                    </div>
                    <a href="#"><button class="read-more">Chi tiết</button></a>
                </div>
            </div>

            <div class="person-box">
                <h3 class="box-title">Đội ngũ nhân sự</h3>
                <div class="row">
                <div class="col-lg-4">
                  <img class="img-circle" src="image/img.png" alt="Generic placeholder image" width="200" height="200">
                  <h2>Nguyễn Cảnh Toàn</h2>
                  <p>Technical</p>
                  <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                  <img class="img-circle" src="image/img.png" alt="Generic placeholder image" width="200" height="200">
                  <h2>Nguyễn Cảnh Toàn</h2>
                  <p>Leader</p>
                  <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                  <img class="img-circle" src="image/img.png" alt="Generic placeholder image" width="200" height="200">
                  <h2>Nguyễn Cảnh Toàn</h2>
                  <p>Founder</p>
                  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                </div><!-- /.col-lg-4 -->
              </div><!-- /.row -->
          </div>
            <br/>
        </div>
    </div>
</div>
<!-- End content -->

@endsection
